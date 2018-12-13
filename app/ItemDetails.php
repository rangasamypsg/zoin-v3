<?php

namespace App;
use DB;
use Config;
use App\Helpers\CustomHelper;
use Illuminate\Database\Eloquent\Model;

class ItemDetails extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    public $table = "items";
        
    protected $primaryKey = 'id';

    /**
    * The table associated with the model timestamp.
    *
    * @var string
    */
    //public $timestamps = false;
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'vendor_id','item_id','price',
    ];

    public static function getItemDetails( $vendorId ){
  
        $data = DB::table('items as i')
                    ->select("i.id","i.item_name","id.vendor_id","id.price")
                    ->join('item_details as id', 'id.item_id', '=', 'i.id')
                    ->where('id.vendor_id', '=', $vendorId)
                    ->orderBy('i.id', 'DESC')
                    ->get();

        return ( isset($data) && !empty($data) ? $data : '' );          
    }

    

}
