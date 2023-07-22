@extends('layouts.admin')

@section('content')
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <x-table_title>
                    Questions
                </x-table_title>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> User information </th>
                            <th> Question title </th>
                            <th> Topic </th>
                            <th> Posted date </th>
                            <th> Status </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($questions as $q)
                                <td>
                                    <img src="{{ asset($q->user->avatar) }}" alt="image" />
                                    <span class="pl-2">{{ $q->user->username }}</span>
                                </td>
                                <td> {{ Str::of($q->title)->limit(25) }}</td>
                                <td> {{ $q->topic->name }} </td>
                                <td> {{ $q->created_at->diffForHumans() }} </td>
                                <td>
                                    <div class="badge badge-outline-success">Approved</div>
                                </td>
                        </tr>
                        </tbody>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
