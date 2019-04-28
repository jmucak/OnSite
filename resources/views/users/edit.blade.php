@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update User</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>

                            <div class="form-group">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1" {{ $user->gender == 1 ? 'selected=selected' : '' }}>Male</option>
                                    <option value="0" {{ $user->gender == 0 ? 'selected=selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Save changes</button>
                                <a href="{{ route('users.index') }}" class="btn btn-warning">Back to Users</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection