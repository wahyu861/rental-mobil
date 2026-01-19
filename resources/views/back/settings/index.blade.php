<x-back-layout title="Setting Management">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-cog-outline"></i>
            </span> Settings Management
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                        @if (!$setting)
                            <a href="{{ route('settings.create') }}" class="btn btn-success btn-sm">
                                <i class="mdi mdi-plus-circle-multiple-outline"></i> Add Settings
                            </a>
                        @endif
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Header Logo </th>
                                <th> Footer Logo </th>
                                <th> Copyright Text </th>
                                <th> Footer Description </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($setting)
                                <tr>
                                    <td>
                                        @if ($setting->header_logo)
                                            <img src="{{ asset('storage/' . $setting->header_logo) }}" alt="Header Logo"
                                                style="width: 100px;">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($setting->footer_logo)
                                            <img src="{{ asset('storage/' . $setting->footer_logo) }}" alt="Footer Logo"
                                                style="width: 100px;">
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($setting->copyright_text, 50) }}</td>
                                    <td>{{ Str::limit($setting->footer_description, 50) }}</td>
                                    <td>
                                        <a href="{{ route('settings.edit', $setting->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="mdi mdi-table-edit"></i>
                                        </a>
                                        <form action="{{ route('settings.destroy', $setting->id) }}" method="POST"
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
                                    <td colspan="5" class="text-center">No Settings Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
