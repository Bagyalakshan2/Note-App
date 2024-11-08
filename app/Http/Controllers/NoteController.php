<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all(); // Retrieve all notes from the database
        return view('notes.index', compact('notes')); // Pass notes to the view
    }

    public function create()
    {
        return view('notes.create'); // Show the form to create a note
    }
    public function delete(){


    }
    public function destroy($id)
    {
        $note = Note::findOrFail($id); // Find the note by ID
        $note->delete(); // Delete the note

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully');
    }

    public function store(Request $request)
    {
        // Validate and store the note
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $notes = Note::create($request->all());
        return redirect('/')->with('success', 'Note created successfully!');
    }
}
?>

