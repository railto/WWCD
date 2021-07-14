<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => '0831234567',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): UserFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function activated(): UserFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'activated_at' => Carbon::now(),
                'activated_by' => 1
            ];
        });
    }

    public function write(): UserFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'write',
            ];
        });
    }

    public function admin(): UserFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'admin',
            ];
        });
    }

    public function read(): UserFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'read',
            ];
        });
    }
}
