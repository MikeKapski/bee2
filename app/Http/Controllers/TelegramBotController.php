<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use RuntimeException;
use Throwable;

class TelegramBotController extends Controller
{
    private const SUCCESS_MESSAGE = 'Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.';

    private function makePayload(string $type, array $fields): array
    {
        return [
            'source' => 'bee-cars.ru',
            'type' => $type,
            'fields' => array_filter($fields, static fn ($value) => $value !== null && $value !== ''),
            'created_at' => now()->utc()->toIso8601String(),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ];
    }

    private function mirrorLead(array $payload): void
    {
        $url = (string) config('services.site_leads.url');
        $secret = (string) config('services.site_leads.secret');

        if ($url === '' || $secret === '') {
            throw new RuntimeException('Не настроен сервис заявок сайта.');
        }

        $body = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);
        $signature = 'sha256='.hash_hmac('sha256', $body, $secret);

        $response = Http::connectTimeout(5)
            ->timeout(20)
            ->retry(3, 500)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'X-BeeCars-Signature' => $signature,
            ])
            ->withBody($body, 'application/json')
            ->post($url);

        if (! $response->successful()) {
            throw new RuntimeException('Сервис заявок ответил HTTP '.$response->status());
        }
    }

    private function emailLead(array $payload): void
    {
        $recipient = (string) config('services.site_leads.email');
        $sender = (string) config('services.site_leads.from');
        if ($recipient === '') {
            throw new RuntimeException('Не настроен email для заявок сайта.');
        }

        $type = (string) ($payload['type'] ?? 'unknown');
        $subjects = [
            'call_me' => 'Заявка: перезвоните мне',
            'mustang_contact' => 'Заявка Mustang',
            'new_order' => 'Новый заказ с сайта',
            'fast_order' => 'Новый заказ в 1 клик',
        ];
        $subject = $subjects[$type] ?? 'Новая заявка с сайта';
        $lines = [];
        foreach (($payload['fields'] ?? []) as $name => $value) {
            $lines[] = trim((string) $name).' '.trim((string) $value);
        }
        $lines[] = 'Источник: '.($payload['source'] ?? 'bee-cars.ru');
        $lines[] = 'Дата: '.($payload['created_at'] ?? '');

        Mail::raw(implode(PHP_EOL, $lines), static function ($message) use ($recipient, $sender, $subject): void {
            if ($sender !== '') {
                $message->from($sender);
            }
            $message->to($recipient)->subject($subject);
        });
    }

    private function sendLead(string $type, array $fields): string
    {
        $payload = $this->makePayload($type, $fields);
        $delivered = false;
        $errors = [];

        try {
            $this->emailLead($payload);
            $delivered = true;
        } catch (Throwable $exception) {
            $errors[] = 'email: '.$exception->getMessage();
            Log::error('Не удалось отправить заявку по email', [
                'type' => $type,
                'exception' => $exception,
            ]);
        }

        try {
            $this->mirrorLead($payload);
            $delivered = true;
        } catch (Throwable $exception) {
            $errors[] = 'dashboard: '.$exception->getMessage();
            Log::error('Не удалось сохранить заявку в дашборде', [
                'type' => $type,
                'exception' => $exception,
            ]);
        }

        if (! $delivered) {
            throw new RuntimeException('Не удалось отправить заявку: '.implode('; ', $errors));
        }

        return self::SUCCESS_MESSAGE;
    }

    public function SendChatCallMe($phoneNumber): string
    {
        return $this->sendLead('call_me', [
            'Тип сообщения:' => 'Перезвоните мне.',
            'Телефон:' => $phoneNumber,
        ]);
    }

    public function SendChatCallMeMustang($phoneNumber, $name, $message, $timeNow): string
    {
        return $this->sendLead('mustang_contact', [
            'Тип сообщения:' => 'Заявка Mustang.',
            'Телефон:' => $phoneNumber,
            'Имя:' => $name,
            'Сообщение:' => $message,
        ]);
    }

    public function SendChatNewOrder($data): string
    {
        return $this->sendLead('new_order', [
            'Тип сообщения:' => 'Новый заказ с сайта.',
            'Имя Клиента:' => $data['ClientName'] ?? '',
            'Телефон:' => $data['ClientPhone'] ?? '',
            'Автомобиль:' => $data['CarName'] ?? '',
            'Количество дней:' => $data['CarDays'] ?? '',
            'Начало аренды:' => $data['CarStart'] ?? '',
            'Предварительная цена итого:' => $data['CarTotal'] ?? '',
        ]);
    }

    public function SendChatNewOrderFast($data): string
    {
        return $this->sendLead('fast_order', [
            'Тип сообщения:' => 'Новый заказ в 1 клик с сайта.',
            'Имя Клиента:' => $data['ClientName'] ?? '',
            'Телефон:' => $data['ClientPhone'] ?? '',
            'Автомобиль:' => $data['CarName'] ?? '',
        ]);
    }
}
