<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NotesController extends Controller
{
    //
    public function index(){
        $notes = Note::paginate(20);
        return view('notes/list', compact('notes'));
    }

    public function create(){
        return view('notes/create');
    }

    public function store(Request $request){
        $this->validate(request(), [
            'note'=> ['required','max:200']
        ]);

        $data = request()->all();

        Note::create($data);

        return redirect()->to('notes');
    }

    public function show($note){
        dd($note);
    }

    public function view($id){
        $note = Note::find($id);

        dd($note->note);
    }
}
