<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expense.index');
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
        // dd($request);

         $request->validate([
            'date' => 'required',
            'description' => 'required',
            'amount' => 'required',
        ]);

        $expense=array();
        $count=count($request->file());
        $filearray=$request->file();
       foreach($filearray as $f){
           $name=uniqid().time().'.'.$f->getClientOriginalExtension();
                $f->move(public_path('storages/expense/'),$name);
                $path='storages/expense/'.$name;
                $expense[]=$path;
       }
      // var_dump($expense);
      //   die();
        Expense::create([
            'date'=>request('date'),
            'description'=>request('description'),
            'amount'=>request('amount'),
            'files'=>json_encode($expense),
        ]);
        echo "successfully";
        
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
        // dd($request);
         $expensefile=array();

         $expense = Expense::find($id);
                 $fielpath='';
        $count=count($request->file());
        $filearray=$request->file();
        if($count>0){

            foreach(json_decode(request('oldimage'),true) as $img){
                unlink($img);
            }
             foreach($filearray as $f){
               $name=uniqid().time().'.'.$f->getClientOriginalExtension();
                    $f->move(public_path('storages/expense/'),$name);
                    $path='storages/expense/'.$name;
                    $expensefile[]=$path;

               }
               $filepath=json_encode($expensefile);
        }else{
             $filepath=request('oldimage');
        }

         $expense->description=request('description');
         $expense->date=request('date');
         $expense->amount=request('amount');
         $expense->files=$filepath;
         $expense->update();
         echo "successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $expense = Expense::find($id); // Can chain this line with the next one
        $expense->delete($id);
        return response()->json(['success'=>'Record is successfully updated!']);
    }

    public function getExpense(){
        $expenses=Expense::orderBy('id','DESC')->get();
        return $expenses;
    }

    public function searchReport(Request $request){
         $request->validate([
            'startdate' => 'required',
            'enddate' => 'required',
            
        ]);
       $startdate=request('startdate');
       $enddate=request('enddate');

       $totalexpense=Expense::whereBetween('date',array($startdate,$enddate))->sum('amount');
       return response()->json(['totalExpense'=>$totalexpense]);
    }
}
