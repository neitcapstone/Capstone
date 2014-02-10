<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EditPage
 *
 * @author michael
 */
class EditPage extends DB{
        
    public function editCustTable($id, $rowid){      
        
        $result = $this->getDataBaseCall('call getCustTableRow(:nid, :rid);', $id, $rowid);
        
        echo '<form action="#" method="post">';
        echo '<table><caption>Customers</caption><tr>';
        echo '<th>First Name</th><th><input type="text" name="fName" value="'.$result['fName'].'" /></th><th>Last Name</th><th><input type="text" name="lName" value="'.$result['lName'].'" /></th></tr>';
        echo '<tr><tr><th>Email</th><th><input type="text" name="email" value="'.$result['email'].'" /></th><th>Phone</th><th><input type="text" name="phone" value="'.$result['phone'].'" /></th></tr>';
        echo '<tr><th>Address</th><th><input type="text" name="address" value="'.$result['address'].'" /></th><th>City</th><th><input type="text" name="city" value="'.$result['city'].'" /></th></tr>';
        echo '<tr><th>State</th><th><input type="text" name="state" value="'.$result['state'].'" /></th><th>Zip</th><th><input type="text" name="zip" value="'.$result['zip'].'" /></th>';            
        echo '</tr>';

        echo '</table>';
        echo '<input type="submit" value="EDIT" />';
        echo '</form>';
    }
    
    public function editEmpTable($id, $rowid){
       
        
        $result = $this->getDataBaseCall('call getEmpTableRow(:nid, :rid);', $id, $rowid);
        echo '<form action="#" method="post">';
        echo '<table><caption>Employess</caption><tr>';
        echo '<th>First Name</th><th><input type="text" name="fName" value="'.$result['fName'].'" /></th><th>Last Name</th><th><input type="text" name="lName" value="'.$result['lName'].'" /></th></tr>';
        echo '<tr><tr><th>Social Security</th><th><input type="text" name="socialSecurity" value="'.$result['socialSecurity'].'" /></th><th>Phone</th><th><input type="text" name="phone" value="'.$result['phone'].'" /></th></tr>';
        echo '<tr><th>Address</th><th><input type="text" name="address" value="'.$result['address'].'" /></th><th>City</th><th><input type="text" name="city" value="'.$result['city'].'" /></th></tr>';
        echo '<tr><th>State</th><th><input type="text" name="state" value="'.$result['state'].'" /></th><th>Zip</th><th><input type="text" name="zip" value="'.$result['zip'].'" /></th>';            
        echo '</tr>';

        echo '</table>';
        echo '<input type="submit" value="EDIT" />';
        echo '</form>';
        
    }
    
    public function editLocTable($id, $rowid){
       
        $result = $this->getDataBaseCall('call getLocTableRow(:nid, :rid);', $id, $rowid);
        echo '<form action="#" method="post">';
        echo '<table><caption>Location</caption><tr>';
        echo '<th>First Name</th><th><input type="text" name="name" value="'.$result['name'].'" /></th>';
        echo '<th>Phone</th><th><input type="text" name="phone" value="'.$result['phone'].'" /></th></tr>';
        echo '<tr><th>Address</th><th><input type="text" name="address" value="'.$result['address'].'" /></th><th>City</th><th><input type="text" name="city" value="'.$result['city'].'" /></th></tr>';
        echo '<tr><th>State</th><th><input type="text" name="state" value="'.$result['state'].'" /></th><th>Zip</th><th><input type="text" name="zip" value="'.$result['zip'].'" /></th>';            
        echo '</tr>';

        echo '</table>';
        echo '<input type="submit" value="EDIT" />';
        echo '</form>';
        
    }
    
    public function editprodTable($id, $rowid){       
        
        $result = $this->getDataBaseCall('call getProdTableRow(:nid, :rid);', $id, $rowid);
        echo '<form action="#" method="post">';
        echo '<table><caption>Products</caption><tr>';
        echo '<th>First Name</th><th><input type="text" name="name" value="'.$result['name'].'" /></th>';
        echo '<th>Description</th><th><input type="text" name="desc" value="'.$result['desc'].'" /></th></tr>';
        echo '<tr><th>Price</th><th><input type="text" name="price" value="'.$result['price'].'" /></th><th>Product Code</th><th><input type="text" name="ProdCode" value="'.$result['ProdCode'].'" /></th></tr>';
                   
        echo '</tr>';

        echo '</table>';
        echo '<input type="submit" value="EDIT" />';
        echo '</form>';
        
    }   
    
    
    public function editServTable($id, $rowid){
       
        $result = $this->getDataBaseCall('call getServTableRow(:nid, :rid);', $id, $rowid);
        echo '<form action="#" method="post">';
        echo '<table><caption>Services</caption><tr>';
        echo '<th>First Name</th><th><input type="text" name="serviceName" value="'.$result['serviceName'].'" /></th>';
        echo '<th>Description</th><th><input type="text" name="desc" value="'.$result['desc'].'" /></th></tr>';
        echo '<tr><th>Price</th><th><input type="text" name="price-hour" value="'.$result['price-hour'].'" /></th></tr>';
                   
        echo '</tr>';

        echo '</table>';
        echo '<input type="submit" value="EDIT" />';
        echo '</form>';
        
        
    }
    
