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

//        echo $tab;
//        echo $id;
        $getTabOb = new AddUpdate();
        $tab = $getTabOb->getNeededTable($tableName);
        $dbc = new DB();
        $db = $dbc->getDB();
        //UPDATE `datadesigner`.`customer` SET `active`='0' WHERE `idcustomer`='3';
        //$sqlString = 'UPDATE '.$tab.' SET active = 0 where id = :id';
        $statement = $db->prepare('UPDATE '.$tab.' SET active = 0 where id'.$tab.' = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ( $statement->execute() ) {
            header("Location:tableCrud.php?".$tableName."=1");
            return true;
        }
        
        return false;
    }
    
    public function addEntryToTable($tableName, $id){
        $getTabOb = new AddUpdate();
        $tab = $getTabOb->getNeededTable($tableName);
        
        
    }
    
    public function getNeededTable($tableName){      
       
        if($tableName=="Service-Sales"){
           return "sale_service"; 
        }else if($tableName=="Product-Sales"){
           return "sale_product"; 
        }else if($tableName=="Customers"){
           return "customer"; 
        }else if($tableName=="Inventory"){
           return "inventory"; 
        }else if($tableName=="Employees"){
           return "employee"; 
        }else if($tableName=="Location"){
           return "location"; 
        }else if($tableName=="Products"){
           return "product"; 
        }else if($tableName=="Service-Schedule"){
           return "service_schedule"; 
        }else if($tableName=="Service"){
           return "service"; 
        }else{
           return ""; 
        }
        
    }
}
