@extends('layouts.app')

@section('title', 'Search Products')

@section('content')


    <div class="py-5">

       <section class="section-box">
            <div class="serach-container">
                <div class="row-flex serach-result">
                    <h1>Search Result</h1>
                </div>
                <div class="serach-product cs-card">
                   <div class="row-flex">
                        @forelse ($searchProducts as $productItem)
                            <div class="cdt-product product-sale">
                                <div class="cdt-product__img">
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
                        @empty
                            <div class="col-md-12 p-2">
                                <h5>No Such Products Found</h5>
                            </div>
                        @endforelse



                   </div>

                    <div class="col-md-10 chuyenhuong">
                        {{ $searchProducts->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
       </section>
    </div>
@endsection
