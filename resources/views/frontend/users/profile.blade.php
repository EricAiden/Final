@extends('layouts.app')

@section('title', 'User Profile')

@section('content')


    <div class="py-5">
        <div class="container justify-content-center">
            <div class="row ">
                <div class="col-md-10 ">

                    @if (session('message'))
                       <p class="alert alert-success">{{ session('message') }}</p>
                    @endif

                    <h4>User Profile
                        <a href="{{ url('change-password') }}" class="btn btn-warning float-end">Change Password ?</a>
                    </h4>
                    <div class="underline mb-4"></div>
                </div>

                <div class="col-md-10">
                    <div class="card-shadow">
                        <div class="card-body">
                            <form action="{{ url('profile') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Username</label>
                                            <input type="text" name="username" value="{{ Auth::user()->name }}" class="form-control input-form">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Email Address</label>
                                            <input type="email" readonly value="{{ Auth::user()->email }}" class="form-control input-form">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" value="" class="form-control input-form">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        {{-- <div class="mb-3">
                                            <label>Zip/Pin Code</label>
                                            <input type="text" name="pin_code" value="" class="form-control input-form">
                                        </div> --}}
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control input-form" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-add-to-cart">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
