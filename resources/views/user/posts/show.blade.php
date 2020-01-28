@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Post:
                </div>


                <div class="card-body">

                    <table class="table table-hover">
                        <tbody>
                            <img src="{{ asset('storage/files/' . $post->file) }}" alt="{{ $post->file }}">
                                <td>Title</td>
                                <td>{{ $post->title }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{ $post->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <div>
                        <h5>Add comment</h5>
                        <form method="post" action="{{ route('user.comments.store'   ) }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="description"></textarea>
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Add Comment" />
                            </div>
                    </div> --}}
                    <br/>
                    <a href="{{route('user.posts.index')}}" class="btn btn-default ">Back</a>
                    <a href="{{route('user.posts.edit' , $post->id)}}" class="btn btn-default ">Edit</a>


                    <div class="form-group">
                    <form style="display:inline-block" method="POST" action="">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="">
                        <button type="submit" class="form-control btn btn-danger ">Delete</a>
                    </form>
                  </div>



                </div>
            </div>
            @endsection
        </div>
    </div>
