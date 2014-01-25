<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Name
 *
 * @author GFORTI
 */
class Name extends DB {
    //put your code here
    
    
    //todo: getname(id), getAllNames, updateName(id), deleteName(id), addName(id)
    
    public function createName() {
        
        return $db->lastInsertId();
    }
    
    public static function getName($id) {
        $dbc = new DB();
        $db = $dbc->getDB();
        
        $statement = $db->prepare('select name from address, name '
                . 'where name.id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        //print_r($result);
        return $result;
    }
    
     public function getEditID() {
        return filter_input(INPUT_GET, "edit");
    }
    
    public function addName($name){
        $dbc = new DB();
        $db = $dbc->getDB();
        
        $statement = $db->prepare('insert into name set name = :nameValue');
        $statement->bindParam(':nameValue', $name, PDO::PARAM_STR);
        if ($statement->execute() ){
            echo '<p>Name Deleted</p>';
            return true;
        }
        
    }
    
    public function getlastid(){
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('SELECT name.id FROM name ORDER BY id DESC LIMIT 1');
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
}
