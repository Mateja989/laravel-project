@extends('layouts.client')

@section('title')
    <title>
        Register | Reddit
    </title>
@endsection
@section('content')
    <div class="sign-up-area ptb-100">
        <div class="container">
            <form action="/register" method="post" class="user-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <h2>Register new account</h2>
                    <div class="col-12">
                    </div>

                    <x-form.input name="first_name"/>
                    <x-form.input name="last_name"/>
                    <x-form.input name="email"/>
                    <x-form.input name="username"/>
                    <x-form.input name="password" type="password"/>
                    <x-form.input name="profile_picture" type="file"/>


                    <div class="col-12">
                        <button class="default-btn" type="submit">
                            Confirm
                        </button>
                    </div>

                    <div class="col-12">
                        <p class="create">Already on disilab?  <a href="/login">Log in</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
