@extends('layout.main')

@section('content')
    <h1 class="page-header">Add New Item Type</h1>
    <form action="{{ URL::route('type-create-post') }}" method="post">
        <div class="form-group<?php if( $errors->has('label') ) { echo ' has-error'; }?>">
            <label for="label">Label</label>
            <input type="text" class="form-control" id="label" name="label" maxlength="128" placeholder="Ex: Bands, Books, Video Games"{{ (Input::old('label')) ? ' value="' . e( Input::old('label') ) . '"' : '' }}>
            @if( $errors->has('label') )
                <span class="help-block">{{ $errors->first('label') }}</span>
            @endif
        </div>

        <div class="checkbox">
            <label for="unique-items">
                <input type="checkbox" id="unique-items" name="unique-items" checked=""> Unique Items
            </label>
            <p class="help-block">Uncheck to allow multiple items with the same name inside this type.</p>
        </div>

        {{ Form::token() }}
        <input type="submit" value="Create Type" class="btn btn-default" />
    </form>
@stop