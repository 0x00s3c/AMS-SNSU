@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>📄 Document Details</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">{{ $document->title }}</h5>
            <p class="card-text">{{ $document->description ?? 'No description.' }}</p>
            <p><strong>Uploaded by:</strong> {{ $document->user->name }}</p>
            <p><strong>Version:</strong> {{ $document->version }}</p>
            <p><strong>File:</strong> <a href="{{ Storage::url($document->file_path) }}" target="_blank">View File</a></p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('documents.index') }}" class="btn btn-secondary">⬅ Back to List</a>
    </div>
</div>
@endsection
