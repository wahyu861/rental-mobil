<x-back-layout title="Edit Hero Section">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Edit Hero Section
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Hero Sections</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Hero</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="Sample Title" required>
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Subtitle</label>
                            <input type="text" name="subtitle" class="form-control" value="Sample Subtitle" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="#" alt="hero image" width="100" class="mt-2">
                        </div>

                        <div class="form-group">
                            <label for="background_image">Background Image</label>
                            <input type="file" name="background_image" class="form-control">
                            <img src="#" alt="hero background image" width="100" class="mt-2">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Hero</button>
                        <a href="#" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
