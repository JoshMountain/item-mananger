<?php

class TypeController extends BaseController {

    public function getCreateType() {

        return View::make('types.create');

    }

    public function postCreateType() {

        // Validate input for new Type
        $validator = Validator::make(Input::all(),
            array(
                'label' => 'required|min:3|max:128|unique:types',
            )
        );

        if( $validator->fails() ) {

            return Redirect::route('type-create')
                   ->withErrors($validator)
                   ->withInput();

        } else {

            $unique_items = ( Input::has('unique-items') ) ? 1 : 0;
            $type_label   = Input::get('label');

            $type               = new Type;
            $type->label        = $type_label;
            $type->unique_items = $unique_items;
            $type->user_id      = Auth::user()->id;
            $type->save();

            return Redirect::route('home')
                   ->with('global', '<p class="bg-success">Your new item type "' . $type_label . '" was added successfully.</p>');

        }

    }

}