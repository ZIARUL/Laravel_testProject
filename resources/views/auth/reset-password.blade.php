@extends('frontend.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    <!-- Validation Errors -->
                    

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email" :value="__('Email')"></label>

                            <input id="email" class="form-control" type="email" name="email"
                                :value="old('email', $request->email)" placeholder="your email" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" :value="__('Password')"></label>

                            <input id="password" class="form-control" type="password" name="password" placeholder="password" required />
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label for="password_confirmation" :value="__('Confirm Password')"></label>

                            <input id="password_confirmation" class="form-control" type="password"
                                name="password_confirmation" placeholder="confirm password" required />
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
