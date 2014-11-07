<?php

class ItemController extends BaseController {

    public function getCreateItem() {

        $states = State::where('user_id', '=', Auth::user()->id)->get();

        $types = Type::where('user_id', '=', Auth::user()->id)->get();

        return View::make('items.create')->with('states', $states)->with('types', $types);

    }

    public function postCreateItem() {

        // Validate input for new Item
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

    public function postEditItem($id) {

		$item               = Item::find($id);

        // Validate input for Item changes
        $validator = Validator::make(Input::all(),
            array(
                'label'    => 'required|min:3|max:128|unique:items,label,null,id,user_id,' . Auth::user()->id,
                'type_id'  => 'required|integer',
                'state_id' => 'required|integer',
            )
        );

        if( $validator->fails() ) {

            return Redirect::route('item-edit')
                   ->withErrors($validator)
                   ->withInput();

        } else {

            $item               = Item::find($id);
            $item->label        = Input::get('label');
            $item->type_id      = Input::get('type_id');
            $item->state_id     = Input::get('state_id');
            $item->save();

            return Redirect::route('item-list')
                   ->with('global', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><p>Your new item "' . Input::get('label') . '" has been edited successfully!</p></div>');

        }

    }

    public function getListItems($page_count = 15) {

        $items = Item::where('user_id', '=', Auth::user()->id)->paginate($page_count);

        return View::make('items.list')->with('items', $items)->with('page_heading', 'Viewing All Items');

    }

    public function getEditItem($id) {

        $states = State::where('user_id', '=', Auth::user()->id)->get();

        $types = Type::where('user_id', '=', Auth::user()->id)->get();

        $item = Item::where('user_id', '=', Auth::user()->id)
                ->where('id', '=', $id)
                ->first();

        return View::make('items.edit')
                ->with('item', $item)
                ->with('states', $states)
                ->with('types', $types);

    }

    public function getDeleteItem($id) {

        $item = Item::where('user_id', '=', Auth::user()->id)
                ->where('id', '=', $id)
                ->delete();

        return Redirect::route('item-list')
               ->with('global', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><p>Your item has been deleted successfully!</p></div>');


    }

}

