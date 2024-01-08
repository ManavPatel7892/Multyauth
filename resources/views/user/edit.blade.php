@extends('layouts.app')
@section('main-section')
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
                    <h2 class="lead"><b>Update User</b></h2>
                </div>
                <div class="body">
                    <form id="user-edit-form" class="form-auth-small" method="POST" action="/user/update/{{ $user->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group c_form_group">
                            <label>Username</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your Username"  value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="form-group c_form_group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control"
                                placeholder="Enter your Last Name"  value="{{ old('last_name', $user->last_name) }}" value="{{ old('last_name') }}">
                        </div>
                        <div class="form-group c_form_group">
                            <label>Select Role</label>
                            <select name="role" class="form-control">
                                <option selected disabled>Select</option>
                                <option value="admin" <?php  echo ($user->role == 'admin') ? 'selected': '';?>>Admin</option>
                                <option value="user" <?php  echo ($user->role == 'user') ? 'selected': '';?>>User</option>
                            </select>
                        </div>
                        <div class="form-group c_form_group">
                            <label>Select Gander</label>
                            <select name="gender" class="form-control">
                                <option selected disabled>Select</option>
                                <option value="male"  <?php  echo ($user->gender == 'male') ? 'selected': '';?>>Male</option>
                                <option value="female" <?php  echo ($user->gender == 'female') ? 'selected': '';?>>Female</option>
                            </select>
                        </div>
                        <div class="form-group c_form_group">
                            <label>Date Of Birth</label>
                            <input type="date"  name="date_of_birth" class="form-control "
                                placeholder="Enter your Date Of Birth"  value="{{ old('date_of_birth', $user->date_of_birth) }}">
                        </div>

                        <div class="form-group c_form_group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control"
                                placeholder="Enter your Image" value="{{ old('image') }}">
                        </div>
                        <div class="form-group c_form_group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                placeholder="Enter your email address"  value="{{ old('email', $user->email) }}">
                        </div>
                        <button type="submit" class="btn btn-dark btn-lg btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script>
$('#user-edit-form').validate({
    rules:{
        name:{
            required: true,
        },
        last_name:{
            required: true,
        },
        role:{
            required: true,
        },
        gender:{
            required: true,
        },
        date_of_birth:{
            required: true,
        },
        image:{
            required: true,
        },
        email:{
            required:true,
            email:true,
        },
    },
    messages: {
        name:{
            required: "Please enter your User Name"
        },
        last_name:{
            required: "Please enter your Last Name"
        },
        role:{
            required: "Please select your Role"
        },
        gender:{
            required: "Please select your Gender"
        },
        date_of_birth:{
            required: "Please enter your Date Of Birth"
        },
        image:{
            required: "Please enter your Image"
        },
        email:{
            required: "Please enter your email"
        },
    },
    submitHandler: function(form){
        form.submit();
    }
});
</script>
@endsection
