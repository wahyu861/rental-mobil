<x-back-layout title="Car Management">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Car Management
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Car Management</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                        <a href="{{ route('cars.create') }}" class="btn btn-success btn-sm">
                            <i class="mdi mdi-plus-circle-multiple-outline"></i> Add Car
                        </a>
                    </p>
                    @if ($cars->isEmpty())
                        <div class="alert alert-warning" role="alert">
                            Maaf, belum ada data mobil.
                        </div>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th> Services </th>
                                    <th> Price </th>
                                    <th> Location </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cars as $car)
                                    <tr>
                                        <td>{{ $car->name }}</td>
                                        <td>
                                            @php
                                                $carFeatures = json_decode($car->car_features, true);
                                            @endphp

                                            @if (is_array($carFeatures) && !empty($carFeatures))
                                                @foreach ($carFeatures as $feature)
                                                    {{ $feature }}@if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            @else
                                                No features available
                                            @endif
                                        </td>
                                        <td>Rp. {{ number_format($car->price, 2) }}</td>
                                        <td>{{ $car->location }}</td>
                                        <td>
                                            <a href="{{ route('cars.edit', $car) }}" class="btn btn-primary btn-sm">
                                                <i class="mdi mdi-table-edit"></i>
                                            </a>
                                            <a href="{{ route('cars.addImages', $car) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="mdi mdi-image-plus"></i>
                                            </a>
                                            <form action="{{ url('dashboard/cars/' . $car->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="mdi mdi-delete-variant"></i>
                                                </button>
                                            </form>
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
