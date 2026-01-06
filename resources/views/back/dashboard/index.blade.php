<x-back-layout title="Dashboard">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span>Overview</span> <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
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
                    <h2 class="mb-5">120</h2>
                    <h6 class="card-text">Meningkat 15.2%</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('back/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                        alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Users Total <i
                            class="mdi mdi-bookmark-outline mdi-24px float-end"></i></h4>
                    <h2 class="mb-5">350</h2>
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
                    <h2 class="mb-5">50</h2>
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
                                <tr>
                                    <td>John Doe</td>
                                    <td>Toyota</td>
                                    <td><label class="badge badge-gradient-success">SUCCESS</label></td>
                                    <td>Nov 24, 2024</td>
                                    <td>WD-1234</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            var doughnutPieData = {
                datasets: [{
                    data: [30, 20, 50],
                    backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)'
                    ],
                }],
                labels: ['Category 1', 'Category 2', 'Category 3']
            };

            var ctx = document.getElementById("myChart").getContext('2d');
            var myDoughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: doughnutPieData
            });

            var ordersData = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Orders per Month',
                    data: [12, 19, 3, 5, 2, 3, 9, 12, 8, 7, 15, 10],
                    backgroundColor: 'rgba(75, 192, 192, 0.5)'
                }]
            };

            var ordersCtx = document.getElementById("ordersChart").getContext('2d');
            var ordersChart = new Chart(ordersCtx, {
                type: 'bar',
                data: ordersData
            });
        </script>
    @endpush
</x-back-layout>
