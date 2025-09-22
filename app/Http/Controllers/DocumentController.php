<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DocumentController;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('user')->get();
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|file',
        ]);

        $path = $request->file('file')->store('documents');

        Document::create([
            'uploaded_by' => Auth::id(),
            'title' => $request->title,
            'file_path' => $path,
            'description' => $request->description,
        ]);

        return redirect()->route('documents.index')->with('success', 'Document uploaded successfully.');
    }

    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    public function edit(Document $document)
    {
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $document->update($request->only(['title', 'description']));

        return redirect()->route('documents.index')->with('success', 'Document updated successfully.');
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Document deleted successfully.');
    }
} 