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
                        <h2 class="lead"><b>Add User</b></h2>
                    </div>
                    <div class="body">
                        <form class="form-auth-small" method="POST" action="/user/store" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group c_form_group">
                                <label>Username</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Enter your Username" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger"><b>{{ $errors->first('name') }}</b></span>
                                @endif
                            </div>
                            <div class="form-group c_form_group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control"
                                    placeholder="Enter your Last Name" value="{{ old('last_name') }}">
                                @if ($errors->has('last_name'))
                                    <span class="text-danger"><b>{{ $errors->first('last_name') }}</b></span>
                                @endif
                            </div>
                            <div class="form-group c_form_group">
                                <label>Select Role</label>
                                <select name="role" class="form-control">
                                    <option selected>Select</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                                @if ($errors->has('role'))
                                    <span class="text-danger"><b>{{ $errors->first('role') }}</b></span>
                                @endif
                            </div>
                            <div class="form-group c_form_group">
                                <label>Select Gander</label>
                                <select name="gender" class="form-control">
                                    <option selected>Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="text-danger"><b>{{ $errors->first('gender') }}</b></span>
                                @endif
                            </div>
                            <div class="form-group c_form_group">
                                <label>Date Of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control"
                                    placeholder="Enter your Date Of Birth" value="{{ old('date_of_birth') }}">
                                @if ($errors->has('date_of_birth'))
                                    <span class="text-danger"><b>{{ $errors->first('date_of_birth') }}</b></span>
                                @endif
                            </div>

                            <div class="form-group c_form_group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control"
                                    placeholder="Enter your Image" value="{{ old('image') }}">
                                @if ($errors->has('image'))
                                    <span class="text-danger"><b>{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <div class="form-group c_form_group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="Enter your email address" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger"><b>{{ $errors->first('email') }}</b></span>
                                @endif
                            </div>
                            <div class="form-group c_form_group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter password">
                                @if ($errors->has('password'))
                                    <span class="text-danger"><b>{{ $errors->first('password') }}</b></span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-dark btn-lg btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
