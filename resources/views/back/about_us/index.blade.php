<x-back-layout title="About Management">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-information-outline"></i>
            </span> About Management
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                        <a href="#" class="btn btn-success btn-sm">
                            <i class="mdi mdi-plus-circle-multiple-outline"></i> Add About
                        </a>
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Image </th>
                                <th> Title </th>
                                <th> Description </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-1">
                                    <img src="{{ asset('path/to/example-image.jpg') }}" alt="about-image" width="50"
                                        height="50" />
                                </td>
                                <td>Example Title</td>
                                <td>Example description limited to 50 characters...</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">
                                        <i class="mdi mdi-table-edit"></i>
                                    </a>
                                    <form action="#" method="POST" style="display:inline-block;">
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <i class="mdi mdi-delete-variant"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="{{ asset('path/to/example-image2.jpg') }}" alt="about-image"
                                        width="50" height="50" />
                                </td>
                                <td>Another Example Title</td>
                                <td>Another description limited to 50 characters...</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">
                                        <i class="mdi mdi-table-edit"></i>
                                    </a>
                                    <form action="#" method="POST" style="display:inline-block;">
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <i class="mdi mdi-delete-variant"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
