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

$straico->aiLog = true;
$straico->aiModel = 'openai/gpt-4-0125-preview';

/*
    Start looping till finished with /exit
*/

while( $aiMessage !== "/exit" ){

  //prompt
  $aiMessage = $straico->userPrompt();
  echo "\n";
  
  //No input available?
  if ($aiMessage == "") continue;
  
}
?>
