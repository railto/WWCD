<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Search;
use App\Http\Livewire\Search\RadioAssignments;

test('a user with write permissions can open the modal to create a new radio assignment', function () {
    $this->actingAs(User::factory()->write()->activated()->create());
    $search = Search::factory()->create();

    Livewire::test(RadioAssignments::class, ['search' => $search])
        ->assertSee('Add Radio Assignment')
        ->set('showCreateRadioAssignmentModal', true)
        ->assertSee('Reset Form')
        ->assertSee('Close')
        ->assertSee('Add Radio Assignment');
});

test('a user with write permissions can add a radio assignment', function () {
    $this->actingAs(User::factory()->write()->activated()->create());
    $search = Search::factory()->create();

    Livewire::test(RadioAssignments::class, ['search' => $search])
        ->assertDontSee('WW1')
        ->set('call_sign', 'WW1')
        ->set('tetra_number', 53581)
        ->set('name', 'Whiskey One')
        ->call('storeRadioAssignment')
        ->assertSee('WW1');

    expect($search->radioAssignments()->first()->name)->toBe('Whiskey One');
});

test('a user with read only permissions can not add a radio assignment', function () {
    $this->actingAs(User::factory()->read()->activated()->create());
    $search = Search::factory()->create();

    Livewire::test(RadioAssignments::class, ['search' => $search])
        ->assertDontSee('WW1')
        ->set('call_sign', 'WW1')
        ->set('tetra_number', 53581)
        ->set('name', 'Whiskey One')
        ->call('storeRadioAssignment')
        ->assertDontSee('WW1');

    expect($search->radioAssignments()->count())->toBe(0);
});
