<?php

namespace App\Http\Controllers;

use App\Models\sale;
use Illuminate\Http\Request;
use App\Models\product;

class salecontroller extends Controller
{
    public function sale(){
        $sales=sale::all();
        $products = product::all();
        return view('admin.sale')->with('sales',$sales)->with('products',$products);
    }
}
