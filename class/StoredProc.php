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
    public static function getCompanyServiceSales($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call salesSlipByCompany(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getCompanyProductSales($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call prodSlipByCompany(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getCustByCompany($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call custByCompany(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getInvByCompany($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call invByCompany(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getEmpByCompany($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call empByCompany(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getLocByCompany($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call locByCompany(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getProdByCompany($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call prodByCompany(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getSerByCompany($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call serByCompany(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getSerSchedByCompany($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call serSchedByCompany(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getAddingCust($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call addingCust(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getCustFields($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call getCustFields(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getAddingEmp($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call addingEmp(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getEmpFields($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call getEmpFields(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
}
