<x-back-layout title="Edit Settings">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-pencil"></i>
            </span> Edit Settings
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Settings</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('settings.update', $setting->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- gunakan method PUT untuk update -->

                        <div class="mb-3">
                            <label for="header_logo" class="form-label">Header Logo</label>
                            <input type="file" class="form-control" id="header_logo" name="header_logo"
                                accept="image/*">
                            <small class="form-text text-muted">Leave blank to keep the current logo.</small>
                            @if ($setting->header_logo)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $setting->header_logo) }}" alt="Header Logo"
                                        width="100">
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="footer_logo" class="form-label">Footer Logo</label>
                            <input type="file" class="form-control" id="footer_logo" name="footer_logo"
                                accept="image/*">
                            <small class="form-text text-muted">Leave blank to keep the current logo.</small>
                            @if ($setting->footer_logo)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $setting->footer_logo) }}" alt="Footer Logo"
                                        width="100">
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="copyright_text" class="form-label">Copyright Text</label>
                            <input type="text" class="form-control" id="copyright_text" name="copyright_text"
                                value="{{ old('copyright_text', $setting->copyright_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_description" class="form-label">Footer Description</label>
                            <textarea class="form-control" id="footer_description" name="footer_description" rows="3" required>{{ old('footer_description', $setting->footer_description) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Update Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
