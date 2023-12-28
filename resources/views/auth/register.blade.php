<!doctype html>
<html lang="en">

<head>
    <title>Mooli | Sign Up</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description"
        content="Mooli Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
    <meta name="author" content="GetBootstrap, design by: puffintheme.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/animate-css/vivify.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/mooli.min.css">

</head>

<body>
    <div id="body" class="theme-cyan">
        <div class="auth-main">
            <div class="auth_div vivify fadeIn">
                <div class="auth_brand">
                    <a class="navbar-brand" href="#"><img src="assets/images/icon.svg" width="50"
                            class="d-inline-block align-top mr-2" alt="">Mooli</a>
                </div>
                <div class="card">
                    <div class="header">
                        <p class="lead">Create an account</p>
                    </div>
                    <div class="body">
                        <form class="form-auth-small" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group c_form_group">
                                <label>Username</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Enter your Username" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group c_form_group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="Enter your email address" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group c_form_group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter password">
                                @error('password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group c_form_group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Comfirm password">
                                @error('password_confirmation')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-dark btn-lg btn-block">Register</button>
                            <div class="bottom">
                                <span>Already have an account? <a href="/login">Login</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="animate_lines">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>
        <!-- END WRAPPER -->
    </div>

    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script>

    <!-- Vedor js file and create bundle with grunt  -->
</body>

</html>
{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
