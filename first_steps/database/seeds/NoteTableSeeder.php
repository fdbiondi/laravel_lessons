<?php

use App\Category;
use App\Note;
use Illuminate\Database\Seeder;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        $notes = factory(Note::class)->times(100)->make();

        foreach($notes as $note){
            $category = $categories->random();

            //$category->notes   le estoy diciendo a laravel que me traiga todas las notas relacionadas con la categoria
            //$category->notes()    devuelve la relacion
            $category->notes()->save($note);
        }
    }
}
