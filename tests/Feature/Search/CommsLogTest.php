<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Search;
use App\Http\Livewire\Search\CommsLog;
use function Pest\Faker\faker;

test('a user with write permissions can open the modal to create a new comms log entry', function () {
   $this->actingAs(User::factory()->write()->activated()->create());
   $search = Search::factory()->create();

   Livewire::test(CommsLog::class, ['search' => $search])
       ->assertSee('Add Comms Log')
       ->set('showCreateLogEntryModal', true)
       ->assertSee('Reset Form')
       ->assertSee('Close')
       ->assertSee('Add Comms Log');
});

test('a user with write permissions can add a comms log entry', function () {
    $this->actingAs(User::factory()->write()->activated()->create());
    $search = Search::factory()->create();

    $message = faker()->sentence;

    Livewire::test(CommsLog::class, ['search' => $search])
        ->set('time', now()->format('H:i'))
        ->set('call_sign', 'WW1')
        ->set('message', $message)
        ->call('storeCommsLog')
        ->assertSee(now()->format('H:i'))
        ->assertSee('WW1');

    expect($search->commsLogs()->first()->message)->toBe($message);
});

test('a user with read only permissions can not add a comms log entry', function () {
    $this->actingAs(User::factory()->read()->activated()->create());
    $search = Search::factory()->create();

    $message = faker()->sentence;

    Livewire::test(CommsLog::class, ['search' => $search])
        ->set('time', now()->format('H:i'))
        ->set('call_sign', 'WW1')
        ->set('message', $message)
        ->call('storeCommsLog')
        ->assertDontSee(now()->format('H:i'))
        ->assertDontSee('WW1');

    expect($search->commsLogs()->count())->toBe(0);
});
