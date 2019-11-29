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

                    You are logged in as an ordianry user!



{{--
                        <h2 class="text-center">My Posts</h2>
                        <ul class="list-group py-3 mb-3">
                            @forelse($posts as $post)
                                <li class="list-group-item my-2">
                                    <h5>{{ $post->title }}</h5>
                                    <p>{{ Str::limit($post->body,10) }}</p>
                                    <small class="float-right">{{ $post->created_at->diffForHumans() }}</small>
                                    <a href="{{route('posts.show',$post->id)}}">Read More</a>
                                </li>
                            @empty
                                <h4 class="text-center">You have no posts!</h4>
                            @endforelse
                        </ul>
                        <div class="d-flex justify-content-center">
                            {{ $posts->links() }}
                        </div> --}}




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
