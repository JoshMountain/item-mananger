@extends('layout.main')

@section('content')
<!-- Form Components Row -->
<div class="row">
    <div class="col-md-6">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <h2>Sign In</h2>
            </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
            <form action="{{ URL::route('account-sign-in-post') }}" method="post" class="form-horizontal form-bordered">
                <div class="form-group<?php if( $errors->has('email') ) { echo ' has-error'; }?>">
                    <label class="col-md-3 control-label" for="email">Email</label>
                    <div class="col-md-9">
                        <input type="email" id="email" name="email" class="form-control"{{ (Input::old('email')) ? ' value="' . e( Input::old('email') ) . '"' : '' }}>
                        <span class="help-block">{{ ( $errors->has('email') ) ? $errors->first('email') : 'Please enter your email' }}</span>
                    </div>
                </div>
                <div class="form-group<?php if( $errors->has('password') ) { echo ' has-error'; }?>">
                    <label class="col-md-3 control-label" for="password">Password</label>
                    <div class="col-md-9">
                        <input type="password" id="password" name="password" class="form-control">
                        <span class="help-block">{{ ( $errors->has('password') ) ? $errors->first('password') : 'Please enter your password' }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Remember Me</label>
                    <div class="col-md-9">
                        <label class="switch switch-primary">
                            <input type="checkbox" name="remember" id="remember" checked><span></span>

                        </label>
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        {{ Form::token() }}
                        <button type="submit" class="btn btn-block btn-effect-ripple btn-primary">Sign In</button>
                        <span class="help-block"><a href="{{ URL::route('account-forgot-password') }}">Forgot Password?</a></span>
                    </div>
                </div>
            </form>
            <!-- END Horizontal Form Content -->
        </div>
        <!-- END Horizontal Form Block -->
    </div>
</div>
@stop