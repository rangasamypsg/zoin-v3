<?php

namespace App;
use Config;
use DB;
use Illuminate\Database\Eloquent\Model;

class LoyaltyCompleted extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    public $table = "loyalty_completed";

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
        'completed_id','vendor_id','zoin_point','user_checkin','max_checkin','user_max_bill_amount','max_bill_amount'
    ];

    public static function getMerchantLoyaltyCompletedDetails( $data ){
        
        $data = LoyaltyCompleted::where("vendor_id", '=', $data)->select('id','completed_id','user_id','vendor_id','zoin_point','user_checkin','max_checkin','user_max_bill_amount','max_bill_amount','created_at')->orderBy('id', 'DESC')->get();
        
        return ( isset($data) && !empty($data) ? $data : '' );          
    }

    public static function getUserLoyaltyCompletedDetails( $userId ){
        
        $data = DB::table('transactions as t')
                ->join('merchant_details as m', 't.vendor_id', '=', 'm.vendor_id')
                ->join('loyalty as l', 't.vendor_id', '=', 'l.vendor_id')
                ->select('m.company_name','t.vendor_id','t.user_id','t.transaction_id','t.completed_id','t.status','t.creation_date as created_at','l.max_checkin','l.max_bill_amount','l.zoin_point', DB::raw('sum(t.user_bill_amount) as user_max_bill_amount'), DB::raw('count(*) as user_max_checkin'))
                ->where("t.user_id", '=', $userId)
                ->where("t.status", '=', Config::get('constant.NUMBER.ONE'))
                ->groupBy('t.status','t.vendor_id')
                ->groupBy('t.status')
                ->get();    
        
        return ( isset($data) && !empty($data) ? $data : '' );          
    }

    public static function getUserLoyaltyInCompletedDetails( $userId ){
        
       // $data = Transaction::where("user_id", '=', $userId)->where("status", '=', Config::get('constant.NUMBER.ZERO'))->groupBy('status')->select('vendor_id', DB::raw('sum(user_bill_amount) as total'), DB::raw('count(*) as total1') )->get();

       $data = DB::table('transactions as t')
            ->join('merchant_details as m', 't.vendor_id', '=', 'm.vendor_id')
            ->join('loyalty as l', 't.vendor_id', '=', 'l.vendor_id')
            ->select('m.company_name','t.vendor_id','t.user_id','t.transaction_id','t.status','t.creation_date as created_at','l.max_checkin','l.max_bill_amount','l.zoin_point', DB::raw('sum(t.user_bill_amount) as user_max_bill_amount'), DB::raw('count(*) as user_max_checkin'))
            ->where("t.user_id", '=', $userId)
            ->where("t.status", '=', Config::get('constant.NUMBER.ZERO'))
            ->groupBy('t.status','t.vendor_id')
            ->groupBy('t.status')
            ->get(); 
        
        return ( isset($data) && !empty($data) ? $data : '' );          
    }

    public static function getUserLoyaltyAllDetails( $userId ){
        
        $data = DB::table('transactions as t')
             ->join('merchant_details as m', 't.vendor_id', '=', 'm.vendor_id')
             ->join('loyalty as l', 't.vendor_id', '=', 'l.vendor_id')
             ->select('m.company_name','t.vendor_id','t.user_id','t.transaction_id','t.completed_id','t.status','t.creation_date as created_at','l.max_checkin','l.max_bill_amount','l.zoin_point', DB::raw('sum(t.user_bill_amount) as user_max_bill_amount'), DB::raw('count(*) as user_max_checkin'))
             ->where("t.user_id", '=', $userId)
             ->groupBy('t.status','t.vendor_id')
             //->groupBy('t.status')
             ->get(); 
         
         return ( isset($data) && !empty($data) ? $data : '' );          
     }

}
