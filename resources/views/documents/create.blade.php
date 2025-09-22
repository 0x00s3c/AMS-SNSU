@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4"><i class="fa-solid fa-file-circle-plus text-success me-2"></i> Upload Document</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following issues:<br><br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li class="small">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Document Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description (optional)</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label fw-semibold">Select File</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="is_public" id="is_public" {{ old('is_public') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_public">
                        Make this document public
                    </label>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-cloud-upload-alt me-1"></i> Upload
                </button>
                <a href="{{ route('documents.index') }}" class="btn btn-outline-secondary ms-2">
                    Cancel
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
