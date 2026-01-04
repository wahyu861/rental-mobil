<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <a href="{{ url('/') }}"> <img src="{{ asset('back/assets/images/logo.png') }}"></a>
                        </div>
                        <h4>New here?</h4>
                        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>

                        <!-- Begin Register Form -->
                        <form method="POST" action="{{ route('register') }}" class="pt-3">
                            @csrf

                            <!-- Name -->
                            <div class="form-group">
                                <input id="name" type="text" class="form-control form-control-lg" name="name"
                                    :value="old('name')" required autofocus placeholder="Name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <input id="email" type="email" class="form-control form-control-lg" name="email"
                                    :value="old('email')" required placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <input id="password" type="password" class="form-control form-control-lg"
                                    name="password" required placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <input id="password_confirmation" type="password" class="form-control form-control-lg"
                                    name="password_confirmation" required placeholder="Confirm Password">
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>

                            <!-- Terms & Conditions -->
                            <div class="mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="terms" required>
                                    <label class="form-check-label text-muted" for="terms"> I agree to all Terms &
                                        Conditions </label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-3 d-grid gap-2">
                                <button type="submit"
                                    class="btn btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                    UP</button>
                            </div>

                            <!-- Already Registered -->
                            <div class="text-center mt-4 font-weight-light"> Already have an account? <a
                                    href="{{ route('login') }}" class="text-primary">Login</a></div>
                        </form>
                        <!-- End Register Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
