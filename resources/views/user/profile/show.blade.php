@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">

              <h3>{{$user->name}}</h3>

                  @if ($following)
                    <a href="{{ route('user.unfollow', $user->id)}}" class="btn btn-link">Unfollow User</a>


                    <a href="{{ route('user.chat.chat'  )}}" class="btn btn-link">Message </a>

                  @else
                    <a href="{{ route('user.follow', $user->id) }}" class="btn btn-link">Follow User</a>
                  @endif
                  </div>

                <div class="card-body">
                    <table id="table-posts" class="table table-hover">
                      <div class="row">

                        <div class="col-4">
                          <img src="{{ asset('storage/files/' . $user->profile_picture) }}" alt="{{ $user->profile_picture }}">
                          </div>

                          <div col="6">
                            <table id="table-profile" class="table table-hover">
                              <thead>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Interest</th>
                                <th>Email</th>
                             </thead>
                             <tbody>
                               <tr>
                                 <td> {{$user->name}}</td>
                                 <td> {{$user->location}}</td>
                                 <td> {{$user->interest}}</td>
                                 <td> {{$user->email}}</td>
                               </tr>
                             </tbody>
                              </table>
                          </div>
                        </div>
                      </table>
                      <br/>
                      <table>
                        <thead>
                    <th>Posts</th>
                  </thead>

                    <table id="table-posts" class="table table-hover">
                        <thead>
                          @if (count($posts) === 0)
                          <p>The user has no posts.</p>
                          @else
                            <th>Title</th>

                            <th>Description</th>


                        </thead>
                        <tbody>


                            @foreach ($posts as $post)

                            <tr data-id="{{ $post->created_at}}">


                                <td>{{ $post->file}}</td>

                                <td>{{ $post->title}}</td>

                                <td>{{ $post->description}}</td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @endif




                  <br/>

                  <table>
                  @foreach ($user->followers as $follower)
                  <tr>
                  <th> Followers </th>
                  </tr>
                  <td>
                  {{ $follower->name }}
                  </td>

                  @endforeach
                  </table>
                  <a href="{{ route('user.home')}}" class="btn btn-link">Back</a>







                </div>
            </div>
        </div>
    </div>
</div>
@endsection
