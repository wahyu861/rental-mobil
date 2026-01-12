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
                    @if ($carRequests->isEmpty())
                        <div class="alert alert-warning" role="alert">
                            Belum ada data booking untuk saat ini.
                        </div>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Province</th>
                                    <th>Regency</th>
                                    <th>District</th>
                                    <th>Village</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carRequests as $request)
                                    <tr>
                                        <td>{{ $request->name }}</td>
                                        <td>{{ $request->province }}</td>
                                        <td>{{ $request->regency }}</td>
                                        <td>{{ $request->district }}</td>
                                        <td>{{ $request->village }}</td>
                                        <td>
                                            <a href="{{ route('requests.show', $request->id) }}"
                                                class="btn btn-info btn-sm" title="View Booking Details">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
