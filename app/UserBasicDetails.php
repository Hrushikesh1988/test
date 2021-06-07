<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserBasicDetails extends Model
{
    protected $table = 'user_basic_details';
    public $timestamps = false;

    public static function saveDetails($request){
       $validation = Validator::make($request->all(),[
            "full_name"=>"required|min:4|regex:/^[a-zA-Z]([\w -]*[a-zA-Z])?$/u",
            "phone_number"=>$request->get('phone_number') != '' ? 'numeric': '',
            "dob"=>"required|before:" . date('Y-m-d',strtotime('-15 years'))
        ]);
            if($validation->fails()) {
                return Redirect::back()->withErrors($validation);
            }

        $newUser = new UserBasicDetails();
        $newUser->full_name = $request->get('full_name');
        $newUser->phone_number = $request->get('phone_number');
        $newUser->dob = $request->get('dob');
        $newUser->email = $request->get('email') != ''? $request->get('email') : ' ';
        $newUser->save();
        return Redirect::route('form.validation')->with([
            'success' => "Create Successfully"
        ]);
    }
}
