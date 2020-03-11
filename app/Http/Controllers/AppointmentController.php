<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Carbon\Carbon;
use App\Medicine;
use App\Treatment;
use Illuminate\Support\Facades\DB;
class AppointmentController extends Controller
{
    public function index()
    {
    	//$patients=Patient::whereDate('created_at', Carbon::today())->get();
        $treatments=Treatment::where('gc_level',null)->get();

    	//dd($treatments);
    	 return view('Appointment.index',compact('treatments'));
    }
    public function patient(Request $request)
    {
        $patient_id=request('patient_id');
        $treatment_id=request('treatment_id');
    	$patient=Patient::find($patient_id);
        //dd($treatment_id);
        $drugs=Medicine::Where('medicinetype_id',1)->get();
        //dd($drugs);
        $injections=Medicine::where('medicinetype_id',2)->get();
        // dd($injections);
        $treatments=Treatment::where('patient_id',$patient_id)->where('gc_level','!=',null)->get();
       /* $treatmentdrugs= $treatments->medicines()
                         ->wherePivot('type', '!=', Null)
                         ->get();
        dd($treatmentdrugs);*/
       // dd($treatments);
    	 return view('Appointment.show',compact('patient','drugs','injections','treatments','treatment_id'));

    }
    public function getmedicine(Request $request)
    {
        dd($request);
    }
}
