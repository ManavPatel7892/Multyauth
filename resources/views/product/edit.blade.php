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
                    <h2 class="lead"><b>Update Product</b></h2>
                </div>
                <div class="body">
                    <form class="form-auth-small" method="POST" action="/product/update/{{ $product->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group c_form_group">
                            <label>ProductName</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your ProductName"  value="{{ old('name', $product->name) }}">
                            @if ($errors->has('name'))
                                <span class="text-danger"><b>{{ $errors->first('name') }}</b></span>
                            @endif
                        </div>
                        <div class="form-group c_form_group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control"
                                placeholder="Enter your Last Name"  value="{{ old('description', $product->description) }}" value="{{ old('description') }}">
                            @if ($errors->has('description'))
                                <span class="text-danger"><b>{{ $errors->first('description') }}</b></span>
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
                        <button type="submit" class="btn btn-dark btn-lg btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
