<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicinetype; 
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\MedicinetypeResource;

class MedicineTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medTypes=Medicinetype::simplePaginate(15);
       //  return view('medicinetype.index1',compact('medTypes'));
       return view('medicinetype.index1',compact('medTypes'));;
    }

    public function getMedicineType()
    {
        $all=Medicinetype::all();
        $all=MedicinetypeResource::collection($all);
        return Datatables::of($all)->make(true);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('medicinetype.create');
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
           
            'name' => 'required',
            
        ]);

        Medicinetype::create([
            'name'=>request('name')
        ]);
       return response()->json(['success'=>'Data is successfully added!']);
        //echo "made it";
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
           
            'name' => 'required',
            
        ]);
        //dd($request);
        $medType=Medicinetype::find($id);
        //dd($medType);
        $medType->name=request('name');
        $medType->update();
       // echo "made it";
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $medicinetype = Medicinetype::find($id); // Can chain this line with the next one
        $medicinetype->delete($id);
        return response()->json(['success'=>'Record is successfully updated!']);
    }
}
