@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">My Profile</div>
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ $user->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">About</label>
                        <textarea name="about" class="form-control">{{ $user->about }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
