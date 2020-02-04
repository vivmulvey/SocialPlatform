@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Search
                </div>

                <div class="col-md-4">
                    <form action="/search" method="get">
                        <div class="input-group">
                            <input type="search" name="search" placeholder="Search by name" class="form-control">
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </span>
                        </div>
                </div>


                <div class="card-body">
                    <table id="table-posts" class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Interest</th>

                        </thead>
                        <tbody>

                          @if (count($users) === 0)
                          <p>Enter username</p>
                          @else
                            @foreach ($users as $user)
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->interest}}</td>


                            <td><a href="{{ route('user.home' , $user->id) }}" class="btn btn-primary ">View</a></td>
                          @endforeach
                  @endif
                        </tbody>
                    </table>



                    <a href="{{ route('user.home')}}" class="btn btn-link">Back</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
