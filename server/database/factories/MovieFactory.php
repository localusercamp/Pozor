<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Movie::class;
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence,
            'description' => $this->faker->text,
            'link' => 'www' . $this->faker->word . 'DOTcom',
            'status_id' => Status::DRAFT_ID,
            'author_id' => rand(2,4)
        ];
    }
}
