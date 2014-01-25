<?php


class Validator {
    
    //checks against regex
    public static function emailIsValid( $str ) {
       if ( is_string($str) && !empty($str) && 
               preg_match("/[A-Za-z0-9_]{2,}+@[A-Za-z0-9_]{2,}+\.[A-Za-z0-9_]{2,}/",$str) != 0 ) {
           return true;
       }        
       return false; 
    }
    //checks for string , only alpha
    public static function webpageIsValid( $str ) {
       if ( is_string($str) && !empty($str) && 
               preg_match("/^[A-Za-z]+$/",$str) != 0) {           
           return true;
       }
       return false; 
    }
    
    //checks db for email
    public static function emailIsTaken($emailName) {        
        $dbClass = new DB();
        $db = $dbClass->getDB();
        
            $stmt = $db->prepare('select email from users where email = :emailValue limit 1');
            $stmt->bindParam(':emailValue', $emailName, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);            
            if ( is_array($result) && count($result) ) {
                return true; //if name is in db
            }        
            return false;        
    }
    
    //checks for string , hypens nums dashes 6-16 chars   
    public static function passwordIsValid( $str ) {
       if ( is_string($str) && !empty($str) && 
               preg_match("/^[A-Za-z0-9_-]{6,18}$/",$str) != 0  ) {           
           return true;
       }
       return false; 
    }
    
     //validates whether POST data exists in login
     public static function loginIsValidPost() {
          if ( !array_key_exists("email", $_POST) 
                || !array_key_exists("password", $_POST) ) {
               return false;
          }          
          return Validator::loginIsValid($_POST["email"],$_POST["password"] ); //sends into reusable validator
     }
     //validates against strings
      public static function loginIsValid( $email, $password ) {        
        $password = sha1($password);
        $dbCls = new DB();
        $db = $dbCls->getDB();
        if ( NULL != $db ) {
            $stmt = $db->prepare('select * from users where email = :emailValue and password = :passwordValue limit 1');
            $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
            $stmt->bindParam(':passwordValue', $password, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
           
            if (is_array($result) && count($result) ){                
                return true;
            }            
        }        
        return false;      
    }
}

