@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('user.profile.edit')}}" class="btn btn-link">Edit Profile</a>
                    <a href="{{ route('user.posts.create')}}" class="btn btn-link">Create Post</a>
                    <a href="{{ route('user.posts.index')}}" class="btn btn-link">My Posts</a>
                    <a href="{{ route('user.search.index')}}" class="btn btn-link">Search</a>
                    <a href="{{ route('user.profile.followings', Auth::user()->id)}}" class="btn btn-link">Users I follow</a>
                    <a href="{{ route('user.profile.followers', Auth::user()->id)}}" class="btn btn-link">Users following me</a>







                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
