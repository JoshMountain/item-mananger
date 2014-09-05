@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                    <h2>Create New Item Type</h2>
                </div>
                <!-- END Horizontal Form Title -->

                <!-- Horizontal Form Content -->
                <form action="{{ URL::route('type-create-post') }}" method="post" class="form-horizontal form-bordered" autocomplete="off">
                    <div class="form-group<?php if( $errors->has('label') ) { echo ' has-error'; }?>">
                        <label class="col-md-3 control-label" for="label" maxlength="128"{{ (Input::old('label')) ? ' value="' . e( Input::old('label') ) . '"' : '' }}>Type Label</label>
                        <div class="col-md-9">
                            <input type="text" id="label" name="label" class="form-control">
                            @if( $errors->has('label') )
                                <span class="help-block">{{ $errors->first('label') }}</span>
                            @else
                                <span class="help-block">Please enter a label/name for your new type</span>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="unique-items">Unique Items?</label>
                        <div class="col-md-9">
                            <label class="switch switch-primary"><input type="checkbox" checked="" id="unique-items" name="unique-items"><span></span></label>
                            <p class="help-block">Turn off to allow multiple items with the same name inside this type.</p>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            {{ Form::token() }}
                            <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Create New Type</button>
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->
            </div>
        </div>
    </div>
@stop