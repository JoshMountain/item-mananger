<?php

class ItemController extends BaseController {

    public function getCreateItem() {

        $states = State::where('user_id', '=', Auth::user()->id)->get();

        $types = Type::where('user_id', '=', Auth::user()->id)->get();

        return View::make('items.create')->with('states', $states)->with('types', $types);

    }

    public function postCreateItem() {

        // Validate input for new Type
        $validator = Validator::make(Input::all(),
            array(
                'label'    => 'required|min:3|max:128|unique:items,label,null,id,user_id,' . Auth::user()->id,
                'type_id'  => 'required|integer',
                'state_id' => 'required|integer',
            )
        );

        if( $validator->fails() ) {

            return Redirect::route('item-create')
                   ->withErrors($validator)
                   ->withInput();

        } else {

            $item               = new Item;
            $item->label        = Input::get('label');
            $item->type_id      = Input::get('type_id');
            $item->state_id     = Input::get('state_id');
            $item->user_id      = Auth::user()->id;
            $item->save();

            return Redirect::route('item-create')
                   ->with('global', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><p>Your new item "' . Input::get('label') . '" has been added successfully!</p></div>');

        }

    }

    public function getListItems() {

        $items = Item::where('user_id', '=', Auth::user()->id)->get();

        return View::make('items.list')->with('items', $items);

    }

}

