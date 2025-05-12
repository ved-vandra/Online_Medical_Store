<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\scate;
use App\Models\product;
use App\Models\images;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Http\Requests\productrequest;
use Illuminate\Support\Facades\Validator;

class categorycontroller extends Controller
{
    // sku check
    
        public function skucheck(Request $request)
        {
            if(!empty($request->sku)){
                $sku = $request->sku;
                $pid = $request->pid;
                
                if(!empty($pid)){
                    $users_count = product::where('sku',$sku)->where('pid','!=',$pid)->count();
                }
                else{
                    // dd($pid);
                    $users_count = product::where('sku',$sku)->count();
                }
                if($users_count == 0){
                    echo "true";
                }
                else{
                    echo "false";
                }
            }
            else
            {
                echo "false";
            }
        }
    



//-----------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------
//-----------------------------------------CATEGORY---------------------------------------------------- 
//-----------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------
        
    //-----------------------------------------------------------------------
    //-----------------------------TABLE SHOW--------------------------------
    //-----------------------------------------------------------------------
        public function category(request $request)
        {
            $cate=$request->get('cate');
            if($request->ajax())
            {
                $output='';
                // DD('hello');
                // dd($query);
                if($cate!=''){
                    $all=category::sortable()->where('cid','like','%'.$cate.'%')
                                ->orwhere('cname','like','%'.$cate.'%')
                                ->orwhere('cdesc','like','%'.$cate.'%')
                                ->orderby('cid','asc')->paginate(4);
                }
                else
                {
                    $all = category::sortable()->orderby('cid','asc')->paginate(4);
                }
                return view('admin.cindex_data',['all'=>$all]);
            }
            else
            {
                if($cate!=''){
                    $all=category::sortable()->where('cid','like','%'.$cate.'%')
                                ->orwhere('cname','like','%'.$cate.'%')
                                ->orwhere('cdesc','like','%'.$cate.'%')
                                ->orderby('cid','asc')->paginate(4);
                    
                }
                else
                {
                    $all = category::sortable()->orderby('cid','asc')->paginate(4);
                }
                return view('admin.cindex')->with('all',$all);
            }
            
        }


    //-----------------------------------------------------------------------
    //-----------------------INSERT/UPDATE-SHOW/CODE-------------------------
    //-----------------------------------------------------------------------


        public function savecategoryshow($id = 0)
        {
            // dd('abc');
            if($id>0)
            {
                $category=category::find($id);
                return view("admin.savecategory",['category'=>$category]);
            }
            else
            {
                return view("admin.savecategory");
            }
        }
        public function savecategory($id=0)
        {
            // dd($id);
            if($id>0)
            {
                $savecategory = category::find($id);
            }
            else{
                $savecategory = new category;
            }
            $savecategory->cname = request('cname');
            $savecategory->cdesc = request('cdesc');
            // dd($savecategory);
            $savecategory->save(); 
            return redirect('/admin/category')->with('update','record inserted!');
            
        }


    //-----------------------------------------------------------------------
    // ---------------------------IN-LINE DELETE-----------------------------
    // ----------------------------------------------------------------------
        
        
        public function cdelete($cid)
        {
            $conn = category::where('cid',$cid)->delete();
            // error_log($cid);
            return redirect()->back()->with('error','record deleted');
        }

//-----------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------
//-------------------------------------SUB-CATEGORY---------------------------------------------------- 
//-----------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------
 

    //-----------------------------------------------------------------------
    //-----------------------------TABLE SHOW--------------------------------
    //-----------------------------------------------------------------------

