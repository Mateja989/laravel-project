@extends('layouts.client')

@section('title')
    <title>
        Edit | Reddit
    </title>
@endsection
@section('content')
    <div class="sign-up-area ptb-100">
        <div class="container">
            <form action="/profile/{{ $user->username }}/edit" method="post" class="user-form" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row">
                    <h2>Edit {{ $user->username."`s profile" }}</h2>
                    <div class="col-12">
                    </div>

                    <x-form.edit_input name="first_name" :value="old('first_name',$user->first_name)"/>
                    <x-form.edit_input name="last_name" :value="old('last_name',$user->last_name)"/>
                    <x-form.edit_input name="email" :value="old('email',$user->email)"/>
                    <x-form.edit_input name="username" :value="old('username',$user->username)"/>
                    <x-form.edit_input name="password" type="password" :value="old('password',$user->password)"/>
                    <x-form.edit_input name="profile_picture" type="file" :value="old('profile_picture',$user->profile_picture)"/>

                    <div class="col-12">
                        <button class="default-btn" type="submit">
                            Save changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

