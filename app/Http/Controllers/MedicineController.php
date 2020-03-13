<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Medicine;
use App\Medicinetype;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\MedicineResource;
class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines =Medicine::orderBy('id','DESC')->get();
        $medTypes=Medicinetype::all();
        //return view('medicine.index',compact('medicines','medTypes'));
        return view('medicine.index1',compact('medicines','medTypes'));
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
            'typeid' => 'required',
            'name' => 'required',
            'chemical' => 'required',
        ]);

        $medicine=new Medicine();
        $medicine->medicinetype_id=request('typeid');
        $medicine->name=request('name');
        $medicine->chemical=request('chemical');
        $medicine->save();

        $medicines=Medicine::orderBy('id','DESC')->get();

        return response()->json(['success'=>'Record is successfully added!','medicines'=>$medicines]);
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
        $medicine=Medicine::find($id);
      return $medicine;
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
        // dd($id);
         $request->validate([
            'typeid' => 'required',
            'name' => 'required',
            'chemical' => 'required',
        ]);
         $medicine=Medicine::find($id);
         $medicine->name=request('name');
         $medicine->medicinetype_id=request('typeid');
         $medicine->chemical=request('chemical');
         $medicine->save();
         return response()->json(['success'=>'Record is successfully updated!','medicine'=>$medicine]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $med = Medicine::find($id); // Can chain this line with the next one
        $med->delete($id);
        return response()->json(['success'=>'Record is successfully updated!']);
        
    }

    public function getMedicine(){
        
        

        $medicines=Medicine::orderBy('id','DESC')->get();

        $all=MedicineResource::collection($medicines);
        return Datatables::of($all)->make(true);
    }
}