        public function scate(Request $request)
        {
            $all='';
            $query=$request->get('query');
            if($request->ajax())
            {
                
                $output='';
                // DD('hello');
                // dd($query);
                if($query!=''){
                    $cate=category::all();
                    $all=scate::join('category','scate.cid', '=', 'category.cid')
                                ->where('sid','like','%'.$query.'%')
                                ->orwhere('cname','like','%'.$query.'%')
                                ->orwhere('sdesc','like','%'.$query.'%')
                                ->orderby('sid','asc')->paginate(4);
                }
                else
                {
                    
                    $all = scate::join('category','scate.cid', '=', 'category.cid')->orderby('sid','asc')->paginate(4);
                }
                return view('admin.sindex_data',['all'=>$all,'cate'=>$cate]);
            }
            else
            {
                if($query!=''){
                    $all=scate::join('category','scate.cid', '=', 'category.cid')
                                ->where('sid','like','%'.$query.'%')
                                ->orwhere('cname','like','%'.$query.'%')
                                ->orwhere('sdesc','like','%'.$query.'%')
                                ->orderby('sid','asc')->paginate(4);
                    
                }
                else
                {
                    $all = scate::join('category','scate.cid', '=', 'category.cid')->orderby('sid','asc')->paginate(4);
                }
                return view('admin.sindex',['all'=>$all]);
            }
        }


    //-----------------------------------------------------------------------
    //-----------------------INSERT/UPDATE-SHOW/CODE-------------------------
    //-----------------------------------------------------------------------


        public function savesubcategoryshow($id = 0)
        {
            // dd($id);
            $category = category::all();
            if($id>0)
            {
                $subcategory=scate::find($id);
                // dd($subcategory);
                return view("admin.savesubcategory")->with('subcategory',$subcategory)->with('category',$category);
            }
            else
            {
                return view("admin.savesubcategory")->with('category',$category);
            }
        }
        public function savesubcategory($id = 0)
        {
            // dd($id);
            if($id>0)
            {
                $savesubcategory = scate::find($id);
            }
            else{
                $savesubcategory = new scate;
            }
            $savesubcategory->sname = request('sname');
            $savesubcategory->cid = request('cid');
            $savesubcategory->sdesc = request('sdesc');
            // dd($savesubcategory);
            $savesubcategory->save();
            return redirect('/admin/subcategory')->with('update','record inserted!');
        }
        

    //-----------------------------------------------------------------------
    //---------------------------IN-LINE DELETE------------------------------
    //-----------------------------------------------------------------------
        
        
        public function sdelete($id)
        {
            // dd($id);
            $data = scate::find($id);
            $data->delete();
            return redirect()->back()->with('error','record deleted');
        }


//-----------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------
//----------------------------------------PRODUCT------------------------------------------------------ 
//-----------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------
 

    //-----------------------------------------------------------------------
    //-----------------------------TABLE SHOW--------------------------------
    //-----------------------------------------------------------------------

        public function product(request $request)
        {

            $all='';
            $product=$request->get('product');
            if($request->ajax())
            {
                
                $output='';
                // dd($product);
                if($product!=''){
                    $all=product::join('scate','scate.sid', '=', 'product.sid')
                                  ->join('category','category.cid', '=', 'scate.cid')
                                        ->where('pid','like','%'.$product.'%')
                                        ->orwhere('cname','like','%'.$product.'%')
                                        ->orwhere('sname','like','%'.$product.'%')
                                        ->orwhere('sku','like','%'.$product.'%')
                                        ->orwhere('pname','like','%'.$product.'%')
                                        ->orwhere('price','like','%'.$product.'%')
                                        ->orwhere('quan','like','%'.$product.'%')
                                        ->orwhere('stock','like','%'.$product.'%')
                                        ->orderby('pid','asc')->paginate(4);
                }
                else
                {
                    $all = product::join('scate','scate.sid', '=', 'product.sid')
                                    ->join('category','category.cid', '=', 'scate.cid')
                                    ->orderby('pid','asc')->paginate(4);
                    
                }
                foreach($all as $key=>$images)
                {
                    $pid= $images->pid;
                    $products = images::where('pid',$pid)->get();
                    $all[$key]['iname'] = $products;
                }
                return view('admin.pindex_data',['all'=>$all]);
            }
            else
            {
                if($product!=''){
                    $all=product::join('scate','scate.sid', '=', 'product.sid')
                                  ->join('category','category.cid', '=', 'scate.cid')
                                        ->where('pid','like','%'.$product.'%')
                                        ->orwhere('cname','like','%'.$product.'%')
                                        ->orwhere('sname','like','%'.$product.'%')
                                        ->orwhere('sku','like','%'.$product.'%')
                                        ->orwhere('pname','like','%'.$product.'%')
                                        ->orwhere('price','like','%'.$product.'%')
                                        ->orwhere('quan','like','%'.$product.'%')
                                        ->orwhere('stock','like','%'.$product.'%')
                                        ->orderby('pid','asc')->paginate(4);
                                        
                }
                else
                {
                    $all = product::join('scate','scate.sid', '=', 'product.sid')
                                    ->join('category','category.cid', '=', 'product.cid')
                                    ->orderby('product.pid','asc')->paginate(4);
                                    // ->toSql();
                                    // dd($all);
                }
                foreach($all as $key=>$images)
                {
                    
                    $pid= $images->pid;
                    $products = images::where('pid',$pid)->get();
                    $all[$key]['iname'] = $products;
                    // dd($all);
                }
                return view('admin.pindex',['all'=>$all]);
            }
        }


