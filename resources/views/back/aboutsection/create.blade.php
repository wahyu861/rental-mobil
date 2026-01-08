<x-back-layout title="Create About Section">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-plus-circle"></i>
            </span> Create About Section
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create About Section</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- Static form without dynamic routes or CSRF -->
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <!-- Static CSRF Token -->
                        <input type="hidden" name="_token" value="static-csrf-token">

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

                        <!-- Static sections (no dynamic looping) -->
                        <h5 class="mt-4">Sections</h5>

                        <div class="mb-3">
                            <label for="section_title_1" class="form-label">Section Title 1</label>
                            <input type="text" class="form-control" id="section_title_1" name="sections[0][title]"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="section_description_1" class="form-label">Section Description 1</label>
                            <textarea class="form-control" id="section_description_1" name="sections[0][description]" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="section_title_2" class="form-label">Section Title 2</label>
                            <input type="text" class="form-control" id="section_title_2" name="sections[1][title]"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="section_description_2" class="form-label">Section Description 2</label>
                            <textarea class="form-control" id="section_description_2" name="sections[1][description]" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="section_title_3" class="form-label">Section Title 3</label>
                            <input type="text" class="form-control" id="section_title_3" name="sections[2][title]"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="section_description_3" class="form-label">Section Description 3</label>
                            <textarea class="form-control" id="section_description_3" name="sections[2][description]" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="section_title_4" class="form-label">Section Title 4</label>
                            <input type="text" class="form-control" id="section_title_4" name="sections[3][title]"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="section_description_4" class="form-label">Section Description 4</label>
                            <textarea class="form-control" id="section_description_4" name="sections[3][description]" rows="3" required></textarea>
                        </div>

                        <!-- Static submit button -->
                        <button type="submit" class="btn btn-success">Create About Section</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
