@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3>{{$user->name}}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                      <div class="col-4">
                        <img src="{{ asset('storage/files/' . $user->profile_picture) }}" alt="{{ $user->profile_picture }}">
                        </div>
                        <div col="6">
                          <table id="table-profile" class="table table-hover">
                            <thead>
                              <th>Location</th>
                              <th>Interest</th>
                              <th>Email</th>
                              <th>Actions</th>
                           </thead>
                           <tbody>
                             <tr>
                               <td> {{$user->location}}</td>
                               <td> {{$user->interest}}</td>
                               <td> {{$user->email}}</td>
                               <td> <a href="{{ route('user.profile.edit' , Auth::user()->id) }}" class="btn btn-link">Edit Profile</a></td>
                             </tr>
                           </tbody>
                            </table>
                        </div>



                    <!-- <a href="{{ route('user.profile.edit' , Auth::user()->id) }}" class="btn btn-link">Edit Profile</a>
                    <a href="{{ route('user.posts.create')}}" class="btn btn-link">Create Post</a>
                    <a href="{{ route('user.posts.index')}}" class="btn btn-link">My Posts</a>
  <a href="{{ route('user.profile.followings', Auth::user()->id) }}" class="btn btn-link">View</a>
                    <a href="{{ route('user.profile.followers', Auth::user()->id) }}" class="btn btn-link">Users following me</a> -->

                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
