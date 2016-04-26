<?php

use App\Note;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NoteExerciseTest extends TestCase
{
    use DatabaseTransactions;

    public function test_notes_summary_and_notes_details()
    {
        $text = "Begin of the Note. eligendi molestiae autem. Ut deleniti optio eius doloremque et aspernatur. Eius officiis placeat iste molestiae optio commodi blanditiis.";
        $text .= "End of the note";

        $note = Note::create(['note'=>$text]);

        $this->visit('notes')
            ->see('Begin of the note')
            ->seeInElement('.label', 'Others')
            ->dontSee('End of the note')
            ->seeLink('View note')
            ->click('View note')
            ->see($text);
    }
}
