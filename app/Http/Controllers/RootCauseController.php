<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RootCause;
use RealRashid\SweetAlert\Facades\Alert;

class RootCauseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cause = RootCause::all();

        return view('recommendation.index', compact('cause'));
        
    }

    public function recUser()
    {
        $cause = RootCause::where('user_id', '=', auth()->user()->id)->get();

        return view('recommendation.index', compact('cause'));
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cause = RootCause::where('report_id', '=', $id)->get();

        return view('recommendation.view', compact('cause'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = RootCause::findOrFail($id);

        return view('recommendation.edit', compact('item'));
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
        $cause = RootCause::findOrFail($id);

        $cause->update($request->all());

        Alert::toast('Data Updated Successfully', 'success');

        return redirect('recommendations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cause = RootCause::findOrFail($id);
        $cause->delete();

        Alert::success('success', 'Data Deleted Successfully!');

        return redirect('/admin/investigation');
    }
}
