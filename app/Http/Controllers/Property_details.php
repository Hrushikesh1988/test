<?php

namespace App\Http\Controllers;

use App\Models\Property_images;
use App\UserBasicDetails;
use Illuminate\Http\Request;

class Property_details extends Controller
{
    public function index()
    {
        return view('property_listing');
    }

    public function form_validation()
    {
        return view('form_validation');
    }

    public function getProperty(){
        $result = Property_images::getProperty();
        return $result;
    }

    public function submit(Request $request){
        $result = UserBasicDetails::saveDetails($request);
        return $result;
    }
}
