<?php

namespace App\Http\Controllers;

use Ixudra\Curl\Facades\Curl;
use App\Models\em;
use Illuminate\Http\Request;
use app\Models\apitoken;

class apicontroller extends Controller
{
    public function register (Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);
        $validateddata['password']= bcrypt($request->password);

        $apitoken = apitoken::create($validateddata);
        $accesstoken = $apitoken->createtoken('authtoken')->accesstoken();
        return response(['apitoken' => $apitoken, 'accesstoken' =>$accesstoken]);
    }

    
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }
        else{
            $accessToken = auth()->user()->accessToken->createToken('apitoken');
            return response(['user' => auth()->user(), 'accesstoken' => $accessToken]);
        }

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=em::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required'
        ]);
        return em::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = em::findorfail($id);
        // dd($record);
        return response()->json($record);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = em::find($id);
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required'
        // ]);
        $record->update($request->all());
        return response()->json($record);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return em::destroy($id);
    }
    public function search($name)
    {
        return em::where('name','like','%'.$name.'%')->orwhere('email','like','%'.$name.'%')->get();
    }
}