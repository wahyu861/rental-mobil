<section class="features my-80">
    <div class="container-fluid">
        <div class="row row-gap-3 justify-content-center">
            @foreach ($features as $feature)
                <div class="col-lg-4 col-md-6 justify-content-center">
                    <div class="info">
                        <h3 class="black-2 mb-32">{{ $feature->title }}</h3>
                        <p>{{ $feature->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
