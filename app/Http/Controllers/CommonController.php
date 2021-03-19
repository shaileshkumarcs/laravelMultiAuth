<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;

class CommonController extends Controller
{
    //
    public function imageUploadPost(Request $request){
    	request()->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       	]);
       if ($files = $request->file('file')) {
           $destinationPath = 'category_images/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
        }
        return response()->json([
		    'status' => '200',
		    'message' => 'Great! Image has been successfully uploaded.',
		    'url'=> $destinationPath."".$profileImage,
		]);
    }
}
