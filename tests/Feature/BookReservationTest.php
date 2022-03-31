<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_book_can_be_added_to_a_library()
    {
        $response = $this->postJson('/books',[
            'title' => 'Cool Title',
            'author' => 'Francis'
        ]);

        $response->assertCreated();
        $this->assertEquals(1, count(Book::all()));
    }


    public function test_a_book_can_be_updated()
    {
        $book = Book::factory()->create();
        $bookToPatch = Book::factory()->make();

        $this->patchJson(route('book.update',$book->id), [
            'title' => $bookToPatch->title,
            'author' => $bookToPatch->author
        ])
        ->assertOk();
        
        
        $this->assertDatabaseHas('books', ['title'=>$bookToPatch->title, 'author'=>$bookToPatch->author]);
    }

}








