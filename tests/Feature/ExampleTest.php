<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Book;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_application_returns_it_returns_all_books()
    {
        // Arrange
        // Book::factory()->count(3)->create();

        // Act
        $response = $this->get('/api/book');

        // Assert
        $response->assertStatus(200)
            ->assertJsonCount(10, 'data');
    }

    public function test_the_application_returns_it_returns_a_specific_book()
    {
        // Arrange
        $book = Book::factory()->create();

        // Act
        $response = $this->get("/api/book/{$book->id}");

        // Assert
        $response->assertStatus(200)
            ->assertJson($book->toArray());
    }

    public function  test_the_application_returns_it_creates_a_new_book()
    {
        // Arrange
        $bookData = Book::factory()->make()->toArray();

        // Act
        $response = $this->post('/api/book', $bookData);

        // Assert
        $response->assertStatus(201)
            ->assertJson(['message'=>'Book Created Successfully!!','book' => $bookData]);

        $this->assertDatabaseHas('books', $bookData);
    }
}
