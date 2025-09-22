@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4"><i class="fa-solid fa-folder-open text-success me-2"></i> Document Repository</h3>

    @if(session('success'))
        <div class="alert alert-success small">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('documents.create') }}" class="btn btn-success">
            <i class="fa-solid fa-upload me-1"></i> Upload New
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if($documents->isEmpty())
                <p class="text-muted">No documents uploaded yet.</p>
            @else
                <table class="table table-hover align-middle">
                    <thead class="table-success">
                        <tr>
                            <th>Title</th>
                            <th>Uploader</th>
                            <th>Version</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $doc)
                            <tr>
                                <td>{{ $doc->title }}</td>
                                <td>{{ $doc->user->name }}</td>
                                <td>v{{ $doc->version }}</td>
                                <td>{{ $doc->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="btn btn-sm btn-outline-success">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    @if(auth()->user()->id === $doc->uploaded_by || auth()->user()->role === 'admin')
                                    <form method="POST" action="{{ route('documents.destroy', $doc->id) }}" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this document?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
