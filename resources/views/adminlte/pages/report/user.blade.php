<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>User Report</title>
</head>
<body>
    <div style="text-align: center">
        <h1>User Report</h1>
        <table style="margin: 0 auto;" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $value )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>