<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddressBook
 *
 * @author GFORTI
 */
class AddressBook extends DB{
    //put your code here
    
    //todo process, display
    
    public function checkDeletes(){
        $deleteID = filter_input(INPUT_GET, "delete");
        
        if ( NULL != $deleteID && Address::deleteEntry($deleteID) ) {
            
        }
        
    }
    
    public function checkUpdates(){
        $isPostEdit = filter_input(INPUT_POST, "edit");
        
        if (  NULL != $isPostEdit && Address::updateAddress($_POST)) {
            
        }
        
    }
    
    public function isEdit() {
        return ( null != $this->getEditID() );
    }
    
    public function getEditID() {
        return filter_input(INPUT_GET, "edit");
    }


    public function display() {
        
        $result = Address::getAllAddresses();
        //print_r($result);
        
         if ( is_array($result) && count($result) ) { 
             
            echo '<div id="displayDiv">';
            echo '<table><caption>Address Book</caption><thead><tr>';
            echo '<th>Address</th><th>City</th><th>State</th><th>ZIP</th><th>Name</th>';
            echo '<th></th><th></th>';
            echo '</tr></thead>';
            echo '<tbody>';
            
            foreach ($result as $row) {
                echo '<tr>';               
                echo '<td>',$row["address"],'</td>';
                echo '<td>',$row["city"],'</td>';
                echo '<td>',$row["state"],'</td>';
                echo '<td>',$row["zip"],'</td>';
                echo '<td>',$row["name"],'</td>';            
                echo '<td><a class="links" href=?edit=',$row["id"],'>Edit</a></td>';
                echo '<td><a class="links" href=?delete=',$row["id"],'>Delete</a></td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
       } else {
           echo '<p> No Records Found </p>';
       }  
       echo '</div>';
    }
    
}
