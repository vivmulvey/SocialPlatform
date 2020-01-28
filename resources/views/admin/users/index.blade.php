@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Users
                  </div>


                <div class="card-body">
                    @if (count($users) === 0)
                    <p>There are no users</p>
                    @else
                    <table id="table-users" class="table table-hover">
                        <thead>
                            <th>Name</th>

                            <th>Email</th>


                        </thead>
                        <tbody>


                            @foreach ($users as $user)

                             <tr data-id="{{ $user->id}}">



                              <td>{{ $user->name}}</td>

                              <td>{{ $user->email}}</td>




                                <td>
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary ">View</a>

                                    {{-- <form style="display:inline-block" method="POST" action="{{route('admin.users.destroy', $user->id)}}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger ">Delete</a>
                                    </form> --}}
                                </td>
                            </tr>






                              @endforeach
                        </tbody>
                    </table>

                    @endif

                    <a href="{{ route('admin.home')}}" class="btn btn-link">Back</a>

                </div>
            </div>
        </div>
    </div>
  </div>

@endsection
