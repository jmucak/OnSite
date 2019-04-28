@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        Create New User
                    </div>

                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>

                            <div class="form-group">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <a href="{{ route('users.index') }}" class="btn btn-info">Back to Users</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection