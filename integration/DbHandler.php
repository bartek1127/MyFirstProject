<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbHandler
 *
 * @author Bartek
 */
$db = new DbHandler();
if ($db->findWoord("lepel") == TRUE){
    
   $db->printWoord();
    
}
else{
    echo "sorry geen kaas vandaag";
}

$db->printWoord();
class DbHandler {
    //dit noemen in oo een attribute
    private $woord;
    // dit heet methode
   Function findWoord($woord){
       $result = FALSE; 
       $this->woord = $woord;
     //stap 1 PDO instellen  
       $option = [
           PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION,
           PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC,
           PDO:: ATTR_EMULATE_PREPARES    =>FALSE,
       ];
     $host = "localhost"; 
     $charset= 'utf8mb4';
     $db = "palindroom";
     $user = "root";
     $password = "";
     $host = "mysql:host=$host;dbname=$db;charset=$charset";

     $sql = "Select * FROM palindromen WHERE woord = '".$woord."';";
     
     try{
         $conn = new PDO($host, $user, $password, $option);
         $stmt = $conn->query($sql);
         if  ($stmt->rowCount() == 1){
             $result = TRUE;
         }
     }
                 
     catch(PDOException $e){
         echo "jou text" . $e->getMessage()."(".$e->getCode().").";
     }
     return $result;
       
   }
             
    Function printWoord(){
        echo $this->woord;
    }
   
   }
