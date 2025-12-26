<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $notes = Note::query()
            ->when($q, fn($qb) => $qb->where('title', 'like', "%{$q}%")->orWhere('body', 'like', "%{$q}%"))
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('lainlain.catatan', compact('notes', 'q'));
    }

    public function create()
    {
        return view('lainlain.catatancreate');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',
        ]);

        $note = Note::create($data);

        return redirect()->route('notes.index')->with('success', 'Catatan berhasil dibuat.');
    }

    public function edit(Note $note)
    {
        return view('lainlain.catatanedit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',
        ]);

        $note->update($data);

        return redirect()->route('notes.index')->with('success', 'Catatan berhasil diperbarui.');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Catatan dihapus.');
    }
}
