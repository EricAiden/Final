@extends('layouts.app')

@section('title', 'All Categories')

@section('content')

    <div class="py-3 py-md-5 bg-light">
        <section class="section-box">
            <div class="row category-container">
                <div class="cate-box">
                    <div class="col-md-12">
                        <h4 class="mb-4 title-cat">Our Categories</h4>
                    </div>
                    <div class="row-flex">
                        @forelse ($categories as $categoryItem)
                            <div class="col-6 col-md-3">
                                <div class="category-card category-card-wrap">
                                    <a href="{{ url('/collections/' . $categoryItem->slug) }}">
                                        <div class="category-card-img">
                                             @if ($categoryItem->image)
                                                <img src="{{ asset("$categoryItem->image") }}" class="w-100" alt="Laptop">
                                            @else
                                                <h5>No Image Available</h5>
                                            @endif
                                        </div>
                                        <div class="category-card-body">
                                            <h5 class="wrap-category-name">{{ $categoryItem->name }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <h5>No Category Available</h5>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
