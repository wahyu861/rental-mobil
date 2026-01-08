<x-back-layout title="About Section">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-view-list"></i>
            </span> About Section Management
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Section</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                        <!-- Add About Section button (Static link) -->
                        <a href="#" class="btn btn-success btn-sm">
                            <i class="mdi mdi-plus-circle-multiple-outline"></i> Add About Section
                        </a>
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Image </th>
                                <th> Main Title </th>
                                <th> Main Description </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Static about section content -->
                            <tr>
                                <td>
                                    <!-- Static image -->
                                    <img src="#" alt="About Image" style="width: 100px;">
                                </td>
                                <td>Sample Main Title</td>
                                <td>{{ Str::limit('Sample Main Description', 50) }}</td>
                                <td>
                                    <!-- Static Edit button -->
                                    <a href="#" class="btn btn-primary btn-sm">
                                        <i class="mdi mdi-table-edit"></i>
                                    </a>
                                    <!-- Static Delete button -->
                                    <form action="#" method="POST" style="display:inline-block;">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="mdi mdi-delete-variant"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- No about section found, static message -->
                            <tr>
                                <td colspan="4" class="text-center">No About Section Found</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
