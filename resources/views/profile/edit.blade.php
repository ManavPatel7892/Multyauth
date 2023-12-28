@extends('layouts.app')
@if ($message = Session::get('success'))
    <div class="alert alert-success mt-4" style="margin-right: 30%; margin-left: 30%;" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif
<div id="main-content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <p class="lead"> Upate Profile</p>
                </div>
                <div class="body">
                    <form class="form-auth-small" method="POST" action="/user/update/{{$user->id}}">
                        @csrf
                        <div class="form-group c_form_group">
                            <label>Username</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $user->name) }}" placeholder="Enter your Username"
                                value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group c_form_group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $user->email) }}" placeholder="Enter your email address"
                                value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        {{-- <div class="form-group c_form_group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control"
                                value="{{ old('address', $user->address) }}" placeholder="Enter address"
                                value="{{ old('address') }}">
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>

                        <div class="form-group c_form_group">
                            <label>Phone No</label>
                            <input type="number" name="number" class="form-control"
                                value="{{ old('number', $user->number) }}" placeholder="Enter number"
                                value="{{ old('number') }}">
                            @if ($errors->has('number'))
                                <span class="text-danger">{{ $errors->first('number') }}</span>
                            @endif
                        </div> --}}
                        {{-- <div class="form-group c_form_group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div> --}}



                        <button type="submit" class="btn btn-dark btn-lg btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
