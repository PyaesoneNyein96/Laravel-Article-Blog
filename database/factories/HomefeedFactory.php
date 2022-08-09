<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HomeFeedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ucwords($this->faker->word),
            'content'=>$this->faker->sentence,
            'Category_id' =>rand(1,3),
            'user_id' =>rand(1,2),
        ];
    }
}
