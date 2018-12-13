<?php

namespace App\Helpers;
use App\Helpers\CustomHelper;
use App\MerchantDetail;
use App\Address;
use App\Credential;
use App\MobileOtp;
use App\ForgotOtp;
use App\BusinessRule;
use App\CheckinLimit;
use App\BusinessType;
use App\UserMobileOtp;
use App\Loyalty;
use App\RedeemCode;
use App\Transaction;
use App\LoyaltyBalance;
use App\MerchantImage;
use App\MerchantTags;
use App\TagMerchants;
use App\LoyaltyCompleted;
use App\MerchantFeatureDetail;
use App\MerchantFeatureImage;
use App\MerchantSocialMedia;
use App\UserDetail;
use App\Offer;
use App\Item;
use Config;
use QrCode;
use Mail;
use DB;
class CustomHelper
{
    public static function fooBar()
    {
        return 'it works!';
    }

    public static function __getRememberToken() {
        //generate Token Random
        $remember_token = str_random(60); 
        return  ( isset( $remember_token ) && !empty( $remember_token ) ? $remember_token : '');
    }

    public static function checkEmailMobileNoExists($errorsData){
        
        $message = '';
       
        if(isset($errorsData['mobile_number'][0]) && !empty($errorsData['mobile_number'][0])){
            $message = "Mobile number already exist. Please try with another mobile number.";
        }
        if(isset($errorsData['email_id'][0]) && !empty($errorsData['email_id'][0])){          
            $message = "Email ID already exist. Please try with different mail id.";
        }
        if(isset($errorsData['email_id'][0]) && !empty($errorsData['email_id'][0]) AND isset($errorsData['mobile_number'][0]) && !empty($errorsData['mobile_number'][0])){
            $message = "Mobile number and Email ID already exists.";
        }                        
       
        return $message;
    }

    public static function checkEmailMobileNoUsernameExists($errorsData){
        
        $message = '';
       
        if(isset($errorsData['mobile_number'][0]) && !empty($errorsData['mobile_number'][0])){
            $message = "Mobile number already exist. Please try with another mobile number.";
        }
        if(isset($errorsData['email_id'][0]) && !empty($errorsData['email_id'][0])){          
            $message = "Email ID already exist. Please try with different mail id.";
        }
        if(isset($errorsData['username'][0]) && !empty($errorsData['username'][0])){          
            $message = "Username already exist. Please try with different username.";
        }
        if(isset($errorsData['email_id'][0]) && !empty($errorsData['email_id'][0]) AND isset($errorsData['mobile_number'][0]) && !empty($errorsData['mobile_number'][0])){
            $message = "Email ID and Mobile number already exists.";
        }
        if(isset($errorsData['email_id'][0]) && !empty($errorsData['email_id'][0]) AND isset($errorsData['username'][0]) && !empty($errorsData['username'][0])){
            $message = "Email ID and Username already exists.";
        }
        if(isset($errorsData['mobile_number'][0]) && !empty($errorsData['mobile_number'][0]) AND isset($errorsData['username'][0]) && !empty($errorsData['username'][0])){
            $message = "Mobile number and Username already exists.";
        }
        if(isset($errorsData['email_id'][0]) && !empty($errorsData['email_id'][0]) AND isset($errorsData['mobile_number'][0]) && !empty($errorsData['mobile_number'][0]) AND isset($errorsData['username'][0]) && !empty($errorsData['username'][0])){
            $message = "Mobile number, Email ID and Username already exists.";
        }                        
       
        return $message;
    }

    public static function isCheckMobileNoExists($mobileNumber){
         
        $credentialDetail = new Credential();
        $data = $credentialDetail->checkMobileNoExists( $mobileNumber );
        return  ( isset( $data ) && !empty( $data ) ? $data : '');

    }    

    public static function __otpGeneration($mobileNo) {
        //generate Random otp
        $otp = rand(1000, 9999);
        return  ( isset( $otp ) && !empty( $otp ) ? $otp : '');
    }
    
    public static function __codeGeneration($type,$type_code) 
    {

         switch ($type) {
            case Config::get('constant.ZOINUSER.MERCHANT'):
               
                $merchant = MerchantDetail::orderBy('id','Desc')->first();
                 
                if(!empty($merchant['id'])) {
                    $id = $merchant['id'];
                    $incrementVal = (( $id >= Config::get('constant.NUMBER.NINE') ) ? (( $id >= Config::get('constant.NUMBER.NINETYNINE') ) ? ++$id : Config::get('constant.NUMBER.ZERO').++$id ) : Config::get('constant.AUTOINCREMENT.D-ZERO').++$id );
                } else {
                    $incrementVal = Config::get('constant.AUTOINCREMENT.DEFAULT');
                }
                return $type_code."".$incrementVal;
            break;
            case Config::get('constant.ZOINUSER.USER'):
                 
                $user = UserDetail::orderBy('id','Desc')->first();

                if(!empty($user['id'])) {
                    $id = $user['id'];
                    $incrementVal = (( $id >= Config::get('constant.NUMBER.NINE') ) ? (( $id >= Config::get('constant.NUMBER.NINETYNINE') ) ? ++$id : Config::get('constant.NUMBER.ZERO').++$id ) : Config::get('constant.AUTOINCREMENT.D-ZERO').++$id );
                } else {
                    $incrementVal = Config::get('constant.AUTOINCREMENT.DEFAULT');
                }
                return $type_code."".$incrementVal;
            break;
            case Config::get('constant.ZOINUSER.LOYALTY'):
                 
                $loyalty = Loyalty::orderBy('id','Desc')->first();

                if(!empty($loyalty['id'])) {
                    $id = $loyalty['id'];
                    $incrementVal = (( $id >= Config::get('constant.NUMBER.NINE') ) ? (( $id >= Config::get('constant.NUMBER.NINETYNINE') ) ? ++$id : Config::get('constant.NUMBER.ZERO').++$id ) : Config::get('constant.AUTOINCREMENT.D-ZERO').++$id );
                } else {
                    $incrementVal = Config::get('constant.AUTOINCREMENT.DEFAULT');
                }
                return $type_code."".$incrementVal;
            break;
            case Config::get('constant.ZOINUSER.TRANSACTION'):
                 
                $Transaction = Transaction::orderBy('id','Desc')->first();

                if(!empty($Transaction['id'])) {
                    $id = $Transaction['id'];
                    //$incrementVal = (( $id >= 99 ) ? (( $id >= 9 ) ? "0".++$id : ++$id ) : "00".++$id );
                    $incrementVal = (( $id >= Config::get('constant.NUMBER.NINE') ) ? (( $id >= Config::get('constant.NUMBER.NINETYNINE') ) ? ++$id : Config::get('constant.NUMBER.ZERO').++$id ) : Config::get('constant.AUTOINCREMENT.D-ZERO').++$id );
                } else {
                    $incrementVal = Config::get('constant.AUTOINCREMENT.DEFAULT');
                }
                return $type_code."".$incrementVal;
            break;
            case Config::get('constant.ZOINUSER.NOTIFICATION'):
                 
                $Notification = Notification::orderBy('id','Desc')->first();

                if(!empty($Notification['id'])) {
                    $id = $Notification['id'];
                    $incrementVal = (( $id >= Config::get('constant.NUMBER.NINE') ) ? (( $id >= Config::get('constant.NUMBER.NINETYNINE') ) ? ++$id : Config::get('constant.NUMBER.ZERO').++$id ) : Config::get('constant.AUTOINCREMENT.D-ZERO').++$id );
                } else {
                    $incrementVal = Config::get('constant.AUTOINCREMENT.DEFAULT');
                }
                return $type_code."".$incrementVal;
            break;
            case Config::get('constant.ZOINUSER.LOYALTY_COMPLETED'):
                 
                $loyaltyCompleted = LoyaltyCompleted::orderBy('id','Desc')->first();

                if(!empty($loyaltyCompleted['id'])) {
                    $id = $loyaltyCompleted['id'];
                    $incrementVal = (( $id >= Config::get('constant.NUMBER.NINE') ) ? (( $id >= Config::get('constant.NUMBER.NINETYNINE') ) ? ++$id : Config::get('constant.NUMBER.ZERO').++$id ) : Config::get('constant.AUTOINCREMENT.D-ZERO').++$id );
                } else {
                    $incrementVal = Config::get('constant.AUTOINCREMENT.DEFAULT');
                }
                return $type_code."".$incrementVal;
            break;
            case Config::get('constant.ZOINUSER.OFFER'):
               
                $offer = Offer::orderBy('id','Desc')->first();
                
                if(!empty($offer['id'])) {
                    $id = $offer['id'];
                    $incrementVal = (( $id >= Config::get('constant.NUMBER.NINE') ) ? (( $id >= Config::get('constant.NUMBER.NINETYNINE') ) ? ++$id : Config::get('constant.NUMBER.ZERO').++$id ) : Config::get('constant.AUTOINCREMENT.D-ZERO').++$id );
                } else {
                    $incrementVal = Config::get('constant.AUTOINCREMENT.DEFAULT');
                }
                return $type_code."".$incrementVal;
            break;            
        }  
    }

