<?php

class StateController extends BaseController {

    public function getCreateState() {

        return View::make('states.create');

    }

    public function postCreateState() {

        // Validate input for new Type
        $validator = Validator::make(Input::all(),
            array(
                'label' => 'required|min:3|max:128|unique:states,label,null,id,user_id,' . Auth::user()->id,
            )
        );

        if( $validator->fails() ) {

            return Redirect::route('state-create')
                   ->withErrors($validator)
                   ->withInput();

        } else {

            $state              = new State;
            $state->label        = Input::get('label');
            $state->user_id      = Auth::user()->id;
            $state->save();

            return Redirect::route('state-create')
                   ->with('global', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><p>Your new state "' . Input::get('label') . '" has been created successfully!</p></div>');


        }

    }

}