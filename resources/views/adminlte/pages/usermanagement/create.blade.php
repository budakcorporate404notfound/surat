@extends('adminlte/layout')

@section('header')
Add User
@endsection

@section('content')
<div class="container">

<form method="POST" action="{{ route('user.store') }}">
    @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Name" name="name">
                @error('name')
                <p class="text-danger">Invalid Name</p>
                @enderror
                
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Email" name="email">
                @error('email')
                <p class="text-danger">Invalid Email</p>
                @enderror
                
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control number" placeholder="password" name="password">
                @error('password')
                <p class="text-danger">Invalid Password</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Roles</label>
            <div class="col-sm-10">
                <select class="form-control" name="role">
                   @foreach ($roles as $roles)
                <option value="{{ $roles->name }}">{{ $roles->name }}</option>
                   @endforeach
                  </select>
                @error('role')
                <p class="text-danger">Invalid Roles</p>
                @enderror
            </div>
        </div>
        
        
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection