<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationTest extends TestCase
{
    public function test_a_title_is_required_when_storing_a_book()
    {
        $this->withExceptionHandling();

        $response = $this->post('/books',[
            'title' => '',
            'author' => 'Francis'
        ]);

        $response->assertSessionHasErrors('title');
        
    }

    public function test_a_author_is_required_when_storing_a_book()
    {
        $this->withExceptionHandling();

        $response = $this->post('/books',[
            'title' => 'Cool Title',
            'author' => ''
        ]);
        
        $response->assertSessionHasErrors('author');
        
    }
}
