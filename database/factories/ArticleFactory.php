<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraphs(3, true),
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'author_id' => User::where('role', 'author')->inRandomOrder()->first()->id ?? User::factory()->create(['role' => 'author'])->id,
        ];
    }
}
