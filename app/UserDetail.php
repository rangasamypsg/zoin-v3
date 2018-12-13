<?php

namespace App;
use DB;
use Config;
use App\Helpers\CustomHelper;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{

    /**
    * The table associated with the model.
    *
    * @var string
    */
    public $table = "user_details";
    
    protected $primaryKey = 'id';

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
        'full_name','username', 'email_id', 'mobile_number', 'is_email_verified','user_level', 'user_type', 'is_mobile_verified'
    ];


    // validate
    public static $regisUserRules = [
        
        'email_id' => 'required|string|email|max:255|unique:user_details',
        'mobile_number' => 'required|unique:user_details',
        'username' => 'required|unique:user_details',
        
    ];

    public static function saveUsers( $data, $addressId ){

        $user = new UserDetail();
        $user->user_id = CustomHelper::__codeGeneration(Config::get('constant.ZOINUSER.USER'),Config::get('constant.FORMAT-CODE.USER_CODE'));
        $user->full_name = $data['full_name'];
        $user->username = $data['username'];
        $user->email_id = $data['email_id'];
        $user->mobile_number = $data['mobile_number'];
        $user->address_id = ( ( isset($addressId) && !empty($addressId) ) ? $addressId : '' );
        $user->is_email_verified = Config::get('constant.NUMBER.ZERO');
        $user->user_level =  Config::get('constant.NUMBER.ONE');
        $user->user_type =  $data['user_type'];
        $user->is_mobile_verified = Config::get('constant.NUMBER.ONE');         
        $user->is_login_approved = Config::get('constant.NUMBER.ONE');         
        $user->save();

        return ( isset($user->id) && !empty($user->id) ? $user->id : '' );
    }

    public static function getSidebarProfileDetails( $data ){
        
        $sideBarList = DB::table('user_details as u')
                    ->select("u.user_id","u.full_name","u.username","u.profile_image","u.user_level","a.city")
                    ->leftjoin('address as a', 'u.address_id', '=', 'a.address_id')
                    ->where('u.mobile_number', '=', $data['mobile_number'])
                    ->orderBy('u.id', 'DESC')
                    ->first();

        return ( isset($sideBarList) && !empty($sideBarList) ? $sideBarList : '' );          
    }

    public static function getProfileDetails( $data ){
        
        $sideBarList = DB::table('user_details as u')
                    ->select("u.user_id","u.full_name","u.username","u.user_level","u.profile_image","a.city","zb.zoin_balance","lb.claimed_loyalty")
                    ->leftjoin('address as a', 'u.address_id', '=', 'a.address_id')
                    ->leftjoin('zoin_balance as zb', 'u.user_id', '=', 'zb.vendor_or_user_id')
                    ->leftjoin('loyalty_balance as lb', 'u.user_id', '=', 'lb.user_id')
                    ->where('u.mobile_number', '=', $data['mobile_number'])
                    ->orderBy('u.id', 'DESC')
                    ->first();
  
        return ( isset($sideBarList) && !empty($sideBarList) ? $sideBarList : '' );          
    }

    public static function updateUsers( $data ){
        
        $users = UserDetail::where("mobile_number", '=', $data['mobile_number'])->select('id','user_id','address_id')->first();
        $users->full_name = $data['full_name'];
        $users->email_id = $data['email_id'];
        $users->save();

        return ( isset($users['address_id']) && !empty($users['address_id']) ? $users['address_id'] : '' );          
    }

    public static function getEditProfileDetails( $data ){
        
        $EditProfileList =  DB::table('user_details as u')
                    ->select("u.user_id","u.full_name","u.email_id","u.mobile_number","a.address","a.city")
                    ->leftjoin('address as a', 'u.address_id', '=', 'a.address_id')
                    ->where('u.mobile_number', '=', $data['mobile_number'])
                    ->orderBy('u.id', 'DESC')
                    ->first();

        return ( isset($EditProfileList) && !empty($EditProfileList) ? $EditProfileList : '' ); 
    
    }

    public static function checkUserMobileNoExists($mobileNo) {
        
        $data = UserDetail::where("mobile_number", '=', $mobileNo)->first();
 
        return $data;
    }

    public static function checkUserCombination( $data ) {
        
        $result = UserDetail::where(['mobile_number' => $data['mobile_number']])->where(['user_id' => $data['user_id']])->count();   
       
       return ( isset( $result ) && !empty( $result ) ? $result : '' );
    }
    
    public static function getMobileNoBasedUserId( $mobileNo ){
        
        $data = UserDetail::where("mobile_number", '=', $mobileNo)->select('id','user_id','full_name')->first();
        
        return ( isset($data) && !empty($data) ? $data : '' );          
    }

    public static function updateProfileImg( $data, $userId ){
        
        $imgStorePath = Config::get('settings.ZOIN.USER.STORAGE-PATH');
        $users = UserDetail::where("mobile_number", '=', $data['mobile_number'])->select('id','user_id','profile_image')->first();
        if ( !empty($users->profile_image) ) {
            //$image_path = public_path("/images/users/".$userId."/".$users->profile_image);
            $image_path = public_path($imgStorePath."".$userId."/".$users->profile_image);
            CustomHelper::unlinkImg($image_path);
        }
        $users->profile_image = CustomHelper::baseEncode64ProfileImage( $data['profile_image'], $userId, $imgStorePath );
        $users->save();

        return ( isset($users->id) && !empty($users->id) ? $users->id : '' );          
    }

}