    public static function __AutoIncrement( $notificationId ) {
        
        if(!empty( $notificationId )) {
            $id = $notificationId;
            $incrementVal = (( $id > Config::get('constant.NUMBER.NINE') ) ? (( $id > Config::get('constant.NUMBER.NINETYNINE') ) ? $id : Config::get('constant.NUMBER.ZERO').$id ) : Config::get('constant.AUTOINCREMENT.D-ZERO').$id );
        } else {
            $incrementVal = Config::get('constant.AUTOINCREMENT.DEFAULT');
        } 
        return Config::get('constant.FORMAT-CODE.NOTIFICATION_CODE').$incrementVal;
    }

    public static function getTokenEncode($vendorCode) {
        //return hash_hmac('sha256', str_random(40), config('app.key'));
        $key = Config::get('constant.ENCRYPT.key');
        return $encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $vendorCode, MCRYPT_MODE_CBC, md5(md5($key))));
    }

    public static function getTokenDecode($encoded) {
        $key = Config::get('constant.ENCRYPT.key');
        return $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encoded), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    }

    public static function sendEmailNotification($userid = null, $emailType = null, $record = null ){
        
        switch ($emailType) {

            case Config::get('constant.ZOINUSER.MERCHANT'):
            
                $merchant = MerchantDetail::findOrFail( $userid );
                $addressDetail = new Address();

            // $confirmation_code =  self::getTokenEncode($merchant['vendor_id']);
            /* $confirmation_code = str_random(60);
                $merchant->confirmation_code = $confirmation_code;
                $merchant->save(); */
                $address = $addressDetail->getAddressDetails( $merchant['address_id'] );

                $data = [
                    'vendor_id' => $merchant['vendor_id'],
                    'company_name' => $merchant['company_name'],
                    'email_id' => $merchant['email_id'],
                    'contact_person' => $merchant['contact_person'],
                    'mobile_number' => $merchant['mobile_number'],
                    'address' => (($address['address']) ? $address['address'] : ' '),
                    'city' => (($address['city']) ? $address['city'] : ' '),
                   // 'location' => (($merchant['location']) ? $merchant['location'] : '--'),
                    'business_type' => 'Restratunt',
                    'merchant_level' => 'Level01',
                   // 'confirmation_code' => $confirmation_code,
                    //'status' => (( $merchant['status'] == 0) ? 'In Active' : 'Active' ),
                ];
                
                Mail::send('emails.subscribed', $data, function($message) use ($data){
                    
                        $message->from($data['email_id']);
                        $message->to($data['email_id']);
                        $message->subject('Zoin Admin Request');

                });
                
                break;
            case Config::get('constant.ZOINUSER.ADMIN'):
            
                    $merchant = MerchantDetail::findOrFail($userid);
                    $addressDetail = new Address();
                    $address = $addressDetail->getAddressDetails( $merchant['address_id'] );
                    /* echo "<pre>";
                    print_r($merchant);
                    exit; */
                    
                    $data = [
                        'vendor_id' => $merchant['vendor_id'],
                        'company_name' => $merchant['company_name'],
                        'email_id' => $merchant['email_id'],
                        'contact_person' => $merchant['contact_person'],
                        'mobile_number' => $merchant['mobile_number'],
                        'address' => (($address['address']) ? $address['address'] : ' '),
                        'city' => (($address['city']) ? $address['city'] : ' '),
                        'business_type' => 'Restratunt',
                        'merchant_level' => 'Level01',
                        //'status' => (( $merchant['status'] == 0) ? 'In Active' : 'Active' ),
                    ];
                
                    Mail::send('emails.welcome', $data, function($message) use ($data){
                            
                            $message->to(Config::get('settings.Email.admin-email'));
                            $message->subject('Zoin Merchant Request');
                    });

                break;
            case Config::get('constant.ZOINUSER.LOYALTY'):        
            
                $emailLoyaltyDetails = new Loyalty();
                $loyalty = $emailLoyaltyDetails->getMerchantStatusLoyaltyDetails( $userid );
                $getMerDetails = new MerchantDetail();
                $merchant = $getMerDetails->getMerchantDetails( $loyalty['vendor_id'] );
                $data = [
                    'loyalty_id' => $loyalty['loyalty_id'],
                    'max_checkin' => $loyalty['max_checkin'],
                    'max_bill_amount' => $loyalty['max_bill_amount'],
                    'zoin_point' => $loyalty['zoin_point'],
                    'description' => $loyalty['description'],
                    'vendor_id' => $loyalty['vendor_id'],
                    'email_id' => $merchant['email_id'],
                    'contact_person' => $merchant['contact_person'],                     
                ];                 
                Mail::send('emails.loyalty', $data, function($message) use ($data){
                    //$message->from($data['email_id']);
                    $message->to($data['email_id']);
                    $message->subject('Zoin Loyalty Creation');
                });               
                
            break;

            case Config::get('constant.ZOINUSER.MERCHANTBALEARN'):
             
                $getMerDetails = new MerchantDetail();
                $merchant = $getMerDetails->getMerchantDetails( $userid );

                $data = [
                    'vendor_id' => $merchant['vendor_id'],
                    'company_name' => $merchant['company_name'],
                    'email_id' => $merchant['email_id'],
                    'contact_person' => $merchant['contact_person'],
                    'mobile_number' => $merchant['mobile_number'],
                    'amount' => (($record) ? $record : ' '),
                    'business_type' => 'Restratunt',
                ];
                
                Mail::send('emails.merchant_earn', $data, function($message) use ($data){
                    
                       // $message->from($data['email_id']);
                        $message->to($data['email_id']);
                        $message->subject('Zoin Merchant Balance');

                });
            
            break;

            case Config::get('constant.ZOINUSER.OFFER'):        
            
                $emailOfferDetails = new Offer();
                $offer = $emailOfferDetails->getMerchantStatusOfferDetails( $userid );
                $getMerDetails = new MerchantDetail();
                $merchant = $getMerDetails->getMerchantDetails( $offer['vendor_id'] );
                $data = [
                    'offer_id' => $offer['offer_id'],
                    'offer_limit' => $offer['offer_limit'],
                    'qty' => $offer['qty'],
                    'rate' => $offer['rate'],
                    'description' => $offer['description'],
                    'vendor_id' => $offer['vendor_id'],
                    'email_id' => $merchant['email_id'],
                    'contact_person' => $merchant['contact_person'],                     
                ];                 
                Mail::send('emails.offer', $data, function($message) use ($data){
                    //$message->from($data['email_id']);
                    $message->to($data['email_id']);
                    $message->subject('Zoin Offer Creation');
                });               
                
            break;
                
            case "green":
                echo "Your favorite color is green!";
                break;
            
        }

    }

    public static function getFirstLetterReturn($data) {
        
         $strReturn = substr(ucwords($data),0,1);  
         return  ( isset( $strReturn ) && !empty( $strReturn ) ? $strReturn : '');
     }
 
     public static function getCamelCase($data) {
         
         $strReturn = ucwords($data);
         return  ( isset( $strReturn ) && !empty( $strReturn ) ? $strReturn : '');
     }
 
     public static function isCheckLoyaltyStatus($status) {
         
        switch ($status) {
            
            case Config::get('constant.LOYALTY_STATUS.CREATED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.CREATED') ) ? Config::get('constant.LOYALTY_STATUS.INACTIVE') : '');
            
            break;
            
            case Config::get('constant.LOYALTY_STATUS.INACTIVE') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.INACTIVE') ) ? Config::get('constant.LOYALTY_STATUS.ACTIVATE') : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.OPEN') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.OPEN') ) ? Config::get('constant.LOYALTY_STATUS.ACTIVE') : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.CLOSED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.CLOSED') ) ? Config::get('constant.NOT_APPROVED') : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.DENIED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.DENIED') ) ? Config::get('constant.DELETED') : '');
            
            break;

        }
    }

    public static function isCheckLoyaltyStatusContent($status, $date) {
         
        switch ($status) {
            
            case Config::get('constant.LOYALTY_STATUS.CREATED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.CREATED') ) ? Config::get('constant.LOYALTY_STATUS.UNAPPROVED') : '');
            
            break;
            
            case Config::get('constant.LOYALTY_STATUS.INACTIVE') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.INACTIVE') ) ? " Created On ". CustomHelper::getZoinStatusDateFormat( $date ) : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.OPEN') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.OPEN') ) ? Config::get('constant.LOYALTY_STATUS.ACTIVE')." Since ". CustomHelper::getZoinStatusDateFormat( $date ) : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.CLOSED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.CLOSED') ) ? Config::get('constant.NOT_APPROVED') : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.DENIED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.DENIED') ) ? Config::get('constant.DELETED') : '');
            
            break;

        }
    }

    public static function getLoyaltyStatusBasedKey($status) {
         
        switch ($status) {
            
            case Config::get('constant.LOYALTY_STATUS.CREATED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.CREATED') ) ? Config::get('constant.TEXT.ONE') : '');
            
            break;
            
            case Config::get('constant.LOYALTY_STATUS.INACTIVE') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.INACTIVE') ) ? Config::get('constant.TEXT.TWO') : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.OPEN') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.OPEN') ) ? Config::get('constant.TEXT.THREE') : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.CLOSED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.CLOSED') ) ? Config::get('constant.TEXT.FOUR') : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.DENIED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.DENIED') ) ? Config::get('constant.TEXT.FIVE') : '');
            
            break;

        }
    }

    public static function getPopupMenuContent($status = NULL) {
         
        switch ($status) {
            
            case Config::get('constant.LOYALTY_STATUS.CREATED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.CREATED') ) ? Config::get('constant.NOTIFICATION.POPUP.INACTIVE') : '');
            
            break;
            
            case Config::get('constant.LOYALTY_STATUS.INACTIVE') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.INACTIVE') ) ? Config::get('constant.NOTIFICATION.POPUP.ACTIVATE') : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.OPEN') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.OPEN') ) ? Config::get('constant.NOTIFICATION.POPUP.OPEN') : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.CLOSED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.CLOSED') ) ? Config::get('constant.NOTIFICATION.POPUP.CLOSED') : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.DENIED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.DENIED') ) ? Config::get('constant.NOTIFICATION.POPUP.DENIED') : '');
            
            break;

            default:
             
                return  Config::get('constant.NOTIFICATION.POPUP.ADD_LOYALTY');

        }
    }

    public static function getPopupStatusBasedKey($status) {
         
        switch ($status) {
            
            case Config::get('constant.LOYALTY_STATUS.CREATED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.CREATED') ) ? Config::get('constant.TEXT.TWO') : '');
            
            break;
            
            case Config::get('constant.LOYALTY_STATUS.INACTIVE') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.INACTIVE') ) ? Config::get('constant.TEXT.THREE') : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.OPEN') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.OPEN') ) ? Config::get('constant.TEXT.FOUR') : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.CLOSED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.CLOSED') ) ? Config::get('constant.TEXT.FIVE') : '');
            
            break;

            case Config::get('constant.LOYALTY_STATUS.DENIED') :
            
                return  ( isset( $status ) &&  ( $status == Config::get('constant.LOYALTY_STATUS.DENIED') ) ? Config::get('constant.TEXT.SIX') : '');
            
            break;

        }
        
    }
    
    public static function sendSms( $mobileNumber, $otp ) {

        //Your authentication key
        $authKey = Config::get('settings.SMS.AUTHENTICATION_KEY');

        //Multiple mobiles numbers separated by comma
        $mobileNumber = Config::get('settings.SMS.COUNTRY_CODE').$mobileNumber;

        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = Config::get('settings.SMS.SENDER_ID');

        //Your message to send, Add URL encoding here.
        $message = urlencode("Thanks for becoming a zoin member. Your OTP is: $otp");

        //Define route 
        $route = Config::get('settings.SMS.ROUTE');

        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );

        //API URL
        $url="http://sms.servercake.in/api/sendhttp.php";

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));

        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        //get response
        $output = curl_exec($ch);

        //Print error if any
        if(curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
        }

        curl_close($ch);        

        return  ( isset( $output ) && !empty( $output ) ? $output : '');

    } // SendSms

    public static function sendSmsService( $mobileNumber, $data ) {

        //Your authentication key
        $authKey = Config::get('settings.SMS.AUTHENTICATION_KEY');

        //Multiple mobiles numbers separated by comma
        $mobileNumber = Config::get('settings.SMS.COUNTRY_CODE').$mobileNumber;

        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = Config::get('settings.SMS.SENDER_ID');

        //Your message to send, Add URL encoding here.
        $message = urlencode("$data");

        //Define route 
        $route = Config::get('settings.SMS.ROUTE');

        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );

        //API URL
        $url="http://sms.servercake.in/api/sendhttp.php";

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));

        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        //get response
        $output = curl_exec($ch);

        //Print error if any
        if(curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
        }

        curl_close($ch);        

        return  ( isset( $output ) && !empty( $output ) ? $output : '');

    } // SendSms

    
    public static function isCheckLoginActivateUser( $mobileNumber ) {

        DB::table('credentials')->where('mobile_number', $mobileNumber)->update( ['is_mobile_verified' => 1] );

        DB::table('mobile_otp')->where('mobile_number', $mobileNumber)->delete();

    }

    public static function isCheckMerchantLoginActivateUser( $mobileNumber ) {
        
        DB::table('merchant_details')->where('mobile_number', $mobileNumber)->update( ['is_login_approved' => 1] );

        DB::table('mobile_otp')->where('mobile_number', $mobileNumber)->delete();

    }

    public static function isExistOTPRemove( $mobileNumber, $otpGenerate ) {

       $existOTP = DB::table('mobile_otp')->where('mobile_number', $mobileNumber)->get();
        
       if( ! $existOTP->isEmpty() ) {
            DB::table('mobile_otp')->where('mobile_number', $mobileNumber)->delete();
       }  
                
       $merchantOtp = new MobileOtp();
       $merchantOtp->mobile_number = $mobileNumber;
       $merchantOtp->otp = $otpGenerate;
       $merchantOtp->save();

       return  ( isset( $merchantOtp->id ) && !empty( $merchantOtp->id ) ? $merchantOtp->id : '');
    }

    public static function isExistForgotOTPRemove( $mobileNumber, $otpGenerate ) {
        
        $existOTP = DB::table('forgot_otp')->where('mobile_number', $mobileNumber)->get();
        
        if( ! $existOTP->isEmpty() ) {
            DB::table('forgot_otp')->where('mobile_number', $mobileNumber)->delete();
        }  
                
        $forgotOtp = new ForgotOtp();
        $forgotOtp->mobile_number = $mobileNumber;
        $forgotOtp->otp = $otpGenerate;
        $forgotOtp->save();

        return  ( isset( $forgotOtp->id ) && !empty( $forgotOtp->id ) ? $forgotOtp->id : '');
    }
  

    public static function isUserExistOTPRemove( $mobileNumber, $otpGenerate ) {
        
        $existOTP = DB::table('user_mobile_otp')->where('mobile_number', $mobileNumber)->get();
        
        if( ! $existOTP->isEmpty() ) {
            DB::table('user_mobile_otp')->where('mobile_number', $mobileNumber)->delete();
        }  
                
        $userOtp = new UserMobileOtp();
        $userOtp->mobile_number = $mobileNumber;
        $userOtp->otp = $otpGenerate;
        //$userOtp->status = Config::get('constant.NUMBER.ZERO');
        $userOtp->save();

        return  ( isset( $userOtp->id ) && !empty( $userOtp->id ) ? $userOtp->id : '');
    }

    public static function isCheckUserLoginActivateUser( $mobileNumber ) {
        
        DB::table('user_details')->where('mobile_number', $mobileNumber)->update( ['is_mobile_verified' => 1] );

        DB::table('user_mobile_otp')->where('mobile_number', $mobileNumber)->delete();

    }
    
    public static function activateUserStatus( $mobileNumber ) {
        
        DB::table('user_details')->where('mobile_number', $mobileNumber)->update( ['is_login_approved' => 1] );

        DB::table('user_mobile_otp')->where('mobile_number', $mobileNumber)->delete();

    }

    public static function getZoinDateFormat( $create_date ) {
 
        //return date('l, j M, Y',strtotime(Config::get('settings.Date_Format'),strtotime($create_date))); 
        return date('j M Y',strtotime(Config::get('settings.Date_Format'),strtotime($create_date))); 
    }

    public static function getZoinStatusDateFormat( $create_date ) {
            
       return date('D j M Y',strtotime(Config::get('settings.Date_Format'),strtotime($create_date))); 
    }

    public static function getZoinTimeFormat( $create_date ) {
            
        return date('h:ia',strtotime(Config::get('settings.Date_Format'),strtotime($create_date)));    
    }

    public static function getZoinDateandTimeFormat( $create_date ) {
            
        return date('D j M Y \a\t h:i A',strtotime(Config::get('settings.Date_Format'),strtotime($create_date)));    
    }

    public static function __redeemCodeGeneration( $lengths, $length ) {
       
        $str = $strs = "";
        //$strs = "";
        $characters = array_merge(range('A','Z'));
        $maxs = count($characters) - 1;
        for ($j = 0; $j < $lengths; $j++) {
            $rands = mt_rand(0, $maxs);
            $strs .= $characters[$rands];
        }
        $character = array_merge( range('0','9') );
        $max = count($character) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $character[$rand];
        }
        return $strs.$str;
        
    }
    
    public static function getPromotionByRedeemCode( $redeemCode, $mobileNumber ) {
        
        $redeemCodeExist = RedeemCode::where(['redeem_code' => $redeemCode])->where(['mobile_number' => $mobileNumber])->first();
        
        /* echo "<pre>";
        print_r($redeemCodeExist);
        exit; */
         
        return  ( isset( $redeemCodeExist ) && !empty( $redeemCodeExist ) ? $redeemCodeExist : '');
    }

    public static function __getRedeemCodeGeneration() {
      
        //generate Random otp
        $otp = rand(1000, 9999);

        return  ( isset( $otp ) && !empty( $otp ) ? $otp : '');
    }
    
    public static function getUserTransactionsProcess( $redeemCode ) {
       
        $usrTransAmt = $usrBalance = 0;
        $getUserDetail = new RedeemCode();
        $userDetails = $getUserDetail->getUserTransactions( $redeemCode );

        //echo "<pre>";
        //print_r($userDetails); exit;
        $data = array();
        if( isset( $userDetails ) && !empty( $userDetails ) ) {
        
            $getUserTransactions = new Transaction();
            $usrTransAmt = $getUserTransactions->getUserTransactions( $userDetails );
            $usrBalance = ( isset( $userDetails->user_balance ) && !empty( $userDetails->user_balance ) ? $userDetails->user_balance : 0);
            if( isset( $usrBalance ) && !empty( $usrBalance ) ) {
                $usrTransAmt = $usrTransAmt + $usrBalance; 
            }
            $total = Config::get('constant.NUMBER.ONE');            
            $data['mobile_number'] = ( isset( $userDetails->mobile_number ) && !empty( $userDetails->mobile_number ) ? $userDetails->mobile_number : 0);
            $data['fullname'] = ( isset( $userDetails->full_name ) && !empty( $userDetails->full_name ) ? $userDetails->full_name : '');
            //$data['user_level'] = "Level ". ( isset( $userDetails->user_level ) && !empty( $userDetails->user_level ) ? $userDetails->user_level : 0);
            $data['max_checkin'] = ( isset( $userDetails->max_checkin ) && !empty( $userDetails->max_checkin ) ? $userDetails->max_checkin : 0);
            $data['max_bill_amount'] = ( isset( $userDetails->max_bill_amount ) && !empty( $userDetails->max_bill_amount ) ? $userDetails->max_bill_amount : 0);
            $data['zoin_point'] = ( isset( $userDetails->zoin_point ) && !empty( $userDetails->zoin_point ) ? $userDetails->zoin_point : 0);
            $data['user_checkin'] = ( isset( $userDetails->user_checkin ) && !empty( $userDetails->user_checkin ) ? $total += $userDetails->user_checkin : 1);
            $data['user_bill_amount'] = ( isset( $usrTransAmt ) && !empty( $usrTransAmt ) ? $usrTransAmt : 0);
            $data['vendor_id'] = ( isset( $userDetails->vendor_id ) && !empty( $userDetails->vendor_id ) ? $userDetails->vendor_id : 0);
            $data['user_id'] = ( isset( $userDetails->user_id ) && !empty( $userDetails->user_id ) ? $userDetails->user_id : 0);
            $data['loyalty_id'] = ( isset( $userDetails->loyalty_id ) && !empty( $userDetails->loyalty_id ) ? $userDetails->loyalty_id : 0);
            $data['redeem_code'] = ( isset( $userDetails->redeem_code ) && !empty( $userDetails->redeem_code ) ? $userDetails->redeem_code : 0);
            $data['username'] = ( isset( $userDetails->username ) && !empty( $userDetails->username ) ? $userDetails->username : 0);
            $data['transaction_type'] = Config::get('constant.TRANSACTION_TYPE.LOYALTY');
            $data['profile_image'] =  CustomHelper::showUserProfileImg($userDetails->profile_image, $userDetails->user_id);
        }  
           
        return  ( isset( $data ) && !empty( $data ) ? $data : '');

    }

    public static function getUserOfferTransactionsProcess( $redeemCode ) {
        
        $getUserDetail = new RedeemCode();
        $offers = $getUserDetail->getUserOfferTransactions( $redeemCode );
         
        $response = array();
        if( isset( $offers ) && !empty( $offers ) ) {
            $response['offer_id'] = ( isset( $offers->offer_id ) && !empty( $offers->offer_id ) ? $offers->offer_id : Config::get('constant.EMPTY') );
            $response['offer_limit'] = ( isset( $offers->offer_limit ) && !empty( $offers->offer_limit ) ? $offers->offer_limit : Config::get('constant.EMPTY') );
            $response['qty'] = ( isset( $offers->qty ) && !empty( $offers->qty ) ? $offers->qty : Config::get('constant.EMPTY') );
            $response['price'] = ( isset( $offers->price ) && !empty( $offers->price ) ? $offers->price : Config::get('constant.EMPTY') );
            $response['old_price'] = ( isset( $offers->old_price ) && !empty( $offers->old_price ) ? $offers->old_price : Config::get('constant.EMPTY') );
            $response['offer_status'] = ( isset( $offers->offer_status ) && !empty( $offers->offer_status ) ? CustomHelper::isCheckLoyaltyStatus( $offers->offer_status ) : Config::get('constant.EMPTY') );
            $response['day'] = ( isset( $offers->offer_status ) && !empty( $offers->offer_status ) ? CustomHelper::getTwoDateDifference( $offers->from_date, $offers->to_date ) : Config::get('constant.EMPTY') );
            $response['item_name'] = ( isset( $offers->item_id ) && !empty( $offers->item_id ) ? CustomHelper::getOfferItemName( $offers->item_id ) : Config::get('constant.EMPTY') );
            $response['description'] = ( isset( $offers->description ) && !empty( $offers->description ) ? $offers->description : Config::get('constant.EMPTY') );
            $response['redeem_code'] = ( isset( $offers->redeem_code ) && !empty( $offers->redeem_code ) ? $offers->redeem_code : 0);
            $response['username'] = ( isset( $offers->username ) && !empty( $offers->username ) ? $offers->username : 0);
            $response['transaction_type'] = Config::get('constant.TRANSACTION_TYPE.OFFER');
            $response['profile_image'] =  CustomHelper::showUserProfileImg($offers->profile_image, $offers->user_id);
        }

        return  ( isset( $response ) && !empty( $response ) ? $response : '');
    }
    
    public static function getUserAllTransactionsProcess( $userDetails ) {
        
        $getUserTransactions = new Transaction();
        $data = $getUserTransactions->getUserAllTransactions( $userDetails );
        return  ( isset( $data ) && !empty( $data ) ? $data : 0);

    }
    
    public static function getUserRedeemedCheckIns( $userDetails ) {
        
        $redeemProcess = new RedeemCode();
        $data = $redeemProcess->userRedeemedCodeCount( $userDetails );
        return  ( isset( $data['user_checkin'] ) && !empty( $data['user_checkin'] ) ? $data['user_checkin'] : 0);

    }

    public static function get_currency_symbol($cc = 'USD') {

        $cc = strtoupper($cc);
        $currency = array(
        "USD" => "&#36;" , //U.S. Dollar
        "AUD" => "&#36;" , //Australian Dollar
        "BRL" => "R&#36;" , //Brazilian Real
        "CAD" => "C&#36;" , //Canadian Dollar
        "CZK" => "K&#269;" , //Czech Koruna
        "DKK" => "kr" , //Danish Krone
        "EUR" => "&euro;" , //Euro
        "HKD" => "&#36" , //Hong Kong Dollar
        "HUF" => "Ft" , //Hungarian Forint
        "ILS" => "&#x20aa;" , //Israeli New Sheqel
        "INR" => "&#8377;", //Indian Rupee
        "JPY" => "&yen;" , //Japanese Yen 
        "MYR" => "RM" , //Malaysian Ringgit 
        "MXN" => "&#36" , //Mexican Peso
        "NOK" => "kr" , //Norwegian Krone
        "NZD" => "&#36" , //New Zealand Dollar
        "PHP" => "&#x20b1;" , //Philippine Peso
        "PLN" => "&#122;&#322;" ,//Polish Zloty
        "GBP" => "&pound;" , //Pound Sterling
        "SEK" => "kr" , //Swedish Krona
        "CHF" => "Fr" , //Swiss Franc
        "TWD" => "&#36;" , //Taiwan New Dollar 
        "THB" => "&#3647;" , //Thai Baht
        "TRY" => "&#8378;" //Turkish Lira
        );
        
        if(array_key_exists($cc, $currency)){
            return $currency[$cc];
        }
    }

    public static function getUserdetails($userId) {
        
        $records = UserDetail::where("user_id", '=', $userId)->first();
        
        return ( isset( $records['full_name'] ) && !empty( $records['full_name'] ) ? $records['full_name'] : '' ); 
    }
    
    public static function getMerchantStatus( $mobileNumber ) {
        
        $records = DB::table('merchant_details as m')
                    ->select("ms.status_name","ms.id")
                    ->join('merchant_status as ms', 'm.is_admin_approved', '=', 'ms.id')
                    ->where('m.mobile_number', '=', $mobileNumber )
                    ->orderBy('m.id', 'DESC')
                    ->first();
        //echo "<pre>";
        //print_r($records); exit;

        return  ( isset( $records ) && !empty( $records ) ? $records : 0 );
    }

    public static function getMerchantTransactions( $data ) {
         
        $records = Transaction::where(['vendor_id' => $data->vendor_id])->where(['loyalty_id' => $data->loyalty_id])->where(['transaction_status' => Config::get('constant.LOYALTY_STATUS.APPROVED')])->sum('user_bill_amount');
        return ( isset( $records ) && !empty( $records ) ? $records : 0 );
    }
    
   /* public static function baseEncode64(){
      
        $destinationPath = public_path('/images//');
        $image_parts = explode(";base64,", $input['image']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $destinationPath."".time().'.png';
        file_put_contents($file, $image_base64);
    
    } */

    public static function baseEncode64Image( $base64String ){

        if( !empty( $base64String ) )  {
            $imageContent = Config::get('constant.BASE_ENCODE').$base64String;          
            $destinationPath = public_path('/images//');
            $image_parts = explode(";base64,", $imageContent);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = Config::get('constant.TIMESTAMP').'.'.Config::get('constant.EXTENSION.PNG');
            $destFileName = Config::get('constant.TIMESTAMP').'.'.Config::get('constant.EXTENSION.BMP');
            //$fullPath = Config::get('constant.BASE_IMG_URL')."/images/".$destFileName;
            $fullPath = url('/')."/images/".$destFileName;
            $file = $destinationPath."".$fileName;
            $sourcefile = $destinationPath."".$destFileName;
            file_put_contents($file, $image_base64); 
            CustomHelper::compressImage($file, $sourcefile, Config::get('constant.SIZE.QUALITY')); 
        } 

        return  ( isset( $fullPath ) && !empty( $fullPath ) ? $fullPath : '' );
    }

    public static function baseEncode64ProfileImage( $base64String, $vendorId, $imgStorePath){

        if( !empty( $base64String ) )  {
            $imageContent = Config::get('constant.BASE_ENCODE').$base64String;          
            $uploadPath = public_path($imgStorePath.$vendorId."/"); 
            if (! file_exists($uploadPath)) {
                mkdir($uploadPath, 0775);            
            }
            $image_parts = explode(";base64,", $imageContent);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = Config::get('constant.TIMESTAMP').'.'.Config::get('constant.EXTENSION.PNG');
            $destFileName = Config::get('constant.TIMESTAMP').'.'.Config::get('constant.EXTENSION.BMP');
            $fullPath = url('/').$imgStorePath.$vendorId."/".$destFileName;
            $file = $uploadPath."".$fileName;
            $sourcefile = $uploadPath."".$destFileName;
            file_put_contents($file, $image_base64); 
            CustomHelper::compressImage($file, $sourcefile, Config::get('constant.SIZE.QUALITY')); 
        } 
        
        return  ( isset( $destFileName ) && !empty( $destFileName ) ? $destFileName : '' );

    }

    
    public static function compressImage($source, $destination, $quality) {

        $info = getimagesize($source);
        
        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);
    
        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);
    
        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);
    
        imagejpeg($image, $destination, $quality);
        @unlink($source);
        return $destination;
    }
    
    public static function merchantFeatureDetails( $vendorId ) {
        
        $MerchantFeatureDetail = new MerchantFeatureDetail();
        $featureDetails = $MerchantFeatureDetail->getMerchantFeatureDetails( $vendorId );

        //echo "<pre>";
        //print_r($featureDetails); exit;
        if( ! $featureDetails->isEmpty() ) {    
            $result = array();
            foreach($featureDetails as $key => $featureDetail ) {                 
               $data = array();
               $data['feature_name'] = ( isset( $featureDetail->feature_name ) && !empty( $featureDetail->feature_name ) ? $featureDetail->feature_name : Config::get('constant.EMPTY') );
               $data['feature_image'] = ( isset( $featureDetail->feature_image ) && !empty( $featureDetail->feature_image ) ? $featureDetail->feature_image : Config::get('constant.EMPTY') );
               array_push($result,$data); 
            }
        }  else {
            $records = array();
            for($i = 0; $i <= 3; $i++ ){
               $data = array();
               $data['feature_name'] = "No Image";
               $data['feature_image'] = asset('/assets/images/zoin_empty.png');
               array_push($records,$data);
            }
        }
        
        return  ( isset( $result ) && !empty( $result ) ? $result : $records );
    }

    public static function merchantLoyaltyDetails( $vendorId ) {
        
        $loyaltyDetail = new Loyalty();
        $loyaltyDetails = $loyaltyDetail->getLoyaltyOpenDetails( $vendorId ); 
      
        if( ! $loyaltyDetails->isEmpty() ) {
            $loyalty = array();
            $i = Config::get('constant.NUMBER.ZERO');
            foreach($loyaltyDetails as $key => $loyaltyDetail ) {
               
                $loyalty[$i]['loyalty_id'] = ( isset( $loyaltyDetail['loyalty_id'] ) && !empty( $loyaltyDetail['loyalty_id'] ) ? $loyaltyDetail['loyalty_id'] : Config::get('constant.EMPTY') );
                //$loyalty[$i]['offer_type'] = ( isset( $loyaltyDetail['offer_type'] ) && !empty( $loyaltyDetail['offer_type'] ) ? $loyaltyDetail['offer_type'] : Config::get('constant.EMPTY') );
                $loyalty[$i]['max_checkin'] = ( isset( $loyaltyDetail['max_checkin'] ) && !empty( $loyaltyDetail['max_checkin'] ) ? $loyaltyDetail['max_checkin'] : Config::get('constant.EMPTY') );
                $loyalty[$i]['max_bill_amount'] = ( isset( $loyaltyDetail['max_bill_amount'] ) && !empty( $loyaltyDetail['max_bill_amount'] ) ? $loyaltyDetail['max_bill_amount'] : Config::get('constant.EMPTY') );
                $loyalty[$i]['loyalty_content'] = ( isset( $loyaltyDetail['loyalty_id'] ) && !empty( $loyaltyDetail['loyalty_id'] ) ? "Loyalty - ".$loyaltyDetail['loyalty_id'] : Config::get('constant.EMPTY') );
                $loyalty[$i]['max_checkin_content'] = ( isset( $loyaltyDetail['max_checkin'] ) && !empty( $loyaltyDetail['max_checkin'] ) ? $loyaltyDetail['max_checkin']." check-ins" : Config::get('constant.EMPTY') );
                $loyalty[$i]['max_bill_amount_content'] = ( isset( $loyaltyDetail['max_bill_amount'] ) && !empty( $loyaltyDetail['max_bill_amount'] ) ? $loyaltyDetail['max_bill_amount']." Bill Amount" : Config::get('constant.EMPTY') );
                $loyalty[$i]['zoin_point'] = ( isset( $loyaltyDetail['zoin_point'] ) && !empty( $loyaltyDetail['zoin_point'] ) ? $loyaltyDetail['zoin_point'] : Config::get('constant.EMPTY') );
                $loyalty[$i]['loyalty_status'] = ( isset( $loyaltyDetail['loyalty_status'] ) && !empty( $loyaltyDetail['loyalty_status'] ) ? $loyaltyDetail['loyalty_status'] : Config::get('constant.EMPTY') );
                $loyalty[$i]['description'] = ( isset( $loyaltyDetail['description'] ) && !empty( $loyaltyDetail['description'] ) ? $loyaltyDetail['description'] : Config::get('constant.EMPTY') );
                $loyalty[$i]['date_format'] = CustomHelper::getZoinDateandTimeFormat( $loyaltyDetail['created_at'] );
                $i++;
            }
        }
        return  ( isset( $loyalty ) && !empty( $loyalty ) ? $loyalty : Config::get('constant.NORECORDS') ); 
    }

    public static function merchantOfferDetails( $vendorId ) {
        
        $offerDetail = new Offer();
        $offerDetails = $offerDetail->getOfferOpenDetails( $vendorId ); 
      
        if( ! $offerDetails->isEmpty() ) {
            $offer = array();
            $response = array();
            foreach($offerDetails as $offerDetail){
                $data = array();
                $data['offer_id'] = ( isset( $offerDetail['offer_id'] ) && !empty( $offerDetail['offer_id'] ) ? $offerDetail['offer_id'] : Config::get('constant.EMPTY') );
                $data['offer_limit'] = ( isset( $offerDetail['offer_limit'] ) && !empty( $offerDetail['offer_limit'] ) ? $offerDetail['offer_limit'] : Config::get('constant.EMPTY') );
                $data['qty'] = ( isset( $offerDetail['qty'] ) && !empty( $offerDetail['qty'] ) ? $offerDetail['qty'] : Config::get('constant.EMPTY') );
                $data['price'] = ( isset( $offerDetail['price'] ) && !empty( $offerDetail['price'] ) ? $offerDetail['price'] : Config::get('constant.EMPTY') );
                $data['old_price'] = ( isset( $offerDetail['old_price'] ) && !empty( $offerDetail['old_price'] ) ? $offerDetail['old_price'] : Config::get('constant.EMPTY') );
                $data['offer_status'] = ( isset( $offerDetail['offer_status'] ) && !empty( $offerDetail['offer_status'] ) ? CustomHelper::isCheckLoyaltyStatus( $offerDetail['offer_status'] ) : Config::get('constant.EMPTY') );
                $data['day'] = ( isset( $offerDetail['offer_status'] ) && !empty( $offerDetail['offer_status'] ) ? CustomHelper::getTwoDateDifference( $offerDetail['from_date'], $offerDetail['to_date'] ) : Config::get('constant.EMPTY') );
                $data['item_name'] = ( isset( $offerDetail['item_id'] ) && !empty( $offerDetail['item_id'] ) ? CustomHelper::getOfferItemName( $offerDetail['item_id'] ) : Config::get('constant.EMPTY') );
                $data['description'] = ( isset( $offerDetail['description'] ) && !empty( $offerDetail['description'] ) ? $offerDetail['description'] : Config::get('constant.EMPTY') );
                $data['date_format'] = ( isset( $offerDetail['created_at'] ) && !empty( $offerDetail['created_at'] ) ? CustomHelper::getZoinDateandTimeFormat( $offerDetail['created_at'] ) : Config::get('constant.EMPTY') );                
                array_push($response,$data);
            }
        }
        return  ( isset( $response ) && !empty( $response ) ? $response : Config::get('constant.NORECORDS') ); 
    }
    
    public static function merchantLoyaltyDetail( $vendorId ) {
        
        $loyaltyDetail = new Loyalty();
        $loyaltyDetails = $loyaltyDetail->getLoyaltyOpenDetails( $vendorId ); 
      
        if( ! $loyaltyDetails->isEmpty() ) {
            $loyalty = array();
            $i = Config::get('constant.NUMBER.ZERO');
            foreach($loyaltyDetails as $key => $loyaltyDetail ) {
               
                $loyalty['loyalty_id'] = ( isset( $loyaltyDetail['loyalty_id'] ) && !empty( $loyaltyDetail['loyalty_id'] ) ? $loyaltyDetail['loyalty_id'] : Config::get('constant.EMPTY') );
                $loyalty['max_checkin'] = ( isset( $loyaltyDetail['max_checkin'] ) && !empty( $loyaltyDetail['max_checkin'] ) ? $loyaltyDetail['max_checkin'] : Config::get('constant.EMPTY') );
                $loyalty['max_bill_amount'] = ( isset( $loyaltyDetail['max_bill_amount'] ) && !empty( $loyaltyDetail['max_bill_amount'] ) ? $loyaltyDetail['max_bill_amount'] : Config::get('constant.EMPTY') );
                $loyalty['loyalty_content'] = ( isset( $loyaltyDetail['loyalty_id'] ) && !empty( $loyaltyDetail['loyalty_id'] ) ? "Loyalty - ".$loyaltyDetail['loyalty_id'] : Config::get('constant.EMPTY') );
                $loyalty['max_checkin_content'] = ( isset( $loyaltyDetail['max_checkin'] ) && !empty( $loyaltyDetail['max_checkin'] ) ? $loyaltyDetail['max_checkin']." check-ins" : Config::get('constant.EMPTY') );
                $loyalty['max_bill_amount_content'] = ( isset( $loyaltyDetail['max_bill_amount'] ) && !empty( $loyaltyDetail['max_bill_amount'] ) ? $loyaltyDetail['max_bill_amount']." Bill Amount" : Config::get('constant.EMPTY') );
                $loyalty['zoin_point'] = ( isset( $loyaltyDetail['zoin_point'] ) && !empty( $loyaltyDetail['zoin_point'] ) ? $loyaltyDetail['zoin_point'] : Config::get('constant.EMPTY') );
                $loyalty['loyalty_status'] = ( isset( $loyaltyDetail['loyalty_status'] ) && !empty( $loyaltyDetail['loyalty_status'] ) ? $loyaltyDetail['loyalty_status'] : Config::get('constant.EMPTY') );
                $loyalty['description'] = ( isset( $loyaltyDetail['description'] ) && !empty( $loyaltyDetail['description'] ) ? $loyaltyDetail['description'] : Config::get('constant.EMPTY') );
                $loyalty['date_format'] = CustomHelper::getZoinDateandTimeFormat( $loyaltyDetail['created_at'] );
                $i++;
            }
        }
        return  ( isset( $loyalty ) && !empty( $loyalty ) ? $loyalty : Config::get('constant.NORECORDS') ); 
    }

    public static function merchantProfilePhotoDetails( $vendorId ) {
        
        $getMerchantProfileImage = new MerchantImage();
        $profileImages = $getMerchantProfileImage->getMerchantProfileImageDetails( $vendorId );
      
        if( ! $profileImages->isEmpty() ) {
            $profile = array();
            foreach($profileImages as $key => $profileImage ) {
                $data = array();
                $data['profile_image'] = ( isset( $profileImage['profile_image'] ) && !empty( $profileImage['profile_image'] ) ? $profileImage['profile_image'] : Config::get('constant.EMPTY') );
                array_push($profile,$data);
            }
        }  else {
            $records = array();
            for($i = 0; $i <= 3; $i++ ){    
               $data = array();
               $data['profile_image'] = asset('/assets/images/zoin_empty.png');
               array_push($records,$data);
            }
        }
        return  ( isset( $profile ) && !empty( $profile ) ? $profile : $records ); 
    }  

    public static function merchantProfilePhotoCount( $vendorId ) {
        
        $getMerchantProfileImage = new MerchantImage();
        $profileImages = $getMerchantProfileImage->getMerchantProfileImageDetails( $vendorId );
        $count = ( ( ! $profileImages->isEmpty() ) ? count($profileImages) : 0);
        return  $count; 
    } 
    
    public static function merchantSocialMediaDetails( $vendorId ) {
        
        $getMerchantSocialMedia = new MerchantSocialMedia();
        $socialMediaNames = $getMerchantSocialMedia->getMerchantSocialMediaDetails( $vendorId );
         
        if( ! $socialMediaNames->isEmpty() ) {
            $socialNames = array();
            foreach($socialMediaNames as $key => $socialMediaName ) {
                $data = array();
                $data['social_name'] = ( isset( $socialMediaName->social_name ) && !empty( $socialMediaName->social_name ) ? $socialMediaName->social_name : Config::get('constant.EMPTY') );
                array_push($socialNames,$data); 
            }
        }
                
        return  ( isset( $socialNames ) && !empty( $socialNames ) ? $socialNames : Config::get('constant.NORECORDS') ); 
    }


    public static function checkMerchantTags( $tagId , $vendorId ) {
         
        if( isset( $tagId ) && !empty( $tagId ) ) {

            $tags = explode("," , $tagId);
            for($i=0;$i< count($tags);$i++){                
                $saveTag = new TagMerchants();
                $saveTag->saveTagMerchants( $vendorId, $tags[$i] );
            }
            
        } 

    }

    public static function merchantTagDetails( $vendorId ) {
         
         $getMerchantTags = new MerchantTags();
         $tags = $getMerchantTags->getMerchantTagLists( $vendorId );
          
         if( ! $tags->isEmpty() ) {
             $tagResponse = array();             
             foreach($tags as $key => $tag ) {
                $data = array();
                $data['tag_id'] = ( isset( $tag->id ) && !empty( $tag->id ) ? $tag->id : Config::get('constant.EMPTY') );
                $data['tag_name'] = ( isset( $tag->tag_name ) && !empty( $tag->tag_name ) ? $tag->tag_name : Config::get('constant.EMPTY') );
                array_push($tagResponse,$data);
             }
         }         
         return  ( isset( $tagResponse ) && !empty( $tagResponse ) ? $tagResponse : Config::get('constant.NORECORDS') ); 
     }

     public static function userTagDetails( $vendorId ) {
         
        $getMerchantTags = new MerchantTags();
        $tags = $getMerchantTags->getMerchantTagLists( $vendorId );
         
        if( ! $tags->isEmpty() ) {
            $data = array();            
            foreach($tags as $key => $tag ) {
               $data[] = ( isset( $tag->tag_name ) && !empty( $tag->tag_name ) ? $tag->tag_name : Config::get('constant.EMPTY') );
            }             
        }         
        return  $records = ( isset( $data ) && !empty( $data ) ? implode( ',' , $data ) : Config::get('constant.NORECORDS') ); 
    }

    public static function curPageURL() {
        $pageURL = 'http';
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";
        $url = explode("/",$_SERVER["REQUEST_URI"]);
        if ($_SERVER["SERVER_PORT"] != "80") {
         $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/".$url[1]."/".$url[2]."/";
        } else {
         $pageURL .= $_SERVER["SERVER_NAME"]."/".$url[1]."/".$url[2]."/";
        }
        return $pageURL;
    }
   

   public static function isCheckMerchantStatus($statusCode) 
   {
        switch ($statusCode) {
            case Config::get('constant.NUMBER.ZERO'):
                return Config::get('constant.MERCHANT_STATUS.UNAPPROVED');
            break;
            case Config::get('constant.NUMBER.ONE'):
                return Config::get('constant.MERCHANT_STATUS.APPROVED');
            break;
            case Config::get('constant.NUMBER.TWO'):
                return Config::get('constant.MERCHANT_STATUS.PENDING');
            break;
            case Config::get('constant.NUMBER.THREE'):
                return Config::get('constant.MERCHANT_STATUS.BLOCKED');
            break;            
       }
   }

   public static function getNotificationKeyStatus($urlString) 
   {
       $url = explode("/", trim($urlString,"/"));
       $status = ( isset( $url ) && !empty( $url ) ? end($url) : Config::get('constant.NUMBER.ZERO') ); 
       
       switch ( $status ) {
            case Config::get('constant.NOTIFICATION-IMG.LOGIN'):
                return Config::get('constant.NUMBER.ONE');
            break;
            case Config::get('constant.NOTIFICATION-IMG.LOGOUT'):
                return Config::get('constant.NUMBER.TWO');
            break;
            case Config::get('constant.NOTIFICATION-IMG.LOYALTY_SUBMIT'):
                return Config::get('constant.NUMBER.THREE');
            break;
            case Config::get('constant.NOTIFICATION-IMG.EDIT_PROFILE'):
                return Config::get('constant.NUMBER.FOUR');
            break;
            case Config::get('constant.NOTIFICATION-IMG.REDEEMED_CODE'):
                return Config::get('constant.NUMBER.FIVE');
            break;
            case Config::get('constant.NOTIFICATION-IMG.TRANSACTION'):
                return Config::get('constant.NUMBER.SIX');
            break;
            default:
                return Config::get('constant.NUMBER.ZERO');
            break;
      }
   }

   public static function merchantLoyaltyBalance($maxAmount , $zoinPoint) 
   {   
       $pendingBal = Config::get('constant.NUMBER.ZERO');
       if( ( !empty( $maxAmount ) && !empty( $zoinPoint ) ) ) {
             
            if( $maxAmount >= $zoinPoint) {           
                $pendingBal = $maxAmount / $zoinPoint;
            }

        }       
       return  ( isset( $pendingBal ) && !empty( $pendingBal ) ? (int) $pendingBal : Config::get('constant.NUMBER.ZERO') ); 
   }
   
   
   public static function outputString($textMsg, $vendorId , $userId = NULL, $data = Null ){
        
        $txt = sprintf(__($textMsg), $vendorId, $userId, $data);
        return $txt;
   }

   public static function qrCodeImgGeneration( $redeemCode, $redeemId ){

        $renderer = new \BaconQrCode\Renderer\Image\Png();
        $renderer->setHeight(Config::get('constant.Qr-Code.HEIGHT'));
        $renderer->setWidth(Config::get('constant.Qr-Code.WIDTH'));
        $writer = new \BaconQrCode\Writer($renderer);
        $destinationPath = public_path('/images/qr_code//');
        $fileName = time().'-'.$redeemCode.'.png';
        $file = $destinationPath.$fileName;
        $writer->writeFile($redeemCode, $file);

        if( ( isset( $redeemId ) && !empty( $redeemId ) ) ) {

            $redeemDet = RedeemCode::find($redeemId);
            $image_path = public_path('/images/qr_code//'.$redeemDet->qr_code_img);
            if (file_exists($image_path) && !empty($redeemDet->qr_code_img) ) {
                unlink($image_path);
            }
            $redeemDet->qr_code_img = $fileName;
            $redeemDet->save();
            //RedeemCode::where( [ 'id' => $redeemId ] )->update( [ 'qr_code_img' => $fileName ] );
        }

        return  ( isset( $fileName ) && !empty( $fileName ) ? $fileName : '' );

   }

    
   public static function unlinkImg( $imgPath ){
        if (file_exists( $imgPath )) {
            unlink($imgPath);           
        }
        return true; 
   }

   public static function addOrdinalNumberSuffix($num) {
        if (!in_array(($num % 100),array(11,12,13))){
            switch ($num % 10) {
                case 1:  return $num.'st';
                case 2:  return $num.'nd';
                case 3:  return $num.'rd';
            }
        }
        return $num.'th';
    }

    public static function showVendorProfileImg( $profileImg, $vendorId ){
       
        if( isset( $profileImg ) && !empty( $profileImg ) ) { 
            $uploadPath = url('/')."/images/vendors/".$vendorId."/".$profileImg; 
           // $uploadPath = public_path("/images/vendors/".$vendorId."/".$profileImg); 
        }
        return  ( isset( $uploadPath ) && !empty( $uploadPath ) ? $uploadPath : asset('/assets/images/profile_logo.png') );
        
    }

    public static function showUserProfileImg( $profileImg, $userId ){
        $imgStorePath = Config::get('settings.ZOIN.USER.STORAGE-PATH');
        if( isset( $profileImg ) && !empty( $profileImg ) ) { 
            $uploadPath = url('/').$imgStorePath.$userId."/".$profileImg; 
           // $uploadPath = public_path("/images/users/".$userId."/".$profileImg); 
        }
        return  ( isset( $uploadPath ) && !empty( $uploadPath ) ? $uploadPath : asset('/assets/images/profile_logo.png') );
        
    }

    public static function updateLoyaltyCompleted( $data ){
        
        $loyaltyCompleted = new LoyaltyCompleted();
        $loyaltyCompleted->completed_id = CustomHelper::__codeGeneration(Config::get('constant.ZOINUSER.LOYALTY_COMPLETED'),Config::get('constant.FORMAT-CODE.LOYALTY_COMPLETED_CODE'));
        $loyaltyCompleted->vendor_id = $data['vendorId'];
        $loyaltyCompleted->user_id = $data['vendorId'];
        $loyaltyCompleted->zoin_point = $data['zoinPoint'];
        $loyaltyCompleted->user_checkin = $data['usrCheckIn'];
        $loyaltyCompleted->max_checkin = $data['maxCheckIn'];
        $loyaltyCompleted->user_max_bill_amount = $data['usrBillAmt'];
        $loyaltyCompleted->max_bill_amount = $data['maxBillAmt'];
        $loyaltyCompleted->save();
        
        return  ( isset( $loyaltyCompleted->completed_id ) && !empty( $loyaltyCompleted->completed_id ) ? $loyaltyCompleted->completed_id : '' );  
        
    }
    
    public static function companyClosedTimings( $startTime, $endTime, $closedDays = null ) {
        
        if( isset( $startTime ) && !empty( $endTime ) ) {
            $currenDate = date("Y-m-d");
            $startdatetime = strtotime($currenDate." ".$startTime);
            $enddatetime = strtotime($currenDate." ".$endTime);
            $currenDateTime = strtotime(Config::get('settings.Date_Format'),strtotime(date('Y-m-d h:i A')));
            //echo $currenDateTime = date('Y-m-d h:i A',strtotime(Config::get('settings.Date_Format'),strtotime(date('Y-m-d h:i A'))));
            //exit;
            if( isset( $closedDays ) && !empty( $closedDays ) ) {
                $weekDays = array();
                $weekDays = explode(",", $closedDays);
                if (in_array(date("l"), $weekDays)) {
                    return sprintf(__(Config::get('constant.DATE-TIME.CLOSED')));
                }
            }

            if( $startdatetime >= $enddatetime ) {             
                return sprintf(__(Config::get('constant.DATE-TIME.END-TIME')));
            }

            if($currenDateTime >= $enddatetime) {
                return sprintf(__(Config::get('constant.DATE-TIME.CLOSED'))); 
            }

            if( ($currenDateTime >= $startdatetime ) && ( $currenDateTime <= $enddatetime) ) {
                    
                if( $enddatetime >= $currenDateTime ) {
                    $minutes = round(abs($enddatetime - $currenDateTime) / 60,2);
                    if($minutes == 30 || $minutes >= 1 && $minutes <= 30 ){
                        //return sprintf(__(Config::get('constant.DATE-TIME.CLOSE')), $minutes);
                        return "Close in 30 Min";
                    } else {
                        return sprintf(__(Config::get('constant.DATE-TIME.OPEN')));
                    }
                } else {                    
                    return sprintf(__(Config::get('constant.DATE-TIME.OPEN')));
                }  
            } else {
                return sprintf(__(Config::get('constant.DATE-TIME.CLOSED')));
            } 
        }
    }

    public static function getMerchantCompanyDetails( $vendorId ) {
        $data = MerchantDetail::where("vendor_id", '=', $vendorId)->select('vendor_id','company_name','mobile_number','contact_person','profile_image')->first();
        return ( isset($data) && !empty($data) ? $data->company_name : '' );
    }

    public static function userLastVisited( $vendorId, $userId, $loyaltyId ) { 
    
        $data = Transaction::where("vendor_id", '=', $vendorId)->where("user_id", '=', $userId)->where("loyalty_id", '=', $loyaltyId)->select('creation_date')->orderBy('id', 'DESC')->first();
         
        return ( isset($data) && !empty($data) ? CustomHelper::getZoinDateFormat($data->creation_date) : '--' );

    }

    public static function adminPerCalc( $usrPoint ) {
        $amount = 0;
        $percentage = Config::get('settings.ZOIN.MERCHANT.PERCENTAGE');
        $perAmt = $usrPoint * $percentage / 100;  
        $amount = $usrPoint - $perAmt; 
        return ( isset($amount) && !empty($amount) ? $amount : 0 );
    }

    public static function userSubscribeMerchant( $vendorId, $usrMobileNumber, $loyaltyId ) {
       
        $data = RedeemCode::where("vendor_id", '=', $vendorId)->where("mobile_number", '=', $usrMobileNumber)->where("loyalty_id", '=', $loyaltyId)->select('redeem_code')->orderBy('id', 'DESC')->count();
        
        return ( $data==1 && !empty($data) ? "Subscribe" : 'UnSubscribe' );
    }

    public static function getEndDate( $days ) {
       
        if(!empty($days)){
          $date = date("Y-m-d");
          $endDate = date('Y-m-d', strtotime($date. "+ $days days"));
        }        
        return ( isset($endDate) && !empty($endDate) ? $endDate : '' );
    }

    public static function getTwoDateDifference( $fromDate, $toDate ) {
    
        $date1 = date_create($fromDate);
        $date2 = date_create($toDate);
        
        //difference between two dates
        $diff = date_diff($date1,$date2);
        
        //count days
        $dayCount = $diff->format("%a"); 

        return ( isset($dayCount) && !empty($dayCount) ? $dayCount : '' );
    }

    public static function getOfferItemName( $itemId ) {
     
        $data = Item::where("id", '=', $itemId)->select('id','item_name')->first();
        return ( isset($data) && !empty($data) ? $data->item_name : '' );
    
    }

}
