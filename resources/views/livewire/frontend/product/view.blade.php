<div>
    <div class="py-3 py-md-5 ">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-7 mt-3">
                    <div class="pr-left">
                        <div class="product-sale" wire:ignore>
                           <div class="product-sale__box">
                                <img src="https://images.fpt.shop/unsafe/fit-in/585x429/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/11/15/638040989659492605_frame-detail-585x428.png" alt="">
                            </div>
                            <div class="swiper-container">
                               <div class="swiper-wrapper">
                                   <div class="swiper-wrapper__pro">
                                        @if ($product->productImages)
                                            <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img">
                                        @else
                                            No Image Available
                                        @endif
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">${{ $product->price }}</span>
                            <span class="original-price">${{ $product->old_price }}</span>
                        </div>
                        <div>
                            @if ($product->productColors->count() > 0)
                                @if ($product->productColors)
                                    @foreach ($product->productColors as $colorItem)
                                        @if ($colorItem->color->code == '#17202A')
                                            <label class="colorSelectionLabel"
                                                style="background-color: #17202A; color: #fff"
                                                wire:click="colorSelected({{ $colorItem->id }})">
                                                {{ $colorItem->color->name }}
                                            </label>
                                        @elseif ($colorItem->color->code == '#0000FF')
                                            <label class="colorSelectionLabel"
                                                style="background-color: #0000FF; color: #fff"
                                                wire:click="colorSelected({{ $colorItem->id }})">
                                                {{ $colorItem->color->name }}
                                            </label>
                                        @else
                                            <label class="colorSelectionLabel"
                                                style="background-color: {{ $colorItem->color->code }}"
                                                wire:click="colorSelected({{ $colorItem->id }})">
                                                {{ $colorItem->color->name }}
                                            </label>
                                        @endif
                                    @endforeach
                                @endif


                                <div>

                                    @if ($this->productColorSelectedQuantity == 'outOfStock')
                                        <label class="btn-sm text-white py-1 px-1 mt-2 rounded-1 bg-danger">Out of
                                            Stock</label>
                                    @elseif ($this->productColorSelectedQuantity > 0)
                                        <label class="btn-sm text-white py-1 px-1 mt-2 rounded-1 bg-success">In
                                            Stock</label>
                                    @endif
                                </div>
                            @else
                                @if ($product->quantity)
                                    <label class="btn-sm text-white py-1 px-1 mt-2 rounded-1 bg-success">In
                                        Stock</label>
                                @else
                                    <label class="btn-sm text-white py-1 px-1 mt-2 rounded-1 bg-danger">Out of
                                        Stock</label>
                                @endif

                            @endif


                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click='decreasementQuantity'><i
                                        class="fa fa-minus"></i></span>
                                <input type="text" value="{{ $this->quantityCount }}" class="input-quantity"
                                    wire:model='quantityCount' />
                                <span class="btn btn1" wire:click='increasementQuantity'>
                                    <i class="fa fa-plus"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mt-2">
                             <button type="button" wire:click='addToCart({{ $product->id }})' class="btn btn-sm btn-main btn-primary btn-add-to-cart"> <i
                                    class="fa fa-shopping-cart"></i> Add To Cart</a>
                            </button>
                            <button type="button" wire:click="addToWishList({{ $product->id }})" class="btn btn-sm btn-main btn-primary btn-solid-primary">
                                <span wire:loading.remove wire:target="addToWishList">
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target="addToWishList">
                                    Adding
                                </span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Descriptions</h5>
                            <p>
                                <ul>
                                    <li>{!! $product->description !!}</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <div class="py-3 py-md-5 bg-white ">
        <div class="category-container">
            <div class="cate-box">
                <div class="cat-prd-oustanding">
                    <div class="title">
                        Related
                        @if ($category) {{ $category->name }}
                        @endif
                        Products</div>
                </div>

                <div class="cat-prd__product">
                    <div class="row-flex">
                        @forelse ($category->relatedProducts as $relatedProductItem)
                            <div class="cdt-product product-sale">
                                <div class="cdt-product__img">
                                    <div class="product-card-img">
                                        <div class="cdt-product__label">
                                            <span class="badge">New</span>
                                        </div>
                                        @if ($relatedProductItem->productImages->count() > 0)
                                            <a
                                                href="{{ url('/collections/' . $relatedProductItem->category->slug . '/' . $relatedProductItem->slug) }}">
                                                <img src="{{ asset($relatedProductItem->productImages[0]->image) }}"
                                                    alt="{{ $relatedProductItem->name }}">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="cdt-product__info">
                                    <p class="product-brand">{{ $relatedProductItem->brand }}</p>
                                    <h5 class="cdt-product__name">
                                        <a
                                            href="{{ url('/collections/' . $relatedProductItem->category->slug . '/' . $relatedProductItem->slug) }}">
                                            {{ $relatedProductItem->name }}
                                        </a>
                                    </h5>
                                    <div class="cdt-product__show-promo">
                                        <div class="price-category">${{ $relatedProductItem->price }}</div>
                                        <div class="strike-price">
                                            <strike>${{ $relatedProductItem->old_price }}</strike>
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

</div>


@push('scripts')
    <script>
        $(function() {

            // $("#exzoom").exzoom({
            //   "navWidth": 60,
            //   "navHeight": 60,
            //   "navItemNum": 5,
            //   "navItemMargin": 7,
            //   "navBorder": 1,
            //   "autoPlay": false,
            //   "autoPlayTimeout": 2000

            // });

        });
    </script>
@endpush
