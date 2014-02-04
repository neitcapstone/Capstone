<?php

class Signup extends DB 
    {
        protected $errors = array();

        public function emailIsTaken( $email ) 
                {        
                    $db = $this->getDB();
                    if ( null != $db ) 
                        {
                            $stmt = $db->prepare('select email from user_admin where email = :emailValue limit 1');
                            $stmt->bindParam(':emailValue', $username, PDO::PARAM_STR);
                            $stmt->execute();
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);  
                            
                            if ( is_array($result) && count($result) ) 
                                {
                                    return true;
                                }
                        }
                        return false;        
                }
                
                public function entryIsValid()
                        {
                            $this->fNameEntryIsValid(); 
                            $this->lNameEntryIsValid(); 
                            $this->emailEntryIsValid(); 
                            $this->passwordEntryIsValid();      
                            return (count($this->errors) ? false : true);
                        }
   
                public function fNameEntryIsValid()
                        {
                            if (array_key_exists('fName', $_POST))
                                {
                                    if ( !Validator::fNameIsValid($_POST['fName']))
                                        {
                                            $this->errors['fName'] = "First Name is not valid";  
                                        }
                                }
                                else
                                    {
                                        $this->errors['fName'] = "First Name is missing";            
                                    }
                                    return (empty($this->errors['fName']) ? true : false);
                        }
    
                public function lNameEntryIsValid()
                        {
                            if (array_key_exists('lName', $_POST))
                                {
                                    if ( !Validator::lNameIsValid($_POST['lName']))
                                        {
                                            $this->errors['lName'] = "Last Name is not valid";  
                                        }
                                }
                                else
                                    {
                                        $this->errors['lName'] = "Last Name is missing";            
                                    }
                                    return (empty($this->errors['lName']) ? true : false);
                        }

                public function emailEntryIsValid()
                        {
                            if (array_key_exists('email', $_POST))
                                {
                                    if ( !Validator::emailIsValid($_POST['email'])) 
                                        {
                                            $this->errors['email'] = "email is not valid";
                                        }
                                        else if ($this->emailIsTaken( $_POST['email'] ))
                                            { 
                                                $this->errors['email'] = "email is taken";
                                            }
                                }
                                else
                                    {
                                        $this->errors['email'] = "email is missing";
                                    }
                                    return (empty($this->errors['email']) ? true : false);
                        }
    
                public function passwordEntryIsValid()
                        {
                            if (array_key_exists('password', $_POST))
                                {
                                    if ( !Validator::passwordIsValid($_POST['password'])) 
                                        {
                                            $this->errors['password'] = "password is not valid";
                                        }
                                }
                                else
                                    {
                                        $this->errors['password'] = "password is missing";
                                    }
                                    return (empty($this->errors['password']) ? true : false);
                        }
    
                public function saveEntry() 
                        { 
                            if (! $this->entryIsValid() ) return false;
                            $_POST['password'] = sha1($_POST['password']);
                            $db = $this->getDB();
                            if (null != $db) 
                                {
                                    $stmt = $db->prepare('insert into user_admin set fName = :fNameValue, lName = :lNameValue, email = :emailValue, password = :passwordValue');
                                    $stmt->bindParam(':fNameValue', $_POST['fName'], PDO::PARAM_STR);
                                    $stmt->bindParam(':lNameValue', $_POST['lName'], PDO::PARAM_STR);
                                    $stmt->bindParam(':passwordValue', $_POST['password'], PDO::PARAM_STR);
                                    $stmt->bindParam(':emailValue', $_POST['email'], PDO::PARAM_STR);
                                    if ($stmt->execute() )
                                        {
                                            return true;
                                        }
                                }
                                return false;
                         }
    
                public function getErrors() 
                        {
                            return $this->errors;
                        }
    }

?>