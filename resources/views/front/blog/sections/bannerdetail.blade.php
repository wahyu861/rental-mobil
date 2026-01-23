<section class="blog-detail-banner">
    <img src="{{ asset('storage/' . $blog->image_cover) }}" alt="{{ $blog->title }}">
    <div class="detail">
        <h2>{{ $blog->title }}</h2>
        <div class="txts">
            <img src="{{ asset('front/assets/media/hero/Ellipse-6.png') }}" alt="logo">
            <p>By: {{ $blog->author }}</p>
            <img src="{{ asset('front/assets/media/hero/uil-calendar-alt.png') }}" alt="logo">
            <p>{{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}</p>
        </div>
    </div>
</section>
