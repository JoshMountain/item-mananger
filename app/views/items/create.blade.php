@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                    <h2>Add New Item</h2>
                </div>
                <!-- END Horizontal Form Title -->

                <!-- Horizontal Form Content -->
                <form action="{{ URL::route('item-create-post') }}" method="post" class="form-horizontal form-bordered" autocomplete="off">
                    <div class="form-group<?php if( $errors->has('label') ) { echo ' has-error'; }?>">
                        <label class="col-md-3 control-label" for="label" maxlength="128"{{ (Input::old('label')) ? ' value="' . e( Input::old('label') ) . '"' : '' }}>Item Label</label>
                        <div class="col-md-9">
                            <input type="text" id="label" name="label" class="form-control">
                            @if( $errors->has('label') )
                                <span class="help-block">{{ $errors->first('label') }}</span>
                            @else
                                <span class="help-block">Please enter a label/name for your new item</span>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="type_id">Type of Item</label>
                        <div class="col-md-9">
                            <select id="type_id" name="type_id" class="select-chosen" data-placeholder="Choose an item type..." style="width: 250px; display: none;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="state_id">State of Item</label>
                        <div class="col-md-9">
                            <select id="state_id" name="state_id" class="select-chosen" data-placeholder="Choose an item state..." style="width: 250px; display: none;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            {{ Form::token() }}
                            <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Create New Item</button>
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->
            </div>
        </div>
    </div>
@stop
