@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach ($sliders as $key => $sliderItem)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    @if ($sliderItem->image)
                        <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="...">
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                {!! $sliderItem->title !!}
                            </h1>
                            <p>
                                {!! $sliderItem->description !!}
                            </p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get now
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div style="margin: 45px 0">
       <section class="section-box">
            <div class="category-container">
                <div class="cate-box">
                    <div class="cat-prd-oustanding">
                        <div class="title">Trending Products</div>
                        <div class="underline mx-4"></div>
                    </div>
                    @if ($trendingProducts)
                    <div class="cat-prd__product">
                        {{-- <div class="owl-carousel owl-theme four-carousel"> --}}
                            <div class="row-flex">
                                @foreach($trendingProducts as $productItem)
                                    <div class="cdt-product product-sale">
                                        <div class="cdt-product__img">
                                            <div class="cdt-product__label">
                                                <span class="badge">New</span>
                                            </div>

                                            @if ($productItem->productImages->count() > 0)
                                                @if($productItem->trending == 1)
                                                    <a
                                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                        <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                            alt="{{ $productItem->name }}">
                                                    </a>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="cdt-product__info">
                                            {{-- <p class="product-brand">{{ $productItem->brand }}</p> --}}
                                            <h5 class="cdt-product__name">
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>

                                            <div class="cdt-product__show-promo">
                                                <div class="price-category" >
                                                    ${{ $productItem->price }}
                                                </div>
                                                <div class="strike-price">
                                                    <strike>${{ $productItem->old_price }}</strike>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="cd-product__btn">
                                            <a href="" class="btn btn-sm btn-main btn-primary btn-add-to-cart">
                                                <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="svg-icon icon-add-to-cart">
                                                    <g><g>
                                                    <polyline fill="none" points=".5 .5 2.7 .5 5.2 11 12.4 11 14.5 3.5 3.7 3.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                                                    </polyline>
                                                    <circle cx="6" cy="13.5" r="1" stroke="none"></circle>
                                                    <circle cx="11.5" cy="13.5" r="1" stroke="none"></circle>
                                                    </g><line fill="none" stroke-linecap="round" stroke-miterlimit="10" x1="7.5" x2="10.5" y1="7" y2="7"></line>
                                                    <line fill="none" stroke-linecap="round" stroke-miterlimit="10" x1="9" x2="9" y1="8.5" y2="5.5"></line></g>
                                                </svg>
                                                <span>Add to cart</span>
                                            </a>
                                            <a href="" class="btn btn-sm btn-main btn-primary btn-solid-primary">Mua ngay</a>
                                        </div> --}}
                                    </div>
                                @endforeach
                            </div>
                        {{-- </div> --}}
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h5>No Products Available</h5>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
       </section>
    </div>

    <div style="margin: 15px">
        <div class="section-box">
            <div class="category-container">
                <div class="cate-box">
                    <div class="cat-prd-oustanding">
                        <div class="title">New Arrivals</div>
                        <div class="cat-prd-tabs">
                            <a href="{{ ('new-arrivals') }}">View more</a>
                        </div>
                    </div>
                    @if ($newArrivalsProducts)
                        <div class="cat-prd__product">
                            <div class="row-flex">
                                @foreach($newArrivalsProducts as $productItem)
                                    <div class="cdt-product product-sale">
                                        <div class="cdt-product__img">
                                            <div class="product-card-img">
                                                <div class="cdt-product__label">
                                                    <span class="badge">New</span>
                                                </div>
                                                @if ($productItem->productImages->count() > 0)
                                                    <a
                                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                        <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                            alt="{{ $productItem->name }}">
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="cdt-product__info">
                                            {{-- <p class="product-brand">{{ $productItem->brand }}</p> --}}
                                            <h5 class="cdt-product__name">
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div class="cdt-product__show-promo">
                                                <div class="price-category">${{ $productItem->price }}</div>
                                                <div class="strike-price">
                                                    <strike>${{ $productItem->old_price }}</strike>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h5>No New Arrivals Available</h5>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div style="margin: 15px">
        <div class="section-box">
            <div class="category-container">
                <div class="cate-box">
                    <div class="cat-prd-oustanding">
                        <div class="title">Featured Products</div>
                        <div class="cat-prd-tabs">
                            <a href="{{ ('featured-products') }}" >View more</a>
                        </div>
                    </div>

                    @if ($featuredProducts)
                        <div class="cat-prd__product">
                            <div class="row-flex">
                                @foreach($featuredProducts as $productItem)
                                    <div class="cdt-product product-sale">
                                        <div class="cdt-product__img">
                                            <div class="product-card-img">
                                                <div class="cdt-product__label">
                                                    <span class="badge">New</span>
                                                </div>
                                                @if ($productItem->productImages->count() > 0)
                                                    <a
                                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                        <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                            alt="{{ $productItem->name }}">
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="cdt-product__info">
                                            <h5 class="cdt-product__name">
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div class="cdt-product__show-promo">
                                                <div class="price-category">${{ $productItem->price }}</div>
                                                <div class="strike-price">
                                                    <strike>${{ $productItem->old_price }}</strike>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="p-2">
                                <h5>No Featured Products Available</h5>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        $('.four-carousel').owlCarousel({
        loop:true,
        margin:10,
        dots:true,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
})
    </script>
@endsection
