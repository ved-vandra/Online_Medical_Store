<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\scate;
use App\Models\product;
use App\Models\images;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\productrequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PDO;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin(){
        return view('admin');
    }
    public function index()
    {
        return view('home');
    }
    
    public function cart(Request $request){
        // $request->session()->forget('cart'); 
        return view('cart');
    }
    public function checkout(){
        $cart= session()->get('cart');
        if(!$cart == ''){
            return view('checkout');
        }
        else{
            return redirect()->back()->with('danger','Cart Is Empty!');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('/home');
    }
    public function addtocart($id){
        // dd($id);
        $product=product::find($id);
        // dd($product);
        foreach($product as $prod)
        {
            $images = images::where('pid',$id)->get();
            // dd($images);
            $product['images'] = $images;
        }
        // dd($product);
        $cart= session()->get('cart');
        if(!$cart){
            $cart=[ $id=>[
                        'pname'=>$product->pname,
                        'quantity'=>1,
                        'price'=>$product->price,
                        "images"=>$product->images,
                    ]
            ];
            session()->put('cart',$cart);
            return redirect()->back()->with('success','product added successfully');
        }
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart',$cart);
            return redirect()->back()->with('success','product added successfully');
        }
        $cart[$id] = [
            "pname" => $product->pname,
            "quantity" => 1,
            "price" => $product->price,
            "images"=>$product->images,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added successfully!');
    }
    public function removefromcart(Request $request)
    {
        if($request->id){
            $cart=session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success','product removed successfully');
        }

    }
    public function updatecart(Request $request)
    {
        // dd($request->quantity);
        if($request->id and $request->quantity){
            // dd($request->quantity);
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
        elseif($request->quantity == 0)
        {
            $cart=session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            
        }
        else
        {
            dd('poi');
        }
    }

    public function categoryproducts($id)
    {
        // dd($id);
        $category=category::orderby('cid','asc')->get();
        foreach($category as $key=>$cate)
        {
            $cid=$cate->cid;
            $scate=scate::where('cid',$cid)->orderby('sid','asc')->get();
            $category[$key]['subcategory']=$scate;
        }
        $product = product::where('product.cid',$id)->
                            join('category','category.cid','=','product.cid')->
                            join('scate','scate.sid','=','product.sid')->paginate(3);

        $cid=$id;
        foreach($product as $key=>$prod)
        {
            $pid= $prod->pid;
            $images = images::where('pid',$pid)->get();
            $product[$key]['iname'] = $images;
        }
        // dd($product);
        return view('category')->with('product',$product)->with('category',$category)->with('cid',$cid);
    }
    public function shop(){
        $category=category::orderby('cid','asc')->get();
        foreach($category as $key=>$cate)
        {
            $cid=$cate->cid;
            $scate=scate::where('cid',$cid)->orderby('sid','asc')->get();
            $category[$key]['subcategory']=$scate;
        }
        $product = product::join('category','category.cid','=','product.cid')->
                            join('scate','scate.sid','=','product.sid')->orderby('product.cid','asc')->paginate(3);
        $pro = product::all();
        // dd($pro);
        foreach($product as $key=>$prod)
        {
            $pid= $prod->pid;
            $images = images::where('pid',$pid)->get();
            $product[$key]['iname'] = $images;
        }
        
        return view('category')->with('product',$product)->with('category',$category)->with('cid',$cid);
    }
    public function subcategoryproducts($id)
    {
        // dd($id);
        $category=category::orderby('cid','asc')->get();
        foreach($category as $key=>$cate)
        {
            $cid=$cate->cid;
            $scate=scate::where('cid',$cid)->orderby('sid','asc')->get();
            $category[$key]['subcategory']=$scate;
        }
        $sid=$id;
        $product = product::where('product.sid',$id)->
                            join('category','category.cid','=','product.cid')->
                            join('scate','scate.sid','=','product.sid')->paginate(3);
                            
        foreach($product as $key=>$prod)
        {
            $pid= $prod->pid;
            $images = images::where('pid',$pid)->get();
            $product[$key]['iname'] = $images;
        }
        // dd($product);
        return view('subcategory')->with('product',$product)->with('category',$category)->with('sid',$sid);
    }
    public function viewproduct($id)
    {
        $category=category::orderby('cid','asc')->get();
        foreach($category as $key=>$cate)
        {
            $cid=$cate->cid;
            $scate=scate::where('cid',$cid)->orderby('sid','asc')->get();
            $category[$key]['subcategory']=$scate;
        }
        $product = product::find($id);
        // dd($product);
        $img= images::where('pid',$id)->get();
        // dd($product);
        return view('detail')->with('product',$product)->with('img',$img)->with('category',$category);
        
    }
    public function categorystock( Request $request ,$id)
    {
        $category=category::orderby('cid','asc')->get();
        foreach($category as $key=>$cate)
        {
            $cid=$cate->cid;
            $scate=scate::where('cid',$cid)->orderby('sid','asc')->get();
            $category[$key]['subcategory']=$scate;
        }
        $stock =$request->stock;
        if($stock == 'in')
        {
            $product = product::where('product.cid',$id)->where('stock','in stock')->
                            join('category','category.cid','=','product.cid')->
                            join('scate','scate.sid','=','product.sid')->paginate(3);
        }
        else
        {
            $product = product::where('product.cid',$id)->where('stock','out of stock')->
                            join('category','category.cid','=','product.cid')->
                            join('scate','scate.sid','=','product.sid')->paginate(3);
        }
        $cid=$id;
        foreach($product as $key=>$prod)
        {
            $pid= $prod->pid;
            $images = images::where('pid',$pid)->get();
            $product[$key]['iname'] = $images;
        }
        // dd($product);
        return view('category')->with('product',$product)->with('category',$category)->with('cid',$cid);
    }
    public function subcategorystock( Request $request ,$id)
    {
        $category=category::orderby('cid','asc')->get();
        foreach($category as $key=>$cate)
        {
            $cid=$cate->cid;
            $scate=scate::where('cid',$cid)->orderby('sid','asc')->get();
            $category[$key]['subcategory']=$scate;
        }
        $stock =$request->stock;
        if($stock == 'in')
        {
            // dd('in');
            $product = product::where('product.sid',$id)->where('stock','in stock')->
                            join('category','category.cid','=','product.cid')->
                            join('scate','scate.sid','=','product.sid')->paginate(3);
        }
        elseif($stock == 'out')
        {
            // dd('out');
            $product = product::where('product.sid',$id)->where('stock','out of stock')->
                            join('category','category.cid','=','product.cid')->
                            join('scate','scate.sid','=','product.sid')->paginate(3);
        }
        else{}
        $sid=$id;
        foreach($product as $key=>$prod)
        {
            $pid= $prod->pid;
            $images = images::where('pid',$pid)->get();
            $product[$key]['iname'] = $images;
        }
        // dd($product);
        return view('subcategory')->with('product',$product)->with('category',$category)->with('sid',$sid);
    }
    
}
