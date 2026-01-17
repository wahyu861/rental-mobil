<x-back-layout title="FAQs">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-help-circle"></i>
            </span> FAQ Management
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQ Sections</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                        <a href="{{ route('faqs.create') }}" class="btn btn-success btn-sm">
                            <i class="mdi mdi-plus-circle-multiple-outline"></i> Add FAQ
                        </a>
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Question </th>
                                <th> Answer </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $faq)
                                <tr>
                                    <td>{{ $faq->question }}</td>
                                    <td>{!! Str::limit($faq->answer, 100) !!}</td>
                                    <td>
                                        <a href="{{ route('faqs.edit', $faq) }}" class="btn btn-primary btn-sm">
                                            <i class="mdi mdi-table-edit"></i>
                                        </a>
                                        <form action="{{ route('faqs.destroy', $faq) }}" method="POST"
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
