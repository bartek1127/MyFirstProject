<?php

$text = $_POST["voornaam"];
function revertWord($text){
 $flippedText = "";
    for($i=strlen($text);$i>=0;$i--){
 $flippedText = $flippedText.$text[$i];   
}
return $flippedText;

}
echo revertWord("$text");