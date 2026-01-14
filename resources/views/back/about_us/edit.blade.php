<x-back-layout title="Edit About">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-information-outline"></i>
            </span> Edit About
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('about_us.index') }}">About</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('about_us.update', $about->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title"
                                value="{{ old('title', $about->title) }}" placeholder="Enter title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="4" placeholder="Enter description"
                                required>{{ old('description', $about->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control-file" id="image"
                                accept="image/*">
                            @if ($about->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $about->image) }}" alt="about-image" width="100"
                                        height="100">
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mt-3">Update</button>
                        <a href="{{ route('about_us.index') }}" class="btn btn-light mt-3">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
