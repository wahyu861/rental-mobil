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
                            <h2 class="mb-12 text-center">Booking Sekarang, Bayar Belakang</h2>
                            <p>Lorem ipsum dolor sit amet consectetur. Velit amet quam tristique aliquet urna proin
                                nam pellentesque risus.</p>
                        </div>
                    </div>
                    <div class="form">
                        @csrf
                        <div class="row row-gap-3">
                            <!-- Name Field -->
                            <div class="col-lg-6">
                                <label for="name">Nama Lengkap Sesuai KTP*</label>
                                <input type="text" id="name" placeholder="Name" name="name" required>
                            </div>

                            <!-- Phone Number Field -->
                            <div class="col-lg-6">
                                <label for="phone">Nomor Telepon/WA*</label>
                                <input type="text" id="phone" placeholder="Phone Number" name="phone" required>
                            </div>

                            <!-- Email Field -->
                            <div class="col-lg-6">
                                <label for="email">Email*</label>
                                <input type="email" id="email" placeholder="Email" name="email" required>
                            </div>

                            <!-- Car Selection Dropdown -->
                            <div class="col-lg-6">
                                <label for="email">Pilih Mobil*</label>
                                <div class="drop-container">
                                    <div class="wrapper-dropdown mb-24 white" id="dropdown">
                                        <span class="selected-display" id="destination">Pilih Mobil Anda</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="14"
                                            viewBox="0 0 24 14" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M23.6138 0.639329C23.3322 0.35775 22.8757 0.357755 22.5941 0.639341L12.9331 10.3008C12.4181 10.8158 11.5828 10.8158 11.0678 10.3008L1.40635 0.639866C1.12465 0.358175 0.667927 0.358182 0.38623 0.639879C-0.12874 1.15485 -0.12874 1.99023 0.38623 2.50521L11.0676 13.186C11.5826 13.701 12.418 13.701 12.9329 13.186L23.6138 2.50466C24.1287 1.98969 24.1287 1.1543 23.6138 0.639329Z"
                                                fill="#2D74BA" />
                                        </svg>
                                        <ul class="topbar-dropdown">
                                            @foreach ($carlists as $car)
                                                <li class="item">{{ $car->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Form untuk harga mobil, disembunyikan secara default -->
                            <div class="col-lg-12" id="car-price-form" style="display: none;">
                                <label for="car-price">Harga Mobil</label>
                                <input type="text" id="car-price" name="car-price" readonly>
                            </div>

                            <!-- Province Dropdown -->
                            <div class="col-lg-12">
                                <label for="province-select">Provinsi</label>
                                <select id="province-select" name="province" required>
                                    <option value="">Pilih Provinsi</option>
                                </select>
                            </div>

                            <!-- Regency Dropdown -->
                            <div class="col-lg-12">
                                <label for="regency-select">Kab./Kota</label>
                                <select id="regency-select" name="regency" disabled required>
                                    <option value="">Pilih Kab./Kota</option>
                                </select>
                            </div>

                            <!-- District Dropdown -->
                            <div class="col-lg-12">
                                <label for="district-select">Kecamatan</label>
                                <select id="district-select" name="district" disabled required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>

                            <!-- Village Dropdown -->
                            <div class="col-lg-12">
                                <label for="village-select">Desa</label>
                                <select id="village-select" name="village" disabled required>
                                    <option value="">Pilih Desa</option>
                                </select>
                            </div>

                            <!-- Pick-Up Location Field -->
                            <div class="col-lg-6 col-md-6">
                                <label for="pickup-location">Alamat Lengkap</label>
                                <div class="input-group">
                                    <input type="text" id="pickup-location" placeholder="Masukkan Gang/Dukuh/RT/RW"
                                        name="pickup-location" required>
                                    <img src="{{ asset('front/assets/media/icons/location.png') }}" alt="location icon">
                                </div>
                            </div>

                            <!-- Pick-Up Date Field -->
                            <div class="col-lg-6 col-md-6">
                                <label for="pickup-date">Tgl. Pemakaian</label>
                                <div class="input-group">
                                    <input type="text" name="date" id="checkIn-2" class="sel-input date_to"
                                        placeholder="Select Date" required>
                                    <img src="{{ asset('front/assets/media/forms/uil-calendar2-alt.png') }}"
                                        alt="calendar icon">
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="col-lg-12">

                                <div class="text-center">
                                    <button type="submit" id="button-request" class="cus-btn">
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
                        option.textContent = regency.name;
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

    function selectCar(carId, carName) {
        document.getElementById("destination").innerText = carName;
        let carIdInput = document.getElementById("car-id-hidden");
        if (!carIdInput) {
            carIdInput = document.createElement("input");
            carIdInput.type = "hidden";
            carIdInput.id = "car-id-hidden";
            carIdInput.name = "car_id";
            document.body.appendChild(carIdInput);
        }
        carIdInput.value = carId;
        fetch(`/car-price/${carId}`)
            .then(response => response.json())
            .then(data => {
                const priceFormatted = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                }).format(data.price);

                const priceWithDescription = `${priceFormatted} / Hari`;

                const carPriceElement = document.getElementById("car-price");
                if (carPriceElement.tagName === 'INPUT') {
                    carPriceElement.value = priceWithDescription;
                } else {
                    carPriceElement.innerText = priceWithDescription;
                }

                document.getElementById("car-price-form").style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
    }


    document.getElementById('button-request').addEventListener('click', function() {
        const usageDateElement = document.querySelector('input[name="date"]');
        if (!usageDateElement || !usageDateElement.value) {
            console.error('Pickup date is not selected!');
            return;
        }
        const carPriceElement = document.getElementById("car-price");

        if (!carPriceElement) {
            console.error('Car price element not found!');
            return;
        }

        let priceText = carPriceElement.innerText || carPriceElement.value || '';

        if (!priceText.trim()) {
            console.error('Car price is empty!');
            return;
        }

        // Menghapus format harga
        let price = parseFloat(
            priceText
            .replace("Rp", "") // Hapus "Rp"
            .replace("/ Hari", "") // Hapus "/ Hari"
            .replace(/\s+/g, "") // Hapus spasi (termasuk non-breaking space)
            .replace(/\./g, "") // Hapus titik (separator ribuan)
            .replace(/\,/g, ".") // Ganti koma menjadi titik (separator desimal)
        );

        if (isNaN(price)) {
            console.error('Invalid car price!');
            return;
        }
        const carIdInput = document.getElementById("car-id-hidden");
        const carId = carIdInput ? carIdInput.value : null;

        if (!carId) {
            console.error('Car ID is not selected!');
            return;
        }
        console.log('Raw price text:', priceText);
        console.log('Parsed price:', price);


        console.log('Valid price:', price);
        const usageDate = new Date(usageDateElement.value);
        const formattedUsageDate = usageDate.toISOString().split('T')[0];
        const provinceSelect = document.getElementById('province-select');
        const regencySelect = document.getElementById('regency-select');
        const districtSelect = document.getElementById('district-select');
        const villageSelect = document.getElementById('village-select');

        if (!provinceSelect || !regencySelect || !districtSelect || !villageSelect) {
            console.error('Location select elements are missing!');
            return;
        }

        const data = {
            province: provinceSelect.selectedOptions[0]?.text || '',
            regency: regencySelect.selectedOptions[0]?.text || '',
            district: districtSelect.selectedOptions[0]?.text || '',
            village: villageSelect.selectedOptions[0]?.text || '',
            name: document.querySelector('input[name="name"]')?.value || '',
            pickup_location: document.querySelector('input[name="pickup-location"]')?.value || '',
            phone: document.querySelector('input[name="phone"]')?.value || '',
            email: document.querySelector('input[name="email"]')?.value || '',
            pickup_date: formattedUsageDate,
            car_id: carId,
            car_price: price,
        };

        fetch('/car-request', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Network response was not ok: ${response.statusText}`);
                }
                return response.text();
            })
            .then(() => {
                window.location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
