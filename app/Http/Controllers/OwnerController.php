<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;
use App\User;
use Illuminate\Support\Facades\Hash;



class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
         request()->validate([
            'avatar' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=>'required',
            'password'=>'required',
            'email'=>'required|unique:users',
            'clinic_name'=>'required',
            'clinic_logo'=>'required',
            'clinic_time'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);

         $avatar = $request->file('avatar');
         $logo = $request->file('clinic_logo');
        
            if($avatar){
            
                $name=uniqid().time().'.'.$avatar->getClientOriginalExtension();
                $avatar->move(public_path('storages/owner/'),$name);
                $avatar_path='storages/owner/'.$name;
                  
            }

            if($logo){
            
                $name=uniqid().time().'.'.$logo->getClientOriginalExtension();
                $logo->move(public_path('storages/logo/'),$name);
                $logo_path='storages/logo/'.$name;
                  
            }

            $user=new User();
            $user->name=request('name');
            $user->email=request('email');
            $user->password=Hash::make(request('password'));
            $user->save();
      
            $user->assignRole('Admin');
        
        $owner=Owner::create([
            'user_id'=>$user->id,
            'nrc'=>request('nrc'),
            'age'=>request('age'),
            'dob'=>request('dob'),
            'avatar'=>$avatar_path,
            'clinic_name'=>request('clinic_name'),
            'clinic_logo'=>$logo_path,
            'clinic_time'=>request('clinic_time'),
            'address'=>request('address'),
            'phone'=>request('phone'),
        ]);

         return response()->json(['success'=>'Record is successfully added!']);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
