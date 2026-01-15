<x-back-layout title="Edit About Section">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-pencil"></i>
            </span> Edit About Section
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit About Section</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('abouts.update', $aboutSection->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- gunakan mnethod PUT untuk update -->

                        <div class="mb-3">
                            <label for="main_title" class="form-label">Main Title</label>
                            <input type="text" class="form-control" id="main_title" name="main_title"
                                value="{{ old('main_title', $aboutSection->main_title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="main_description" class="form-label">Main Description</label>
                            <textarea class="form-control" id="main_description" name="main_description" rows="3" required>{{ old('main_description', $aboutSection->main_description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="main_image" class="form-label">Main Image</label>
                            <input type="file" class="form-control" id="main_image" name="main_image"
                                accept="image/*">
                            <small class="form-text text-muted">Leave blank to keep current image.</small>
                        </div>

                        {{-- Form for 4 Sections --}}
                        <h5 class="mt-4">Sections</h5>

                        @foreach ($aboutSection->sections as $index => $section)
                            <div class="mb-3">
                                <label for="section_title_{{ $index + 1 }}" class="form-label">Section Title
                                    {{ $index + 1 }}</label>
                                <input type="text" class="form-control" id="section_title_{{ $index + 1 }}"
                                    name="sections[{{ $index }}][title]"
                                    value="{{ old('sections.' . $index . '.title', $section['title']) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="section_description_{{ $index + 1 }}" class="form-label">Section
                                    Description {{ $index + 1 }}</label>
                                <textarea class="form-control" id="section_description_{{ $index + 1 }}"
                                    name="sections[{{ $index }}][description]" rows="3" required>{{ old('sections.' . $index . '.description', $section['description']) }}</textarea>
                            </div>
                        @endforeach

                        <button type="submit" class="btn btn-success">Update About Section</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
