@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    My Posts
                  </div>


                <div class="card-body">
                    @if (count($posts) === 0)
                    <p>You have no posts</p>
                    @else
                    <table id="table-posts" class="table table-hover">
                        <thead>
                            <th>Title</th>

                            <th>Description</th>


                        </thead>
                        <tbody>


                            @foreach ($posts as $post)

                             <tr data-id="{{ $post->id}}">



                              <td>{{ $post->title}}</td>

                              <td>{{ $post->description}}</td>




                                <td>
                                    <a href="{{ route('user.posts.show' , $post->id) }}" class="btn btn-primary ">View</a>

                                    
                                </td>
                            </tr>






                              @endforeach
                        </tbody>
                    </table>

                    @endif

                    <a href="{{ route('user.home')}}" class="btn btn-link">Back</a>

                </div>
            </div>
        </div>
    </div>
  </div>

@endsection
