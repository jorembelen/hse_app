<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\IncidentStoreRequest;
use App\Http\Requests\IncidentUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Incident;
use App\Models\Report;
use App\Models\Location;
use App\Models\Employee;
use App\User;
use Auth;
use Validator;
use App\Notifications\AdminNotification;
use App\Notifications\UserNotification;
use \PDF;
use Intervention\Image\Facades\Image;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $incidents = Incident::wherelocation(auth()->user()->location_id)->latest()->get();

        return view('incidents.index', compact('incidents'));
    }




    public function adminIndex()
    {

        $incidents = Incident::all();
        // dd($incidents);

        return view('incidents.index', compact('incidents'));
    }

    public function export()
    {

        $incidents = Incident::all();

        return view('reports.notification', compact('incidents'));
    }

    public function awaiting()
    {
        $incidents = Incident::wherestatus('0')->wherelocation(auth()->user()->location_id)->get();

        return view('incidents.index', compact('incidents'));
    }

    public function awaitingAdmin()
    {
        $incidents = Incident::wherestatus('0')->get();

        return view('incidents.index', compact('incidents'));
    }


 public function printNotification($id)
    {
        $incidents = Incident::findOrFail($id);
        $photos = explode('|', $incidents->images);

        $pdf = PDF::loadView('reports.print_remarks',['incidents' => $incidents, 'photos' => $photos]);
        return $pdf->stream('reports.pdf');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('create');

        $officers = Employee::all();
        $locations = Location::all();
        // $area = auth()->user()->location_id;
        // $names = Location::whereid($area)->get();

        // // return $names;
        // foreach ($names as $data)

        return view('incidents.create')
        ->with('officers', $officers)
        // ->with('data', $data)
        ->with('locations', $locations);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidentStoreRequest $request)
    {
        $greetings = "";
        date_default_timezone_set('Asia/Riyadh');

        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");

        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $greetings = "Good Morning!";
        } else

        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
            $greetings = "Good Afternoon!";
        } else

        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            $greetings = "Good Evening!";
        } else

        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            $greetings = "Good Night!";
        }


        $incidents = new Incident;

        $data = $request->all();

        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){

                    // for saving original image
                $ImageUpload = Image::make($file);
                $originalPath = 'files/image/';
                $name = $file->hashName();
                $ImageUpload->save($originalPath .$name);

                // for saving thumnail image
                $thumbnailPath = 'files/thumbnail/';
                $ImageUpload->resize(300,200);
                $ImageUpload = $ImageUpload->save($thumbnailPath .$name);

                // for saving to database
                $images[]=$name;
                $data['images'] = implode("|",$images);
            }
        }

        if($request->hasfile('docs')){
            $doc = $request->file('docs');

            // get the name of the image
            $name = $doc->hashName();
            $doc->move('files/documents',$name);
            $data['docs'] = $name;
        }

        if($request->filled('cause')){
            $data['cause'] = implode(', ' , $request->cause);
        }

        if($request->filled('injury_sustain')){
            $data['injury_sustain'] = implode(', ' , $request->injury_sustain);
        }

        if($request->filled('injury_location')){
            $data['injury_location'] = implode(', ' , $request->injury_location);
        }

        if($request->filled('equipment')){
            $data['equipment'] = implode(', ' , $request->equipment);
        }


        if($request->sel_involved == 'Employee')
        {
            $data['involved'] = implode(', ', $request->employee);
        }else{
            $data['involved'] = $request->contractor;
        }


        $output = $incidents->create($data);

        Alert::toast('Notification Report Added Successfully!', 'success');

        // This is for notification area
        $url = 'https://hse.ggwphost.com/view-notification/' .$output->id;
        $sender = 'Created by: ' .auth()->user()->name;
        $project = $output->location;
        $op = \DB::table('locations')->where('id', $project)->first();
        $location = 'Project: ' .$op->name;
        $title = 'Type of Incident: ' .$output->type;
        $admin = User::whererole('admin')
        // ->orWhere('role', '=', 'member')
        ->orWhere('role', '=', 'gm')
        ->orWhere('role', '=', 'hsem')
        ->get();
        $user = User::wherelocation_id($output->location)->get();

            $adminDetails = [
                'greeting' => $greetings,
                'body' => ' New Notification Report was added to the site.',
                'officer' =>  $sender,
                'project' =>  $title,
                'location' =>  $location,
                'actionText' => 'Click here',
                'actionURL' => url($url),
                'thanks' => 'Please click the button to view notification details!',
                'detail_id' => $output->id,
            ];

            $userDetails = [
                'greeting' => $greetings,
                'body' => 'Notification Report was successfully created!',
                'project' =>  $title,
                'location' =>  $location,
                'actionText' => 'Click here',
                'actionURL' => url($url),
                'thanks' => 'Please go to site to view incident details!',
                'info_id' => $output->id,
            ];

            \Notification::send($user, new UserNotification($userDetails));
            \Notification::send($admin, new AdminNotification($adminDetails));
            // End for Notification

            return redirect('/incidents');


        }

    /**
     * Display the specified resource.
     *
     * @param  \App\IncidentController  $incidentController
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incidents = Incident::findOrFail($id);

        $employees = $incidents->employee->badge .' - '. $incidents->employee->name .''.($incidents->employee->designation);

        // dd($incidents->involved->employee->name);

        $photos = explode('|', $incidents->images);

        // return $photos;

        return view('incidents.view')
        ->with('incidents' , $incidents)
        ->with('employees' , $employees)
        ->with('photos' , $photos);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IncidentController  $incidentController
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incidents = Incident::findOrFail($id);

        $officers = Employee::all();
        $locations = Location::all();

        return view('incidents.edit', compact('officers', 'locations', 'incidents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IncidentController  $incidentController
     * @return \Illuminate\Http\Response
     */
    public function update(IncidentUpdateRequest $request, $id)
    {
        $incidents = Incident::findOrFail($id);

        $data = $request->all();

        $photos = explode('|', $incidents->images);

        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){

                foreach($photos as $photo){
                    $path1 = 'files/image/';
                    $path2 = 'files/thumbnail/';
                    // Delete old image from file
                    if($incidents->images != '') {
                        \File::delete($path1 .$photo);
                        \File::delete($path2 .$photo);
                    }
                }

                    // for saving original image
                $ImageUpload = Image::make($file);
                $originalPath = 'files/image/';
                $name = $file->hashName();
                $ImageUpload->save($originalPath .$name);

                // for saving thumnail image
                $thumbnailPath = 'files/thumbnail/';
                $ImageUpload->resize(300,200);
                $ImageUpload = $ImageUpload->save($thumbnailPath .$name);

                // for saving to database
                $images[]=$name;
                $data['images'] = implode("|",$images);
            }
        }

        if($request->hasfile('docs')){
            $doc = $request->file('docs');
            // get the name of the image
            $name = $doc->hashName();
            $doc->move('files/documents',$name);
            $data['docs'] = $name;
            // Delete old image from file
            if($incidents->docs != '') {
                unlink(public_path('/files/documents/') . $incidents->docs);
            }
            // $reports['docs'] = $name;
        }

        if($request->filled('cause')){
            $data['cause'] = implode(', ' , $request->cause);
        }

        if($request->filled('injury_sustain')){
            $data['injury_sustain'] = implode(', ' , $request->injury_sustain);
        }

        if($request->filled('injury_location')){
            $data['injury_location'] = implode(', ' , $request->injury_location);
        }

        if($request->filled('equipment')){
            $data['equipment'] = implode(', ' , $request->equipment);
        }

        if($request->sel_involved == 'Employee')
        {
            if($request->filled('employee')){
                $data['involved'] = implode(', ', $request->employee);
            }
        }else{
            $data['involved'] = $request->contractor;
        }

            // dd($data);
            $incidents->update($data);

            // $doc->move('storage/documents',$name);

        Alert::toast('Report Updated Successfully!', 'success');

        return redirect('/incidents');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IncidentController  $incidentController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incidents = Incident::findOrFail($id);

        if($incidents->reports()->count()) {

            Alert::error('Error', 'Sorry, this data has an existing investigation report!');
            return back();

        }

        $photos = explode('|', $incidents->images);
        if($incidents->images) {
            foreach($photos as $img1){
                $path1 = 'files/image/';
                $path2 = 'files/thumbnail/';
                \File::delete($path1 . $img1);
                \File::delete($path2 . $img1);
              }
            }

        //   Delete old image from file
          if($incidents->docs) {
            unlink(public_path('/files/documents/') . $incidents->docs);
                }
        $incidents->delete();

        Alert::success('Success', 'Report Has Been Deleted Successfully');

        return back();

    }


}
