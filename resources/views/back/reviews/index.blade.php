<x-back-layout title="Reviews">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-star"></i>
            </span> Reviews
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reviews</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Username </th>
                                <th> Rating </th>
                                <th> Review Text </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center">No reviews available.</td>
                            </tr>
                            <!-- Example Static Row -->
                            <tr>
                                <td>John Doe</td>
                                <td>5</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</td>
                                <td>
                                    <form action="#" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="_token" value="static-csrf-token">
                                        <input type="hidden" name="_method" value="DELETE">
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
