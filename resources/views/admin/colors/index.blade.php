@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>
                        Colors List
                        <a href="{{ url('admin/colors/create') }}"
                            class="btn btn-primary btn-sm text-white float-end">
                                Add Colors
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Color Name</th>
                                <th>Color Code</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($colors as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->status ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/colors/' .$item->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ url('admin/colors/' .$item->id.'/delete') }}" onclick="return confirm('Are you sure want to delete this?')" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Colors Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
