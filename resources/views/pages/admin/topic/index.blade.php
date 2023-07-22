@extends('layouts.admin')

@section('content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <x-table_title>
                        Topics
                    </x-table_title>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th> Topic name </th>
                                <th> Question per topic </th>
                                <th> Created date </th>
                                <th> Edit </th>
                                <th> Delete </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($topics as $t)
                                <tr>
                                    <td>
                                        <img src="{{ asset($t->icon) }}" alt="image" />
                                        <span class="pl-2">{{ $t->name }}</span>
                                    </td>
                                    <td> {{ $t->questions->count(). " ". "questions" }}</td>
                                    <td> {{ $t->created_at->diffForHumans() }} </td>
                                    <td>
                                        <div class="badge badge-outline-warning">
                                            <a
                                                href="/admin/topics/{{ $t->slug }}/edit"
                                                style="color:#ffab00"
                                            >
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge badge-outline-danger">
                                        <form method="POST" action="/admin/topics/{{ $t->slug }}">
                                            @csrf
                                            @method('delete')
                                                <button style="background:none;color:red;">
                                                    Delete
                                                </button>
                                        </form>
                                        </div>
                                    </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if(session('success'))
                            <div class="form-group mt-3">
                                <p class="alert alert-success">{{ session('success') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
