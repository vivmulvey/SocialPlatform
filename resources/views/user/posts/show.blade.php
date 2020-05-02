@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">

                    <table class="table table-hover">
                        <tbody>
                          <img src="{{ Storage::url('/storage/files/'. $post->file) }}" alt="{{ $post->file }}">
                            <!-- <img src="{{ asset('storage/files/' . $post->file) }}" alt="{{ $post->file }}"> -->

                            <tr>
                                <th>Description</th>
                                <td>{{ $post->description }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="card">
                        <div class="card-header">
                            Comments:
                        </div>
                        <div class="card-body">
                            @if(count($comments) == 0)
                            <p> There are no comments</p>
                            @else
                            <table class='table'>
                                <thead>



                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                    <tr>
                                      <th>{{$comment->user->name}}</th>
                                        <td>{{ $comment->body }}</td>
                                        <td>

                                            <form style="display:inline-block" method="POST" action="{{ route('user.comments.destroy', ['id' => $post->id,'cid'=> $comment->id]) }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="form-control btn btn-danger">Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @endif
                        </div>
                    </div>
<br/>
                    <div>
                        <h5>Add comment</h5>
                        <form method="POST" action="{{ route('user.comments.store', $post->id) }}">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <textarea class="form-control" name="body" value="{{ old("body") }}"></textarea>
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Add Comment" />
                            </div>
                    </div>
                    </form>
                    <br />

                    <a href="{{route('user.posts.index')}}" class="btn btn-default ">Back</a>
                    <a href="{{route('user.posts.edit' , $post->id)}}" class="btn btn-default ">Edit</a>


                    <div class="form-group">
                        <form style="display:inline-block" method="POST" action="{{ route('user.posts.destroy',  $post->id) }}">
                           <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @method('DELETE')
                            <button type="submit" class = "form-control btn btn-danger">Delete</a>
                        </form>
                    </div>
                  </div>

            </div>
            @endsection
        </div>
    </div>
