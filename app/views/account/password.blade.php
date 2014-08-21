@extends('layout.main')

@section('content')
<!-- Form Components Row -->
<div class="row">
    <div class="col-md-6">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <h2>Change Password</h2>
            </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
            <form action="{{ URL::route('account-change-password-post') }}" method="post" class="form-horizontal form-bordered">
                <div class="form-group<?php if( $errors->has('old_password') ) { echo ' has-error'; }?>">
                    <label class="col-md-3 control-label" for="old_password">Old Password</label>
                    <div class="col-md-9">
                        <input type="password" id="old_password" name="old_password" class="form-control" autocomplete="off">
                        <span class="help-block">{{ ( $errors->has('old_password') ) ? $errors->first('old_password') : 'Please enter your current password' }}</span>
                    </div>
                </div>
                <div class="form-group<?php if( $errors->has('password') ) { echo ' has-error'; }?>">
                    <label class="col-md-3 control-label" for="password">New Password</label>
                    <div class="col-md-9">
                        <input type="password" id="password" name="password" class="form-control" autocomplete="off">
                        <span class="help-block">{{ ( $errors->has('password') ) ? $errors->first('password') : 'Please enter your new password' }}</span>
                    </div>
                </div>
                <div class="form-group<?php if( $errors->has('password_again') ) { echo ' has-error'; }?>">
                    <label class="col-md-3 control-label" for="password_again">New Password Again</label>
                    <div class="col-md-9">
                        <input type="password" id="password_again" name="password_again" class="form-control" autocomplete="off">
                        <span class="help-block">{{ ( $errors->has('password_again') ) ? $errors->first('password_again') : 'Please enter your new password' }}</span>
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        {{ Form::token() }}
                        <button type="submit" class="btn btn-block btn-effect-ripple btn-primary">Change Password</button>
                    </div>
                </div>
            </form>
            <!-- END Horizontal Form Content -->
        </div>
        <!-- END Horizontal Form Block -->
    </div>
</div>
@stop