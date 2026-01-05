<x-back-layout title="Bookings">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-car"></i>
            </span> Your Bookings
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bookings</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Car Name</th>
                                <th>District</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Usage Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Contoh data statis -->
                            <tr>
                                <td>Car 1</td>
                                <td>District A</td>
                                <td>John Doe</td>
                                <td>123 Main St</td>
                                <td>123-456-7890</td>
                                <td>01-01-2024</td>
                                <td>
                                    <button class="btn btn-info btn-sm" title="View Booking Details">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Car 2</td>
                                <td>District B</td>
                                <td>Jane Smith</td>
                                <td>456 Elm St</td>
                                <td>987-654-3210</td>
                                <td>02-02-2024</td>
                                <td>
                                    <button class="btn btn-info btn-sm" title="View Booking Details">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Tambahkan lebih banyak data di sini jika diperlukan -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