    public function editProdSalesTable($id, $rowid){
       
        $inv = StoredProc::gettingInvByCompany($id);
        $loc = StoredProc::gettingLocByCompany($id);
        $cust  = StoredProc::gettingCustByCompany($id);
        //if($result['idlocation']==$loc['idlocation']){echo 'selected';}
      
        $result = $this->getDataBaseCall('call getProdSalesTableRow(:nid, :rid);', $id, $rowid);
        
        echo '<form action="#" method="post">';
        echo '<table><caption>Product Sales</caption><tr>';
        //
        echo '<th>Location</th>';
        echo '<th><select name="idlocation">';        
        
        for($i=0;$i<sizeof($loc);$i++){
            $selected = ($result['idlocation']==$loc[$i]['idlocation']) ? 'selected' : '';
            echo '<option value="'.$loc[$i]["idlocation"].'" '
                    . $selected
                    . '>'.$loc[$i]["address"].'</option>';
        }          
        echo '</select>';
        echo '</th>';
        //
        echo '<th>Product</th>';
        echo '<th><select name="idproduct">';        
        
        for($i=0;$i<sizeof($inv);$i++){
            $selected = ($result['idproduct']==$inv[$i]['idproduct']) ? 'selected' : '';
            echo '<option value="'.$inv[$i]["idproduct"].'" '
                    . $selected
                    . '>'.$inv[$i]["name"].'</option>';
        }          
        echo '</select>';
        echo '</th>';
        
        echo '<th>Amount</th><th><input type="text" name="amount" value="'.$result['amount'].'" /></th>';
        echo '</tr><tr>';
        //
        echo '</th><th>Customer</th>';                        
        echo '<th><select name="idcustomer">';        
        echo '<option value="9999">Unregistered</option>';
        for($i=0;$i<sizeof($cust);$i++){
            $selected = ($result['idcustomer']==$cust[$i]['idcustomer']) ? 'selected' : '';
            echo '<option value="'.$cust[$i]["idcustomer"].'"'
                    . $selected
                    . '>'.$cust[$i]["fName"].' '.$cust[$i]["lName"].'</option>';
        }                        
        echo '</select>';
        echo '</th>';
        echo '<th>Date</th><th><input type="text" name="date" value="'.$result['date'].'" /></th>';
        echo '</tr>';
        echo '</table>';
        echo '<input type="submit" value="EDIT" />';
        echo '</form>';
    }
    
    public function editInvTable($id, $rowid){
       
        $result = $this->getDataBaseCall('call getEditInvTableRow(:nid, :rid);', $id, $rowid);
        $inv = StoredProc::gettingInvByCompany($id);
        $loc = StoredProc::gettingLocByCompany($id);
        
        echo '<form action="#" method="post">';
        echo '<table><caption>Inventory</caption><tr>';
        //
        echo '<th>Product</th>';
        echo '<th><select name="idproduct">';  
        
        
        for($i=0;$i<sizeof($inv);$i++){            
            $selected = ($result['idproduct']==$inv[$i]['idproduct']) ? 'selected' : '';            
            
                     // ($result['idproduct']==$inv[$i]['idproduct']) ? 'selected' : '';
            echo '<option value="'.$inv[$i]["idproduct"].'" '
                    . $selected
                    . '>'.$inv[$i]["name"].'</option>';
        }          
        echo '</select>';
        echo '</th>';
        //
        echo '<th>Count</th><th><input type="text" name="count" value="'.$result['count'].'" /></th>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>Location</th>';
        echo '<th><select name="idlocation">';        
        
        for($i=0;$i<sizeof($loc);$i++){
            $selected = ($result['idlocation']==$loc[$i]['idlocation']) ? 'selected' : '';
            echo '<option value="'.$loc[$i]["idlocation"].'" '
                    . $selected
                    . '>'.$loc[$i]["address"].'</option>';
        }          
        echo '</select>';
        echo '</th>';
        echo '</tr>';
        echo '</table>';
        echo '<input type="submit" value="EDIT" />';
        echo '</form>';
        
    }
    
