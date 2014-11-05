@extends('layout.main')

@section('content')
<!-- Form Components Row -->
<div class="row">
    <div class="col-md-12 col-lg-6">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <h2>Reset Password</h2>
            </div>
            <!-- END Horizontal Form Title -->

                <!-- Horizontal Form Content -->
				<form action="{{ URL::route('account-forgot-password-post') }}" method="post" class="form-horizontal form-bordered">
					<div class="form-group<?php if( $errors->has('email') ) { echo ' has-error'; }?>">
						<label class="col-md-3 control-label" for="email">Email address</label>
						<div class="col-md-9">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email address"{{ (Input::old('email')) ? ' value="' . e( Input::old('email') ) . '"' : '' }}>
							@if( $errors->has('email') )
								<span class="help-block">{{ $errors->first('email') }}</span>
							@endif
						</div>
					</div>
					{{ Form::token() }}

                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            {{ Form::token() }}
                            <button type="submit" class="btn btn-block btn-effect-ripple btn-primary">Reset Password</button>
                        </div>
                    </div>

				</form>
                <!-- END Horizontal Form Content -->

         </div>
         <!-- END Horizontal Form Block -->
     </div>
 </div>
@stop