<x-back-layout title="Edit Blog">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Edit Blog
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Blog Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Method for update -->

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Enter blog title" required>
                        </div>

                        <div class="form-group">
                            <label for="image_cover">Image Cover</label>
                            <input type="file" name="image_cover" id="image_cover" class="form-control">
                            <small class="form-text text-muted">Current cover: <img src="#" alt="Current Cover"
                                    style="max-width: 200px;"></small>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="myTextarea" id="myTextarea"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                <!-- Categories will go here as options -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Blog</button>
                        <a href="#" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/17kvtbuuzbajj745jltandhyyrejjfq3tcc3ix4wnn7u1879/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        const image_upload_handler = (blobInfo, progress) => new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/dashboard/image_upload'); // Change as needed

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

            xhr.upload.onprogress = (e) => {
                progress(e.loaded / e.total * 100);
            };

            xhr.onload = () => {
                const json = JSON.parse(xhr.responseText);
                if (xhr.status < 200 || xhr.status >= 300 || !json || typeof json.location !== 'string') {
                    reject('Error: ' + (json?.errorMessage || xhr.status));
                    return;
                }
                resolve(json.location);
            };

            xhr.onerror = () => {
                reject('Image upload failed due to an XHR Transport error. Code: ' + xhr.status);
            };

            const formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        });

        tinymce.init({
            selector: '#myTextarea',
            menubar: false,
            plugins: 'lists link image preview',
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image | preview',
            automatic_uploads: true,
            file_picker_types: 'image',
            images_upload_handler: image_upload_handler,
            images_upload_url: '/dashboard/image_upload', // Change as needed
            setup(editor) {
                editor.on("keydown", function(e) {
                    if ((e.keyCode == 8 || e.keyCode == 46) && tinymce.activeEditor.selection) {
                        var selectedNode = tinymce.activeEditor.selection.getNode();
                        if (selectedNode && selectedNode.nodeName === 'IMG') {
                            var imageSrc = selectedNode.src;
                            fetch('/dashboard/image_delete', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify({
                                        image_path: imageSrc.replace(window.location.origin +
                                            '/storage/', '') // Path relatif
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.message) {
                                        console.log(data.message);
                                    } else if (data.error) {
                                        console.log(data.error);
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        }
                    }
                });
            }
        });
    </script>
</x-back-layout>
