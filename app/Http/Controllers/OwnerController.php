<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;
use App\User;
use Illuminate\Support\Facades\Hash;
use URL;
use Session;
use Yajra\DataTables\Facades\DataTables;



class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message='';
        $preRouteName=app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

    
        if($preRouteName=="owners.create"){
            $messge="Owner is successfully created!";
        }elseif($preRouteName=="owners.edit"){
           $messge="Owner is successfully updated!";
        }
        return view('owner.index',compact('message'));
        
    }

    public function getOwners(){
        
        

        $all=Owner::with('user')->get();
        return Datatables::of($all)->make(true);
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
            'clinic_logo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        Session::flash('success', 'Record is successfully added!');
         return response()->json(['success'=>'0']);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owner =Owner::with('user')->find($id);
        //dd($doctor);
        return view('owner.detail1',compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner =Owner::with('user')->find($id);
        return view('owner.edit',compact('owner'));
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
         $avatar = $request->file('avatar');
         $logo = $request->file('new_clinic_logo');
         $profile='';
         $logo_path='';
       // dd($avatar);
        
        if($avatar){
           
                $name=uniqid().time().'.'.$avatar->getClientOriginalExtension();
                $avatar->move(public_path('storages/owner'),$name);
                $profile='storages/owner/'.$name;  
        }else{
            $profile=request('oldavatar');
        }

        if($logo){
           
                $name=uniqid().time().'.'.$logo->getClientOriginalExtension();
                $logo->move(public_path('storages/logo/'),$name);
                $logo_path='storages/logo/'.$name;
        }else{
            $logo_path=request('old_clinic_logo');
        }

        $owner=Owner::with('user')->find($id);
            
            $owner->nrc=request('nrc');
            $owner->age=request('age');
            $owner->dob=request('dob');
            $owner->avatar=$profile;
            $owner->clinic_name=request('clinic_name');
            $owner->clinic_logo=$logo_path;
            $owner->clinic_time=request('clinic_time');
            $owner->address=request('address');
            $owner->phone=request('phone');
            $owner->update();

             $user=User::find($owner->user->id);
            $user->name=request('name');
            $user->update();
            Session::flash('success', 'Record is successfully updated!');
        return response()->json(['success'=>'1']);
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
        $owner = Owner::find($id);
        //dd($doctor->user->id);
        

        $user=User::find($owner->user->id);
        $user->delete();
        $owner->delete();
        $user->save();
        return response()->json(['success'=>'Record is successfully updated!']);
    }
}
