@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    User Profile:
                </div>


                <div class="card-body">

                    <table class="table table-hover">
                        <tbody>
                          <tr>
                              <td>User ID</td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>Name</td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>Email</td>
                              <td></td>
                          </tr>
                            <tr>
                                <td>Area</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Date Of Birth</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Interest</td>
                                <td></td>
                            </tr>


                        </tbody>
                    </table>
                    <a href="{{route('admin.users.index')}}" class="btn btn-default ">Back</a>

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
