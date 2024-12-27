<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("note.index", [
            "notes" => Note::query()->where('user_id', request()->user()->id)->orderBy('created_at', 'desc')->paginate('5')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("note.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => ["required", "string", "max:50"],
            "note" => ["required", "string", "max:2000"]
        ]);

        $data["user_id"] = $request->user()->id;

        try {
            $note = Note::create($data);
        } catch (\Exception $e) {
            return to_route("note.create")->with("error", "Note can't be created");
        }


        return to_route("note.show", $note)->with("success", "Note created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        return view("note.show", [
            "note" => $note
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        return view("note.edit", [
            "note" => $note
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        $data = $request->validate([
            "name" => ["required", "string", "max:50"],
            "note" => ["required", "string", "max:2000"]
        ]);
        try {
            $note->update($data);
        } catch (\Exception $e) {
            return to_route("note.show", $note)->with("error", "Note can't be updated");
        }

        return to_route("note.show", $note)->with("success", "Note updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        try {
            $note->delete();
        } catch (\Exception $e) {
            return to_route("note.show", $note)->with("error", "Note can't be deleted");
        }

        return to_route("note.index")->with("success", "Note deleted successfully");
    }
}
