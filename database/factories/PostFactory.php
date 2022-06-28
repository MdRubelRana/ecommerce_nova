<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $id = rand(30, 300);
        $image = "https://i.picsum.photos/id/".$id."/640/480.jpg";

        return [
            'title' => $this->faker->sentence(),
            'slug' => Str::slug($this->faker->sentence()),
            'image' => $image,
            'description' => $this->faker->text(400),
            'category_id' => function(){
                return Category::inRandomOrder()->first()->id;
            },
            'user_id' => 1,
        ];
    }
}
