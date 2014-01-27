<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 include 'Config.php';
 include 'Validator.php';

  
$db = new PDO(Config::DB_DNS ,Config::DB_USER,Config::DB_PASSWORD);

$firstName = ( isset($_POST["fName"]) ? $_POST["fName"] : "" );
$lastName = ( isset($_POST["lName"]) ? $_POST["lName"] : "" );
$email = ( isset($_POST["email"]) ? $_POST["email"] : "" );
$password = ( isset($_POST["password"]) ? $_POST["password"] : "" );

session_start();

    
    try {
            $stmt = $db->prepare('insert into user_admin set fName = :firstNameValue, lName = :lastNameValue, email = :emailValue, password = :passwordValue');

            $password = sha1($password);
            
            $stmt->bindParam(':firstNameValue', $firstName, PDO::PARAM_STR);
            $stmt->bindParam(':lastNameValue', $lastName, PDO::PARAM_STR);
            $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
            $stmt->bindParam(':passwordValue', $password, PDO::PARAM_STR);
            
            if ( $stmt->execute() ){
                $_SESSION[ "errorMsg"] = "<h3>Info Submited</h3>";
                header("location:login.php");
            } else {
                $_SESSION[ "errorMsg"] = "<h3>Info NOT Submited</h3>";
            }

        } catch( PDOException $e) {
            echo "DataBase Error";

        }





?>