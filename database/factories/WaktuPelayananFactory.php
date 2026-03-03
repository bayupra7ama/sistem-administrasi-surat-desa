<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WaktuPelayanan>
 */
class WaktuPelayananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'hari' => 'Senin', // Default value, can be overridden
            'jam_buka' => '08:00:00',
            'jam_tutup' => '16:00:00',
        ];
    }
}
