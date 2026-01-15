<x-back-layout title="Create About Section">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-plus-circle"></i>
            </span> Create About Section
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create About Section</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="main_title" class="form-label">Main Title</label>
                            <input type="text" class="form-control" id="main_title" name="main_title" required>
                        </div>

                        <div class="mb-3">
                            <label for="main_description" class="form-label">Main Description</label>
                            <textarea class="form-control" id="main_description" name="main_description" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="main_image" class="form-label">Main Image</label>
                            <input type="file" class="form-control" id="main_image" name="main_image"
                                accept="image/*" required>
                        </div>

                        {{-- Form untuk 4 Section --}}
                        <h5 class="mt-4">Sections</h5>

                        @for ($i = 1; $i <= 4; $i++)
                            <div class="mb-3">
                                <label for="section_title_{{ $i }}" class="form-label">Section Title
                                    {{ $i }}</label>
                                <input type="text" class="form-control" id="section_title_{{ $i }}"
                                    name="sections[{{ $i - 1 }}][title]" required>
                            </div>
                            <div class="mb-3">
                                <label for="section_description_{{ $i }}" class="form-label">Section
                                    Description {{ $i }}</label>
                                <textarea class="form-control" id="section_description_{{ $i }}"
                                    name="sections[{{ $i - 1 }}][description]" rows="3" required></textarea>
                            </div>
                        @endfor

                        <button type="submit" class="btn btn-success">Create About Section</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
