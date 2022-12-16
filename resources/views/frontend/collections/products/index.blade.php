@extends('layouts.app')

@section('title')
    {{ $category->meta_title }}
@endsection

@section('meta_keyword')
    {{ $category->meta_keyword }}
@endsection


@section('meta_description')
    {{ $category->meta_description }}
@endsection

@section('content')
    <div class="py-3 py-md-5 bg-light" style="overflow-x: hidden">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4" style="margin-left: 18px">Our Products</h4>
                </div>
                <livewire:frontend.product.index :products="$products" :category="$category" />
            </div>
        </div>
    </div>
@endsection
