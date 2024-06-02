<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Seller extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sellers';

    //public $timestamps = false;

    public static function updatesellerData($id,$data){
    	DB::table('sellers')
    	->where('id', $id)
    	->update($data);
    }
}
