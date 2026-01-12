<x-back-layout title="Booking Detail">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-car"></i>
            </span> Your Bookings Detail
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('bookings') }}">Bookings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bookings Detail</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card px-2">
                <div class="card-body">
                    <div class="container-fluid">
                        <h3 class="text-right my-5">Invoice&nbsp;&nbsp;#INV-{{ $carRequest->id }}</h3>
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
                                {{ $carRequest->name }},<br>
                                {{ $carRequest->pickup_location }},<br>
                                {{ $carRequest->village }}, {{ $carRequest->district }}, {{ $carRequest->regency }},
                                {{ $carRequest->province }}.
                            </p>
                        </div>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 ps-0">
                            <p class="mb-0 mt-5">Tanggal Kendaraan Digunakan : {{ $carRequest->pickup_date }}</p>
                            <p>Phone : {{ $carRequest->phone }}</p>
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
                                        <td class="text-left">{{ $carRequest->car_id }}</td>
                                        <td>1</td> <!-- Quantity bisa disesuaikan -->
                                        <td>Rp{{ number_format($carRequest->car_price, 2) }}</td>
                                        <td>Rp{{ number_format($carRequest->car_price, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-back-layout>
