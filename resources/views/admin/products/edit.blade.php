@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <h4 class="alert alert-success">{{ session('message') }}</h4>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Product
                        <a href="{{ url('admin/products') }}"
                            class="btn btn-danger btn-sm text-white float-end">
                               Back
                        </a>
                    </h3>
                </div>
                <div class="card-body">

                    <form action="{{ url('admin/products/' .$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

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
                                    Product Colors
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane border p-3 fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Select Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        {{-- <option value="">Select Category</option> --}}
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" value="{{ $product->name }}" name="name" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Slug</label>
                                    <input type="text" value="{{ $product->slug }}" name="slug" class="form-control" />
                                </div>

                                <div class="mb-3">
                                    <label for="">Select Brand</label>
                                    <select name="brand" id="" class="form-control">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="">Small Description (500 Words)</label>
                                    <textarea name="small_description" class="form-control" rows="4">{{ $product->small_description}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" rows="4">{{ $product->description}}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane border p-3 fade"
                                id="seo-tag-pane"
                                role="tabpanel"
                                aria-labelledby="seo-tag"
                                tabindex="0">
                                    <div class="mb-3">
                                        <label for="">Meta Title</label>
                                        <input type="text" value="{{ $product->meta_title }}" name="meta_title" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="4">{{ $product->meta_description}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Meta keyword</label>
                                        <textarea name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword}}</textarea>
                                    </div>
                            </div>
                            <div class="tab-pane border p-3 fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Price</label>
                                            <input type="text" value="{{ $product->price }}" name="price" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Old Price</label>
                                            <input type="text" value="{{ $product->old_price }}" name="old_price" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Quantity</label>
                                            <input type="number" value="{{ $product->quantity }}" name="quantity" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Trending</label>
                                            <input type="checkbox" {{ $product->trending == '1' ? 'checked':'' }} name="trending" style="width: 50px; height: ;50px"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Featured</label>
                                            <input type="checkbox" {{ $product->featured == '1' ? 'checked':'' }} name="featured" style="width: 50px; height: ;50px"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" {{ $product->status == '1' ? 'checked':'' }} name="status" style="width: 50px; height: ;50px"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane border p-3 fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Upload Product Images</label>
                                    <input type="file" multiple name="image[]" class="form-control" />
                                </div>
                                <div>
                                    @if ($product->productImages)
                                        <div class="row">
                                            @foreach($product->productImages as $image)
                                                <div class="col-md-2">
                                                    <img src="{{ asset($image->image) }}" class="me-4 bordered" alt="Img"
                                                        style="width: 80px; height: 80px;" alt="Img" />
                                                    <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block">Remove</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <h5>NO Images Added</h5>

                                    @endif
                                </div>

                            </div>
                            <div class="tab-pane border p-3 fade" id="color-tab-pane" role="tabpanel" tabindex="0">
                                <div class="mb-3">
                                    <div class="row">
                                        @forelse ($colors as $coloritem)
                                            <div class="col-md-3">
                                               <div class="p-2 border">
                                                    Color: <input type="checkbox" value="{{ $coloritem->id }}" multiple name="colors[{{ $coloritem->id }}]" />
                                                    {{ $coloritem->name }}
                                                    <br/>
                                                    Quantity: <input type="number" name="colorquantity[{{ $coloritem->id }}]" style="width: 70px; border: 1px solid">
                                               </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h3>No Colors Found</h3>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>

                                <div class="table-reponsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <th>Color Name</th>
                                            <th>Quantity</th>
                                            <th>Delete</th>
                                        </thead>

                                        <tbody>
                                            @foreach ($product->productColors as $productColor)
                                                <tr class="prod-color-tr">
                                                    <td>
                                                        @if ($productColor->color)
                                                            {{ $productColor->color->name }}
                                                        @else
                                                            <h3>No Color Found</h3>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="input-group mb-3" style="width: 150px">
                                                            <input type="text" value="{{ $productColor->quantity }}" class="productColorQuantity form-control forn-control-sm" />
                                                            <button type="button" value="{{ $productColor->id }}" class="updateProductColorBtn btn btn-sm btn-primary text-white">Update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{ $productColor->id }}" class="deleteProductColorBtn btn btn-sm btn-danger text-white">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="p-2 float-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascripts')

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.updateProductColorBtn', function() {
                var product_id ="{{ $product->id }}";
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
                // alert(prod_color_id);

                if(qty <= 0) {
                    alert('Quantity is required');
                    return false;
                }

                var data = {
                    'product_id' : product_id,
                    'qyt': qty,
                };

                $.ajax({
                    type: 'POST',
                    url: "/admin/product-color/"+prod_color_id,
                    data: data,
                    success: function (reponse) {
                        alert(reponse.message);
                    }
                });
            });

            $(document).on('click', '.deleteProductColorBtn', function() {
                var prod_color_id = $(this).val();
                var thisClick = $(this);

                $.ajax({
                    type: 'GET',
                    url: "/admin/product-color/"+prod_color_id+"/delete",
                    success: function (reponse) {
                        thisClick.closest('.prod-color-tr').remove();
                        alert(reponse.message);
                    }
                })
            });
        });
    </script>

@endsection
