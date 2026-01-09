<x-back-layout title="Edit Feature">
    <div class="page-header">
        <h3 class="page-title">Edit Feature</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Features</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Feature</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="POST">
                        <input type="hidden" name="_token" value="static-csrf-token">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="Feature Title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" required>Feature Description</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Feature</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
