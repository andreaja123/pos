<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $documents = Document::when($q, function ($query, $q) {
            $query->where('title', 'like', "%{$q}%")->orWhere('category', 'like', "%{$q}%");
        })->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        $total = $documents->total();

        return view('lainlain.dokumen', compact('documents', 'total'));
    }

    public function create()
    {
        return view('lainlain.dokumencreate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'file' => 'required|file|max:10240', // 10MB
        ]);

        $file = $request->file('file');
        $path = $file->store('documents', 'public');

        $document = Document::create([
            'title' => $validated['title'],
            'category' => $validated['category'] ?? null,
            'filename' => basename($path),
            'original_name' => $file->getClientOriginalName(),
            'mime' => $file->getClientMimeType(),
            'size' => $file->getSize(),
        ]);

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diunggah.');
    }

    public function edit(Document $document)
    {
        return view('lainlain.dokumenedit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'file' => 'nullable|file|max:10240',
        ]);

        if ($request->hasFile('file')) {
            // delete old
            Storage::disk('public')->delete('documents/' . $document->filename);

            $file = $request->file('file');
            $path = $file->store('documents', 'public');

            $document->update([
                'filename' => basename($path),
                'original_name' => $file->getClientOriginalName(),
                'mime' => $file->getClientMimeType(),
                'size' => $file->getSize(),
            ]);
        }

        $document->update([
            'title' => $validated['title'],
            'category' => $validated['category'] ?? null,
        ]);

        return redirect()->route('documents.index')->with('success', 'Dokumen diperbarui.');
    }

    public function destroy(Document $document)
    {
        Storage::disk('public')->delete('documents/' . $document->filename);
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Dokumen dihapus.');
    }

    public function download(Document $document)
    {
        $path = storage_path('app/public/documents/' . $document->filename);
        if (!file_exists($path)) {
            abort(404);
        }
        return response()->download($path, $document->original_name);
    }
}
