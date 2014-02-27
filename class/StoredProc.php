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
    
    public static function addServSales($idloc, $idserv, $idcust, $hours, $date, $id){
        
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call addServSalesTable(:idloc, :idserv, :idcust, :hours, :date, :id);');
        $statement->bindParam(':idserv', $idserv, PDO::PARAM_INT);
        $statement->bindParam(':idloc', $idloc, PDO::PARAM_INT);
        $statement->bindParam(':hours', $hours, PDO::PARAM_STR);
        $statement->bindParam(':date', $date, PDO::PARAM_STR);
        $statement->bindParam(':idcust', $idcust, PDO::PARAM_INT);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ( $statement->execute() ) {
            header("Location:tableCrud.php?Service-Sales=1");
            return true;
        }        
        return false;                
    }
    
    public static function addServSched($iduser, $idserv, $idcust, $time, $date){
        
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call addServSchedTable(:iduser, :idserv, :idcust, :time, :date);');
        $statement->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $statement->bindParam(':idserv', $idserv, PDO::PARAM_INT);
        $statement->bindParam(':idcust', $idcust, PDO::PARAM_INT);
        $statement->bindParam(':time', $time, PDO::PARAM_STR);
        $statement->bindParam(':date', $date, PDO::PARAM_STR);
        
        if ( $statement->execute() ) {
            header("Location:tableCrud.php?Service-Schedule=1");
            return true;
        }        
        return false;                
    }
    
    public static function addServ($name, $desc, $iduser, $pricehr){
        
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call addServTable(:sname, :desc, :iduser, :pricehr);');
        
        $statement->bindParam(':sname', $name, PDO::PARAM_STR);         
        $statement->bindParam(':desc', $desc, PDO::PARAM_STR);
        $statement->bindParam(':pricehr', $pricehr, PDO::PARAM_STR);
        $statement->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        
        
        if ( $statement->execute() ) {
            header("Location:tableCrud.php?Service=1");
            return true;
        }        
            echo "not in";
            return false;              
    }
    
    public static function addLoc($name, $iduser, $addy, $city, $state, $zip, $phone ){
        
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call addLocTable(:nam, :iduser, :addy, :city, :state, :zip, :phone);');
        
                
        $statement->bindParam(':nam', $name, PDO::PARAM_STR);        
        $statement->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $statement->bindParam(':addy', $addy, PDO::PARAM_STR);
        $statement->bindParam(':city', $city, PDO::PARAM_STR);
        
        $statement->bindParam(':state', $state, PDO::PARAM_STR);        
        $statement->bindParam(':zip', $zip, PDO::PARAM_STR);
        
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        
        if ( $statement->execute() ) {
            header("Location:tableCrud.php?Location=1");
            return true;
        }        
            echo "not in";
            return false;              
    }
    
    public static function addEmp($fname, $lname, $iduser, $addy, $city, $state, $zip, $ss, $phone ){
        
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call addEmpTable(:fnam, :lnam, :iduser, :addy, :city, :state, :zip, :ss, :phone);');
        
        $statement->bindParam(':fnam', $fname, PDO::PARAM_STR);         
        $statement->bindParam(':lnam', $lname, PDO::PARAM_STR);        
        $statement->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $statement->bindParam(':addy', $addy, PDO::PARAM_STR);
        $statement->bindParam(':city', $city, PDO::PARAM_STR);
        
        $statement->bindParam(':state', $state, PDO::PARAM_STR);        
        $statement->bindParam(':zip', $zip, PDO::PARAM_STR);
        $statement->bindParam(':ss', $ss, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        
        if ( $statement->execute() ) {
            header("Location:tableCrud.php?Employees=1");
            return true;
        }        
            echo "not in";
            return false;              
    }
    
    public static function addProdSales($idloc, $idprod, $idcust, $amount, $date, $id){
        
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call addProdSalesTable(:idloc, :idprod, :idcust, :amount, :date, :id);');
        $statement->bindParam(':idprod', $idprod, PDO::PARAM_INT);
        $statement->bindParam(':idloc', $idloc, PDO::PARAM_INT);
        $statement->bindParam(':amount', $amount, PDO::PARAM_INT);
        $statement->bindParam(':date', $date, PDO::PARAM_STR);
        $statement->bindParam(':idcust', $idcust, PDO::PARAM_INT);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ( $statement->execute() ) {
            header("Location:tableCrud.php?Product-Sales=1");
            return true;
        }        
        return false;                
    }
    
    public static function addInv($idprod, $idloc, $count){
        
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call addInvTable(:idprod, :idloc, :count);');
        $statement->bindParam(':idprod', $idprod, PDO::PARAM_INT);
        $statement->bindParam(':idloc', $idloc, PDO::PARAM_INT);
        $statement->bindParam(':count', $count, PDO::PARAM_INT);
        
        if ( $statement->execute() ) {
            header("Location:tableCrud.php?Inventory=1");
            return true;
        }        
        return false;                
    }
    
    public static function addProd($name, $desc, $iduser, $price, $ProdCode){
        
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call addProdTable(:name, :desc, :iduser, :price,  :ProdCode);');
        
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
         
        $statement->bindParam(':desc', $desc, PDO::PARAM_STR);
        $statement->bindParam(':price', $price, PDO::PARAM_STR);
        $statement->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $statement->bindParam(':ProdCode', $ProdCode, PDO::PARAM_STR);
        
        if ( $statement->execute() ) {
            header("Location:tableCrud.php?Products=1");
            return true;
        }        
            echo "not in";
            return false;              
    }
    
    public static function addCust($fname, $lname, $iduser, $addy, $city, $state, $zip, $email, $phone ){
        
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call addCustTable(:fnam, :lnam, :iduser, :addy, :city, :state, :zip, :email, :phone);');
        
        $statement->bindParam(':fnam', $fname, PDO::PARAM_STR);         
        $statement->bindParam(':lnam', $lname, PDO::PARAM_STR);        
        $statement->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $statement->bindParam(':addy', $addy, PDO::PARAM_STR);
        $statement->bindParam(':city', $city, PDO::PARAM_STR);
        
        $statement->bindParam(':state', $state, PDO::PARAM_STR);        
        $statement->bindParam(':zip', $zip, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        
        if ( $statement->execute() ) {
            header("Location:tableCrud.php?Customers=1");
            return true;
        }        
            echo "not in";
            return false;              
    }
    
    
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
    
    public static function addingLoc($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call addingLoc(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getLocFields($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call getLocFields(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function addingProd($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call addingProd(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getProdFields($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call getProdFields(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function addingServ($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call addingServ(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $result;
        
    }
    
    public static function getServFields($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call getServFields(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function gettingInvByCompany($passId, $editOrAdd){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call getInvByCompany(:nid, :editadd);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->bindParam(':editadd', $editOrAdd, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function gettingLocByCompany($passId, $editOrAdd){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call gettingLocByCompany(:nid, :editadd);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->bindParam(':editadd', $editOrAdd, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function gettingCustByCompany($passId, $editOrAdd){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call gettingCustByCompany(:nid, :editadd);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->bindParam(':editadd', $editOrAdd, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
     public static function gettingServByCompany($passId, $editOrAdd){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call getServByCompany(:nid, :editadd);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->bindParam(':editadd', $editOrAdd, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function findTablesUsed($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call findTablesUsed(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
    
    public static function getUserAdminId($passId){
        $idnum = $passId;
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call getUserAdminId(:nid);');
        $statement->bindParam(':nid', $idnum, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
}
