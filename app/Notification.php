<?php

namespace App;
use DB;
use Config;
use App\Helpers\CustomHelper;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    public $table = "notifications";

    /**
    * The table associated with the model timestamp.
    *
    * @var string
    */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'subject_id', 'user_id', 'image', 'message', 'amount', 'created_at'
    ];

    public static function saveLoginNotification( $data ) {
        
        $notification = new Notification();
        //$notification->transaction_id = CustomHelper::__codeGeneration(Config::get('constant.ZOINUSER.NOTIFICATION'),Config::get('constant.FORMAT-CODE.NOTIFICATION_CODE'));
        $notification->user_id = $data->vendor_id;
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.LOGIN');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.LOGIN');        
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.LOGIN'), $data->vendor_id);
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    }

    public static function saveLogoutNotification( $data ) {
        
        $notification = new Notification();
        $notification->user_id = $data->vendor_id;
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.LOGOUT');        
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.LOGOUT');        
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.LOGOUT'), $data->vendor_id);
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    }  

    public static function saveMerchantBalanceNotification( $vendorId, $amount ) {
        
        $notification = new Notification();
        $notification->user_id = $vendorId;
        /* $notification->title = Config::get('constant.NOTIFICATION.TITLE.MERCHANT_BALANCE');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.MERCHANT_BALANCE');        
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.MERCHANT_BALANCE'), $vendorId, $merBal); */
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.ZOIN_EARN');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.ZOIN_EARN');
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.MERBALEARN'), $vendorId, $amount);
        $notification->amount = Config::get('constant.SYMBOL.PLUS').$amount;
        $notification->zoin_status = Config::get('constant.ZOINPOINT.MERCHANT.IN');
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    }

    public static function saveLoyaltyNotificationDetail( $data ) {
        
        $notification = new Notification();
        $notification->user_id = $data['vendor_id'];        
        $notification->subject_id = $data['loyalty_id'];
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.LOYALTY_SUBMIT');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.LOYALTY_SUBMIT');         
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.LOYALTY_SUBMIT'), $data['vendor_id'], $data['loyalty_id']);
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    }   
    
    public static function saveLoyaltyActiveNotification( $data ) {
         
        $notification = new Notification();
        $notification->user_id = $data['vendor_id'];        
        $notification->subject_id = $data['loyalty_id'];
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.LOYALTY_ACTIVE');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.LOYALTY_ACTIVE');         
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.LOYALTY_ACTIVE'), $data['vendor_id'], $data['loyalty_id']);
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    } 

    public static function saveEditProfileNotification( $data ) {
        
        $notification = new Notification();
        $notification->user_id = $data['vendor_id'];
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.EDIT_PROFILE');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.EDIT_PROFILE');         
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.EDIT_PROFILE'), $data->vendor_id);
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    }

    public static function saveEditProfileTagNotification( $data ) {
        
        $notification = new Notification();
        $notification->user_id = $data['vendor_id'];
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.EDIT_TAG');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.EDIT_TAG');         
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.EDIT_TAG'), $data->vendor_id);
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    }

    public static function saveTransactionNotification( $data ) {
        
        $notification = new Notification();
        $notification->user_id = $data->vendor_id;        
        $notification->subject_id = $data->transaction_id;
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.TRANSACTION');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.TRANSACTION');         
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.TRANSACTION'), $data->user_id, $data->loyalty_id);
        $notification->amount = $data->user_bill_amount;
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    }

    public static function saveMerchantPointNotification( $vendorId, $userId, $usrPoint, $transactionId) {
        
        $notification = new Notification();
        $notification->user_id = $vendorId;        
        $notification->subject_id = $transactionId;
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.ZOIN_SPENT');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.ZOIN_SPENT');
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.MERBALANCE'), $vendorId, $usrPoint, $userId);         
        $notification->amount = Config::get('constant.SYMBOL.MINUS').$usrPoint;
        $notification->zoin_status = Config::get('constant.ZOINPOINT.MERCHANT.OUT');
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    }

    public static function saveMerchantEarnPointNotification( $vendorId, $amount, $transactionId) {
        
        $notification = new Notification();
        $notification->user_id = $vendorId;        
        $notification->subject_id = $transactionId;
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.ZOIN_EARN');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.ZOIN_EARN');
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.MERBALEARN'), $vendorId, $amount);         
        $notification->amount = Config::get('constant.SYMBOL.PLUS').$amount;
        $notification->zoin_status = Config::get('constant.ZOINPOINT.MERCHANT.EARN');
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    }

    public static function getMerchantNotificationsDetails( $vendorId ){
        
        $data = Notification::where("user_id", '=', $vendorId)->select('id','user_id','subject_id','title','image','message','amount','created_at')->orderBy('id', 'DESC')->get();
        
        return ( isset($data) && !empty($data) ? $data : '' );          
    }
    
    public static function getZoinALLNotificationsDetails( $data ){
        
        $data = Notification::where("user_id", '=', $data)->whereIn("zoin_status", [Config::get('constant.ZOINPOINT.MERCHANT.IN'),Config::get('constant.ZOINPOINT.MERCHANT.OUT')])->select('id','user_id','subject_id','image','message','zoin_status','amount','created_at')->orderBy('id', 'DESC')->get();
        
        return ( isset($data) && !empty($data) ? $data : '' );          
    } 

    public static function getZoinOutNotificationsDetails( $data ){
        
        $data = Notification::where("user_id", '=', $data)->where("zoin_status", '=', Config::get('constant.ZOINPOINT.MERCHANT.OUT'))->select('id','user_id','subject_id','image','message','zoin_status','amount','created_at')->orderBy('id', 'DESC')->get();
        
        return ( isset($data) && !empty($data) ? $data : '' );          
    }

    public static function getZoinInNotificationsDetails( $data ){
        
        $data = Notification::where("user_id", '=', $data)->where("zoin_status", '=', Config::get('constant.ZOINPOINT.MERCHANT.IN'))->select('id','user_id','subject_id','image','message','zoin_status','amount','created_at')->orderBy('id', 'DESC')->get();
        
        return ( isset($data) && !empty($data) ? $data : '' );          
    } 
    
    public static function saveOfferNotificationDetail( $data ) {
        
        $notification = new Notification();
        $notification->user_id = $data['vendor_id'];        
        $notification->subject_id = $data['offer_id'];
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.OFFER_SUBMIT');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.OFFER_SUBMIT');         
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.OFFER_SUBMIT'), $data['vendor_id'], $data['offer_id']);
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    }

    public static function saveOfferActiveNotification( $data ) {
         
        $notification = new Notification();
        $notification->user_id = $data['vendor_id'];        
        $notification->subject_id = $data['offer_id'];
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.OFFER_ACTIVE');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.OFFER_ACTIVE');         
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.OFFER_ACTIVE'), $data['vendor_id'], $data['offer_id']);
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    }

    public static function saveOfferTransactionNotification( $data ) {
        
        $notification = new Notification();
        $notification->user_id = $data->vendor_id;        
        $notification->subject_id = $data->transaction_id;
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.OFFER_TRANSACTION');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.OFFER_TRANSACTION');         
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.OFFER_TRANSACTION'), $data->user_id, $data->loyalty_id);
        $notification->amount = $data->user_bill_amount;
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    }

    public static function saveUserLoginNotification( $data ) {
        
        $notification = new Notification();
        $notification->user_id = $data['user_id'];
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.LOGIN');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.LOGIN');        
        $notification->message = Config::get('constant.NOTIFICATION.USER.LOGIN');
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );

    }

    public static function saveUserLogoutNotification( $data ) {
        
        $notification = new Notification();
        $notification->user_id = $data->user_id;
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.LOGOUT');        
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.LOGOUT');        
        $notification->message = Config::get('constant.NOTIFICATION.USER.LOGOUT');
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );

    } 

    public static function saveRedeemedNotificationDetail( $data, $redeemCode ) {
        
        $notification = new Notification();
        $notification->user_id = $data['user_id'];        
        $notification->subject_id = $redeemCode;
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.REDEEMED_CODE');
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.REDEEMED_CODE');         
        $notification->message = Config::get('constant.NOTIFICATION.USER.REDEEMED_CODE');
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    }

    public static function saveUserPointNotification( $vendorId, $userId, $usrPoint, $transactionId) {
        
        $notification = new Notification();
        $notification->user_id = $userId;        
        $notification->subject_id = $transactionId;
        $notification->image = url('/')."/images/notification/".Config::get('constant.NOTIFICATION-IMG.TRANSACTION');
        $notification->title = Config::get('constant.NOTIFICATION.TITLE.ZOIN_EARN');         
        $notification->message = CustomHelper::outputString( Config::get('constant.NOTIFICATION.MERCHANT.USRBALANCE'), $vendorId, $usrPoint, $userId);
        $notification->amount = Config::get('constant.SYMBOL.PLUS').$usrPoint;
        $notification->zoin_status = Config::get('constant.ZOINPOINT.USER.IN');
        $notification->created_at = date("Y-m-d H:i:s");
        $notification->save();

        return ( isset( $notification->id ) && !empty( $notification->id ) ? $notification->id : '' );
    }


}   
