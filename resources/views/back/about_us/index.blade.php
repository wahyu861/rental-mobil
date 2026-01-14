<x-back-layout title="About Management">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-information-outline"></i>
            </span> About Management
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if ($abouts->isEmpty())
                        <p class="card-description">
                            <a href="{{ route('about_us.create') }}" class="btn btn-success btn-sm">
                                <i class="mdi mdi-plus-circle-multiple-outline"></i> Add About
                            </a>
                        </p>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Image </th>
                                <th> Title </th>
                                <th> Description </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($abouts as $about)
                                <tr>
                                    <td class="py-1">
                                        <img src="{{ asset('storage/' . $about->image) }}" alt="about-image"
                                            width="50" height="50" />
                                    </td>
                                    <td>{{ $about->title }}</td>
                                    <td>{{ Str::limit($about->description, 50) }}</td>
                                    <td>
                                        <a href="{{ route('about_us.edit', $about->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="mdi mdi-table-edit"></i>
                                        </a>
                                        <form action="{{ route('about_us.destroy', $about->id) }}" method="POST"
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
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
