<?php

class StateController extends BaseController {

    public function getCreateState() {

        return View::make('states.create');

    }

    public function postStateType() {

        // Validate input for new Type
        $validator = Validator::make(Input::all(),
            array(
                'label' => 'required|min:3|max:128|unique:states',
            )
        );

        if( $validator->fails() ) {

            return Redirect::route('state-create')
                   ->withErrors($validator)
                   ->withInput();

        } else {

            $state_label   = Input::get('label');

            $state              = new State;
            $state->label        = $state_label;
            $state->user_id      = Auth::user()->id;
            $state->save();

            return Redirect::route('home')
                   ->with('global', '<p class="bg-success">Your new item state "' . $state_label . '" was added successfully.</p>');

        }

    }

}