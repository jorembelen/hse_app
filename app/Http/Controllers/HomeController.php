<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\RootCause;
use App\User;
use App\Notifications\UserNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/dashboard');
    }

    public function dashboard()
    {
        $totalA =  count(Incident::wheretype('Fatality')->get());
        $totalB =  count(Incident::wheretype('Lost Time Injury')->get());
        $totalC =  count(Incident::wheretype('Dangerous Occurence')->get());
        $totalD =  count(Incident::wheretype('First Aid')->get());
        $totalE =  count(Incident::wheretype('Property Damage')->get());
        $totalF =  count(Incident::wheretype('MTC')->get());
        $totalG =  count(Incident::wheretype('RWC')->get());
        $totalH =  count(Incident::wheretype('MVI')->get());
        $totalI =  count(Incident::wherestatus('0')->get());
        $totalJ =  count(Incident::wheretype('Near Miss')->get());
        $totalK =  count(Incident::wherestatus('0')->where('location', '=', auth()->user()->location_id)->get());
        $totalL =  count(RootCause::wherestatus('0')->get());
        $totalM =  count(RootCause::wherestatus('0')->where('user_id', '=', auth()->user()->id)->get());
        $totalN =  count(Incident::all());

        // dd($totalN);
        $data = [$totalA, $totalB, $totalC, $totalD, $totalE, $totalF, $totalG, $totalH, $totalI, $totalJ, $totalK, $totalL, $totalM, $totalN];

        $root1 = count(RootCause::wheretype('people')->get());
        $root2 = count(RootCause::wheretype('process')->get());
        $root3 = count(RootCause::wheretype('equipment')->get());
        $root4 = count(RootCause::wheretype('workplace')->get());

        $cause =[$root1, $root2, $root3, $root4];

        $fatality3 = count(Incident::wheretype('fatality')->wherewps('3')->get());
        $fatality4 = count(Incident::wheretype('fatality')->wherewps('4')->get());
        $fatality5 = count(Incident::wheretype('fatality')->wherewps('5')->get());

        $fatality = [$fatality3, $fatality4, $fatality5];

        $lostTimeInjury3 = count(Incident::wheretype('lost time injury')->wherewps('3')->get());
        $lostTimeInjury4 = count(Incident::wheretype('lost time injury')->wherewps('4')->get());
        $lostTimeInjury5 = count(Incident::wheretype('lost time injury')->wherewps('5')->get());

        $lostTimeInjury = [$lostTimeInjury3, $lostTimeInjury4, $lostTimeInjury5];

        $dangerousOccurence3 = count(Incident::wheretype('dangerous occurence')->wherewps('3')->get());
        $dangerousOccurence4 = count(Incident::wheretype('dangerous occurence')->wherewps('4')->get());
        $dangerousOccurence5 = count(Incident::wheretype('dangerous occurence')->wherewps('5')->get());

        $dangerousOccurence = [$dangerousOccurence3, $dangerousOccurence4, $dangerousOccurence5];

        $propertyDamage3 = count(Incident::wheretype('property damage')->wherewps('3')->get());
        $propertyDamage4 = count(Incident::wheretype('property damage')->wherewps('4')->get());
        $propertyDamage5 = count(Incident::wheretype('property damage')->wherewps('5')->get());

        $propertyDamage = [$propertyDamage3, $propertyDamage4, $propertyDamage5];

        $firstAid3 = count(Incident::wheretype('first aid')->wherewps('3')->get());
        $firstAid4 = count(Incident::wheretype('first aid')->wherewps('4')->get());
        $firstAid5 = count(Incident::wheretype('first aid')->wherewps('5')->get());

        $firstAid = [$firstAid3, $firstAid4, $firstAid5];

        $mtc3 = count(Incident::wheretype('mtc')->wherewps('3')->get());
        $mtc4 = count(Incident::wheretype('mtc')->wherewps('4')->get());
        $mtc5 = count(Incident::wheretype('mtc')->wherewps('5')->get());

        $mtc = [$mtc3, $mtc4, $mtc5];

        $rwc3 = count(Incident::wheretype('rwc')->wherewps('3')->get());
        $rwc4 = count(Incident::wheretype('rwc')->wherewps('4')->get());
        $rwc5 = count(Incident::wheretype('rwc')->wherewps('5')->get());

        $rwc = [$rwc3, $rwc4, $rwc5];

        $mvi3 = count(Incident::wheretype('mvi')->wherewps('3')->get());
        $mvi4 = count(Incident::wheretype('mvi')->wherewps('4')->get());
        $mvi5 = count(Incident::wheretype('mvi')->wherewps('5')->get());

        $mvi = [$mvi3, $mvi4, $mvi5];

        $nearMiss3 = count(Incident::wheretype('near miss')->wherewps('3')->get());
        $nearMiss4 = count(Incident::wheretype('near miss')->wherewps('4')->get());
        $nearMiss5 = count(Incident::wheretype('near miss')->wherewps('5')->get());

        $nearMiss = [$nearMiss3, $nearMiss4, $nearMiss5];

        $months = Incident::select('id', 'date')
        ->get()
        ->groupBy(function($date){
            return Carbon::parse($date->date)->format('Y'); //Year format
            // return Carbon::parse($date->date)->format('m');
        });

        $usermcount = [];
        $userArr = [];

        foreach ($months as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[$i] = $usermcount[$i];    
            }else{
                $userArr[$i] = 0;    
            }
        }
        date_default_timezone_set("America/New_York");
        $current_year = date('h:i:s a');
        $current_month = date('M');
        $last_year = date('Y', strtotime('-1 year'));
        $last_month = date('M', strtotime('+1 month'));

        $current_month_user = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', 
                            Carbon::now()->month)->count();
        $dec_2020 = User::whereYear('created_at', Carbon::now()->subYear(1))->whereMonth('created_at', 
                            Carbon::now()->subMonth(1))->count();

        $last_month_incident = Incident::whereYear('date', Carbon::now()->subYear(1))->whereMonth('date', 
                            Carbon::now()->subMonth(2))->count();
        $A = 16.00;
        $B = 13.00;
        $C = 11;
        $array = rand(1,42);
        // $sum = array_diff($array);
        $year = Incident::whereYear('created_at', '2020')->whereMonth('created_at', 
                            '8')->count();
        // return $current_year;

        return view('admin.dashboard', compact(
            'data', 'cause', 'userArr', 'firstAid', 'mtc', 'fatality', 'lostTimeInjury', 'dangerousOccurence', 'propertyDamage', 'rwc', 'mvi', 'nearMiss'
        ));
    }

}
