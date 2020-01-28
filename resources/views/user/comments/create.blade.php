@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Comment:
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
                    <form method="POST" action="{{ route('user.comments.store')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <input type="text" class="form-control" id="comment" name="comment" value="{{old("comment")}}" />
                        </div>

                        <a href="{{ route('user.posts.index')}}" class="btn btn-link">Cancel</a>
                        <button type="submit" class="btn btn-outline-success float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
