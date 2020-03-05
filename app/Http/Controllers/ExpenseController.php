<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Treatment;
use Carbon;
use DB;

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
        $dateS = Carbon::now()->startOfMonth()->subMonth(3);
        $dateE = Carbon::now()->startOfMonth()->addMonth(1); 
        // echo $dateS.$dateE;
        // $TotalSpent = DB::table('orders')
        // ->select('total_cost','placed_at')
        // ->whereBetween('placed_at',[$dateS,$dateE])
        // ->where(['deleted' => '0', 'delivery_address_id' => $DeliveryAddress->id])
        // ->sum('total_cost');

        // $records = Treatment::whereMonth('created_at', '>=', $dateS)
        //     ->whereMonth('created_at', '<=', $dateE)
        //     ->get();
        //$records=Treatment::whereBetween('created_at',array($dateS,$dateE))->get();

       
        $data= Treatment::all()
        
        ->sortByDESC(function ($item) {
        return $item->created_at->month;
        })
        ->sortByDESC(function ($item) {
        return $item->created_at->year;
        })
        ->whereBetween('created_at', [ Carbon::now()->startOfMonth()->subMonth(5), Carbon::now()->startOfMonth()])
        
        ->groupBy(function ($item) {
             return $item->created_at->format("F:Y");
        })->map
        ->sum('charges');

        $expenses=Expense::orderBy('id','DESC')->get();
        return response()->json(['expenses'=>$expenses,'report'=>$data]);;
    }

    public function searchReport(Request $request){
         $request->validate([
            'startdate' => 'required',
            'enddate' => 'required',
            
        ]);
       $startdate=request('startdate');
       $enddate=request('enddate');

       $totalexpense=Expense::whereBetween('date',array($startdate,$enddate))->sum('amount');

       $date_from = Carbon::parse($startdate)->startOfDay();
        $date_to = Carbon::parse($enddate)->endOfDay();

        $totalIncome = Treatment::whereDate('created_at', '>=', $date_from)
            ->whereDate('created_at', '<=', $date_to)
            ->sum('charges')
            ->toArray();

       return response()->json(['totalExpense'=>$totalexpense,'totalIncome'=>$totalIncome]);
    }

    


}
