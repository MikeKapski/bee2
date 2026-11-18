<?php

namespace Tests\Feature;

use Tests\TestCase;

class BookingConsentTest extends TestCase
{
    public function test_full_booking_requires_explicit_consent(): void
    {
        $this->post('/ajaxworker', ['action' => 'OrderCar'])
            ->assertStatus(422);
    }

    public function test_fast_booking_requires_explicit_consent(): void
    {
        $this->post('/ajaxworker', [
            'action' => 'OrderCarFast',
            'Consent' => '0',
        ])->assertStatus(422);
    }
}
