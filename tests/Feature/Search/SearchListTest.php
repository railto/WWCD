<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Search;

test('an admin user can view a list of searches', function () {
    $searches = Search::factory()->count(3)->create();
    $adminUser = User::factory()->admin()->create();

    $response = $this->actingAs($adminUser)->get(route('searches.list'));

    $response->assertSee($searches[0]->location);
    $response->assertSee($searches[2]->location);
});

test('a user with read only permissions can view the list of searches', function () {
    $searches = Search::factory()->count(3)->create();
    $readUser = User::factory()->create();

    $response = $this->actingAs($readUser)->get(route('searches.list'));

    $response->assertSee($searches[0]->location);
    $response->assertSee($searches[2]->location);
});

test('a guest can not view the list of searches', function () {
    $searches = Search::factory()->count(2)->create();

    $response = $this->get(route('searches.list'));

    $this->assertGuest();
    $response->assertRedirect(route('login'));
    $response->assertDontSee($searches[0]->location);
});
