<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Property_images extends Model
{
    public $table = 'property_images';

    public static function getProperty(){
        $query = DB::select('select AT.title, AT.id, AT.updated_at, AT.house_id , PL.street, PL.city, PL.state, PL.county, PL.zip from assigned_tasks AT join property_location PL ON
                  PL.house_id = AT.house_id');
        return $query;
    }
}
