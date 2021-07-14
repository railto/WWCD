<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Search;

test('an authenticated user can view a search', function () {
    $user = User::factory()->activated()->create();
    $search = Search::factory()->create();

    $response = $this->actingAs($user)->get(route('searches.show', $search));

    $response->assertSee($search->location);
    $response->assertSee(ucwords($search->type));
    $response->assertSee($search->scribe);
});

test('a guest can not view a search', function () {
    $search = Search::factory()->create();

    $response = $this->get(route('searches.show', $search));

    $this->assertGuest();
    $response->assertRedirect(route('login'));
    $response->assertDontSee($search->location);
});
