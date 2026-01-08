<x-back-layout title="FAQs">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-help-circle"></i>
            </span> FAQ Management
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQ Sections</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                        <a href="#" class="btn btn-success btn-sm">
                            <i class="mdi mdi-plus-circle-multiple-outline"></i> Add FAQ
                        </a>
                    </p>




                    <!-- Static FAQ table -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Question </th>
                                <th> Answer </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Static FAQ entries -->
                            <tr>
                                <td>What is Lorem Ipsum?</td>
                                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">
                                        <i class="mdi mdi-table-edit"></i>
                                    </a>
                                    <form action="#" method="POST" style="display:inline-block;">
                                        <!-- Static form for delete -->
                                        <input type="hidden" name="_token" value="static-csrf-token">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="mdi mdi-delete-variant"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>Why do we use it?</td>
                                <td>It is a long established fact that a reader will be distracted by the readable
                                    content of a page.</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">
                                        <i class="mdi mdi-table-edit"></i>
                                    </a>
                                    <form action="#" method="POST" style="display:inline-block;">
                                        <!-- Static form for delete -->
                                        <input type="hidden" name="_token" value="static-csrf-token">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="mdi mdi-delete-variant"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- More static FAQ entries can be added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Static success message

        $(document).ready(function() {
            $.toast({
                heading: 'Success',
                text: 'FAQ has been successfully added.',
                icon: 'success',
                position: 'top-right',
                stack: false
            });
        });
    </script>
</x-back-layout>
