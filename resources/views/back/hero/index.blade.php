<x-back-layout title="Hero">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Hero Management
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hero Sections</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                        <a href="#" class="btn btn-success btn-sm">
                            <i class="mdi mdi-plus-circle-multiple-outline"></i> Add Hero
                        </a>
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Image </th>
                                <th> Background Image </th>
                                <th> Title </th>
                                <th> Subtitle </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-1">
                                    <img src="path/to/image.jpg" alt="image" width="50" height="50" />
                                </td>
                                <td class="py-1">
                                    <img src="path/to/background-image.jpg" alt="background image" width="50"
                                        height="50" />
                                </td>
                                <td>Hero Title</td>
                                <td>Hero Subtitle</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">
                                        <i class="mdi mdi-table-edit"></i>
                                    </a>
                                    <form action="#" method="POST" style="display:inline-block;">
                                        <button type="submit" class="btn btn-danger btn-sm">
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
