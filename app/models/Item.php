<?php

class Item extends Eloquent
{

    public function type() {
        return $this->hasOne('Type', 'id', 'type_id');
    }

    public function state() {
        return $this->hasOne('State', 'id', 'state_id');
    }

}