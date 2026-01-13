<x-back-layout title="Add Car">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-car"></i>
            </span> Add Car
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cars.index') }}">Car Managements</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Car</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Car Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" class="form-control" id="category" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" id="price" step="0.01"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control" id="location" required>
                        </div>
                        <h5>Car Features</h5>
                        <div id="features-container">
                            <div class="form-group">
                                <input type="text" name="car_features[]" class="form-control mb-1"
                                    placeholder="Enter car feature">
                            </div>
                        </div>
                        <button type="button" id="add-feature" class="btn btn-secondary mb-5">Add Feature</button>

                        <h5>Extra Services</h5>
                        <div id="extra-services-container">
                            <div class="form-group">
                                <input type="text" name="extra_services[]" class="form-control mb-1"
                                    placeholder="Enter extra service">
                            </div>
                        </div>
                        <button type="button" id="add-extra-service" class="btn btn-secondary mb-5">Add Extra
                            Service</button>
                        <h5>Specifications</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="body">Body</label>
                                    <input type="text" name="specifications[body]" class="form-control"
                                        id="body" required>
                                </div>
                                <div class="form-group">
                                    <label for="engine_capacity">Engine Capacity</label>
                                    <input type="text" name="specifications[engine_capacity]" class="form-control"
                                        id="engine_capacity" required>
                                </div>
                                <div class="form-group">
                                    <label for="seats">Seats</label>
                                    <input type="text" name="specifications[seats]" class="form-control"
                                        id="seats" required>
                                </div>
                                <div class="form-group">
                                    <label for="tyre">Tyre</label>
                                    <input type="text" name="specifications[tyre]" class="form-control"
                                        id="tyre" required>
                                </div>
                                <div class="form-group">
                                    <label for="engine_type">Engine Type</label>
                                    <input type="text" name="specifications[engine_type]" class="form-control"
                                        id="engine_type" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tank_capacity">Tank Capacity</label>
                                    <input type="text" name="specifications[tank_capacity]" class="form-control"
                                        id="tank_capacity" required>
                                </div>
                                <div class="form-group">
                                    <label for="transmission">Transmission</label>
                                    <input type="text" name="specifications[transmission]" class="form-control"
                                        id="transmission" required>
                                </div>
                                <div class="form-group">
                                    <label for="brakes">Brakes</label>
                                    <input type="text" name="specifications[brakes]" class="form-control"
                                        id="brakes" required>
                                </div>
                                <div class="form-group">
                                    <label for="mileage">Mileage</label>
                                    <input type="text" name="specifications[mileage]" class="form-control"
                                        id="mileage" required>
                                </div>
                                <div class="form-group">
                                    <label for="drive_train">Drive Train</label>
                                    <input type="text" name="specifications[drive_train]" class="form-control"
                                        id="drive_train" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Add Car</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById('add-feature').addEventListener('click', function() {
            const featuresContainer = document.getElementById('features-container');

            const newFeatureDiv = document.createElement('div');
            newFeatureDiv.classList.add('form-group');

            const newFeatureInput = document.createElement('input');
            newFeatureInput.type = 'text';
            newFeatureInput.name = 'car_features[]';
            newFeatureInput.classList.add('form-control', 'mb-2');
            newFeatureInput.placeholder = 'Enter car feature';

            newFeatureDiv.appendChild(newFeatureInput);
            featuresContainer.appendChild(newFeatureDiv);
        });

        document.getElementById('add-extra-service').addEventListener('click', function() {
            const extraServicesContainer = document.getElementById('extra-services-container');

            const newServiceDiv = document.createElement('div');
            newServiceDiv.classList.add('form-group');

            const newServiceInput = document.createElement('input');
            newServiceInput.type = 'text';
            newServiceInput.name = 'extra_services[]';
            newServiceInput.classList.add('form-control', 'mb-2');
            newServiceInput.placeholder = 'Enter extra service';

            newServiceDiv.appendChild(newServiceInput);
            extraServicesContainer.appendChild(newServiceDiv);
        });
    </script>
</x-back-layout>
