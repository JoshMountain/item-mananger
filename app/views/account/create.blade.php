@extends('layout.main')

@section('content')
<!-- Form Components Row -->
<div class="row">
    <div class="col-md-12 col-lg-6">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <h2>Create an Account</h2>
            </div>
            <!-- END Horizontal Form Title -->

                <!-- Horizontal Form Content -->
                <form action="{{ URL::route('account-create-post') }}" method="post" class="form-horizontal form-bordered">
                    <div class="form-group<?php if( $errors->has('email') ) { echo ' has-error'; }?>">
                        <label class="col-md-3 control-label" for="email">Email address</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"{{ (Input::old('email')) ? ' value="' . e( Input::old('email') ) . '"' : '' }}>
                            @if( $errors->has('email') )
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group<?php if( $errors->has('username') ) { echo ' has-error'; }?>">
                        <label class="col-md-3 control-label" for="username">Username</label>
                        <div class="col-md-9">
                        	<input type="text" class="form-control" id="username" name="username" placeholder="Username"{{ (Input::old('username')) ? ' value="' . e( Input::old('username') ) . '"' : '' }}>
                            @if( $errors->has('username') )
                                <span class="help-block">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group<?php if( $errors->has('password') ) { echo ' has-error'; }?>">
                        <label class="col-md-3 control-label" for="password">Password</label>
                        <div class="col-md-9">
                        	<input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            @if( $errors->has('password') )
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group<?php if( $errors->has('password_again') ) { echo ' has-error'; }?>">
                        <label class="col-md-3 control-label" for="password_again">Password Again</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="password_again" name="password_again" placeholder="Password">
                            @if( $errors->has('password_again') )
                                <span class="help-block">{{ $errors->first('password_again') }}</span>
                            @endif
                        </div>
                    </div>

                    {{ Form::token() }}

                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            {{ Form::token() }}
                            <button type="submit" class="btn btn-block btn-effect-ripple btn-primary">Create Account</button>
                            <span class="help-block"><a href="{{ URL::route('account-sign-in') }}">Already have an account? Sign in.</a></span>
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->

         </div>
         <!-- END Horizontal Form Block -->
     </div>
 </div>
@stop