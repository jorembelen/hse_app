<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReportStoreRequest;
use App\Http\Requests\ReportUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
use App\Notifications\AdminNotification;
use App\Notifications\UserNotification;
use App\Notifications\ManagerNotification;
use App\Models\Incident;
use App\Models\Location;
use App\Models\Report;
use App\Models\Employee;
use App\Models\RootCause;
use App\Models\Remark;
use App\User;
use Auth;
use DB;
use \PDF;
// use Dompdf\Dompdf;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::wherelocation_id(Auth::user()->location_id)->latest()->get();

        return view('report.index', compact('reports'));
    }

    public function adminIndex()
    {
        $reports = Report::all();

        return view('report.index', compact('reports'));
    }

    public function printReport($id)
    {
        $reports = Report::findOrFail($id);

        $output = $reports->name();

        $photos = explode('|', $reports->proof);
        $images = explode('|', $reports->inc_img);

        $pdf = PDF::loadView('reports.print_report',compact('reports', 'output', 'images', 'photos'));
        return $pdf->stream('reports.pdf');

        // return view('reports.print', compact('reports', 'output', 'images', 'photos'));
    }

    public function review()
    {
        $reports = Report::all();
        $remarks = Remark::where('report_id')->get()->toArray();

        return view('manager.index', compact('reports'));
    }

    public function remarksDetail($id)
    {
        $remarks = Remark::where('report_id', $id)->get();

        return view('manager.view', compact('remarks'));
    }


    public function remarks(Request $request)
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

        $remarks = Remark::create($request->all());

        $id = $request->report_id;
        $status = '1';

        DB::update('update reports set remarks = ? where id = ?', [$status, $id]);

        $url = 'https://hse.ggwphost.com/remarks-detail/' .$id;
        $notification = ' Incident Report ' .$id. ' was remark as ' .$remarks->status. '.';
        $sender = 'Created by: ' .auth()->user()->name;
        $user = User::where('role', '=', 'admin')
        ->orWHere('role', '=', 'gm')
        ->orWHere('role', '=', 'hsem')
        ->get();

        $details = [
            'greeting' => $greetings,
            'body' => $notification,
            'manager' =>  $sender,
            'actionText' => 'Go to Site',
            'actionURL' => url($url),
            'thanks' => 'Please go to site to view remarks details!',
            'status_id' => $id,
        ];

        \Notification::send($user, new ManagerNotification($details));

        Alert::toast('Remarks Successfully Added!', 'success');

        // }


        return redirect('/admin/review');
    }

    public function incidentReport($id)
    {
        $id;
        $data = Incident::where('id', '=', $id)->first();

        if(Report::whereincident_id($id)->exists()) {
            Alert::error('Error', 'This incident ID already exist on the report!');
            return back();
         }

        $officer = $data->employee_id;
        $location = $data->location;

        $officers = Employee::all();
        $locations = Location::all();

        return view('report.create', compact('officers', 'locations', 'id', 'officer', 'location'));
    }

    public function incident($id)
    {
        $reports = Report::findOrFail($id);

        // dd($reports);
        return view('report.index', compact('reports'));
    }


    public function reportAll()
    {
        $reports = Report::with('rootcause')->get();

        foreach($reports as $data)
        {
            $output = $data->name();
        }

        return view('reports.investigation', compact('reports', 'output'));
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
    public function store(ReportStoreRequest $request)
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

        $reports = $request->all();

        // dd($reports);
        $images=array();
        if($files=$request->file('proof')){
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
                $reports['proof'] = implode("|",$images);
            }
        }
        $incidents=array();
        if($imgs=$request->file('inc_img')){
            foreach($imgs as $img){
                    // for saving original image
                $Upload = Image::make($img);
                $path = 'files/image/';
                $title = $img->hashName();
                $Upload->save($path .$title);

                // for saving thumnail image
                $resizePath = 'files/thumbnail/';
                $Upload->resize(300,200);
                $Upload = $Upload->save($resizePath .$title);

                // for saving to database
                $incidents[]=$title;
                $reports['inc_img'] = implode("|",$incidents);
            }
        }


        if($request->hasfile('docs')){
            $doc = $request->file('docs');
            // get the name of the image
            $filename = $doc->hashName();
            $doc->move('files/documents',$filename);
            $reports['docs'] = $filename;
        }

            if (Report::where('incident_id', '=', $request->incident_id)->exists())

            {
                Alert::error('Error', 'Notification ID already exists!');
                return back();

            } else {

            $datas = Report::create($reports);

            $url = 'https://hse.ggwphost.com/view-report/' .$datas->id;
            $notification = ' Notification Report ' .$request->incident_id. ' was closed.';
            $notification2 = ' Your notification ' .$request->incident_id. ' was successfully closed.';
            $sender = 'Created by: ' .auth()->user()->name;
            $project = $request->location_id;
            $op = \DB::table('locations')->where('id', $project)->first();
            $location = 'Project: ' .$op->name;
            $inc_detail = 'Investigation ID: ' .$datas->id;
            $admin = User::whererole('admin')
            // ->orWhere('role', '=', 'member')
            ->orWhere('role', '=', 'gm')
            ->orWhere('role', '=', 'hsem')
            ->get();
            $user = User::wherelocation_id($datas->location_id)->get();

            $adminDetails = [
                'greeting' => $greetings,
                'body' => $notification,
                'officer' =>  $sender,
                'project' =>  $inc_detail,
                'location' =>  $location,
                'actionText' => 'Click here',
                'actionURL' => url($url),
                'thanks' => 'Please click the button to view notification details!',
                'detail_id' => $datas->id,
            ];
            $userDetails = [
                'greeting' => $greetings,
                'body' => $notification2,
                'project' =>  $inc_detail,
                'location' =>  $location,
                'actionText' => 'Click here',
                'actionURL' => url($url),
                'thanks' => 'Please click the button to view notification details!',
                'info_id' => $datas->id,
            ];

            // \Notification::send($user, new UserNotification($userDetails));
            // \Notification::send($admin, new AdminNotification($adminDetails));


            $count = count($request->root_name);

            for ($i=0; $i < $count; $i++) {
            $output = new RootCause();
            $output->incident_id = $datas->incident_id;
            $output->user_id = auth()->user()->id;
            $output->root_name = $request->root_name[$i];
            $output->rec_name = $request->rec_name[$i];
            $output->rec_type = $request->rec_type[$i];
            $output->type = $request->root_description[$i];

            $datas->rootcause()->save($output);


            $id = $request->incident_id;
            $status = '1';

            DB::update('update incidents set status = ? where id = ?', [$status, $id]);

                }
            }


            Alert::toast('Data Added Successfully!', 'success');


            return redirect('/incidents');
    }




    public function showReport($id)
    {

        $reports = Report::where('incident_id', '=', $id)->get();

        return view('report.index', compact('reports'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $reports = new Report();

        $reports = Report::findOrFail($id);

        $output = $reports->name();

        $photos = explode('|', $reports->proof);
        $images = explode('|', $reports->inc_img);

        return view('report.view', compact('reports', 'photos', 'images', 'output'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reports = Report::findOrFail($id);

        $officers = Employee::all();
        $locations = Location::all();
        // dd($reports);
        return view('report.edit', compact('reports', 'officers', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReportUpdateRequest $request, $id)
    {
        $reportUpdate = Report::findOrFail($id);

        $reports = $request->all();

        $photos = explode('|', $reportUpdate->proof);
        $incImages = explode('|', $reportUpdate->inc_img);


        // dd($photos);
        $images=array();
        if($files=$request->file('proof')){

            foreach($files as $file){

                foreach($photos as $photo){
                    $path1 = 'files/image/';
                    $path2 = 'files/thumbnail/';
                    // Delete old image from file
                    if($reportUpdate->proof != '') {
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

                $images[]=$name;
                $reports['proof'] = implode("|",$images);
            }
        }

        $incidents=array();
        if($imgs=$request->file('inc_img')){
            foreach($imgs as $img){

                foreach($incImages as $imgFile){
                    $path3 = 'files/image/';
                    $path4 = 'files/thumbnail/';
                    // Delete old image from file
                    if($reportUpdate->inc_img != '') {
                        \File::delete($path3 . $imgFile);
                        \File::delete($path4 . $imgFile);
                    }
                }
                // for saving original image
                $Upload = Image::make($img);
                $path = 'files/image/';
                $title = $img->hashName();
                $Upload->save($path .$title);

                // for saving thumnail image
                $resizePath = 'files/thumbnail/';
                $Upload->resize(300,200);
                $Upload = $Upload->save($resizePath .$title);

                // for saving to database
                $incidents[]=$title;
                $reports['inc_img'] = implode("|",$incidents);
            }
        }

        if($request->hasfile('docs')){
            $doc = $request->file('docs');

            // Delete old image from file
            if($reportUpdate->docs != '') {
                unlink(public_path('/files/documents/') . $reportUpdate->docs);
            }

            // get the name of the image
            $filename = $doc->hashName();
            $doc->move('files/documents',$filename);
            $reports['docs'] = $filename;
        }

            $reportUpdate->update($reports);

            Alert::toast('Data Updated Successfully!', 'success');

            return redirect('/reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $incidents = Report::all();

        $reports = Report::findOrFail($id);

        // Delete old image from file
        if($reports->docs) {
            $path5 = 'files/documents/';
            \File::delete( $path5 .$reports->docs);
        }

        $photos1 = explode('|', $reports->proof);
        $photos2 = explode('|', $reports->inc_img);

        if($reports->proof) {
        foreach($photos1 as $img1){
            $path1 = 'files/image/';
            $path2 = 'files/thumbnail/';
            \File::delete($path1 . $img1);
            \File::delete($path2 . $img1);
          }
        }
        if($reports->inc_img) {
        foreach($photos2 as $img2){
            $path3 = 'files/image/';
            $path4 = 'files/thumbnail/';
            \File::delete( $path3 . $img2);
            \File::delete( $path4 . $img2);
          }
        }

        foreach($incidents as $incident){
            $id = $incident->incident_id;
        }
        $status = '0';

        DB::update('update incidents set status = ? where id = ?', [$status, $id]);

        $reports->rootcause()->delete();
        $reports->remark()->delete();
        $reports->delete();


        Alert::success('Success', 'Report Has Been Deleted Successfully');

        return back();
    }
}
