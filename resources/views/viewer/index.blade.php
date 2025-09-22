@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4"><i class="fa-solid fa-eye text-primary me-2"></i> Public Documents</h3>

    @if ($publicDocuments->isEmpty())
        <div class="alert alert-info">
            <i class="fa-solid fa-folder-open me-1"></i> No public documents found.
        </div>
    @else
        <div class="row">
            @foreach ($publicDocuments as $doc)
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa-solid fa-file-alt me-1"></i> {{ $doc->title }}</h5>
                            <p class="text-muted small">Uploaded by {{ $doc->user->name }}</p>
                            <p>{{ Str::limit($doc->description, 100) }}</p>
                            <a href="{{ asset('storage/' . $doc->file_path) }}" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="fa-solid fa-eye me-1"></i> View Document
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
