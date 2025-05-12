<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\scate;
use App\Models\product;
use App\Models\images;
use App\Models\orders;
use App\Models\iteminfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Requests\productrequest;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ordersController extends Controller
{
    public function placeorder(request $request){
        $user=session('user');
        $order=session('cart');
         //return $order[0]["images"]['pid'];
        foreach(session('cart') as $id)
        {
             
            $item=new iteminfo;
            $item->pid=$id["images"][0]["pid"];;
             $item->order_id = $id["images"][0]["iid"];;
            $item->pname =  $id['pname'];
            $item->quantity= $id['quantity'];
            $item->price= ( $id['price']* $id['quantity']);
            $item->save();
        }
        $request->session()->forget('cart'); 
        return redirect('/home')->with('success','order placed');
    }
    public function saveorder( Request $request)
    {
        $order=new orders;
        $order->fname=request('fname');
        $order->lname=request('lname');
        $order->email=request('email');
        $order->phone=request('phone');
        $order->password=Hash::make(request('password'));
        $order->address=request('address');
        $order->city=request('city');
        $order->zip=request('zip');
        $order->country=request('country');
        $order->save();
        if(session('cart'))
        {
            foreach(session('cart') as $id =>$product)
            {
                $item=new iteminfo;
                $item->pid=$id;
                $item->order_id = $order->order_id;
                $item->pname = $product['pname'];
                $item->quantity= $product['quantity'];
                $item->price= ($product['price']*$product['quantity']);
                $item->save();
            }
        }
        $request->session()->forget('cart'); 
        return redirect('/home')->with('success','order placed');
    }
    public function orders(){
        return view('admin.orders');
    }
    public function vieworders(Request $request){
        if($request->ajax())
        {
            $data=orders::latest()->get();
            // dd($data);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addcolumn('action',function($row){
                        $actionBtn = "<a href='/admin/orderdetail/".$row->order_id."' class='edit btn btn-info rounded btn-sm'><i class='fa fa-eye'></i></a>
                        <form style='display: inline-block' action='/deleteorder/".$row->order_id."' method='POST'>
                        ".csrf_field()."
                        ".method_field('DELETE')."
                        <button  class='delete btn btn-danger rounded btn-sm'><i class='fa fa-trash'></i></button>
                        </form>";
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])->make('true');
        }
    }
    public function orderdetail($id){
        $order = orders::find($id);
        $items = iteminfo::where('order_id',$id)->get();
        // dd($item);
        return view('admin.orderdetail')->with('order',$order)->with('items',$items);
    }
    public function orderdelete($id){
        $order = orders::find($id);
        $items = iteminfo::where('order_id',$id)->delete();
        $order->delete();
        return redirect('/orders')->with('error','order deleted');
    }
    
}
