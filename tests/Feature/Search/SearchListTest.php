<?php


namespace Tests\Feature\Search;


use App\Models\Search;
use App\Models\User;
use Tests\TestCase;

class SearchListTest extends TestCase
{
    /** @test */
    public function anAdminUserCanViewAListOfSearches()
    {
        $searches = Search::factory()->count(3)->create();
        $adminUser = User::factory()->admin()->create();

        $response = $this->actingAs($adminUser)->get(route('searches.list'));

        $response->assertSee($searches[0]->location);
        $response->assertSee($searches[2]->location);
    }

    /** @test */
    public function aReadUserCanViewTheListOfSearches()
    {
        $searches = Search::factory()->count(3)->create();
        $readUser = User::factory()->create();

        $response = $this->actingAs($readUser)->get(route('searches.list'));

        $response->assertSee($searches[0]->location);
        $response->assertSee($searches[2]->location);
    }

    /** @test */
    public function aGuestCanNotViewTheListOfSearches()
    {
        $searches = Search::factory()->count(2)->create();

        $response = $this->get(route('searches.list'));

        $this->assertGuest();
        $response->assertRedirect(route('login'));
        $response->assertDontSee($searches[0]->location);
    }
}
