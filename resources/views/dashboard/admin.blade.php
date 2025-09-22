@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>📊 Admin Dashboard</h2>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Documents</h5>
                    <p class="display-6">{{ \App\Models\Document::count() }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Faculty Uploads</h5>
                    <p class="display-6">{{ \App\Models\Document::whereHas('user', fn($q) => $q->where('role', 'faculty'))->count() }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Reviewed by External</h5>
                    <p class="display-6">N/A</p>
                    <small>(Placeholder: Connect to review table when implemented)</small>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('documents.index') }}" class="btn btn-outline-light">Manage Documents</a>
    </div>
</div>
@endsection
