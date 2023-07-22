@extends('layouts.admin')

@section('content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <x-table_title>
                        Users
                    </x-table_title>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th> Username </th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Member since </th>
                                <th> Delete </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $u)
                                <tr>
                                    <td>
                                        <img src="{{ asset($u->avatar) }}" alt="image" />
                                        <span class="pl-2">{{ $u->username }}</span>
                                    </td>
                                    <td> {{ $u->first_name. " " .$u->last_name }}</td>
                                    <td> {{ $u->email }} </td>
                                    <td> {{ $u->created_at->diffForHumans() }} </td>
                                    <td>
                                        <div class="badge badge-outline-success">Delete</div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
