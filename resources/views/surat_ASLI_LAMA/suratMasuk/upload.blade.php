@extends('layouts.admin')

@section('content')

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }} <br/>
        @endforeach
    </div>
    @endif

    <form action="/upload/proses" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <b>File Gambar</b><br/>
            <input type="file" name="file">
        </div>
        <input type="submit" value="Upload" class="btn btn-primary">
    </form>

@endsection
