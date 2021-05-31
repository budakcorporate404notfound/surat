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
                <th>Quantity</th>
                <th>Description</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>



            @foreach ($data as $value)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->quantity }}</td>
                <td>{{ $value->description }}</td>
                <td> <a href="{{ route('inventory.update.form', ['id' => $value->id]) }}">Update</a> </td>
                <td>
                    <form action="{{ route('inventory.delete') }}" method="post">
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