    //-----------------------------------------------------------------------
    //-----------------------INSERT/UPDATE-SHOW/CODE-------------------------
    //-----------------------------------------------------------------------


        public function saveproductshow($id = 0)
        {
            // dd($id);
            $category = category::orderby('cid','asc')->get();
            $subcategory = scate::all();
            if($id>0)
            {
                $product=product::find($id);
                $img = images::where('pid',$id)->get();
                $cidforscateddl =scate::where('cid',$product->cid)->get();
                return view("admin.saveproduct")->with('category',$category)->with('subcategory',$subcategory)->with('product',$product)->with('cidforscateddl',$cidforscateddl)->with('img',$img);
            }
            else
            {
                return view("admin.saveproduct")->with('category',$category)->with('subcategory',$subcategory);
            }
        }
        public function saveproduct(request $request ,$id=0)
        {
            // dd($id);
            if($id>0)
            {
                $product = product::find($id);
            }
            else
            {
                $product = new product;
            }
            $product->sku = request('sku');
            $product->cid = request('cid');
            $product->sid = request('sid');
            $product->pname = request('pname');
            $product->price = request('price');
            $product->salestartdate = request('salestartdate');
            $product->saleenddate = request('saleenddate');
            $product->saleprice = request('saleprice');
            $product->quan = request('quan');
            $product->stock = request('stock');
            $product->save();
            
            if ($request->hasfile('images')){
                foreach($request->file('images') as $image)
                {
                    $name= $image->getClientOriginalName();
                    $image->move(public_path().'/uploads/',$name);
                    $imgdata = $name;
                    $filemodel= new images();

                    $filemodel->pid = $product->pid;
                    $filemodel->iname = ($imgdata);
                    $filemodel->image_path = ($imgdata);
                    $filemodel->save();
                }
            }
            return redirect('/admin/product')->with('update','record insert!');
                
        }


    //-----------------------------------------------------------------------
    //---------------------------IN-LINE DELETE------------------------------
    //-----------------------------------------------------------------------
        
        

        public function pdelete($id)
        {
            $data = product::find($id);
            $img = images::where('pid',$id)->delete();
            $data->delete();
            return redirect()->back()->with('error','record deleted');
        }
        
    //------------------------------------------------------------------------------------------------
    //-----------------------------------------IMAGE DELETE-------------------------------------------
    //------------------------------------------------------------------------------------------------


        public function idelete($id)
        {
            $data = images::find($id);
            // dd($data);
            $data->delete();
            return redirect()->back()->with('error','image deleted!');
        }


    //------------------------------------------------------------------------------------------------
    //--------------------------------------DROP DOWN LIST CHANGE-------------------------------------
    //------------------------------------------------------------------------------------------------
    
        
        public function myformAjax($cid)
        {
            // dd($cid);
            $scate = scate::where("cid",$cid)->get();
            return response()->json($scate);
        }
 
}