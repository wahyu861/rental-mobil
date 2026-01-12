<x-back-layout title="Edit Category">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Edit Category
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $category->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="image_logo">Logo Image</label>
                            <input type="file" class="form-control" id="image_logo" name="image_logo">
                            @if ($category->image_logo)
                                <img src="{{ asset('storage/' . $category->image_logo) }}" alt="Logo Image"
                                    width="50" height="50" class="mt-2">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image_cover">Cover Image</label>
                            <input type="file" class="form-control" id="image_cover" name="image_cover">
                            @if ($category->image_cover)
                                <img src="{{ asset('storage/' . $category->image_cover) }}" alt="Cover Image"
                                    width="50" height="50" class="mt-2">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                        <a href="{{ route('category.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
