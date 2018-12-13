<?php

namespace App;
use Config;
use DB;
use Illuminate\Database\Eloquent\Model;

class MerchantBalTransaction extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    public $table = "merchant_balance_transaction";
    
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
        'vendor_id','balance_id','transaction_type','amount'
    ];


    public static function saveMerchantBalance( $data ) {
        
        $merchantBal = new MerchantBalTransaction();
        $merchantBal->balance_id = ( !empty( $data['payment_id'] ) ?  $data['payment_id'] : '' );        
        $merchantBal->mobile_number = ( !empty( $data['mobile_number'] ) ?  $data['mobile_number'] : '' );        
        $merchantBal->email = ( !empty( $data['email'] ) ?  $data['email'] : '' );        
        $merchantBal->vendor_id = ( !empty( $data['vendor_id'] ) ?  $data['vendor_id'] : '' );
        $merchantBal->transaction_type = ( !empty( $data['transaction_type'] ) ?  $data['transaction_type'] : '' );        
        $merchantBal->amount = ( !empty( $data['amount'] ) ?  $data['amount'] : '' );
        $merchantBal->status = ( !empty( $data['status'] ) ?  $data['status'] : '' );        
        $merchantBal->save();

        return ( isset( $merchantBal->id ) && !empty( $merchantBal->id ) ? $merchantBal->id : '' );

    }


}
