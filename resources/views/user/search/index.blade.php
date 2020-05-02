@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    <h3>Search By Username</h3>
                </div>
<br/>
                <div class="col-md-4">
                    <form action="/search" method="get">
                        <div class="input-group">
                            <input type="search" name="search" placeholder="Username" class="form-control">
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-outline-primary">Search</button>
                            </span>
                        </div>
                </div>


                <div class="card-body">
                    <table id="table-posts" class="table table-hover">



                            @if (count($users) === 0)
                            <p>Username does not exist , please enter another.</p>
                            @else
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Interest</th>

                            </thead>
                            <br/>
                            <tbody>
                              <tr>
                            @foreach ($users as $user)


                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->interest}}</td>



                            <td><a href="{{ route('user.profile.show' , $user->id) }}" class="btn btn-outline-primary ">View</a></td>
                            <tr/>
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
