<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;
use App\Patient;
class TreatmentController extends Controller
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

        //dd($request);
        
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
        $request->validate([
             'gc'=>'required',
             'complaint' =>'required',
             'diagnosis' =>'required',
             'charges' =>'required|numeric',
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
        //dd(request('temperature'));
        $treatment=Treatment::find($id); 
        $treatment->file=json_encode($path);
        $treatment->gc_level=request('gc');
        $treatment->temperature=request('temperature');
        $treatment->body_weight=request('bodyWeight');
        $treatment->spo2=request('spo2');
        $treatment->pr=request('pr');
        $treatment->bp=request('bp');
        $treatment->rbs=request('rbs');
        $treatment->complaint=request('complaint');
        $treatment->examination=request('onexam');
        $treatment->relevant_info=request('relevantinfo');
        $treatment->chronic_disease=request('ud');
        $treatment->diagnosis=request('diagnosis');
        $treatment->external_medicine=request('externalMedicine');
        $treatment->next_visit_date=request('nextVisitDate1');
        $treatment->next_visit_date2=request('nextVisitDate2');
        $treatment->charges=request('charges');
        $treatment->save();
        $drugs=json_decode(request('drugs'));
        //dd(($drugs));
        foreach ($drugs as $key => $drug) {
            $tab=$drug->tab;
            //dd($tab);
            $time=$drug->time;
            $bf=$drug->bf;
            $duration=$drug->duration;
        $treatment->medicines()->attach($drug->drugid,['tab' => $tab, 'interval' => $time,'meal'=>$bf,'during'=>$duration]);     
        }
        //dd(($drugs));
        if(request('injections')){

        $injections=json_decode(request('injections'));

        foreach ($injections as $key => $injection) {
           $type=$injection->injectiontype;
        $treatment->medicines()->attach($injection->injectionid,['type' => $type]);     
        }
        }

         return response()->json(['success'=>'Record is successfully']);
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
