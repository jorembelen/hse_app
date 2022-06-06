<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
use App\User;

class UserController extends Controller
{
    
    public function userUpdate(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users,username,'  .  $id . ',id',
            'email' => 'required|unique:users,email,'  .  $id . ',id',
            'profile_pic' => 'image|mimes:jpeg,bmp,png,gif,svg,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            Alert::error('Failed', 'Please check your data and try again!');
            return back();
        }

        $user = User::findOrFail($id);
        
        $input = $request->except('role');
    //    return $input;

        if($files = $request->file('profile_pic')){

            // for save original image
        $ImageUpload = Image::make($files);
        $originalPath = 'images/uploads/profiles/';
        $name = $files->hashName();
        $ImageUpload->save($originalPath .$name);
        
        // for save thumnail image
        $thumbnailPath = 'images/uploads/profiles-thumb/';
        $ImageUpload->resize(180,180);
        $ImageUpload = $ImageUpload->save($thumbnailPath .$name);
    
        // Delete the old Image from the file
        if(auth()->user()->profile_pic != '') {
            $path1 = 'images/uploads/profiles/';
            $path2 = 'images/uploads/profiles-thumb/';
            \File::delete( $path1 .$user->profile_pic);
            \File::delete( $path2 .$user->profile_pic);
        }
        
        $user->profile_pic = $name;
        $user->save();

        }



        if(trim($request->password) == '') {
            $input = $request->except('password', 'role');

        }else{

         $input['password'] = bcrypt($request->password);
         
        } 
        $user->update($input);

     

        Alert::toast('Your Profile Has Been Updated Successfully!', 'success');
        return back();
    }


}
