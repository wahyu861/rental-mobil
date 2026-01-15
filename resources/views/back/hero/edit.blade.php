<x-back-layout title="Edit Hero Section">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Edit Hero Section
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('hero.index') }}">Hero Sections</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Hero</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $hero->title) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Subtitle</label>
                            <input type="text" name="subtitle" class="form-control"
                                value="{{ old('subtitle', $hero->subtitle) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                            @if ($hero->image)
                                <img src="{{ asset('storage/' . $hero->image) }}" alt="hero image" width="100"
                                    class="mt-2">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="background_image">Background Image</label>
                            <input type="file" name="background_image" class="form-control">
                            @if ($hero->background_image)
                                <img src="{{ asset('storage/' . $hero->background_image) }}" alt="hero background image"
                                    width="100" class="mt-2">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Update Hero</button>
                        <a href="{{ route('hero.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
