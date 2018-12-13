<?php

namespace App\Traits;

trait CustomMessage {
   
   /**
	 * inits bank account with a particular account no and
	 * initial amount
	 * @param string $accountNo
	 * @param float  $initialAmount
	 */
 
	/* public function __construct() {
        
        $args = func_get_args();
		$num = func_num_args();
		if(method_exists($this,$f = 'init_' . $num)) {
			call_user_func_array(array($this,$f),$args);
        }
        
	} */
    /**
     * Set the view for the mail message.
     *
     * @param  array|string  $view
     * @param  array  $data
     * @return $this
     */
    public function printThis() {
       echo "Trait executed rangasamy";
    }
 
    public static function printMerchantRegisterSuccess() {
       
        $data =  "You have singned up and your request is still pending. Our Customer service representative will get in touch soon";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printMerchantRegisterFalse() {
        
         $data =  "Registration not successful";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
     }

    public static function printCorrectMobileNumber() {
         
         $data =  "Please enter the correct mobile number";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printInvalidMobileNo() {
        
         $data =  "Please enter valid mobile number";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printInvalidMobileNoAndPassword() {
        
         $data =  "Invalid Mobile Number or Password";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printCustomerSupport() {
        
         $data =  "Your account is still pending for approval. Please wait till our customer support contact you.";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printZoinMember() {
        
         $data =  "Congrats! You  are a Zoin member now!";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printOtpGenerationSuccess() {
        
         $data =  "You are successfully OTP Generated";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printMobileNoMissing() {
        
         $data =  "Please enter the mobile number Sorry! mobile number is not valid or Missing.";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printMobileNoNotVerified() {
        
         $data =  "Mobile number not verified. Please enter OTP to verify";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printMobileNoVerified() {
        
         $data =  "You have successfully verified your account.";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printOTPWrong() {
        
         $data =  "Please enter valid OTP";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printOTPMissing() {
        
         $data =  "Please fill with received OTP";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printOTPSuccess() {
        
         $data =  "You Successfully! updated";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printForgotMobileNotVerified() {
        
         $data =  "Mobile number not verified. Please login to verify your mobile number.";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printPasswordSuccess() {
        
         $data =  "Password updated successfully";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printPasswordFailure() {
        
         $data =  "Password not updated successfully";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printLoyaltyOfferFailure() {
        
         $data =  "Your loyalty is not created successfully. Please try again";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }
    
    public static function printLoyaltyFailure() {
        
         $data =  "Your loyalty is not submitted. Please try again";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printLoyaltySuccess() {
        
         $data =  "Thank you for submitting your loyalty. We will review and send it back to you for approval ofter which it will go for online";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printAddMoreLoyalty() {
        
         $data =  "Please contact our customer support for more loyalties.";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printLoyaltyNotCreated() {
        
         $data =  "Loyalty not created. Please try again.";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printLoyaltyAccess() {
        
        $data =  "Loyalty Access Denied.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printProfileNotCreated() {
        
         $data =  "Profile not created. Please try again.";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printNetworkFailed() {
        
         $data =  "Network Failed. Please try again!";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printProfileUpdated() {
        
         $data =  "Profile updated successfully";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printNewUser() {
        
         $data =  "New User";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printAlreadyExistsUser() {
        
         $data =  "User already exists";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printMerchantLoginSuccess() {
        
         $data =  "Please wait. Our customer support will contact you directly.";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printLoginSuccess() {
        
         $data =  "Login Success";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printLoginOutSuccess() {
        
         $data =  "Logout Success";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printLoginOutfalse() {
        
         $data =  "Logout not Success";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printNoRecords() {
        
         $data =  "No Records Found";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printRedeemCodeMissing() {
        
         $data =  "Please enter the Redeem code";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printRedeemCodeMissMatching() {
        
        $data =  "Redeem code is wrongly entered";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
   }

    public static function printRedeemCodeAlreadyExists() {
        
         $data =  "Sorry, this item has already been redeemed";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printRedeemClaimed() {
        
         $data =  "Congratulations, you have successfully claimed this item!";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printMerchantBalance() {
        
         $data =  "Merchant Balance is not enough";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printMerchantPoint() {
        
         $data =  "Merchant Point is not enough";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printUserNotReach() {
        
         $data =  "User not reach the amount";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printRedeemCodeInvalid() {
        
         $data =  "Sorry! Redeem code is invalid";
 
         return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }
 
    public static function printTransanctionCompleted() {
        
        $data =  "Transaction Process Completed";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
   }

   public static function printMerchantStatus() {
        
        $data =  "Blocked the User";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printDescriptionSuccess() {
        
        $data =  "Description updated successfully";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

   public static function printDescriptionFailure() {
        
        $data =  "Description not updated successfully";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printVendorMissing() {
        
        $data =  "Vendor details is Missing";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printLoyaltyMissing() {
        
        $data =  "Loyalty details is Missing";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printMerchantStatusUpdate() {
            
            $data =  "Active";

            return  ( isset( $data ) && !empty( $data ) ? $data : '');    
    }

    public static function printMerchantTagRemove() {
            
            $data =  "Tag Remove successfully";

            return  ( isset( $data ) && !empty( $data ) ? $data : '');    
    }

    public static function printTagCreated() {
        
        $data =  "Tag Created successfully";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');    
    }

    public static function printVersionUpdate() {
        
        $data =  "Version update successfully";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');    
    }

    public static function printVesrionMissing() {
        
        $data =  "Version Field is Missing.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }
    
    public static function printAddMoreTag() {
        
        $data =  "To add more Tag please contact our customer support";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printMerchantBlocked() {
        
        $data =  "Your account has been blocked due to certain restrictions";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printMerchantUnBlocked() {
        
        $data =  "Your account is unblocked. Thanks for your support.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }
    
    public static function printMerchantLoginBlocked() {
        
        $data =  "Blocked your Account. Please contact our customer support";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }
    
    public static function printMerchantProfileImg() {
        
        $data =  "Profile Image update successfully";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }
	
	public static function printResendOtpSuccess() {
        
        $data =  "Please wait! You will recieve OTP Soon";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printMerBalanceSuccess() {
        
        $data =  "Merchant balance credited successfully";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printMerBalanceFailure() {
        
        $data =  "Merchant balance credited unsuccessfully";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printVendorIdMissing() {
        
        $data =  "Please enter the VendorId.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

   public static function printAddMoreOffer() {
        
        $data =  "Please contact our customer support for more offers.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

   public static function printOfferSuccess() {
       
        $data =  "Thanks for submitting your offer. It's worth valuable for us. Please wait for approval within few days to activate";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
   }

   public static function printOfferFailure() {
        
        $data =  "Your Offer is not submitted. Please try again";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printOfferNotCreated() {
        
        $data =  "Offer not created. Please try again.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }
    
    public static function printEnterStatusOfferID() {
        
        $data =  "Please enter offerId or status.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

}
