<?php

namespace Database\Factories;

use App\Models\LogFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogFileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LogFile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'path' => $this->faker->filePath(),
            'disk' => $this->faker->randomElement(array_keys(config('filesystems.disks')))
        ];
    }
}
