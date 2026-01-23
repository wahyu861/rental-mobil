<section class="vehicles-2 py-80">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 text-center">
                <img src={{ asset('storage/' . $about->image) }}" alt="car">
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="txt">
                    <h2 class="mb-24">{{ $about->title ?? 'Data Title' }}</h2>
                    <p class="mb-24">{{ $about->description ?? 'Konten yang ditampilkan jika data kosong' }}</p>
                </div>
                <a href="{{ route('rental') }}" class="cus-btn">
                    <span class="btn-text">
                        View Our Cars
                    </span>
                    <span>
                        View Our Cars
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>
