@extends('layouts.admin')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit {{ $topic->name }} topic</h4>
                <form class="forms-sample" method="POST" action="/admin/topics/{{ $topic->slug }}/edit">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label for="exampleInputName1">Topic name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            id="exampleInputName1"
                            placeholder="Name"
                            value="{{ $topic->name }}"
                        >
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Topic slug</label>
                        <input
                            type="text"
                            name="slug"
                            class="form-control"
                            id="exampleInputEmail3"
                            placeholder="Slug"
                            value="{{ $topic->slug }}"
                        >
                        @error('slug')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Topic icon</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    @if(session('success'))
                        <div class="form-group mt-3">
                            <p class="alert alert-success">{{ session('success') }}</p>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

