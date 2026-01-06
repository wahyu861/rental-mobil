<x-back-layout>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Edit Category
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="Example Category" required>
                        </div>
                        <div class="form-group">
                            <label for="image_logo">Logo Image</label>
                            <input type="file" class="form-control" id="image_logo" name="image_logo">
                            <img src="{{ asset('path/to/logo.png') }}" alt="Logo Image" width="50" height="50"
                                class="mt-2">
                        </div>
                        <div class="form-group">
                            <label for="image_cover">Cover Image</label>
                            <input type="file" class="form-control" id="image_cover" name="image_cover">
                            <img src="{{ asset('path/to/cover.png') }}" alt="Cover Image" width="50" height="50"
                                class="mt-2">
                        </div>
                        <button type="button" class="btn btn-gradient-primary me-2">Update</button>
                        <a href="#" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
