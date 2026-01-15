<x-back-layout title="About Section">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-view-list"></i>
            </span> About Section Management
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Section</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                        @if (!$aboutSection)
                            <a href="{{ route('abouts.create') }}" class="btn btn-success btn-sm">
                                <i class="mdi mdi-plus-circle-multiple-outline"></i> Add About Section
                            </a>
                        @endif
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Image </th>
                                <th> Main Title </th>
                                <th> Main Description </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($aboutSection)
                                <tr>
                                    <td>
                                        @if ($aboutSection->main_image)
                                            <img src="{{ asset('storage/' . $aboutSection->main_image) }}"
                                                alt="About Image" style="width: 100px;">
                                        @endif
                                    </td>
                                    <td>{{ $aboutSection->main_title }}</td>
                                    <td>{{ Str::limit($aboutSection->main_description, 50) }}</td>
                                    <td>
                                        <a href="{{ route('abouts.edit', $aboutSection->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="mdi mdi-table-edit"></i>
                                        </a>
                                        <form action="{{ route('abouts.destroy', $aboutSection->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="mdi mdi-delete-variant"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">No About Section Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
