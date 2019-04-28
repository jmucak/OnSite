@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit your profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="avatar">Upload avatar</label>
                            <input type="file" name="avatar" value="{{ $info->avatar }}" class="form-control" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" name="firstname" value="{{ $info->firstname }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname" value="{{ $info->lastname }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="about">About me</label>
                            <textarea name="about" id="about" cols="5" rows="5" class="form-control"> {{ $info->about }} </textarea>
                        </div>

                        <button class="btn btn-primary btn-lg" type="submit">Save information</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
