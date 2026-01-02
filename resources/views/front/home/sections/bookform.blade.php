<section class="booking-form py-80">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="images">
                    <img src="{{ asset('front/assets/media/cars/car.png') }}" alt="car">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="txt-block">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <h2 class="mb-12 text-center">Book A Car</h2>
                            <p>Lorem ipsum dolor sit amet consectetur. Velit amet quam tristique aliquet urna proin
                                nam pellentesque risus.</p>
                        </div>
                    </div>
                    <form>
                        <div class="row row-gap-3">
                            <div class="col-lg-12">
                                <input type="text" id="name-2" placeholder="Name*" name="name">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" id="name-3" placeholder="Phone Number*" name="Phone Number">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" id="name-4" placeholder="Email*" name="Email*">
                            </div>
                            <div class="col-lg-12">
                                <div class="drop-container">
                                    <div class="wrapper-dropdown mb-24 white" id="dropdown">
                                        <span class="selected-display" id="destination">Choose your car</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="14"
                                            viewBox="0 0 24 14" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M23.6138 0.639329C23.3322 0.35775 22.8757 0.357755 22.5941 0.639341L12.9331 10.3008C12.4181 10.8158 11.5828 10.8158 11.0678 10.3008L1.40635 0.639866C1.12465 0.358175 0.667927 0.358182 0.38623 0.639879C-0.12874 1.15485 -0.12874 1.99023 0.38623 2.50521L11.0676 13.186C11.5826 13.701 12.418 13.701 12.9329 13.186L23.6138 2.50466C24.1287 1.98969 24.1287 1.1543 23.6138 0.639329Z"
                                                fill="#2D74BA" />
                                        </svg>
                                        <ul class="topbar-dropdown ">
                                            <li class="item">Audi</li>
                                            <li class="item">Mercedes</li>
                                            <li class="item">Bmw</li>
                                            <li class="item">Tesla</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-group">
                                    <input type="text" id="location-3" placeholder="Pick-Up-location"
                                        name="location">
                                    <img src="{{ asset('front/assets/media/icons/location.png') }}" alt="calendar">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-group">
                                    <img src="{{ asset('front/assets/media/forms/uil-calendar2-alt.png') }}"
                                        alt="calendar">
                                    <input type="text" name="date" id="checkIn-2" class="sel-input date_to"
                                        placeholder="Select Date">
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-group">
                                    <input type="text" id="location-5" placeholder="Drop-Up-location"
                                        name="location">
                                    <img src="{{ asset('front/assets/media/icons/location.png') }}" alt="calendar">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-group input-box">
                                    <input type="text" name="date" id="checkOut-2" class="sel-input date_from"
                                        placeholder="Select Date">
                                    <img src="{{ asset('front/assets/media/forms/uil-calendar2-alt.png') }}"
                                        alt="calendar">
                                </div>
                            </div>
                            <div class="col-lg-12">

                                <div class="text-center">
                                    <button type="submit" class="cus-btn">
                                        <span class="btn-text">
                                            Submit A Request
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                                viewBox="0 0 25 24" fill="none">
                                                <path
                                                    d="M21.6498 2.86025C21.2678 2.47082 20.7833 2.19747 20.2524 2.07183C19.7215 1.94619 19.1659 1.97338 18.6498 2.15025L4.4998 6.88025C3.92912 7.06705 3.43049 7.4264 3.07276 7.90869C2.71502 8.39098 2.51582 8.97242 2.50265 9.57276C2.48948 10.1731 2.66299 10.7627 2.99923 11.2602C3.33547 11.7577 3.81786 12.1386 4.37981 12.3503L9.6198 14.3503C9.73912 14.3959 9.84776 14.4656 9.93895 14.5551C10.0301 14.6445 10.1019 14.7518 10.1498 14.8703L12.1498 20.1203C12.3534 20.6742 12.7228 21.152 13.2078 21.4884C13.6927 21.8248 14.2696 22.0036 14.8598 22.0003H14.9298C15.5308 21.9893 16.1134 21.7906 16.5958 21.4319C17.0781 21.0733 17.4362 20.5727 17.6198 20.0003L22.3498 5.83025C22.5218 5.31919 22.5474 4.7702 22.4237 4.24534C22.3 3.72048 22.0319 3.24071 21.6498 2.86025ZM20.4998 5.20025L15.7198 19.3803C15.6643 19.5597 15.5528 19.7167 15.4017 19.8283C15.2505 19.9398 15.0677 20.0001 14.8798 20.0003C14.6931 20.0033 14.5098 19.9495 14.3544 19.8459C14.199 19.7423 14.0788 19.5938 14.0098 19.4203L12.0098 14.1703C11.8648 13.7888 11.6412 13.4421 11.3535 13.1526C11.0658 12.8632 10.7204 12.6375 10.3398 12.4903L5.08981 10.4903C4.9127 10.4254 4.76046 10.3065 4.65459 10.1503C4.54872 9.99423 4.49458 9.8088 4.4998 9.62025C4.49996 9.4324 4.56022 9.24952 4.67178 9.09838C4.78334 8.94724 4.94034 8.83576 5.1198 8.78025L19.2998 4.05025C19.4626 3.9839 19.6411 3.96613 19.8138 3.99908C19.9865 4.03203 20.146 4.1143 20.2729 4.23594C20.3998 4.35758 20.4888 4.51338 20.5291 4.68451C20.5693 4.85565 20.5592 5.03478 20.4998 5.20025Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                        <span class="btn-text">
                                            Submit A Request
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                                viewBox="0 0 25 24" fill="none">
                                                <path
                                                    d="M21.6498 2.86025C21.2678 2.47082 20.7833 2.19747 20.2524 2.07183C19.7215 1.94619 19.1659 1.97338 18.6498 2.15025L4.4998 6.88025C3.92912 7.06705 3.43049 7.4264 3.07276 7.90869C2.71502 8.39098 2.51582 8.97242 2.50265 9.57276C2.48948 10.1731 2.66299 10.7627 2.99923 11.2602C3.33547 11.7577 3.81786 12.1386 4.37981 12.3503L9.6198 14.3503C9.73912 14.3959 9.84776 14.4656 9.93895 14.5551C10.0301 14.6445 10.1019 14.7518 10.1498 14.8703L12.1498 20.1203C12.3534 20.6742 12.7228 21.152 13.2078 21.4884C13.6927 21.8248 14.2696 22.0036 14.8598 22.0003H14.9298C15.5308 21.9893 16.1134 21.7906 16.5958 21.4319C17.0781 21.0733 17.4362 20.5727 17.6198 20.0003L22.3498 5.83025C22.5218 5.31919 22.5474 4.7702 22.4237 4.24534C22.3 3.72048 22.0319 3.24071 21.6498 2.86025ZM20.4998 5.20025L15.7198 19.3803C15.6643 19.5597 15.5528 19.7167 15.4017 19.8283C15.2505 19.9398 15.0677 20.0001 14.8798 20.0003C14.6931 20.0033 14.5098 19.9495 14.3544 19.8459C14.199 19.7423 14.0788 19.5938 14.0098 19.4203L12.0098 14.1703C11.8648 13.7888 11.6412 13.4421 11.3535 13.1526C11.0658 12.8632 10.7204 12.6375 10.3398 12.4903L5.08981 10.4903C4.9127 10.4254 4.76046 10.3065 4.65459 10.1503C4.54872 9.99423 4.49458 9.8088 4.4998 9.62025C4.49996 9.4324 4.56022 9.24952 4.67178 9.09838C4.78334 8.94724 4.94034 8.83576 5.1198 8.78025L19.2998 4.05025C19.4626 3.9839 19.6411 3.96613 19.8138 3.99908C19.9865 4.03203 20.146 4.1143 20.2729 4.23594C20.3998 4.35758 20.4888 4.51338 20.5291 4.68451C20.5693 4.85565 20.5592 5.03478 20.4998 5.20025Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
