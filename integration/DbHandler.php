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
//$db = new DbHandler();
//if ($db->findWoord() == TRUE){
//    
//   $db->printWoord();
//    
//}
//else{
//    echo "woord niet gevonden in database";
//}

include_once '_config.php';
class DbHandler {
    //dit noemen in oo een attribute
    private $woord;
    // dit heet methode
   Function findWoord($woord){
       $result = FALSE; 
       $this->woord = $woord;
     //stap 1 PDO instellen  
       $option = $this->setPDOOptions();

     $sql = "Select * FROM palindromen WHERE woord = '".$woord."';";
     
     try{
   $conn = $this->connecttoDB($option);
         
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
    private function setPDOOptions(){
          $option = [
           PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION,
           PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC,
           PDO:: ATTR_EMULATE_PREPARES    =>FALSE,
       ];
         return $option;
     } 
     private function connecttoDB($option){
          $host = "localhost"; 
     $charset= 'utf8mb4';
     $db = "palindroom";
     
     $host = "mysql:host=$host;dbname=$db;charset=$charset";

     $conn = new PDO($host, USER, PASSWORD, $option);
        
     return $conn;
     }
    Function printWoord(){
        echo $this->woord;
    }
   
   }
