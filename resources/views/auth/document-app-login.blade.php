@extends('document-app-layouts.app')

@section('content')
<style>
    .allert_message{
        margin-bottom: 18px !important;
    }
</style>
<div class="container">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
       
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">

                    @if($message = Session::get('success-result'))
                    <div class="alert alert-success allert_message" style="max-width:600px; margin:auto;">
                              <a class="close" data-dismiss="alert">×</a>
                                <h4  style="font-size:12px">{{ $message }}</h4>
                            </div>
                       
                      
                      @endif
                      @if($message = Session::get('error-result'))
                      <div class="alert alert-danger allert_message" style="max-width:600px; margin:auto;">
                                <a class="close" data-dismiss="alert">×</a>
                                  <h4  style="font-size:12px">{{ $message }}</h4>
                              </div>
                         
                        
                        @endif
                     
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">User Name</label>

                            <div class="col-md-6">
                                <input id="email" type="" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                    </label>
                                </div>
                            </div> 
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="g-recaptcha" data-sitekey="6LfTJkIjAAAAAB8TyaGayLK83vTuoaCvFLZYWD3t"></div>
                            </div> 
                           
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                @if($message = Session::get('message'))
                              <div class="alert alert-danger">{{ $message }}</div>
                            @endif
                            </div> 
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{route('password.request')}}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
