<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddUpdate
 *
 * @author michael
 */
class AddUpdate extends DB{
    
    public static function deleteEntry($tableName, $id) {
        $tab;
        if($tableName=="Service-Sales"){
           $tab = "sale_service"; 
        }else if($tableName=="Product-Sales"){
           $tab = "sale_product"; 
        }else if($tableName=="Customers"){
           $tab = "customer"; 
        }else if($tableName=="Inventory"){
           $tab = "inventory"; 
        }else if($tableName=="Employees"){
           $tab = "employee"; 
        }else if($tableName=="Location"){
           $tab = "location"; 
        }else if($tableName=="Products"){
           $tab = "product"; 
        }else if($tableName=="Service-Schedule"){
           $tab = "service_schedule"; 
        }else if($tableName=="Service"){
           $tab = "service"; 
        }else{
           $tab = ""; 
        }
        echo $tab;
        echo $id;
        $dbc = new DB();
        $db = $dbc->getDB();
        //UPDATE `datadesigner`.`customer` SET `active`='0' WHERE `idcustomer`='3';
        //$sqlString = 'UPDATE '.$tab.' SET active = 0 where id = :id';
        $statement = $db->prepare('UPDATE '.$tab.' SET active = 0 where id'.$tab.' = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ( $statement->execute() ) {
            header("Location:testProc.php?".$tableName."=1");
            return true;
        }
        
        return false;
    }
}
