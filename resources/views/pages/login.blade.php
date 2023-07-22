@extends('layouts.client')

@section('title')
    <title>
        Login | Reddit
    </title>
@endsection
@section('content')
    <div class="login-area ptb-100">
        <div class="container">
            <form class="user-form" method="POST" action="/login">
                @csrf
                <div class="row">
                    <h2>Log in</h2>
                    <div class="col-12">
                        <span class="or"></span>
                    </div>

                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    <x-form.input name="username"/>
                    <x-form.input name="password" type="password"/>


                    <div class="col-12">
                        <button class="default-btn" type="submit">
                            Log In
                        </button>
                    </div>
                    @error('failed')
                        <div class="alert alert-danger" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror

                    <div class="col-12">
                        <p class="create">Don't have an account? <a href="/register">Sign Up</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
