<?php

namespace App\Http\Controllers;

use App\Models\Document;

class PublicController extends Controller
{
    public function index()
    {
        // You can filter by visibility in real setup
        $documents = Document::latest()->get();
        return view('viewer.index', compact('documents'));
    }
}
