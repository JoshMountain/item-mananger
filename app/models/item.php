<?php

class Item extends Eloquent
{
    // Define a 1-1 relationship
    public function types() {
        return $this->hasOne('State');
    }
}