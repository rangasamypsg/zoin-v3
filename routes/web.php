<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

//Route::group(['prefix' => 'api/v1','middleware' => ['web']], function () {
Route::group(['middleware' => ['web','XSS']], function () {

    //Api Routes
    //Merchant Registration Process
    Route::post('registration', ['as' => 'Merchant.registration' , 'uses' => 'MerchantApiController@registration']);
    Route::post('merchent_login', ['as' => 'Merchant.doLogin' , 'uses' => 'MerchantApiController@doLogin']);
    Route::post('merchent_mobile_login', ['as' => 'Merchant.doMobileLogin' , 'uses' => 'MerchantApiController@doMobileLogin']);

    //Merchant Registration Email Process
    Route::get('register/verify/{confirmationCode}', ['as' => 'Merchant.ConfirmationCode','uses' => 'MerchantApiController@confirm']);

    //Reset Password Merchant
    Route::post('resetpassword', ['as' => 'Merchant.ResetPassword' , 'uses' => 'MerchantApiController@resetPassword']);
    Route::post('resendotp', ['as' => 'Merchant.ResendOtp' , 'uses' => 'MerchantApiController@reSendOtpGeneration']);
    Route::post('verify_otp', ['as' => 'Merchant.VerifyOtp' , 'uses' => 'MerchantApiController@verifyOtp']);
    Route::post('login_verify_otp', ['as' => 'Merchant.LoginVerifyOtp' , 'uses' => 'MerchantApiController@loginVerifyOtp']);
    Route::post('logout_update', ['as' => 'Merchant.logoutPassword' , 'uses' => 'MerchantApiController@logoutPassword']);
    
    //Route::post('verify_forgot_otp', ['as' => 'Merchant.VerifyForgotOtp' , 'uses' => 'MerchantApiController@verifyForgotOtp']);
    Route::post('updatepassword', ['as' => 'Merchant.UpdatePassword' , 'uses' => 'MerchantApiController@updatepassword']);

    //Merchant offer type and zoin point 
    Route::post('loyalty_offer_type', ['as' => 'Merchant.OfferType' , 'uses' => 'MerchantApiController@loyaltyOfferType']);
    Route::post('loyalty_zoin_point', ['as' => 'Merchant.LoyaltyZoinPoint' , 'uses' => 'MerchantApiController@LoyaltyZoinPoint']);

    //Loyalty Api Services for Merchant
    Route::post('loyalty', ['as' => 'Merchant.AddLoyalty' , 'uses' => 'MerchantApiController@addLoyalty']);
    Route::post('loyalty_count_check', ['as' => 'Merchant.LoyaltyCount' , 'uses' => 'MerchantApiController@loyaltyCount']);
    Route::post('loyalty-list', ['as' => 'Merchant.LoyaltyList' , 'uses' => 'MerchantApiController@LoyaltyList']);
    Route::post('view_loyalty_list', ['as' => 'Merchant.ViewLoyaltyList' , 'uses' => 'MerchantApiController@ViewLoyaltyList']);
    Route::post('merchant_loyalty_status', ['as' => 'Merchant.LoyaltyStatus' , 'uses' => 'MerchantApiController@merchantLoyaltyStatus']);
    Route::post('merchant_social_media', ['as' => 'Merchant.SocialMedia' , 'uses' => 'MerchantApiController@merchantSocialMedia']);

    //Merchant Profile List
    Route::post('sidebar-loyalty-list', ['as' => 'Merchant.SideBarLoyaltyList' , 'uses' => 'MerchantApiController@SideBarLoyaltyList']);
    Route::post('merchant-profile-list', ['as' => 'Merchant.MerchantProfileList' , 'uses' => 'MerchantApiController@MerchantProfileList']);
    Route::post('merchant-edit-profile', ['as' => 'Merchant.MerchantEditProfile' , 'uses' => 'MerchantApiController@MerchantEditProfile']);
    Route::post('merchant_profile_image', ['as' => 'Merchant.MerchantEditProfileImage' , 'uses' => 'MerchantApiController@merchantEditProfileImage']);
    Route::post('merchant-edit-profile-list', ['as' => 'Merchant.MerchantEditProfileList' , 'uses' => 'MerchantApiController@merchantEditProfileList']);
    Route::post('merchant_company_description', ['as' => 'Merchant.merchantCompanyDescription' , 'uses' => 'MerchantApiController@merchantCompanyDescription']);
    Route::post('merchant_loyalty_completed', ['as' => 'Merchant.merchantLoyaltyCompleted' , 'uses' => 'MerchantApiController@merchantLoyaltyCompleted']);
    Route::get('merchant_all_tags', ['as' => 'Merchant.merchantAllTags' , 'uses' => 'MerchantApiController@merchantAllTags']);
    Route::post('merchant_tags', ['as' => 'Merchant.merchantTags' , 'uses' => 'MerchantApiController@merchantTags']);
    Route::post('merchant_tag_delete', ['as' => 'Merchant.merchantTagDelete' , 'uses' => 'MerchantApiController@merchantTagDelete']);
    Route::post('merchant_tag_name_delete', ['as' => 'Merchant.merchantTagNameDelete' , 'uses' => 'MerchantApiController@merchantTagNameDelete']);
    Route::post('merchant_tag_list', ['as' => 'Merchant.merchantTagList' , 'uses' => 'MerchantApiController@merchantTagList']);
    Route::post('merchant_block', ['as' => 'Merchant.merchantBlock' , 'uses' => 'MerchantApiController@merchantBlock']);
    Route::post('popup_menu', ['as' => 'Merchant.LoyaltyPopupMenu' , 'uses' => 'MerchantApiController@LoyaltyPopupMenu']);

    //Merchant Zoin in / zoin out
    Route::post('merchant_zoin_in', ['as' => 'Merchant.zoinIn' , 'uses' => 'MerchantApiController@merchantZoinIn']);
    Route::post('merchant_zoin_out', ['as' => 'Merchant.zoinOut' , 'uses' => 'MerchantApiController@merchantZoinOut']);
    Route::post('merchant_zoin_all', ['as' => 'Merchant.zoinAll' , 'uses' => 'MerchantApiController@merchantZoinAll']);

    Route::post('merchant_redeem_verify', ['as' => 'Merchant.MerchantRedeemVerify' , 'uses' => 'MerchantApiController@merchantRedeemVerify']);
    Route::post('merchant_transaction', ['as' => 'Merchant.MerchantTransaction' , 'uses' => 'MerchantApiController@MerchantTransaction']);
    Route::post('merchant_notification', ['as' => 'Merchant.MerchantNotification' , 'uses' => 'MerchantApiController@merchantNotification']);
    Route::post('merchant_notification_count', ['as' => 'Merchant.MerchantNotificationCount' , 'uses' => 'MerchantApiController@merchantNotificationCount']);
    Route::get('merchant_razor_img', ['as' => 'Merchant.merchantRazorImg' , 'uses' => 'MerchantApiController@merchantRazorImg']);
    Route::post('user_notification', ['as' => 'User.UserNotification' , 'uses' => 'UserApiController@userNotification']);
    Route::post('user_notification_count', ['as' => 'User.MerchantNotificationCount' , 'uses' => 'UserApiController@userNotificationCount']);

    //Transaction loyalty process
    Route::post('merchant_transaction_loyalty', ['as' => 'Merchant.MerchantTransactionLoyalty' , 'uses' => 'MerchantApiController@MerchantTransactionLoyalty']);
    Route::post('merchant_transaction_list', ['as' => 'Merchant.MerchantTransactionProcess' , 'uses' => 'MerchantApiController@merchantTransactionProcess']);
    Route::post('merchant_bal_transaction', ['as' => 'Merchant.merchantBalTransaction' , 'uses' => 'MerchantApiController@merchantBalTransaction']);

    //Offer
    Route::post('item_list', ['as' => 'Merchant.getItemList' , 'uses' => 'MerchantApiController@getItemList']);
    Route::post('add_offer', ['as' => 'Merchant.addOffer' , 'uses' => 'MerchantApiController@addoffer']);
    Route::post('offer_count_check', ['as' => 'Merchant.OfferCount' , 'uses' => 'MerchantApiController@offerCount']);
    Route::post('offer_list', ['as' => 'Merchant.OfferList' , 'uses' => 'MerchantApiController@offerList']);
    Route::post('view_offer_list', ['as' => 'Merchant.ViewOfferList' , 'uses' => 'MerchantApiController@ViewOfferList']);
    Route::post('merchant_offer_status', ['as' => 'Merchant.OfferStatus' , 'uses' => 'MerchantApiController@merchantOfferStatus']);

    //User Registration Process
    Route::post('user_registration', ['as' => 'User.Registration' , 'uses' => 'UserApiController@userRegistration']);
    Route::post('user_mobile_login', ['as' => 'User.doMobileLogin' , 'uses' => 'UserApiController@doMobileLogin']);
    Route::post('funky_name_generated', ['as' => 'User.funkyName' , 'uses' => 'UserApiController@funckyNameGenerated']); 

    //User OTP Send and Verify
    Route::post('user_resend_otp', ['as' => 'User.ResendOtp' , 'uses' => 'UserApiController@reSendOtpGeneration']);
    Route::post('user_verify_otp', ['as' => 'User.VerifyOtp' , 'uses' => 'UserApiController@userVerifyOtp']);
    Route::post('user_login_verify_otp', ['as' => 'User.UserLoginVerifyOtp' , 'uses' => 'UserApiController@userLoginVerifyOtp']);

    //User Profile List
    Route::post('user_sidebar_list', ['as' => 'User.UserSideBarList' , 'uses' => 'UserApiController@userSideBarList']);
    Route::post('user_profile_list', ['as' => 'User.UserProfileList' , 'uses' => 'UserApiController@userProfileList']);
    //Route::post('user_edit_profile', ['as' => 'User.UserEditProfile' , 'uses' => 'UserApiController@userEditProfile']);
    //Route::post('user_edit_profile_list', ['as' => 'User.UserEditProfileList' , 'uses' => 'UserApiController@userEditProfileList']);   

    //Loyalty Api Services for User
    Route::get('user_explore_list', ['as' => 'User.userExploreList' , 'uses' => 'UserApiController@userExploreList']);
    Route::post('user_explore_filter_list', ['as' => 'User.userExploreFilterList' , 'uses' => 'UserApiController@userExploreFilterList']);
    Route::get('search_filter_tags', ['as' => 'User.searchFilterTags' , 'uses' => 'UserApiController@searchFilterTags']);
    Route::post('user_loyalty_detail_list', ['as' => 'User.UserLoyaltyDetailList' , 'uses' => 'UserApiController@userLoyaltyDetailList']);
    Route::post('user_profile_explore_list', ['as' => 'User.userProfileExploreList' , 'uses' => 'UserApiController@userProfileExploreList']);
    Route::post('user_explore_image_list', ['as' => 'User.userExploreImageList' , 'uses' => 'UserApiController@userExploreImageList']);
    Route::post('user_explore_confirm', ['as' => 'User.userExploreConfirm' , 'uses' => 'UserApiController@userExploreConfirm']);
    Route::post('user_explore_confirm_popup', ['as' => 'User.userExploreConfirmPopup' , 'uses' => 'UserApiController@userExploreConfirmPopup']);
    Route::post('user_redeem_list', ['as' => 'User.userRedeemList' , 'uses' => 'UserApiController@userRedeemList']);
    //Route::post('user_redeemed_list', ['as' => 'User.userRedeemedList' , 'uses' => 'UserApiController@userRedeemedList']);
    Route::post('user_transaction_list', ['as' => 'User.UserTransactionProcess' , 'uses' => 'UserApiController@userTransactionProcess']);
    
    //User Logout
    Route::post('user_logout_update', ['as' => 'User.UserLogoutPassword' , 'uses' => 'UserApiController@userLogoutPassword']);
    Route::post('app_version', ['as' => 'Merchant.appVersion' , 'uses' => 'MerchantApiController@appVersion']);

    Route::post('user_zoin_in', ['as' => 'User.zoinIn' , 'uses' => 'UserApiController@userZoinIn']);
    Route::post('user_zoin_out', ['as' => 'User.zoinOut' , 'uses' => 'UserApiController@userZoinOut']);
    Route::post('user_zoin_all', ['as' => 'User.zoinAll' , 'uses' => 'UserApiController@userZoinAll']);
    Route::post('user_profile_image', ['as' => 'User.userEditProfileImage' , 'uses' => 'UserApiController@userEditProfileImage']);
    Route::post('user_loyalty_completed', ['as' => 'User.userLoyaltyCompleted' , 'uses' => 'UserApiController@userLoyaltyCompleted']);
    Route::post('user_loyalty_incompleted', ['as' => 'User.userLoyaltyInCompleted' , 'uses' => 'UserApiController@userLoyaltyInCompleted']);
    Route::post('user_loyalty_all', ['as' => 'User.userLoyaltyAll' , 'uses' => 'UserApiController@userLoyaltyAll']);

    

});



