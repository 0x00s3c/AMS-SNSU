<?php

namespace App\Http\Controllers;

use App\Models\Document;

class ViewerController extends Controller
{
    public function index()
    {
        $publicDocuments = Document::where('is_public', true)->latest()->get();
        return view('viewer.index', compact('publicDocuments'));
    }
}
