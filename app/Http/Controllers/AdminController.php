<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Incident;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use Validator;
use App\Models\Location;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();

        if(auth()->user()->role == 'super_admin')
        {
            $users = User::all();
        } else {
            $users = User::where('role', '!=', 'super_admin')->get();
        }

        return view('admin.index', compact('users', 'locations'));
    }

    public function profile($id)
    {
        $users = User::findOrFail($id);

        // dd($users);
        return view('admin.profile', compact('users'));
    }

    public function backup()
    {
       Artisan::call('backup:run', ['--only-db' => true]);

        Alert::success('Success', 'Backup Has Been Created Successfully');
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
    public function store(UserStoreRequest $request)
    {
        
        $adminUser = new User;
        $adminUser->name = $request->input('name');
        $adminUser->username = $request->input('username');
        $adminUser->email = $request->input('email');
        $adminUser->role = $request->input('role');
        if($request->filled('location_id')){
            $adminUser->location_id = $request->input('location_id');
        }else{
            $adminUser->location_id = $request->input('location_id_2');
        }
        $adminUser->password = bcrypt($request->input('password'));
  
        $adminUser->save();

        Alert::toast('User Has Been Created Successfully', 'success');

        return redirect('/admin/users#!');
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
        $user = User::findOrFail($id);
        $locations = Location::all();

        return view('admin.edit', compact('user', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {

        $user = User::findOrFail($id);

        if(trim($request->password) == '') {
            
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
            
        $user->update($input);
        

        Alert::toast('User Has Been Updated Successfully!', 'success');

        return redirect('/admin/users#!');
    }

    public function assignLocation(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $data = $request->all();
        if($request->role == 'site_member' || $request->role == 'user' ){
            if($request->location_id == ''){
            Alert::error('Error','Please assigned location for this user!');
                return back();
            }  
                $data['role'] = $request->role;
                $data['location_id'] = $request->location_id;
        }else{
            $data['role'] = $request->role;
            $data['location_id'] = null;
        }
        // return $data;
        $user->update($data);

        Alert::toast('User Has Been Updated Successfully!', 'success');

        return back();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // if($user->incidents()->count()) {
        if(Incident::where('user_id', '=', $id)->exists()) {

        Alert::error('Error', 'Sorry, this user has an existing notification report!');
        return back();

  
        } else {
            $path1 = 'images/uploads/profiles/';
            $path2 = 'images/uploads/profiles-thumb/';
            \File::delete( $path1 .$user->profile_pic);
            \File::delete( $path2 .$user->profile_pic);
            
            $user->delete();

            Alert::success('Success', 'User Has Been Deleted Successfully');
        }

        return back();
    }
}
