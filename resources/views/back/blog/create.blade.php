<x-back-layout title="Create Blog">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Create Blog
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Blog Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Blog</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Enter blog title" required>
                        </div>

                        <div class="form-group">
                            <label for="image_cover">Image Cover</label>
                            <input type="file" name="image_cover" id="image_cover" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="myTextarea" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                <option value="1">Sample Category 1</option>
                                <option value="2">Sample Category 2</option>
                                <!-- Tambahkan kategori statis lainnya jika perlu -->
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary">Save Blog</button>
                        <a href="#" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/17kvtbuuzbajj745jltandhyyrejjfq3tcc3ix4wnn7u1879/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#myTextarea',
            menubar: false,
            plugins: 'lists link image preview',
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent |
            link image | preview ',
            automatic_uploads: false,
        });
    </script>
</x-back-layout>
