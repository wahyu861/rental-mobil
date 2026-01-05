<x-back-layout title="Edit Car">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-car"></i>
            </span> Edit Car
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Car Managements</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Car</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Car Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="Toyota Corolla" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" class="form-control" id="category" required>
                                <option value="">Select Category</option>
                                <option value="1" selected>SUV</option>
                                <option value="2">Sedan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control" id="location" value="Jakarta"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" class="form-control" id="price" value="500000"
                                required>
                        </div>
                        <h5>Car Features</h5>
                        <div id="features-container">
                            <div class="form-group feature-item">
                                <input type="text" name="car_features[]" class="form-control mb-1"
                                    value="Air Conditioning" placeholder="Enter car feature">
                                <button type="button" class="btn btn-danger btn-sm remove-feature">Remove</button>
                            </div>
                        </div>
                        <button type="button" id="add-feature" class="btn btn-secondary mb-5">Add Feature</button>

                        <h5>Extra Services</h5>
                        <div id="extra-services-container">
                            <div class="form-group extra-service-item">
                                <input type="text" name="extra_services[]" class="form-control mb-1" value="Driver"
                                    placeholder="Enter extra service">
                                <button type="button"
                                    class="btn btn-danger btn-sm remove-extra-service">Remove</button>
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
                                        id="body" value="Sedan" required>
                                </div>
                                <div class="form-group">
                                    <label for="engine_capacity">Engine Capacity</label>
                                    <input type="text" name="specifications[engine_capacity]" class="form-control"
                                        id="engine_capacity" value="1800 cc" required>
                                </div>
                                <div class="form-group">
                                    <label for="seats">Seats</label>
                                    <input type="text" name="specifications[seats]" class="form-control"
                                        id="seats" value="5" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tank_capacity">Tank Capacity</label>
                                    <input type="text" name="specifications[tank_capacity]" class="form-control"
                                        id="tank_capacity" value="50 liters" required>
                                </div>
                                <div class="form-group">
                                    <label for="transmission">Transmission</label>
                                    <input type="text" name="specifications[transmission]" class="form-control"
                                        id="transmission" value="Automatic" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Car</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-back-layout>
