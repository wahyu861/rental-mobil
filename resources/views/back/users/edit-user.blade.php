<x-back-layout>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-edit"></i>
            </span> Update Profile
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Profile Details</h4>
                    <form method="POST" action="#">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="<!-- Add CSRF token here -->">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="John Doe"
                                placeholder="Enter Name" required>
                            <span class="text-danger"><!-- Error message here --></span>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="johndoe@example.com" placeholder="Enter Email" required>
                            <span class="text-danger"><!-- Error message here --></span>
                        </div>

                        <div class="form-group">
                            <label for="password">Password (Leave blank to keep current password)</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter New Password">
                            <span class="text-danger"><!-- Error message here --></span>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Confirm New Password">
                            <span class="text-danger"><!-- Error message here --></span>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary">Update User</button>
                        <a href="#" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
