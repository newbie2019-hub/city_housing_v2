<?php

namespace Database\Factories;

use App\Models\HousingProject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HousingUnit>
 */
class HousingUnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'housing_project_id' => HousingProject::factory(),
            'block_no' => 'Block ' . $this->faker->numberBetween(1, 20),
            'lot_no' => 'Lot ' . $this->faker->numberBetween(1, 10),
            'phase_no' => 'Phase ' . $this->faker->numberBetween(1, 20),
            'remark' => $this->faker->sentence(),
        ];
    }
}
