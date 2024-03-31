#!/usr/bin/php

<?php
/*
 * clsStraico.php © 2024 by Roelfrenkema is licensed under CC BY-NC-SA 4.0. 
 * To view a copy of this license, 
 * visit http://creativecommons.org/licenses/by-nc-sa/4.0/
 * 
 * visit Straico https://platform.straico.com/signup?fpr=roelf14
 */

/*
   Initialize start values.
*/

include('clsStraico.php');

$aiMessage = "";
$straico = new Straico;


/* 
    Welcome message with model info.
*/
echo "Welcome ".$straico->arUser['data']['first_name']." to ".$straico->aiModel.". Please ask your questions.\nFor help enter /gethelp.\nWhen done finish with /exit.\n\n";


/*
    Start looping till finished with /exit
*/

while( $aiMessage !== "/exit" ){

  //prompt
  $aiMessage = $straico->userPrompt();
  echo "\n";
  
  //No input available?
  if ($aiMessage == "") continue;
  

 
    //call api, do magic 
    $answer = $straico->apiCompletion($aiMessage);
    echo $answer."\n\n";

}
?>
