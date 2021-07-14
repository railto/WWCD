<?php

namespace Database\Factories;

use App\Models\Search;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SearchFactory extends Factory
{
    protected $model = Search::class;

    public function definition(): array
    {
        return [
            'created_by' => User::factory(),
            'location' => $this->faker->streetName(),
            'start' => $this->faker->dateTimeThisYear(),
            'type' => 'exercise',
            'officer_in_charge' => $this->faker->name(),
            'search_manager' => $this->faker->name(),
            'safety_officer' => $this->faker->name(),
            'section_leader' => $this->faker->name(),
            'radio_operator' => $this->faker->name(),
            'scribe' => $this->faker->name(),
        ];
    }
}
