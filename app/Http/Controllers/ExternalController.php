<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class ExternalController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('external.index', compact('documents'));
    }

    public function rate(Request $request, Document $document)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        // Store the rating and comment in a pivot or separate table if implemented
        // Example placeholder logic:
        \Log::info("Document ID {$document->id} rated {$request->rating} with comment: {$request->comment}");

        return redirect()->route('review.index')->with('success', 'Rating submitted.');
    }
}
