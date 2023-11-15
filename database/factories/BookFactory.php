<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(5),
            'author' => $this->faker->name,
            'genre' => $this->faker->title,
            'description' => $this->faker->paragraph,
            'isbn' => $this->faker->e164PhoneNumber,
            'published' => $this->faker->date,
            'publisher' => $this->faker->name
        ];
    }
}
