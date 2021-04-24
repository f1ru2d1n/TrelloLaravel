<?php

namespace Database\Factories;

use App\Models\DeskList;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeskListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeskList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'DeskList '.$this->faker->word,
            'desk_id' => $this->faker->numberBetween(1,10),
            'order' => $this->faker->numberBetween(1,30),
        ];
    }
}
