<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Carbon\Carbon;
use App\Medicine;
use App\Treatment;

class AppointmentController extends Controller
{
    public function index()
    {
    	//$patients=Patient::whereDate('created_at', Carbon::today())->get();
        $patients=Patient::Where('status',0)->get();

    	//dd($patients);
    	 return view('Appointment.index',compact('patients'));
    }
    public function patient(Request $request)
    {
    	$patient=Patient::find(request('id'));
        $drugs=Medicine::Where('medicinetype_id',1)->get();
        //dd($drugs);
        $injections=Medicine::where('medicinetype_id',2)->get();
        $treatments=Treatment::where('patient_id',request('id'))->get();
       /* $treatmentdrugs= $treatments->medicines()
                         ->wherePivot('type', '!=', Null)
                         ->get();
        dd($treatmentdrugs);*/
       // dd($treatments);
    	 return view('Appointment.show',compact('patient','drugs','injections','treatments'));

    }
    public function getmedicine(Request $request)
    {
        dd($request);
    }
}
