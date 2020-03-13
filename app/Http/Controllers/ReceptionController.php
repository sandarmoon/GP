<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource;
use Auth;


//use Spatie\Permission\Traits\HasRoles;
class ReceptionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('reception.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
         request()->validate([
            'name'=>'required',
            'txtEmpPhone' => 'required|min:3',
            'address' => 'required|min:10',
            'email' => 'required|email|unique:users,email',
            'password'=>'required|min:8',
            'education'=>'required',
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

           if ($request->hasfile('file')) {

            $image = $request->file('file');
            $name = $image->getClientOriginalName();
            $image -> move(public_path().'/storages/files',$name);
            $path = '/storages/files/'.$name;
        }
        //dd($path);
        $user=new User;
        $user->name=request('name');
        $user->email=request('email');
        $user->password=Hash::make(request('password'));
        $user->assignrole('reception');
        $user->save();

        $reception=new Reception;
        $reception->gender=request('gender');
        $reception->phoneno=request('txtEmpPhone');
        $reception->education=request('education');
        $reception->address=request('address');
        $reception->user_id=$user->id;
        $reception->owner_id=Auth::user()->owner->id;
        $reception->file=$path;
        $reception->save();

         return response()->json(['success'=>'Record is successfully']);
        
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
        $reception=DB::table('receptions')
                    ->join('users','users.id','=','receptions.user_id')
                    ->where('receptions.id','=',$id)
                    ->select('users.*','receptions.*')
                    ->get();

                    //dd($reception);
        return $reception;
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
       // dd($request);
         request()->validate([
            'name'=>'required',
            'txtEmpPhone' => 'required|min:3',
            'address' => 'required|min:10',
            'email' => 'required',
            'password'=>'required|min:8',
            'education'=>'required',
            //'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

         if ($request->hasfile('file')) {

            $image = $request->file('file');
            $name = $image->getClientOriginalName();
            $image -> move(public_path().'/storages/files',$name);
            $path = '/storages/files/'.$name;
        }else{
            $path=request('oldimg');
        }
        if(request('newpassword')){
            $password=Hash::make(request('newpassword'));
        }else{
            $password=request('password');
        }
        $userid =(int)request('userid');
        //var_dump($userid);
         $user=User::find($userid);
         //dd($user);
        $user->name=request('name');
        $user->email=request('email');
        $user->password=$password;
        //$user->assignrole('reception');
        $user->save();

        $reception=Reception::find($id);
        $reception->gender=request('gender');
        $reception->phoneno=request('txtEmpPhone');
        $reception->education=request('education');
        $reception->address=request('address');
        $reception->user_id=$user->id;
        $reception->file=$path;
        $reception->save();

         return response()->json(['success'=>'update successfully']);


        }
        // dd(request('name'));
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $reception=Reception::find($id);
         
        $user=User::find($reception->user_id);
        //dd($user);
        $user->delete();
        $reception->delete();
        return response()->json(['success'=>'Record is successfully updated!']);
    }

    public function getuser(){

        //$delete=null;
        /*$receptions=DB::table('receptions')
                    ->join('users','users.id','=','receptions.user_id')
                    ->select('users.*','receptions.*')
                    ->get();
*/
            //dd($receptions);

       $reception = Reception::all();

       $receptions=UserResource::collection($reception);

        return $receptions;
    }
}
