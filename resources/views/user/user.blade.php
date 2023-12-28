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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Date Of Birth</th>
                            <th>email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><img src="/userImage/{{ $user->image }}" class="rounded-circle" width="80" height="80"></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->gender }}</td>
                            <?php
                              $date_of_birth = date_create($user->date_of_birth);
                            ?>
                            <td><?php echo date_format($date_of_birth,"d-M-Y");?></td>
                            <td>{{ $user->email }}</td>
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
