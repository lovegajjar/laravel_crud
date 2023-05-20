@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h1>Users</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ url('api/users/create') }}" class="btn btn-primary">Create User</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->contact_number }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ url('api/users/show', $user->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ url('api/users/edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ url('api/users/destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
