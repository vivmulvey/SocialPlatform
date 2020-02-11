@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Edit Profile
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{ route('user.profile.update', $user )}}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="profile_picture">Picture</label>
                            <input type="file" class="form-control" id="profile_picture" name="profile_picture" />
                        </div>
                         <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old("name", $user->name)}}" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old("email", $user->email)}}" />
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{old("date_of_birth", $user->date_of_birth)}}" />
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old("phone_number", $user->phone_number)}}" />
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{old("location", $user->location)}}" />
                        </div>
                        <div class="form-group">
                            <label for="interest">Interest</label>
                            <input type="text" class="form-control" id="interest" name="interest" value="{{old("interest", $user->interest)}}" />
                        </div>
                        <div class="form-group">
                            <label for="bio">Biography</label>
                            <input type="text" class="form-control" id="bio" name="bio" value="{{old("bio", $user->bio)}}" />
                        </div>


                        <a href="{{ route('user.home')}}" class="btn btn-link">Cancel</a>
                        <button type="submit" class="btn btn-outline-success float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
