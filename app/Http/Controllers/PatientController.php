<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\Treatment;
use RealRashid\SweetAlert\Facades\Alert;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients=Patient::All();
        return view('patients.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors=Doctor::where('owner_id',1)->get();
        return view('patients.create',compact('doctors'));
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
            'age'=>'required|numeric',
            'child'=>'required',
            'gender'=>'required',
            'phoneno'=>'required|numeric',
            'address'=>'required',
            'married'=>'required',
            'pregnant'=>'required',
            'weight'=>'required',
            'allergy'=>'required',
            'job'=>'required',
            'file.*' => 'required|mimes:jpg,jpeg,png,bmp|max:20000'
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
    $doctor_id=Doctor::first()->value('id');
    //dd($doctor_id);
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
     $patient->status=0;
     $patient->pregnant=request('pregnant');
     $patient->body_weight=request('weight');
     $patient->allergy=request('allergy');
     $patient->job=request('job');
     $patient->file=json_encode($path);
     $patient->reception_id=1;
     $patient->save();

     $treatment=new Treatment;
     $treatment->patient_id=$patient->id;
     if(request('dcotor')){
        $treatment->doctor_id=request('doctor');
     }else{
        $treatment->doctor_id=$doctor_id;

     }
     $treatment->save();
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
         $patient = Patient::find($id);
          $doctors=Doctor::where('owner_id',1)->get();
          $treatments=Treatment::where('patient_id',$id)->where('gc_level','!=',null)->get();
         return view('patients.show',compact('patient','doctors','treatments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        
        // dd(json_decode($patient->file));
        return view('patients.edit',compact('patient'));
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
        

        if($request->hasfile('file'))
        {
            $upload_dir = 'storages/files/';

            $files = $request->file('file');
            foreach($files as $file)
            {
                $name = time().uniqid(rand()).'.'.$file->getClientOriginalExtension();
                $file->move($upload_dir, $name);
               $paths[] = $upload_dir . $name;
               $path=json_encode($paths);
            }
        }else{
        $path=request('oldimg');
        //dd($path);
        }

       $patient = Patient::find($id);
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
         $patient->file=$path;
         $patient->status=1;
         $patient->save();
         return redirect()->route('patient.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $patient = Patient::find($id);
        $patient->delete();
        return redirect()->route('patient.index');
    }

    public function incharge(Request $request)
    {
    $doctor_id=Doctor::first()->value('id');
         $treatment=new Treatment;
     $treatment->patient_id=request('patient_id');
     if(request('dcotor')){
        $treatment->doctor_id=request('doctor');
     }else{
        $treatment->doctor_id=$doctor_id;

     }
     $treatment->save();
     Alert::success('status', 'incharge successfully!');
      return redirect('patient');
    }
}
