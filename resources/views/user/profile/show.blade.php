@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Search
                </div>




                <div class="card-body">
                    <table id="table-posts" class="table table-hover">
                        <thead>
                            <th>Name</th>


                        </thead>
                        <tbody>



                            <td>{{ $user->name}}</td>
                        </tbody>
                    </table>
                    @if (count($posts) === 0)
                    <p>The user has no posts</p>
                    @else
                    <table id="table-posts" class="table table-hover">
                        <thead>
                            <th>Title</th>

                            <th>Description</th>


                        </thead>
                        <tbody>


                            @foreach ($posts as $post)

                            <tr data-id="{{ $post->id}}">


                                <td>{{ $post->file}}</td>

                                <td>{{ $post->title}}</td>

                                <td>{{ $post->description}}</td>





                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @endif


                    <a href="{{ route('user.follow', $user->id) }}" class="btn btn-link">Follow User</a>
                    <a href="{{ route('user.unfollow', $user->id)}}" class="btn btn-link">Unfollow User</a>



                </div>
            </div>
        </div>
    </div>
</div>

@endsection
