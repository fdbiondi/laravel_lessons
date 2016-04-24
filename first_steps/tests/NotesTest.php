<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Note;

class NotesTest extends TestCase
{
    //use WithoutMiddleware;
    use DatabaseTransactions;

    public function test_notes_list()
    {
        //Having
        Note::create(['note' => 'My first note']);
        Note::create(['note' => 'Second note']);

        //When
        $this->visit('notes')
            //Then
            ->see('My first note')
            ->see('Second note');
    }

    public function test_create_note()
    {
        // Route::post('notes')
        // When
        $this->visit('notes')
            // Then
            ->click('Add a note')
            ->seePageIs('notes/create')
            ->see('Create a note')
            ->type('A new note', 'note')
            ->press('Create note')
            ->seePageIs('notes')
            ->see('A new note')
            ->seeInDatabase('notes',[
                'note'=>'A new note'
            ]);
    }
}
