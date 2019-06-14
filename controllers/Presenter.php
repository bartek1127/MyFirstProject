<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../Models/Palindroom.php';
if (!empty($_POST )){
    if (CheckPOSTArgument()){
      $woord = $_POST["word"];  
  if   (strlen($woord)>1){
      $palindroom = new Palindroom();
      $palindroom->revertWord($woord);
   
      if($palindroom->heeftFlippedTextEenBetekenis()){
          $viewData = array(
              "palindroom" => $palindroom->getFlippedText(),
              "message" => "heeft een betekenis",
              "action" => "Vul nog een woord of sluit de browser "
            
          );
      }else{
            $viewData = array(
              "palindroom" => $palindroom->getFlippedText(),
              "message" => "heeft geen betekenis",
              "action" => "Vul nog een woord of sluit de browser "
                  
          );
      }
      
  }
   
}else{
        $viewData = array(
              "palindroom" => "",
              "message" => "U heeft geen woord ingevuld",
              "action" => "vul een woord of sluit de browser "
                  
          );
    include_once "../views/View.php";  
        
}

}
else{
    http_response_code(400);
}

function CheckPOSTArgument(){
$validArguments = Array("naam", "submit");  
$aantalArgumenten = sizeof($validArguments);
if(sizeof($_POST)== $aantalArgumenten){
     for($index=0; $index<$aantalArgumenten; $index++){
         if (!isset($_POST[$validArguments[$index]])){
              return FALSE;
         }
     }   
return TRUE;      
    }
   
return FALSE;
    }
   