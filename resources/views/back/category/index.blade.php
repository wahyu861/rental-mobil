<x-back-layout title="Category">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-view-list"></i>
            </span> Category Management
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                        <a href="#" class="btn btn-success btn-sm">
                            <i class="mdi mdi-plus-circle-multiple-outline"></i> Add Category
                        </a>
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Logo Image </th>
                                <th> Cover Image </th>
                                <th> Name </th>
                                <th> Slug </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Contoh data statis -->
                            <tr>
                                <td class="py-1">
                                    <img src="path/to/logo-image.jpg" alt="logo" width="50" height="50" />
                                </td>
                                <td class="py-1">
                                    <img src="path/to/cover-image.jpg" alt="cover" width="50" height="50" />
                                </td>
                                <td>Category Name</td>
                                <td>category-slug</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">
                                        <i class="mdi mdi-table-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="mdi mdi-delete-variant"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Akhir contoh data statis -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
