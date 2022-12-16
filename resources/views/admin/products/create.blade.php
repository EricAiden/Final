@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Add Product
                        <a href="{{ url('admin/products') }}"
                            class="btn btn-danger btn-sm text-white float-end">
                               Back
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                    Home
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seo-tag" data-bs-toggle="tab" data-bs-target="#seo-tag-pane" type="button" role="tab" aria-controls="seo-tag-pane" aria-selected="false">
                                    SEO Tags
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                    Details
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                    Product Image
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                                    Product Color
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane border p-3 fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" class="form-control" />
                                    @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Slug</label>
                                    <input type="text" name="slug" class="form-control" />
                                    @error('slug')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="">Select Brand</label>
                                    <select name="brand" id="" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="">Small Description (500 Words)</label>
                                    <textarea name="small_description" class="form-control" rows="4"></textarea>
                                    @error('small_description')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" rows="4"></textarea>
                                    @error('description')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane border p-3 fade"
                                id="seo-tag-pane"
                                role="tabpanel"
                                aria-labelledby="seo-tag"
                                tabindex="0">
                                    <div class="mb-3">
                                        <label for="">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" />
                                        @error('meta_title')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="4"></textarea>
                                         @error('meta_description')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Meta keyword</label>
                                        <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                                        @error('meta_keyword')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                            </div>
                            <div class="tab-pane border p-3 fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Price</label>
                                            <input type="text" name="price" class="form-control" />
                                            @error('price')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Old Price</label>
                                            <input type="text" name="old_price" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Quantity</label>
                                            <input type="number" name="quantity" class="form-control" />
                                            @error('quantity')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Trending</label>
                                            <input type="checkbox" name="trending" style="width: 50px; height: ;50px"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Featured</label>
                                            <input type="checkbox" name="featured" style="width: 50px; height: ;50px"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" style="width: 50px; height: ;50px"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane border p-3 fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Upload Product Images</label>
                                    <input type="file" multiple name="image[]" class="form-control" />
                                </div>
                            </div>

                            <div class="tab-pane border p-3 fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Select Color</label>
                                    <hr/>
                                    <div class="row">
                                        @forelse ($colors as $coloritem)
                                            <div class="col-md-3">
                                               <div class="p-2 border">
                                                    <input type="checkbox" value="{{ $coloritem->id }}" multiple name="colors[{{ $coloritem->id }}]" />
                                                    {{ $coloritem->name }}
                                                    <br/>
                                                    Quantity: <input type="number" name="colorquantity[{{ $coloritem->id }}]" style="width: 70px; border: 1px solid">
                                               </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h1>No Colors Found</h1>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
