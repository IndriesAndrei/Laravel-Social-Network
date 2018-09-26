@extends('layouts.master')

@section('title')
    Laravel Social Network
@endsection 

@section('content')
    Welcome to my App!

    <hr>
    @include('includes.messages')
    @include('includes.errors')
    <div class="row">
        
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{ route('signup') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Your E-mail</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ Request::old('email') }}">
                </div>

                <div class="form-group">
                    <label for="first_name">Your First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}">
                </div>

                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
               
            </form>
        </div>
       
    
        <div class="col-md-6">
            <h3>Login</h3>
            <form action="{{ route('signin') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Your E-mail</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ Request::old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Your E-mail</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection