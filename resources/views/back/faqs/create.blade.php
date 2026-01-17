<x-back-layout title="Create FAQ">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-help-circle"></i>
            </span> Create FAQ
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('faqs.index') }}">FAQ Sections</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create FAQ</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('faqs.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control @error('question') is-invalid @enderror"
                                id="question" name="question" value="{{ old('question') }}" required>
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="answer">Answer</label>
                            <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" rows="5"
                                required>{{ old('answer') }}</textarea>
                            @error('answer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Save FAQ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
