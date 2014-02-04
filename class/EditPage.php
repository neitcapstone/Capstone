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
    //put your code here
    
    public function editCustTable($id, $rowid){
       
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('call getCustTableRow(:nid, :rid);');
        $statement->bindParam(':nid', $id, PDO::PARAM_INT);
        $statement->bindParam(':rid', $rowid, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        //return $result;
        
        //echo '<div id="displayDiv">';
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
}

?>
