a<div class="blogs my-80">
    <div class="container-fluid">
        <div class="d-lg-flex justify-content-between mb-24">
            <ul class="nav unstyled nav-pills gap-12 d-flex mb-3" id="pills-tab" role="tablist">
                @foreach ($categories as $index => $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $index == 0 ? 'active' : '' }}" id="pills-{{ $category->id }}-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-{{ $category->id }}" type="button"
                            role="tab" aria-c aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                            {{ $category->name }}
                        </button>
                    </li>
                @endforeach
            </ul>
            <div class="Search-field">
                <form action="{{ url('blogs') }}" method="GET">
                    <input type="text" name="search" class="search-bar" placeholder="Search Now"
                        value="{{ request('search') }}">
                </form>
            </div>

        </div>

        <div class="tab-content" id="pills-tabContent">
            @foreach ($categories as $index => $category)
                <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="pills-{{ $category->id }}"
                    role="tabpanel" aria-labelledby="pills-{{ $category->id }}-tab">

                    <div class="row">
                        @if (isset($blogsByCategory[$category->id]) && count($blogsByCategory[$category->id]) > 0)
                            @foreach ($blogsByCategory[$category->id] as $blog)
                                <div class="col-lg-4 col-md-4">
                                    <div class="blog-card">
                                        <div class="pic mb-24">
                                            <a href="{{ url('blogs/' . $blog->slug) }}">
                                                <img src="{{ asset('storage/' . $blog->image_cover) }}"
                                                    alt="{{ $blog->title }}">
                                            </a>
                                        </div>
                                        <div class="text-block">
                                            <p class="mb-12">{{ $blog->created_at->format('F j, Y') }}</p>
                                            <a href="{{ url('blogs/' . $blog->slug) }}"
                                                class="title mb-16">{{ $blog->title }}</a>
                                            <p class="mb-24">{!! \Illuminate\Support\Str::limit(strip_tags($blog->content), 100) !!}</p>

                                            <a href="{{ url('blogs/' . $blog->slug) }}" class="cus-btn-2">
                                                <span class="btn-text">
                                                    See Details
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M17.9199 6.62C17.8185 ..." fill="#2D74BA" />
                                                    </svg>
                                                </span>
                                                <span>
                                                    See Details
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                        height="24" viewBox="0 0 25 24" fill="none">
                                                        <path d="M18.0098 6.62C17.9083 ..." />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <p class="text-center">No blogs available in this category.</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination mt-48">
            <ul id="border-pagination">
                {{-- Previous Page Link --}}
                <li>
                    <a href="{{ $blogsByCategory[$currentCategoryId]->previousPageUrl() }}"
                        @if (!$blogsByCategory[$currentCategoryId]->onFirstPage()) class="enabled" @endif>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="29" viewBox="0 0 15 29"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.6122 1.2927L0.465342 13.439C-0.120283 14.0246 -0.120283 14.9746 0.465342 15.5602L12.6116 27.7071C13.1972 28.2927 14.1472 28.2927 14.7328 27.7071C15.0532 27.3868 15.0532 26.8674 14.7329 26.5471L3.74659 15.5602C3.16097 14.9746 3.16097 14.0246 3.74659 13.439L14.7335 2.45269C15.0538 2.13237 15.0538 1.61303 14.7335 1.2927C14.1478 0.707079 13.1978 0.707079 12.6122 1.2927Z"
                                fill="#2D74BA" />
                        </svg>
                    </a>
                </li>

                {{-- Pagination Numbers --}}
                @foreach ($blogsByCategory[$currentCategoryId]->getUrlRange(1, $blogsByCategory[$currentCategoryId]->lastPage()) as $page => $url)
                    <li>
                        <a href="{{ $url }}"
                            @if ($page == $blogsByCategory[$currentCategoryId]->currentPage()) class="active" @endif>{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a>
                    </li>
                @endforeach

                {{-- Next Page Link --}}
                <li>
                    <a href="{{ $blogsByCategory[$currentCategoryId]->nextPageUrl() }}"
                        @if ($blogsByCategory[$currentCategoryId]->hasMorePages()) class="enabled" @endif>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="29" viewBox="0 0 15 29"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.38778 1.2927L14.5347 13.439C15.1203 14.0246 15.1203 14.9746 14.5347 15.5602L2.38841 27.7071C1.80278 28.2927 0.852784 28.2927 0.267159 27.7071C-0.0531683 27.3868 -0.053175 26.8674 0.267144 26.5471L11.2534 15.5602C11.839 14.9746 11.839 14.0246 11.2534 13.439L0.266548 2.45269C-0.0537834 2.13237 -0.0537891 1.61303 0.266534 1.2927C0.852159 0.707079 1.80216 0.707079 2.38778 1.2927Z"
                                fill="#ECF3F9" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>
