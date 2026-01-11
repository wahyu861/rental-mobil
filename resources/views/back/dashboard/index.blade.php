<x-back-layout title="Dashboard">
    @if (auth()->user()->hasRole('admin'))
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i
                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('back/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                            alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Pesanan Minggu Ini<i
                                class="mdi mdi-chart-line mdi-24px float-end"></i></h4>
                        <h2 class="mb-5">{{ $currentWeekBookings }}</h2>
                        <h6 class="card-text">Meningkat {{ number_format($increasePercentage, 2) }}%</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('back/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                            alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Users Total <i
                                class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                        </h4>
                        <h2 class="mb-5">{{ $totalUsersWithRoleUser }}</h2>
                        <h6 class="card-text">Jumlah Pengguna Dengan Role User</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('back/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                            alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Blogs <i
                                class="mdi mdi-book-open-page-variant mdi-24px float-end"></i></h4>
                        <h2 class="mb-5">{{ $totalBlogs }}</h2>
                        <h6 class="card-text">Total Data Blog</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <h4 class="card-title float-start">Presentase Pemesanan Berdasarkan Bulan</h4>
                            <div id="visit-sale-chart-legend"
                                class="rounded-legend legend-horizontal legend-top-right float-end"></div>
                        </div>
                        <canvas id="ordersChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Categories</h4>
                        <div class="doughnutjs-wrapper d-flex justify-content-center">
                            <canvas id="myChart"></canvas>
                        </div>
                        <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Tickets</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Name </th>
                                        <th> Mobil </th>
                                        <th> Status </th>
                                        <th> Last Update </th>
                                        <th> Tracking ID </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentBookings as $booking)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('back/assets/images/faces/face1.jpg') }}"
                                                    class="me-2" alt="image">
                                                {{ $booking['user']['name'] }}
                                            </td>
                                            <td>{{ $booking['car_name'] }}</td>
                                            <td>
                                                <label
                                                    class="badge badge-gradient-{{ $booking['payment']['status'] == 'success'
                                                        ? 'success'
                                                        : ($booking['payment']['status'] == 'pending'
                                                            ? 'warning'
                                                            : ($booking['payment']['status'] == 'failed'
                                                                ? 'danger'
                                                                : ($booking['payment']['status'] == 'canceled'
                                                                    ? 'secondary'
                                                                    : ($booking['payment']['status'] == 'expired'
                                                                        ? 'dark'
                                                                        : ($booking['payment']['status'] == 'chargeback'
                                                                            ? 'danger'
                                                                            : 'info'))))) }}">
                                                    {{ strtoupper($booking['payment']['status']) }}
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body p-0 d-flex">
                        <div id="inline-datepicker" class="datepicker datepicker-custom"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Updates</h4>
                        @foreach ($recentCars as $car)
                            <div class="d-flex mb-3">
                                <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                                    <i class="mdi mdi-car icon-sm me-2"></i>
                                    <span>{{ $car['name'] }}</span>
                                </div>

                                <div class="d-flex align-items-center text-muted font-weight-light">
                                    <i class="mdi mdi-clock icon-sm me-2"></i>
                                    <span>{{ \Carbon\Carbon::parse($car['created_at'])->format('F j, Y') }}</span>
                                </div>
                            </div>

                            <div class="row mt-3">
                                @foreach ($car['galleries'] as $gallery)
                                    <div class="col-6 pe-1">
                                        <img src="{{ asset('storage/' . $gallery) }}" class="mb-2 mw-100 w-100 rounded"
                                            alt="Car image">
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="faq-section">
                            <div class="container-fluid bg-gradient-success py-2">
                                <p class="mb-0 text-white">Pertanyaan yang sering diajukan</p>
                            </div>
                            <div id="accordion-1" class="accordion">
                                @foreach ($faqs as $faq)
                                    <div class="card">
                                        <div class="card-header" id="heading{{ $loop->iteration }}">
                                            <h5 class="mb-0">
                                                <a data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $loop->iteration }}"
                                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-c>
                                                    {{ $faq['question'] }}
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse{{ $loop->iteration }}"
                                            class="collapse {{ $loop->first ? 'show' : '' }}"
                                            aria-labelledby="heading{{ $loop->iteration }}"
                                            data-bs-parent="#accordion-1">
                                            <div class="card-body">
                                                {!! nl2br(e($faq['answer'])) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var doughnutPieData = {
            datasets: [{
                data: @json($categoryCounts),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
            }],
            labels: @json($categoryLabels)
        };
        var doughnutPieOptions = {
            responsive: true,
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };
        var ctx = document.getElementById("myChart").getContext('2d');
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: doughnutPieData,
            options: doughnutPieOptions
        });

        var ctx = document.getElementById('ordersChart').getContext('2d');

        // Array warna untuk setiap bulan
        var monthlyColors = [
            'rgba(255, 99, 132, 0.5)', // January
            'rgba(54, 162, 235, 0.5)', // February
            'rgba(255, 206, 86, 0.5)', // March
            'rgba(75, 192, 192, 0.5)', // April
            'rgba(153, 102, 255, 0.5)', // May
            'rgba(255, 159, 64, 0.5)', // June
            'rgba(255, 99, 132, 0.5)', // July
            'rgba(54, 162, 235, 0.5)', // August
            'rgba(255, 206, 86, 0.5)', // September
            'rgba(75, 192, 192, 0.5)', // October
            'rgba(153, 102, 255, 0.5)', // November
            'rgba(255, 159, 64, 0.5)' // December
        ];

        var ordersData = {
            labels: @json($monthLabels),
            datasets: [{
                label: 'Orders per Month',
                data: @json($monthlyOrderCounts),
                backgroundColor: monthlyColors,
                borderColor: 'rgba(0, 0, 0, 1)',
                borderWidth: 1
            }]
        };

        var ordersOptions = {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var ordersChart = new Chart(ctx, {
            type: 'bar', // Jenis chart: bar chart
            data: ordersData,
            options: ordersOptions
        });
    </script>
</x-back-layout>
