<x-back-layout title="Features">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Feature Management
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Feature Sections</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                        <a href="{{ route('features.create') }}" class="btn btn-success btn-sm">
                            <i class="mdi mdi-plus-circle-multiple-outline"></i> Add Feature
                        </a>
                    </p>

                    @if ($features->isEmpty())
                        <div class="text-center">
                            <h4>No Features Found</h4>
                            <p>There are no features available. Click "Add Feature" to create a new one.</p>
                        </div>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Title </th>
                                    <th> Description </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($features as $feature)
                                    <tr>
                                        <td>{{ $feature->title }}</td>
                                        <td>{{ $feature->description }}</td>
                                        <td>
                                            <a href="{{ route('features.edit', $feature) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="mdi mdi-table-edit"></i>
                                            </a>
                                            <form action="{{ route('features.destroy', $feature) }}" method="POST"
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

    <script>
        $(document).ready(function() {
            // Static success message, for templating purposes
            $.toast({
                heading: 'Success',
                text: 'Feature added successfully.',
                icon: 'success',
                position: 'top-right',
                stack: false
            });
        });
    </script>
</x-back-layout>
