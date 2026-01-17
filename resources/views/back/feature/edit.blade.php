<x-back-layout title="Edit Feature">
    <div class="page-header">
        <h3 class="page-title">Edit Feature</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('features.index') }}">Features</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Feature</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('features.update', $feature) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $feature->title }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" required>{{ $feature->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Feature</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
