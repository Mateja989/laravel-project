@extends('layouts.admin')

@section('content')
    <div class="row ">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Statistics of forum</h4>
                <div class="table-responsive">
                    <div class="form-group mb-5">
                        <form action="/admin/dashboard" method="get">
                            <label for="exampleInputName1">For specific date</label>
                            <input
                                type="date"
                                name="date"
                                class="form-control"
                                id="exampleInputName1"
                                placeholder="Name"
                                value="{{ request()->has('date') ? request()->get('date') : ''}}"
                            >
                            <button type="submit" class="btn btn-primary mb-2 mt-3">Search</button>
                        </form>
                    </div>
                    <table class="table table-bordered mt-2">
                        <thead>
                        <tr>
                            <th> Ip </th>
                            <th> Username </th>
                            <th> Role </th>
                            <th> Path </th>
                            <th> Action </th>
                            <th> Time </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($actions as $a)
                            <tr>
                                <td> {{ $a->ip }} </td>
                                <td> {{ $a->user_id == null ? 'N/A' : $a->user->username }} </td>
                                <td> {{ $a->user_id == null ? 'Unauthorized' : $a->user->role->name }} </td>
                                <td>
                                    /{{ Str::of($a->path)->limit(25) }}
                                </td>
                                <td> {{ ucwords($a->action) }} </td>
                                <td> {{ $a->created_at->diffForHumans() }} </td>
                            </tr>
                        @empty
                            <p>No action for specific date.</p>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $actions->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

