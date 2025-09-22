@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>🔍 Review Accreditation Documents</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse($documents as $document)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $document->title }}</h5>
                <p class="card-text">{{ $document->description }}</p>
                <a href="{{ Storage::url($document->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary mb-2">View File</a>

                <form action="{{ route('review.rate', $document->id) }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="rating" class="form-label">Rating (1 to 5)</label>
                        <input type="number" name="rating" class="form-control" min="1" max="5" required>
                    </div>
                    <div class="mb-2">
                        <label for="comment" class="form-label">Comment (optional)</label>
                        <textarea name="comment" class="form-control" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Submit Review</button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-muted">No documents available for review.</p>
    @endforelse
</div>
@endsection
