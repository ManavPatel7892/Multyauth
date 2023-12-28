@extends('layouts.app')
<div id="main-content">
    <div class="container-fluid">
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h1>Users Table</h1>
            @if ($message = Session::get('success'))
            <div class="alert alert-success mt-4" style="margin-right: 30%; margin-left: 30%;" role="alert">
                <strong>{{  $message}}</strong>
            </div>
            @endif
            <div class="text-right" style="float: center">
                <a type="button" href="/user/create" class="btn btn-outline-secondary">New User</a>
            </div>

        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table  table-hover">
                    <thead>
                        <tr>
                            <th scope="row">No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Mobile No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->number }}</td>
                            <td>
                                <a href="/user/edit/{{ $user->id }}" class="btn btn-outline-secondary btn-md">Edit</a>

                                <a href="/user/delete/{{ $user->id }}" class="btn btn-outline-danger btn-md">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
