@extends('adminlte/layout')

@section('header')
Inventory
@endsection

@section('content')

<div class="container">
    
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
            
            
            @foreach ($data as $value)
            
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->getRoleNames()[0] }}</td>
                <td> 
                    <form action="{{ route('user.delete') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{ $value->id }}" name="id">
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form> 
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    
</div>

@endsection


@push('footer')

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

@endpush