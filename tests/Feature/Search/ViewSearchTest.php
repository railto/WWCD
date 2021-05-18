<?php


namespace Tests\Feature\Search;


use App\Models\Search;
use App\Models\User;
use Tests\TestCase;

class ViewSearchTest extends TestCase
{
    /** @test */
    public function anAuthenticatedUserCanViewASearch()
    {
        $user = User::factory()->activated()->create();
        $search = Search::factory()->create();

        $response = $this->actingAs($user)->get(route('searches.show', $search));

        $response->assertSee($search->location);
        $response->assertSee(ucwords($search->type));
        $response->assertSee($search->scribe);
    }

    /** @test */
    public function aGuestCanNotViewASearch()
    {
        $search = Search::factory()->create();

        $response = $this->get(route('searches.show', $search));

        $this->assertGuest();
        $response->assertRedirect(route('login'));
        $response->assertDontSee($search->location);
    }
}
