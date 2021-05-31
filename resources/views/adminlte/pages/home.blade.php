@extends('adminlte/layout')

@section('header')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Permission</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Administrator</td>
                    <td>
                        <ul>
                            <li>
                                User Management
                                <ul>
                                    <li>List</li>
                                    <li>Create</li>
                                    <li>Assign</li>
                                </ul>
                            </li>
                            <li>
                                Inventory
                                <ul>
                                    <li>Add</li>
                                    <li>Create</li>
                                </ul>
                            </li>
                            <li>
                                Report
                                <ul>
                                    <li>User</li>
                                    <li>Inventory</li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Supervisor</td>
                    <td>
                        <ul>
                            <li>
                                User Management
                                <ul>
                                    <li>List</li>
                                    <li>Create</li>
                                </ul>
                            </li>
                            <li>
                                Inventory
                                <ul>
                                    <li>Add</li>
                                    <li>Create</li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Staff</td>
                    <td>
                        <ul>
                            <li>
                                Inventory
                                <ul>
                                    <li>Add</li>
                                    <li>Create</li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
