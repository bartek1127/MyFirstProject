

<?php

 

 

 

 

 

 

 

include_once '../intergration/DbHandler.php';

class Palindroom{

    private $text;

    private $flippedText;

 

    function flipText($text){

        $flippedText = "";

        $this->text = $text;

        for ($index = strlen($text)-1; $index >= 0 ; $index--){

            $flippedText = $flippedText.$text[$index];

        }

        $this->flippedText = $flippedText;

    }

 

    function getFlippedText(){

        return $this->flippedText;

    }

   

    function heeftFlippedtextEenBetekenis(){

        $db= new DbHandler();

        return $db->findWord($this->flippedText);

    }

}