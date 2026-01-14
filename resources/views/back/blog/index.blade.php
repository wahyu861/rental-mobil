<x-back-layout title="Blog Management">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Blog Management
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog Management</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                        <a href="{{ url('dashboard/blogs/create') }}" class="btn btn-success btn-sm">
                            <i class="mdi mdi-plus-circle-multiple-outline"></i> Add Blog
                        </a>
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Title </th>
                                <th> Image </th>
                                <th> Author </th>
                                <th> Category </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($blogs->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">No blogs available.</td>
                                </tr>
                            @else
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $blog->title }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $blog->image_cover) }}"
                                                alt="{{ $blog->title }}" style="width: 100px; height: auto;">
                                        </td>
                                        <td>{{ $blog->author }}</td>
                                        <td>{{ $blog->category ? $blog->category->name : 'Uncategorized' }}</td>
                                        <td>
                                            <a href="{{ url('dashboard/blogs/' . $blog->id . '/edit') }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="mdi mdi-table-edit"></i>
                                            </a>
                                            <form action="{{ url('dashboard/blogs/' . $blog->id) }}" method="POST"
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
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
