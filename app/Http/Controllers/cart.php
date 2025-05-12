<?php

namespace App\Http\Controllers;

class cart
{
    public $items = null;
    public $totalprice = 0;
    public $totalqty = 0;

    public function __construct($oldcart)
    {
        if($oldcart){
            $this->items = $oldcart->items;
            $this->totalqty = $oldcart->totalqty;
            $this->totalprice = $oldcart->totalprice;
        }
    }
    // public function add($item)
    
}
