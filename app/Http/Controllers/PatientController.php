<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
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
        return view('patients.create');
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
            'fathername'=>'required',
            'age'=>'required',
            'child'=>'required',
            'gender'=>'required',
            'phoneno'=>'required',
            'address'=>'required',
            'married'=>'required',
            'pregnant'=>'required',
            'weight'=>'required',
            'allergy'=>'required',
            'job'=>'required',
            'file'=>'required'
        ]);

        if($request->hasfile('file'))
        {
            $upload_dir = 'storages/files/';

            $files = $request->file('file');
            foreach($files as $file)
            {
                $name = time().uniqid(rand()).'.'.$file->getClientOriginalExtension();
                $file->move($upload_dir, $name);
               $path[] = $upload_dir . $name;
            }
        }

    //dd($path);

     $patient=new Patient;
     $patient->name= request('name');
     $patient->fathername=request('fathername');
     $patient->age=request('age');
     $patient->child=request('child');
     $patient->gender=request('gender');
     $patient->phoneno=request('phoneno');
     $patient->address=request('address');
     $patient->married_status=request('married');
     $patient->pregnant=request('pregnant');
     $patient->body_weight=request('weight');
     $patient->allergy=request('allergy');
     $patient->job=request('job');
     $patient->file=json_encode($path);
     $patient->status=0;
     $patient->save();
     return redirect()->route('patient.index');

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
