<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LocationStoreRequest;
use App\Http\Requests\LocationUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Imports\LocationsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();

        return view('location.index', compact('locations'));
    }

    public function importLocation()
    {

        return view('location.import');
    }

    public function import(Request $request) 
    {
        
        $validator = Excel::import(new LocationsImport,request()->file('file'));
        
        Alert::success('Success', 'Locations Imported Successfully!');
           
        return redirect('/admin/locations')->with('success', 'Locations Has Been imported Successfully');
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
    public function store(LocationStoreRequest $request)
    {
        $location = Location::create($request->all());

        Alert::toast('Location Added Successfully!', 'success');
            
        return redirect('/admin/locations');
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
        $location = Location::findOrFail($id);

        return view('location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationUpdateRequest $request, $id)
    {
        $location = Location::findOrFail($id);

        $location->update($request->all());

        Alert::toast('Location Updated Successfully!', 'success');
            
        return redirect('/admin/locations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        
        if($location->incident()->count()) {

            Alert::error('Error', 'Sorry, this location has an existing notification report!');
            return back();
            
        } 

        $location->delete();

        Alert::success('success', 'Location Deleted Successfully!');
            
        return back();
    }
}
