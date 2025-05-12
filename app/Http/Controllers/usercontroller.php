<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\scate;
use App\Models\orders;
use App\Models\iteminfo;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class usercontroller extends Controller
{
    public function userlogin(){
        return view('user.userlogin');
    }
    public function userlogincode(Request $request){
        $data = User::where('email',$request->email)->first();
        if(Hash::check($request->password,$data['password']) == true )
        {
            $user=session()->get('user');
            $user= [   
                    'order_id' =>$data->order_id,  
                    'id' =>$data->id,  
                    'fname' =>$data->fname,
                    'lname' =>$data->lname,
                    'email' =>$data->email,
                    'phone' =>$data->phone,
                    'address' =>$data->address,
                    'city' =>$data->city,
                    'country' =>$data->country,
                    'zip' =>$data->zip,
                    
            ];
            session()->put('user',$user);
            return redirect('/home')->with('success','woohoo! you have logged in!');
        }
        else
        {
            return redirect()->back()->with('passworderror','Password Is Wrong!');
        }
    }
    public function userregister()
    {
        return view('user.userregister');
    }
        
    public function userregistercode(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => 1,
            'password' => Hash::make($request->password),
        ]);
        return redirect('userlogin');
    }
    public function userdetails(){
        return view('user.userdetails');
    }
    public function userlogout(Request $request){
        $request->session()->forget('user'); 
        return redirect('/home')->with('danger','you have logged out!');
    }
    public function userorders(Request $request){
        $user=$request->session()->get('user');
        $orders=iteminfo::where('order_id',$user['order_id'])->get();
        return view('user.userorder')->with('orders',$orders);
    }
    public function userupdate(Request $request){
        $id=request('id');
        $user = orders::find($id);
        $user->fname = request('fname');
        $user->lname = request('lname');
        $user->email = request('email');
        $user->phone = request('phone');
        $user->address = request('address');
        $user->city = request('city');
        $user->country = request('country');
        $user->zip = request('zip');
        $user->save();
        $request->session()->forget('user');
        $value=session()->get('user');
        $value= [   
                'order_id' =>$id,  
                'fname' =>$user->fname,
                'lname' =>$user->lname,
                'email' =>$user->email,
                'phone' =>$user->phone,
                'password'=>$user->password,
                'address' =>$user->address,
                'city' =>$user->city,
                'country' =>$user->country,
                'zip' =>$user->zip,
                
        ];
        session()->put('user',$value);
        return redirect('/home')->with('success','User Detail Updated!');
    }
    public function emailuserunique(Request $request){
        $email = $request->email;
        $id = $request->id;
        if(!empty($id))
        {
            $email_count = orders::where('email',$email)->where('order_id','!=',$id)->count();
        }   
        else
        {
            $email_count = orders::where('email',$email)->count();
        }
        if($email_count == 0)
        {
            echo "true";
        }
        else{
            echo "false";
        }
    }
}
