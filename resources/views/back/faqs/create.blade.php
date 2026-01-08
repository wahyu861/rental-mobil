<x-back-layout title="Create FAQ">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-help-circle"></i>
            </span> Create FAQ
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">FAQ Sections</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create FAQ</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="POST">
                        <!-- Static CSRF token for form -->
                        <input type="hidden" name="_token" value="static-csrf-token">

                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" id="question" name="question" value=""
                                required>
                            <!-- Static error message -->
                            <div class="invalid-feedback">Please enter a question.</div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="answer">Answer</label>
                            <textarea class="form-control" id="answer" name="answer" rows="5" required></textarea>
                            <!-- Static error message -->
                            <div class="invalid-feedback">Please enter an answer.</div>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Save FAQ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
