<section class="files my-80">
    <div class="container-fluid">
        <div class="row  row-gap-4 align-items-end">
            <div class="col-lg-6  col-md-6 col-sm-6   my-40">
                <form action="{{ url('savereport') }}" method="POST">
                    @csrf
                    <div class="topic">
                        <h6 class="mb-12">Select a topic</h6>
                        <div class="d-flex gap-24 align-items-center flex-wrap">
                            <div class="flex-shrink-0">
                                <input type="radio" id="Signing" name="topic" value="Signing in" class="d-none"
                                    checked>
                                <label for="Signing">Signing in</label>
                            </div>
                            <div class="flex-shrink-0">
                                <input type="radio" id="booking" name="topic" value="Booking issue"
                                    class="d-none">
                                <label for="booking">Booking issue</label>
                            </div>
                            <div class="flex-shrink-0">
                                <input type="radio" id="report" name="topic" value="Report a correction"
                                    class="d-none">
                                <label for="report">Report a correction</label>
                            </div>
                            <div class="flex-shrink-0">
                                <input type="radio" id="work" name="topic" value="Booking issue"
                                    class="d-none">
                                <label for="work">Booking issue</label>
                            </div>
                            <div class="flex-shrink-0">
                                <input type="radio" id="us" name="topic" value="Work with us" class="d-none">
                                <label for="us">Work with us</label>
                            </div>
                            <div class="flex-shrink-0">
                                <input type="radio" id="in" name="topic" value="Signing in" class="d-none">
                                <label for="in">Signing in</label>
                            </div>
                            <div class="flex-shrink-0">
                                <input type="radio" id="Works" name="topic" value="Work with us" class="d-none">
                                <label for="Works">Work with us</label>
                            </div>
                            <div class="flex-shrink-0">
                                <input type="radio" id="something" name="topic" value="Need something else"
                                    class="d-none">
                                <label for="something">Need something else</label>
                            </div>
                        </div>

                        <h6 class="mt-24 mb-24">Or tell us what you need help with:</h6>
                        <input type="text" name="description" placeholder="Please Explain">
                        @auth
                            <input type="hidden" name="username" value="{{ Auth::user()->name }}">
                            <button type="submit" class="cus-btn mt-24">
                                <span class="btn-text">
                                    Get Help
                                </span>
                                <span>
                                    Get Help
                                </span>
                            </button>
                        @endauth
                        @guest
                            <p class="alert alert-warning mt-24">
                                Please log in to get help.
                            </p>
                        @endguest
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="{{ asset('front/assets/media/blogs/pngwing-19.png') }}" alt="car">
            </div>
        </div>
    </div>
</section>
