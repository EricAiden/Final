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
                        Users List
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role_as }}</td>
                                    <td>
                                        @if($user->role_as == 1)
                                            <a href="{{ url('admin/users/' .$user->id.'/delete') }}" class="btn btn-sm btn-secondary disabled">Delete</a>
                                        @else
                                            <a href="{{ url('admin/users/' .$user->id.'/delete') }}" onclick="return confirm('Are you sure want to delete this?')" class="btn btn-sm btn-danger">Delete</a>
                                        @endif
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

