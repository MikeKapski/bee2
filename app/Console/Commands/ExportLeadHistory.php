<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use RuntimeException;

class ExportLeadHistory extends Command
{
    protected $signature = 'leads:export-history {output=storage/app/lead-history.json}';

    protected $description = 'Export website lead and order history for the unified dashboard';

    public function handle(): int
    {
        $tables = [
            'ER_UserOrders',
            'ER_UserOrders_Dop',
            'ER_User',
            'ER_UserPhones',
            'ER_UserEmail',
            'er_cars',
        ];

        $export = [
            'generated_at' => now()->utc()->toIso8601String(),
            'tables' => [],
        ];

        foreach ($tables as $table) {
            if (! Schema::hasTable($table)) {
                $this->warn('Таблица не найдена: '.$table);
                continue;
            }

            $columns = Schema::getColumnListing($table);
            $query = DB::table($table);
            if (in_array('ID', $columns, true)) {
                $query->orderBy('ID');
            }

            $rows = $query->get()->map(static function ($row) {
                return (array) $row;
            })->all();
            $export['tables'][$table] = [
                'columns' => $columns,
                'rows' => $rows,
            ];
            $this->line($table.': '.count($rows));
        }

        $argument = (string) $this->argument('output');
        $isAbsolute = $argument !== '' && substr($argument, 0, 1) === DIRECTORY_SEPARATOR;
        $output = $isAbsolute ? $argument : base_path($argument);
        $directory = dirname($output);
        if (! is_dir($directory) && ! mkdir($directory, 0700, true) && ! is_dir($directory)) {
            throw new RuntimeException('Не удалось создать каталог '.$directory);
        }

        $json = json_encode($export, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);
        if (file_put_contents($output, $json) === false) {
            throw new RuntimeException('Не удалось записать '.$output);
        }

        chmod($output, 0600);
        $this->info('Экспорт сохранён: '.$output);

        return 0;
    }
}
