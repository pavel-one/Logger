<?php

namespace Database\Factories;

use App\Models\Log;
use App\Models\LogData;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LogData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->randomElements(Log::getLevels(), 2, true)
        ];
    }
}
