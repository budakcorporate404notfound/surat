@extends('adminlte/layout')

@section('header')
Add Inventory
@endsection

@section('content')
<div class="container">

<form method="POST" action="{{ route('inventory.store') }}">
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
            <label class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
                <input type="text" class="form-control number" placeholder="quantity" name="quantity">
                @error('quantity')
                <p class="text-danger">Invalid Quantity</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="description" name="description">
                @error('description')
                <p class="text-danger">Invalid Description</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </div>
    </form>
</div>
@endsection