    public function editServSchedTable($id, $rowid){
       
        $result = $this->getDataBaseCall('call getServSchedTableRow(:nid, :rid);', $id, $rowid);
        $cust  = StoredProc::gettingCustByCompany($id);
        $serv = StoredProc::gettingServByCompany($id);
        
        echo '<form action="#" method="post">';
        echo '<table><caption>Service Schedule</caption><tr>';
        
        echo '</th><th>Customer</th>';                        
        echo '<th><select name="idcustomer">';        
        echo '<option value="9999">Unregistered</option>';
        for($i=0;$i<sizeof($cust);$i++){
            $selected = ($result['idcustomer']==$cust[$i]['idcustomer']) ? 'selected' : '';
            echo '<option value="'.$cust[$i]["idcustomer"].'"'
                    . $selected
                    . '>'.$cust[$i]["fName"].' '.$cust[$i]["lName"].'</option>';
        }                        
        echo '</select>';
        echo '</th><th>Service</th>';                        
        echo '<th><select name="idservice">';        
        
        for($i=0;$i<sizeof($serv);$i++){
            $selected = ($result['idservice']==$serv[$i]['idservice']) ? 'selected' : '';
            echo '<option value="'.$serv[$i]["idservice"].'"'
                    . $selected
                    . '>'.$serv[$i]["serviceName"].'</option>';
        }                        
        echo '</select>';
        echo '</th>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>Time</th><th><input type="text" name="time" value="'.$result['time'].'" /></th>';
        echo '<th>Date</th><th><input type="text" name="date" value="'.$result['date'].'" /></th>';
        echo '</tr>';
        echo '</table>';
        echo '<input type="submit" value="EDIT" />';
        echo '</form>';
        
    }    
    
    
    public function editServSalesTable($id, $rowid){
       
        
        $result = $this->getDataBaseCall('call getServSalesSaleRow(:nid, :rid);', $id, $rowid);
        $loc = StoredProc::gettingLocByCompany($id);
        $cust  = StoredProc::gettingCustByCompany($id);
        $serv = StoredProc::gettingServByCompany($id);
        
        echo '<form action="#" method="post">';
        echo '<table><caption>Product Sales</caption><tr>';
        //
        echo '<form action="#" method="post">';
        echo '<table><caption>Product Sales</caption><tr>';
        //
        echo '<th>Location</th>';
        echo '<th><select name="idlocation">';        
        
        for($i=0;$i<sizeof($loc);$i++){
            $selected = ($result['idlocation']==$loc[$i]['idlocation']) ? 'selected' : '';
            echo '<option value="'.$loc[$i]["idlocation"].'" '
                    . $selected
                    . '>'.$loc[$i]["address"].'</option>';
        }          
        echo '</select>';
        echo '</th><th>Customer</th>';                        
        echo '<th><select name="idcustomer">';        
        echo '<option value="9999">Unregistered</option>';
        for($i=0;$i<sizeof($cust);$i++){
            $selected = ($result['idcustomer']==$cust[$i]['idcustomer']) ? 'selected' : '';
            echo '<option value="'.$cust[$i]["idcustomer"].'"'
                    . $selected
                    . '>'.$cust[$i]["fName"].' '.$cust[$i]["lName"].'</option>';
        }                        
        echo '</select>';
        echo '</th>';
        echo '</th><th>Service</th>';                        
        echo '<th><select name="idservice">';        
        
        for($i=0;$i<sizeof($serv);$i++){
            $selected = ($result['idservice']==$serv[$i]['idservice']) ? 'selected' : '';
            echo '<option value="'.$serv[$i]["idservice"].'"'
                    . $selected
                    . '>'.$serv[$i]["serviceName"].'</option>';
        }                        
        echo '</select>';
        echo '</th>';
        
        echo '</tr>';
        echo '<tr>';
        echo '<th>Time</th><th><input type="text" name="hours" value="'.$result['hours'].'" /></th>';
        echo '<th>Date</th><th><input type="text" name="date" value="'.$result['date'].'" /></th>';
        echo '</tr>';
        echo '</table>';
        echo '<input type="submit" value="EDIT" />';
        echo '</form>';
    
    }
    //This function returns the database results, takes in the call string to the stored procedure and to ints iding the user and row
    private function getDataBaseCall($dbstring, $id, $rowid){
        
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare($dbstring);
        $statement->bindParam(':nid', $id, PDO::PARAM_INT);
        $statement->bindParam(':rid', $rowid, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC); 
        
    }
    
}

?>
