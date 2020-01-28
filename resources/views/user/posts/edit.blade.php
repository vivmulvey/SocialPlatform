@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Edit Post
                </div>
                <img src="{{ asset('storage/files/' . $post->file) }}" alt="{{ $post->file }}">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{ route('user.posts.update', $post->id) }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" class="form-control" id="file" name="file" />
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title' , $post->title)}}" />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{old('description' , $post->description)}}" />
                        </div>
                        <a href="{{ route('user.posts.index')}}" class="btn btn-link">Cancel</a>
                        <button type="submit" class="btn btn-outline-success float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
