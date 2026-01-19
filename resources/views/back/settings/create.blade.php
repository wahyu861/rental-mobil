<x-back-layout title="Create Settings">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-plus-circle"></i>
            </span> Create Settings
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Settings</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="header_logo" class="form-label">Header Logo</label>
                            <input type="file" class="form-control" id="header_logo" name="header_logo"
                                accept="image/*" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_logo" class="form-label">Footer Logo</label>
                            <input type="file" class="form-control" id="footer_logo" name="footer_logo"
                                accept="image/*" required>
                        </div>

                        <div class="mb-3">
                            <label for="copyright_text" class="form-label">Copyright Text</label>
                            <input type="text" class="form-control" id="copyright_text" name="copyright_text"
                                placeholder="Enter copyright text" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_description" class="form-label">Footer Description</label>
                            <textarea class="form-control" id="footer_description" name="footer_description" rows="3"
                                placeholder="Enter footer description" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Create Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
