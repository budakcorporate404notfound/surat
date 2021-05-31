@extends('layouts.master')

@section('content')
<div class="container">
    
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    
                        <div class="table-responsive">
                            <table id="example" class="table table-head-fixed text-nowrap table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Email pengirim</th>
                                        <th>Subject</th>
                                        <!-- <th>Isi Email</th> -->
                                        <th>Tanggal</th>
                                        <th>Attachment</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($getMails as $row)
                                    <tr>
                                        <td></td>
                                        <td>{{ $row['from'] }}</td>
                                        <td>{{ $row['subject'] }}</td>
                                        <!-- <td>{{ $row['finalMessage'] }}</td> -->
                                        <td>{{ $row['date'] }}</td>
                                        
                                        <td></td>
                                        
                                    </tr> 
                                @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
