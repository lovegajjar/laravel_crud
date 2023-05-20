@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Details</h1>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>Name: {{ $user->name }}</h4>
                <p>Email: {{ $user->email }}</p>
                <p>Contact Number: {{ $user->contact_number }}</p>
                <p>Gender: {{ $user->gender }}</p>
                <p>State: {{ $user->state->name }}</p>
                <p>City: {{ $user->city->name }}</p>
                <p>Profile Picture:</p>
                <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="Profile Picture" class="img-thumbnail">
                <p>Hobbies:</p>
                <ul>
                    @foreach($user->hobbies as $hobby)
                        <li>{{ $hobby->name }}</li>
                    @endforeach
                </ul>
                <a href="{{ url('api/users') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
