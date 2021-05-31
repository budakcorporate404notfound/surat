@extends('adminlte/layout')

@section('header')
Update Inventory
@endsection

@section('content')
<div class="container">
    
    <form method="POST" action="{{ route('inventory.update') }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$data->id}}" name="id">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $data->name }}">
                @error('name')
                <p class="text-danger">Invalid Name</p>
                @enderror
                
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
                <input type="text" class="form-control number" placeholder="quantity" name="quantity" value="{{ $data->quantity }}">
                @error('quantity')
                <p class="text-danger">Invalid Quantity</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="description" name="description" value="{{ $data->description }}">
                @error('description')
                <p class="text-danger">Invalid Description</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" value="{{ $data->id }}" name="id">
                <button type="submit" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </form>
</div>
@endsection