<?php
namespace App\Helpers;
use Illuminate\Support\Collection;
use Config;
use DB;

class UsernameHelper
{
    public $length = 3;
    public $username;
    public $min = 1;
    public $max = 9999;
    public $users = array();
    protected $model = "user_details";
    protected $table = "funky_names";
    protected $fieldName = "username";
    protected $name = "name";
     

    public function __construct( $username ) {
        $this->username = $username;
    }

    public function autogenerateUsername(){
         
        $collection = collect(array($this->generatePrefixUsername(), $this->generateSuffixUsername(), $this->generateFunkyUsername(), $this->generateSuffixFunkyUsername()));
        $records = $collection->shuffle(); 

        $result = array();
        foreach($records as $key => $record ) {                 
           $data = array();
           $data['funky_name'] = ( isset( $record ) && !empty( $record ) ? $record : '' );
           array_push($result,$data); 
        } 
        
        return  ( isset( $result ) && !empty( $result ) ? $result : '' );  

    } 

    public function generateRandomNUmber(){
       
        $collection = collect(array(9,10,99,100,999,1000));
        $shuffled = $collection->shuffle();        
        return rand($this->min,$shuffled[0]);
    }

    public function generatePrefixUsername(){
      
        $username = $this->checkUsernameExists( $this->username.$this->generateRandomNUmber() );
        return ( isset( $username ) && !empty( $username )  ? $username : '' );
    }
    
    public function generateSuffixUsername(){
      
        $username = $this->checkUsernameExists( $this->generateRandomNUmber().$this->username );
        return ( isset( $username ) && !empty( $username )  ? $username : '' );
    }

    public function checkUsernameExists($userName){
		
        $usernameExist = DB::table($this->model)->where($this->fieldName, "=", $userName)->first();

        if( isset( $usernameExist->full_name ) && !empty( $usernameExist->full_name ) ) {
           $username = '';
           return $username;
       } 
           
       return $userName;
   }    

   public function generateSuffixFunkyUsername() {
        
        $records = DB::table($this->table)->select($this->name)->get();
        
        if( ! $records->isEmpty() ) {
            $names = array();
            foreach($records as $record){
                $names[] = $record->name;
            }
            $username = $this->checkUsernameExists( $names[rand ( 0 , count($names) -1)].$this->generateRandomNUmber() );
        }   
        
        return ( isset( $username ) && !empty( $username )  ? $username : '' ); 
   
    }

    public function generateFunkyUsername() {
        
        $records = DB::table($this->table)->select($this->name)->get();
        
        if( ! $records->isEmpty() ) {
            $names = array();
            foreach($records as $record){
                $names[] = $record->name;
            }
            $username = $this->checkUsernameExists( $names[rand ( 0 , count($names) -1)] );
        }   
        
        return ( isset( $username ) && !empty( $username )  ? $username : '' ); 
   
    }

}