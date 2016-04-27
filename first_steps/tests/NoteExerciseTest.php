<?php

use App\Note;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NoteExerciseTest extends TestCase
{
    use DatabaseTransactions;

    public function test_notes_summary_and_notes_details()
    {
        $text = 'Begin of the note. Sit placeat voluptas ut sunt. Nostrum fugit perferendis ut. Commodi ducimus optio earum nemo doloribus iste eos facere.';
        $text .= 'End of the note';

        $note = Note::create(['note' => $text ]);

        $this->visit('notes')
            ->see('Begin of the note')
            ->seeInElement('.label', 'Others')
            ->dontSee('End of the note')
            ->seeLink('View note')
            ->click('View note')
            ->see($text)
            ->seeLink('View all notes', 'notes');
    }
}
