<x-back-layout title="Create Hero">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Create Hero
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Hero Sections</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Hero</li>
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
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Enter Title" required>
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Subtitle</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle"
                                placeholder="Enter Subtitle" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Hero Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="form-group">
                            <label for="background_image">Background Image</label>
                            <input type="file" class="form-control" id="background_image" name="background_image"
                                required>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                        <a href="#" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
