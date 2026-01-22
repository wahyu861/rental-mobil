<section class="details py-80">
    <div class="container-fluid">
        <div class="row row-gap-4">
            <div class="col-lg-8">
                <div class="slider-arrows smt-sm-0 mt-48 d-sm-flex">
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="29" viewBox="0 0 16 29"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.3048 1.40406L1.15797 13.5503C0.572344 14.1359 0.572344 15.0859 1.15797 15.6716L13.3042 27.8184C13.8898 28.4041 14.8398 28.4041 15.4255 27.8184C15.7458 27.4981 15.7458 26.9788 15.4255 26.6584L4.43922 15.6716C3.85359 15.086 3.85359 14.136 4.43922 13.5503L15.4261 2.56405C15.7464 2.24373 15.7464 1.72439 15.4261 1.40406C14.8405 0.818438 13.8905 0.818438 13.3048 1.40406Z"
                                fill="#2D74BA" />
                        </svg>
                    </a>
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="29" viewBox="0 0 16 29"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.07992 1.40406L15.2268 13.5503C15.8124 14.1359 15.8124 15.0859 15.2268 15.6716L3.08055 27.8184C2.49492 28.4041 1.54492 28.4041 0.959298 27.8184C0.63897 27.4981 0.638964 26.9788 0.959283 26.6584L11.9455 15.6716C12.5312 15.086 12.5312 14.136 11.9455 13.5503L0.958687 2.56405C0.638355 2.24373 0.63835 1.72439 0.958673 1.40406C1.5443 0.818438 2.4943 0.818438 3.07992 1.40406Z"
                                fill="#2D74BA" />
                        </svg>
                    </a>
                </div>
                <div class="rental-slider">
                    @foreach ($car->galleries as $gallery)
                        <div class="rental-slide">
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="Car Image">
                        </div>
                    @endforeach
                </div>
                <div class="as-nav-slider">
                    @foreach ($car->galleries as $gallery)
                        <div class="img-box">
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="Car Thumbnail">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sides-bar">
                    <div class="side-bar-1 mb-16">
                        <div class="d-flex mb-16 align-items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M22.0005 9.67015C21.9373 9.48723 21.8224 9.32657 21.6698 9.20765C21.5171 9.08872 21.3333 9.01664 21.1405 9.00014L15.4505 8.17015L12.9005 3.00015C12.8186 2.83107 12.6907 2.68849 12.5316 2.58872C12.3724 2.48895 12.1883 2.43604 12.0005 2.43604C11.8126 2.43604 11.6286 2.48895 11.4694 2.58872C11.3102 2.68849 11.1824 2.83107 11.1005 3.00015L8.55047 8.16014L2.86047 9.00014C2.67539 9.02645 2.50139 9.10411 2.35822 9.2243C2.21504 9.3445 2.10843 9.50242 2.05047 9.68015C1.99741 9.85382 1.99265 10.0387 2.03669 10.2148C2.08074 10.391 2.17192 10.5519 2.30047 10.6801L6.43047 14.6801L5.43047 20.3601C5.39477 20.5476 5.41346 20.7414 5.48434 20.9186C5.55522 21.0958 5.67532 21.249 5.83047 21.3601C5.98168 21.4683 6.16004 21.5321 6.34551 21.5444C6.53099 21.5568 6.71624 21.5172 6.88047 21.4301L12.0005 18.7601L17.1005 21.4401C17.2408 21.5193 17.3993 21.5607 17.5605 21.5601C17.7723 21.5609 17.9789 21.4944 18.1505 21.3701C18.3056 21.259 18.4257 21.1058 18.4966 20.9286C18.5675 20.7514 18.5862 20.5576 18.5505 20.3701L17.5505 14.6901L21.6805 10.6901C21.8248 10.5678 21.9316 10.407 21.9882 10.2265C22.0448 10.0459 22.0491 9.85302 22.0005 9.67015ZM15.8505 13.6701C15.7332 13.7836 15.6454 13.924 15.5949 14.0791C15.5444 14.2343 15.5325 14.3994 15.5605 14.5601L16.2805 18.7501L12.5205 16.7501C12.3758 16.6731 12.2144 16.6328 12.0505 16.6328C11.8865 16.6328 11.7251 16.6731 11.5805 16.7501L7.82047 18.7501L8.54047 14.5601C8.5684 14.3994 8.55658 14.2343 8.50603 14.0791C8.45548 13.924 8.36774 13.7836 8.25047 13.6701L5.25047 10.6701L9.46047 10.0601C9.62246 10.0376 9.77646 9.97569 9.90896 9.8798C10.0415 9.78391 10.1484 9.65698 10.2205 9.51015L12.0005 5.70015L13.8805 9.52015C13.9525 9.66698 14.0595 9.79391 14.192 9.8898C14.3245 9.98569 14.4785 10.0476 14.6405 10.0701L18.8505 10.6801L15.8505 13.6701Z"
                                    fill="#0F0F0F" />
                            </svg>
                            <h5>4.8</h5>
                        </div>
                        <h4 class="mb-4" id="car-name">{{ $car->name }}</h4>
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <h6 id="car-price" class="mb-16">Rp. {{ $car->price }} / Hari</h6>
                        <div class="d-flex gap-8">
                            <div class="d-flex gap-8">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12 2C9.87827 2 7.84344 2.84285 6.34315 4.34315C4.84285 5.84344 4 7.87827 4 10C4 15.4 11.05 21.5 11.35 21.76C11.5311 21.9149 11.7616 22.0001 12 22.0001C12.2384 22.0001 12.4689 21.9149 12.65 21.76C13 21.5 20 15.4 20 10C20 7.87827 19.1571 5.84344 17.6569 4.34315C16.1566 2.84285 14.1217 2 12 2ZM12 19.65C9.87 17.65 6 13.34 6 10C6 8.4087 6.63214 6.88258 7.75736 5.75736C8.88258 4.63214 10.4087 4 12 4C13.5913 4 15.1174 4.63214 16.2426 5.75736C17.3679 6.88258 18 8.4087 18 10C18 13.34 14.13 17.66 12 19.65ZM12 6C11.2089 6 10.4355 6.2346 9.77772 6.67412C9.11992 7.11365 8.60723 7.73836 8.30448 8.46927C8.00173 9.20017 7.92252 10.0044 8.07686 10.7804C8.2312 11.5563 8.61216 12.269 9.17157 12.8284C9.73098 13.3878 10.4437 13.7688 11.2196 13.9231C11.9956 14.0775 12.7998 13.9983 13.5307 13.6955C14.2616 13.3928 14.8864 12.8801 15.3259 12.2223C15.7654 11.5645 16 10.7911 16 10C16 8.93913 15.5786 7.92172 14.8284 7.17157C14.0783 6.42143 13.0609 6 12 6ZM12 12C11.6044 12 11.2178 11.8827 10.8889 11.6629C10.56 11.4432 10.3036 11.1308 10.1522 10.7654C10.0009 10.3999 9.96126 9.99778 10.0384 9.60982C10.1156 9.22186 10.3061 8.86549 10.5858 8.58579C10.8655 8.30608 11.2219 8.1156 11.6098 8.03843C11.9978 7.96126 12.3999 8.00087 12.7654 8.15224C13.1308 8.30362 13.4432 8.55996 13.6629 8.88886C13.8827 9.21776 14 9.60444 14 10C14 10.5304 13.7893 11.0391 13.4142 11.4142C13.0391 11.7893 12.5304 12 12 12Z"
                                        fill="#5D5D5D" />
                                </svg>
                                <p>{{ $car->location }} </p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M21.9201 11.6C19.9001 6.91 16.1001 4 12.0001 4C7.90007 4 4.10007 6.91 2.08007 11.6C2.025 11.7262 1.99658 11.8623 1.99658 12C1.99658 12.1377 2.025 12.2738 2.08007 12.4C4.10007 17.09 7.90007 20 12.0001 20C16.1001 20 19.9001 17.09 21.9201 12.4C21.9751 12.2738 22.0036 12.1377 22.0036 12C22.0036 11.8623 21.9751 11.7262 21.9201 11.6ZM12.0001 18C8.83007 18 5.83007 15.71 4.10007 12C5.83007 8.29 8.83007 6 12.0001 6C15.1701 6 18.1701 8.29 19.9001 12C18.1701 15.71 15.1701 18 12.0001 18ZM12.0001 8C11.2089 8 10.4356 8.2346 9.77779 8.67412C9.11999 9.11365 8.6073 9.73836 8.30455 10.4693C8.0018 11.2002 7.92258 12.0044 8.07693 12.7804C8.23127 13.5563 8.61223 14.269 9.17164 14.8284C9.73105 15.3878 10.4438 15.7688 11.2197 15.9231C11.9956 16.0775 12.7999 15.9983 13.5308 15.6955C14.2617 15.3928 14.8864 14.8801 15.3259 14.2223C15.7655 13.5645 16.0001 12.7911 16.0001 12C16.0001 10.9391 15.5786 9.92172 14.8285 9.17157C14.0783 8.42143 13.0609 8 12.0001 8ZM12.0001 14C11.6045 14 11.2178 13.8827 10.8889 13.6629C10.56 13.4432 10.3037 13.1308 10.1523 12.7654C10.0009 12.3999 9.96133 11.9978 10.0385 11.6098C10.1157 11.2219 10.3061 10.8655 10.5859 10.5858C10.8656 10.3061 11.2219 10.1156 11.6099 10.0384C11.9978 9.96126 12.4 10.0009 12.7654 10.1522C13.1309 10.3036 13.4432 10.56 13.663 10.8889C13.8828 11.2178 14.0001 11.6044 14.0001 12C14.0001 12.5304 13.7894 13.0391 13.4143 13.4142C13.0392 13.7893 12.5305 14 12.0001 14Z"
                                        fill="#5D5D5D" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="side-bar-2 mt-24">
                    <div class="form">
                        @csrf
                        <p class="mb-8 fw-600 dark-gray">Pilih Provinsi</p>
                        <select id="province-select" name="province" class="form-select mb-12">
                            <option value="">Pilih Provinsi</option>
                            <!-- Daftar provinsi di sini -->
                        </select>
                        <p class="mb-8 fw-600 dark-gray">Pilih Kabupaten/Kota</p>
                        <select id="regency-select" name="regency" class="form-select mb-12" disabled>
                            <option value="">Pilih Kabupaten/Kota</option>
                        </select>
                        <p class="mb-8 fw-600 dark-gray">Pilih Kecamatan</p>
                        <select id="district-select" name="district" class="form-select mb-12" disabled>
                            <option value="">Pilih Kecamatan</option>
                            <!-- Daftar kecamatan di sini -->
                        </select>
                        <p class="mb-8 fw-600 dark-gray">Pilih Desa/Kelurahan</p>
                        <select id="village-select" name="village" class="form-select mb-12" disabled>
                            <option value="">Pilih Desa/Kelurahan</option>
                            <!-- Daftar desa/kelurahan di sini -->
                        </select>
                        <p class="mb-8 fw-600 dark-gray">Nama Lengkap</p>
                        @if (Auth::check())
                            <input type="text" class="mb-12" name="name" value="{{ Auth::user()->name }}"
                                required>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @else
                            <input type="text" class="mb-12" name="name" placeholder="Masukkan Nama Lengkap"
                                required>
                        @endif
                        <p class="mb-8 fw-600 dark-gray">Alamat Lengkap</p>
                        <input type="text" class="mb-12" name="address" placeholder="Masukkan Gang/Dukuh/RT/RW"
                            required>
                        <p class="mb-8 fw-600 dark-gray">Nomor HP</p>
                        <input type="text" class="mb-12" name="phone" placeholder="081xxxxxx" required>
                        <div class="input-group mb-5">
                            <p class="mb-8 fw-600 dark-gray">Tgl. Pemakaian</p>
                            <input type="text" name="date" id="checkIn-2" class="sel-input date_to"
                                placeholder="Select Date" required>
                        </div>
                        @if (Auth::check())
                            <button type="submit" id="booking-button" class="cus-btn">
                                <span class="btn-text">
                                    Booking Sekarang
                                </span>
                                <span>
                                    Booking Sekarang
                                </span>
                            </button>
                        @else
                            <!-- Jika user belum login -->
                            <a href="#" class="btn btn-primary">Booking Sekarang</a>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Mengambil data provinsi dari API
    fetch(`https://kurniaandi.github.io/api-wilayah-indonesia/api/provinces.json`)
        .then(response => response.json())
        .then(data => {
            const provinceSelect = document.getElementById('province-select');

            // Menambahkan setiap provinsi sebagai option di dropdown
            data.forEach(province => {
                const option = document.createElement('option');
                option.value = province.id; // ID provinsi
                option.textContent = province.name; // Nama provinsi
                provinceSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching provinces:', error)); // Tangani error

    // Menangani perubahan pada dropdown provinsi
    document.getElementById('province-select').addEventListener('change', function() {
        const provinceId = this.value;
        const regencySelect = document.getElementById('regency-select');
        const districtSelect = document.getElementById('district-select');
        const villageSelect = document.getElementById('village-select');
        regencySelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>'; // Reset dropdown kabupaten
        districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>'; // Reset dropdown kecamatan
        villageSelect.innerHTML =
        '<option value="">Pilih Desa/Kelurahan</option>'; // Reset dropdown desa/kelurahan
        regencySelect.disabled = true; // Nonaktifkan dropdown kabupaten
        districtSelect.disabled = true; // Nonaktifkan dropdown kecamatan
        villageSelect.disabled = true; // Nonaktifkan dropdown desa/kelurahan

        if (provinceId) {
            // Fetch kabupaten/kota berdasarkan ID provinsi yang dipilih
            fetch(`https://kurniaandi.github.io/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                .then(response => response.json())
                .then(regencies => {
                    // Menambahkan setiap kabupaten/kota sebagai option di dropdown
                    regencies.forEach(regency => {
                        const option = document.createElement('option');
                        option.value = regency.id; // ID kabupaten/kota
                        option.textContent = regency.name; // Nama kabupaten/kota
                        regencySelect.appendChild(option);
                    });
                    regencySelect.disabled = false; // Aktifkan dropdown kabupaten
                })
                .catch(error => console.error('Error fetching regencies:', error)); // Tangani error
        }
    });

    // Menangani perubahan pada dropdown kabupaten/kota
    document.getElementById('regency-select').addEventListener('change', function() {
        const regencyId = this.value;
        const districtSelect = document.getElementById('district-select');
        const villageSelect = document.getElementById('village-select');
        districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>'; // Reset dropdown kecamatan
        villageSelect.innerHTML =
        '<option value="">Pilih Desa/Kelurahan</option>'; // Reset dropdown desa/kelurahan
        districtSelect.disabled = true; // Nonaktifkan dropdown kecamatan
        villageSelect.disabled = true; // Nonaktifkan dropdown desa/kelurahan

        if (regencyId) {
            // Fetch kecamatan berdasarkan ID kabupaten yang dipilih
            fetch(`https://kurniaandi.github.io/api-wilayah-indonesia/api/districts/${regencyId}.json`)
                .then(response => response.json())
                .then(districts => {
                    // Menambahkan setiap kecamatan sebagai option di dropdown
                    districts.forEach(district => {
                        const option = document.createElement('option');
                        option.value = district.id; // ID kecamatan
                        option.textContent = district.name; // Nama kecamatan
                        districtSelect.appendChild(option);
                    });
                    districtSelect.disabled = false; // Aktifkan dropdown kecamatan
                })
                .catch(error => console.error('Error fetching districts:', error)); // Tangani error
        }
    });

    // Menangani perubahan pada dropdown kecamatan
    document.getElementById('district-select').addEventListener('change', function() {
        const districtId = this.value;
        const villageSelect = document.getElementById('village-select');
        villageSelect.innerHTML =
        '<option value="">Pilih Desa/Kelurahan</option>'; // Reset dropdown desa/kelurahan
        villageSelect.disabled = true; // Nonaktifkan dropdown desa/kelurahan

        if (districtId) {
            // Fetch desa/kelurahan berdasarkan ID kecamatan yang dipilih
            fetch(`https://kurniaandi.github.io/api-wilayah-indonesia/api/villages/${districtId}.json`)
                .then(response => response.json())
                .then(villages => {
                    // Menambahkan setiap desa/kelurahan sebagai option di dropdown
                    villages.forEach(village => {
                        const option = document.createElement('option');
                        option.value = village.id; // ID desa/kelurahan
                        option.textContent = village.name; // Nama desa/kelurahan
                        villageSelect.appendChild(option);
                    });
                    villageSelect.disabled = false; // Aktifkan dropdown desa/kelurahan
                })
                .catch(error => console.error('Error fetching villages:', error)); // Tangani error
        }
    });
    document.getElementById('booking-button').addEventListener('click', function() {
        let carPriceElement = document.getElementById("car-price").innerText;
        let price = parseFloat(carPriceElement.replace("Rp. ", "").replace(" / Hari", "").replace(/\./g, '')
            .replace(/\,/g, '.'));
        price = price / 100;
        const usageDate = new Date(document.querySelector('input[name="date"]').value);
        const formattedUsageDate = usageDate.toISOString().split('T')[0];
        const userIdElement = document.querySelector('input[name="user_id"]');
        const userId = userIdElement ? userIdElement.value : null;
        const carIdElement = document.querySelector('input[name="car_id"]');
        const carId = carIdElement ? carIdElement.value : null;
        const data = {
            province_id: document.getElementById('province-select').value,
            province_name: document.getElementById('province-select').selectedOptions[0].text,
            regency_id: document.getElementById('regency-select').value,
            regency_name: document.getElementById('regency-select').selectedOptions[0].text,
            district_id: document.getElementById('district-select').value,
            district_name: document.getElementById('district-select').selectedOptions[0].text,
            village_id: document.getElementById('village-select').value,
            village_name: document.getElementById('village-select').selectedOptions[0].text,
            name: document.querySelector('input[name="name"]').value,
            address: document.querySelector('input[name="address"]').value,
            phone: document.querySelector('input[name="phone"]').value,
            usage_date: formattedUsageDate,
            price: price,
            user_id: userId,
            car_id: carId,
            car_name: document.getElementById('car-name').innerText,
        };
        fetch('/create-booking', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                console.log('Success:', data);


                if (data.snap_token) {
                    snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            console.log('Payment Success:', result);

                            window.location.href = "http://127.0.0.1:8000/rental";
                        },
                        onPending: function(result) {
                            console.log('Payment Pending:', result);

                        },
                        onError: function(result) {
                            console.log('Payment Error:', result);

                        },
                        onClose: function() {
                            console.log('Payment dialog closed');

                        }
                    });
                } else {
                    console.error('Snap token tidak tersedia');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
