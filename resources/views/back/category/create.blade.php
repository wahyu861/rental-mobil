<x-back-layout title="Create Category">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Create Category
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Category</li>
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
                                placeholder="Enter Category Name" required>
                        </div>
                        <div class="form-group">
                            <label for="image_logo">Logo Image</label>
                            <input type="file" class="form-control" id="image_logo" name="image_logo" required>
                        </div>
                        <div class="form-group">
                            <label for="image_cover">Cover Image</label>
                            <input type="file" class="form-control" id="image_cover" name="image_cover" required>
                        </div>
                        <button type="button" class="btn btn-gradient-primary me-2">Save</button>
                        <a href="#" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
