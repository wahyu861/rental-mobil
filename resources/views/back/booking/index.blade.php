<x-back-layout title="Bookings">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-car"></i>
            </span> Your Bookings
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
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
                            @isset($bookings)
                                @forelse($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->car_name }}</td>
                                        <td>{{ $booking->district_name }}</td>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->address }}</td>
                                        <td>{{ $booking->phone }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->usage_date)->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('bookings.detail', $booking->id) }}"
                                                class="btn btn-info btn-sm" title="View Booking Details">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center">No bookings found.</td>
                                    </tr>
                                @endforelse
                            @endisset

                            @isset($allbookings)
                                @forelse($allbookings as $booking)
                                    <tr>
                                        <td>{{ $booking->car_name }}</td>
                                        <td>{{ $booking->district_name }}</td>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->address }}</td>
                                        <td>{{ $booking->phone }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->usage_date)->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('bookings.detail', $booking->id) }}"
                                                class="btn btn-info btn-sm" title="View Booking Details">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center">No bookings found.</td>
                                    </tr>
                                @endforelse
                            @endisset
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
