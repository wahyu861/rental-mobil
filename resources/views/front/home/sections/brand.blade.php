<div class="brand-section my-40 py-48">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="brand-slider">
                    @foreach ($categories as $category)
                        <div class="brand-block">
                            <img src="{{ asset('storage/' . $category->image_logo) }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
