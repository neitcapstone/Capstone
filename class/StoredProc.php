<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StoredProc
 *
 * @author michael
 */
class StoredProc extends DB {
    //put your code here
    public static function getStoredProc(){
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call getNameById(2);');
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
}
