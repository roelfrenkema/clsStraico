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

/*
 * Logpath now equals a working directory. All files are saved here like
 * f.i. the history files omitting the need to use a path in their names
 * logfiles will have extension log and history files will have the
 * extension hist.
 */ 

$straico->logPath = '';

$straico->aiModel = 'cohere/command-r-plus';

//chats not enabled by default
$straico->historySwitch = false;

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
