@extends('layouts.app')

@section('title', 'Featured Products')

@section('content')
    <div class="py-5">
        <div class="category-container">
            <div class="cate-box">
                <div class="cat-prd-oustanding">
                    <div class="title">New Arrivals</div>
                    <div class="cat-prd-tabs">
                        <a href="{{ ('collections') }}">View more</a>
                    </div>
                </div>

                <div class="cat-prd__product">
                    <div class="row-flex">
                        @forelse ($featuredProducts as $productItem)
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
                        @empty
                                <div class="col-md-12 p-2">
                                    <h5>No Products Available</h5>
                                </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
