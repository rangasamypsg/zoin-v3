<?php

namespace App;
use DB;
use Config;
use App\Helpers\CustomHelper;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    
    /**
    * The table associated with the model.
    *
    * @var string
    */
    public $table = "offers";
        
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
        'offer_id','item_id','offer_limit','from_date','to_date','qty','price','old_price','description','vendor_id','offer_status', 
    ];


    public static function saveOfferDetails( $data ){
        
        $offer = new Offer();
        $offer->offer_id = CustomHelper::__codeGeneration(Config::get('constant.ZOINUSER.OFFER'),Config::get('constant.FORMAT-CODE.OFFER_CODE'));
        $offer->item_id = ( ( isset( $data['item_id'] ) && !empty( $data['item_id'] ) ) ? $data['item_id'] : '' );
        $offer->vendor_id = ( ( isset( $data['vendor_id'] ) && !empty( $data['vendor_id'] ) ) ? $data['vendor_id'] : '' );
        $offer->offer_limit = ( ( isset( $data['offer_limit'] ) && !empty( $data['offer_limit'] ) ) ? $data['offer_limit'] : '' );
        $offer->from_date = date('Y-m-d');
        $offer->to_date = CustomHelper::getEndDate($data['days']);
        $offer->qty = ( ( isset( $data['qty'] ) && !empty( $data['qty'] ) ) ? $data['qty'] : '' );
        $offer->price = ( ( isset( $data['price'] ) && !empty( $data['price'] ) ) ? $data['price'] : '' );
        $offer->old_price = ( ( isset( $data['old_price'] ) && !empty( $data['old_price'] ) ) ? $data['old_price'] : '' );
        $offer->description = ( ( isset( $data['description'] ) && !empty( $data['description'] ) ) ? $data['description'] : '' );
        $offer->save();

        return ( isset($offer->id) && !empty($offer->id) ? $offer->id : '' );
    }

    public static function isCheckOfferCount( $data ) {

        $count = Offer::where(['vendor_id' => $data])
                 ->whereIn('offer_status', [Config::get('constant.OFFER_STATUS.CREATED'),Config::get('constant.OFFER_STATUS.INACTIVE'),Config::get('constant.OFFER_STATUS.OPEN')])        
                 ->count();

        return ( isset( $count ) && !empty( $count ) ? $count : '' );
    }

    public static function getOfferDetails( $vendorId ) {
        
        $data = Offer::where(['vendor_id' => $vendorId])->select("offer_id","item_id","offer_limit","from_date","to_date","qty","price","old_price","description","vendor_id","offer_status","created_at","updated_at")
                ->whereIn('offer_status', [Config::get('constant.OFFER_STATUS.CREATED'),Config::get('constant.OFFER_STATUS.INACTIVE'),Config::get('constant.OFFER_STATUS.OPEN')])            
                ->get();

        return ( isset( $data ) && !empty( $data ) ? $data : '' );
    }

    public static function getMerchantStatusOfferDetails( $offerId ) {
        
        $data = Offer::where(['offer_id' => $offerId])
                ->select("offer_id","item_id","offer_limit","from_date","to_date","qty","price","old_price","description","vendor_id","offer_status","created_at","updated_at")
                ->whereIn('offer_status', [Config::get('constant.OFFER_STATUS.CREATED'),Config::get('constant.OFFER_STATUS.INACTIVE'),Config::get('constant.OFFER_STATUS.OPEN')])
                ->first();
        
        return ( isset( $data ) && !empty( $data ) ? $data : '' );
    
    }

    public static function getOfferSubmitDetails( $vendorId ) {
        
        $data = Offer::where(['vendor_id' => $vendorId])
                ->select("offer_id","item_id","offer_limit","from_date","to_date","qty","price","old_price","description","vendor_id","offer_status","created_at","updated_at")
                ->whereIn('offer_status', [Config::get('constant.OFFER_STATUS.CREATED'),Config::get('constant.OFFER_STATUS.INACTIVE'),Config::get('constant.OFFER_STATUS.OPEN')])
                ->orderBy('id', 'DESC')
                ->get();
 
        return ( isset( $data ) && !empty( $data ) ? $data : '' );    
    }

    public static function getOfferOpenDetails( $vendorId ) {
        
        $data = Offer::where(['vendor_id' => $vendorId])
                ->select("offer_id","item_id","offer_limit","from_date","to_date","qty","price","old_price","description","vendor_id","offer_status","created_at","updated_at")
                ->whereIn('offer_status', [Config::get('constant.OFFER_STATUS.CREATED'),Config::get('constant.OFFER_STATUS.INACTIVE'),Config::get('constant.OFFER_STATUS.OPEN')])
                ->orderBy('id', 'DESC')
                ->get();
        
        return ( isset( $data ) && !empty( $data ) ? $data : '' );
    
    }

    public static function getOfferDetail( $vendorId ) {
        
        $data = Offer::where(['vendor_id' => $vendorId])->select("offer_id","item_id","offer_limit","from_date","to_date","qty","price","old_price","description","vendor_id","offer_status","created_at","updated_at")
                ->whereIn('offer_status', [Config::get('constant.OFFER_STATUS.CREATED'),Config::get('constant.OFFER_STATUS.INACTIVE'),Config::get('constant.OFFER_STATUS.OPEN')])
                ->first();

        return ( isset( $data ) && !empty( $data ) ? $data : '' );
    }
    
    public static function isCheckOfferOpenCount( $data ) {
        
        $count = Offer::where(['vendor_id' => $data])
                ->whereIn('offer_status', [Config::get('constant.OFFER_STATUS.OPEN')])
                ->count();

        return ( isset( $count ) && !empty( $count ) ? $count : '' );
    }

}
