<footer class="pt-40">
    <div class="container-fluid">
        <div class="row mb-16 row-gap-4">
            <div class="col-lg-3">
                <div class="txt-block">
                    <a href="{{ url('/') }}">
                        @if (isset($settings->footer_logo) && $settings->footer_logo)
                            <img src="{{ asset('storage/' . $settings->footer_logo) }}" alt="logo">
                        @else
                            <img src="{{ asset('front/assets/media/footer/logo.png') }}" alt="logo">
                        @endif
                    </a>
                </div>
                <p class="mb-32">{{ $settings->footer_description ?? 'Deskripsi footer berada di sini' }}</p>
                <h6 class="white mb-16">Subscribe To Our Newsletter</h6>
                <form action="https://uiparadox.co.uk/public/templates/rapid-ride/index.html" class="newsletter-form">
                    <input type="email" name="email" id="eMail" class="form-input"
                        placeholder=" Your email address">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <g clip-path="url(#clip0_383_5670)">
                                <path
                                    d="M19.8284 0.171647C19.6626 0.00586635 19.414 -0.0451101 19.1965 0.041921L0.36834 7.57308C0.152911 7.65925 0.00865304 7.86441 0.00037181 8.09632C-0.00787036 8.32819 0.121504 8.54308 0.330254 8.64433L7.75477 12.2451L11.3556 19.6697C11.4538 19.8722 11.6589 19.9999 11.8827 19.9999C11.8896 19.9999 11.8966 19.9998 11.9036 19.9995C12.1355 19.9913 12.3407 19.847 12.4268 19.6316L19.9581 0.803599C20.0451 0.585943 19.9941 0.337389 19.8284 0.171647ZM2.0349 8.16862L16.9812 2.19016L8.07383 11.0974L2.0349 8.16862ZM11.8313 17.9651L8.90246 11.926L17.8099 3.01875L11.8313 17.9651Z"
                                    fill="#2D74BA" />
                            </g>
                        </svg>
                    </button>
                </form>
            </div>
            <div class="col-lg-5 col-md-8 offset-lg-1">
                <div class="row">
                    <div class="col-6">
                        <div class="links-block">
                            <h6 class="mb-32">Quick Links</h6>
                            <ul class="unstyled">
                                <li class="mb-12">
                                    <a href="index-2.html">Home </a>
                                </li>
                                <li class="mb-12">
                                    <a href="about.html">About Us</a>
                                </li>
                                <li class="mb-12">
                                    <a href="blogs.html">Blogs</a>
                                </li>
                                <li class="mb-12">
                                    <a href="contact.html">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="links-block">
                            <h6 class="mb-32">Information</h6>
                            <ul class="unstyled">
                                <li class="mb-12">
                                    <a href="rental.html">Rentals</a>
                                </li>
                                <li class="mb-12">
                                    <a href="book-now.html">Booking Form</a>
                                </li>
                                <li class="mb-12">
                                    <a href="booking.html">Booking Details</a>
                                </li>
                                <li class="mb-12">
                                    <a href="index-2.html">Brands</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="links-block">
                    <div class="mb-24">
                        <h6 class="mb-32">Contact info</h6>
                    </div>
                    <ul class="unstyled">
                        <li class="mb-16">
                            <div class="contact">
                                <img src="{{ asset('front/assets/media/footer/uil-outgoing-call.png') }}"
                                    alt="call-logo">
                                <a href="tel:+12345678">+123 (4567) -890</a>
                            </div>
                        </li>
                        <li class="mb-16">
                            <div class="contact">
                                <img src="{{ asset('front/assets/media/footer/uil-map-marker.png') }}" alt="logo">
                                <p>Main Street, New Jersey</p>
                            </div>
                        </li>
                        <li class="mb-24">
                            <div class="contact">
                                <img src="{{ asset('front/assets/media/footer/uil-envelope.png') }}" alt="logo">
                                <a href="mailto:example@company.com">example@company.com</a>
                            </div>
                        </li>
                    </ul>
                    <h5>Follow us!</h5>
                    <div class="social-icons mb-12">
                        <ul class="d-flex unstyled gap-12">
                            <li>
                                <a href="#">
                                    <img src="{{ asset('front/assets/media/footer/Instagram.png') }}" alt="logo">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('front/assets/media/footer/Twitter.png') }}" alt="logo">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('front/assets/media/footer/Dribbble.png') }}" alt="logo">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('front/assets/media/footer/Linkedin.png') }}" alt="logo">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="hr-line  bg-light-gray"></div>
        <p class="mt-32 pb-32 text-center">
            @if (isset($settings->copyright_text) && !empty($settings->copyright_text))
                {{ $settings->copyright_text }}
            @else
                Teks Copyright Footer berada Disini
            @endif
        </p>

    </div>
</footer>
