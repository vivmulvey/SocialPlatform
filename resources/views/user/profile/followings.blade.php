@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                  <h3>Following</h3>
                  </div>


                <div class="card-body">
                    @if (count($followings) === 0)
                    <p>You are not following any users</p>
                    @else
                    <table id="table-posts" class="table table-hover">
                        <thead>
                            <th>Name</th>




                        </thead>
                        <tbody>


                            @foreach ($user->followings as $user->following)

                             <tr data-id="{{ $user->following->id}}">



                              <td>{{$user->following->name}}</td>
                              <td><a href="{{ route('user.profile.show' , $user->following->id) }}" class="btn btn-primary "> View Profile</a></td>

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
