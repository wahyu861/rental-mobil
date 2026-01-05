<x-back-layout title="Booking Detail">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-car"></i>
            </span> Your Booking Details
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Bookings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Booking Details</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card px-2">
                <div class="card-body">
                    <div class="container-fluid">
                        <h3 class="text-right my-5">Invoice&nbsp;&nbsp;#INV-12345</h3>
                        <hr>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 ps-0">
                            <p class="mt-5 mb-2"><b>Pusat Rental Demak</b></p>
                            <p>Jl. Ky Ageng Selo,<br>Demak,<br>Indonesia, 59571.</p>
                        </div>
                        <div class="col-lg-3 pe-0">
                            <p class="mt-5 mb-2 text-right"><b>Invoice to</b></p>
                            <p class="text-right">
                                John Doe,<br>
                                123 Main St,<br>
                                Village A, District B, Regency C, Province D.
                            </p>
                        </div>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 ps-0">
                            <p class="mb-0 mt-5">Tanggal Kendaraan Digunakan : 01-01-2024</p>
                            <p>Phone : 123-456-7890</p>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table class="table">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th>#</th>
                                        <th>Description</th>
                                        <th class="text-right">Quantity</th>
                                        <th class="text-right">Unit cost</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-right">
                                        <td class="text-left">1</td>
                                        <td class="text-left">Toyota Avanza</td>
                                        <td>1</td> <!-- Quantity -->
                                        <td>$50.00</td> <!-- Unit Cost -->
                                        <td>$50.00</td> <!-- Total -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                        <p class="text-right mb-2">Status Pembayaran: Paid</p>
                        <h4 class="text-right mb-5">Total : $50.00</h4>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
