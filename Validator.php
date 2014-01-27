<?php

class Validator {
    
    public static function firstNameIsValid( $str ) {
        if ( is_string($str) && !empty($str) ) {
            return true;
        }        
        return false; 
    }
    
    public static function lastNameIsValid( $str ) {
        if ( is_string($str) && !empty($str) ) {
            return true;
        }        
        return false; 
    }
   
    public static function emailIsValid( $str ) {
        if ( is_string($str) && !empty($str) ) {
            return true;
        }        
        return false; 
    }
   
    public static function passwordIsValid( $str ) {
        if ( is_string($str) && !empty($str) ) {
            return true;
        }        
        return false; 
    }

    
    
}
