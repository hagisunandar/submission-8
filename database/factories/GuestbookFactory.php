<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guestbook>
 */
class GuestbookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'   => $this->faker->name(),
            'alamat'   => $this->faker->address(),
            'email' => $this->faker->text(10),
            'nomor_wa'   => $this->faker->randomNumber(5, true)
        ];
    }
}
