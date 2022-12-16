@extends('layouts.admin')

@section('title', 'My Orders Details')

@section('content')

    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>My Orders Details</h3>
                </div>
                <div class="card-body">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"></i> My Order Details
                            <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm float-end mx-1">Back</a>
                            <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-primary btn-sm float-end mx-1">Download invoice</a>
                            <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-warning btn-sm float-end mx-1">View invoice</a>
                            <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}"  class="btn btn-info btn-sm float-end mx-1">Send invoice Via Mail</a>
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <hr>
                                <h6>Order ID: {{ $order->id }}</h6>
                                <h6>Tracking ID/No: {{ $order->tracking_no }}</h6>
                                <h6>Order Created Date: {{ $order->created_at->format('H:i:s d-m-Y') }}</h6>
                                <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    Order Status Message: <span class="text-uppercase">{{ $order->status_message }} </span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>User Details</h5>
                                <hr>
                                <h6>Full name: {{ $order->fullname }}</h6>
                                <h6>Email ID: {{ $order->email }}</h6>
                                <h6>Phone: {{ $order->phonenumber }}</h6>
                                <h6>Address: {{ $order->address }}</h6>
                                <h6>Pin code (zip code): {{ $order->pincode }}</h6>
                            </div>
                        </div>

                        <br/>
                        <h5>Order Items</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>Item ID</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($order->orderItems as $orderItem)
                                        <tr>
                                            <td width="10%">{{ $orderItem->id }}</td>
                                            <td width="10%">
                                                @if ($orderItem->product->productImages)
                                                    <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                    alt="" style="width: 45px; height: 45px">
                                                @else
                                                    <img src="" alt="" style="width: 45px; height: 45px">
                                                @endif
                                            </td>
                                            <td>
                                                {{ $orderItem->product->name }}
                                                @if ($orderItem->productColor)
                                                    @if ($orderItem->productColor->color)
                                                        <span>- color: {{ $orderItem->productColor->color->name }}</span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td width="10%">${{ $orderItem->price }}</td>
                                            <td width="10%">{{ $orderItem->quantity }}</td>
                                            <td width="10%" class="fw-bold">${{ $orderItem->quantity * $orderItem->price }}</td>
                                            @php
                                                $totalPrice += $orderItem->quantity * $orderItem->price;
                                            @endphp
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold">Total Amout:</td>
                                        <td colspan="1" class="fw-bold">${{ $totalPrice }}</td>
                                    </tr>
                                </tbody>
                            </table>

                           

                        </div>

                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body">
                    <h4>Order Process (Order status Updates)</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <label>Update your order status</label>
                                <div class="input-group mt-2">
                                    <select name="order_status" class="form-select">
                                        <option value="">Select order status</option>
                                        <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }} >In progress</option>
                                        <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }} >Completed</option>
                                        <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }} >Pending</option>
                                        <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':'' }} >Cancelled</option>
                                        <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }} >Out for delivery</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <br/>
                            <h4 class="mt-3">Current order status: <span class="text-uppercase">
                                {{ $order->status_message }}
                                </span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
