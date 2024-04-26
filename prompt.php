#!/usr/bin/php

<?php
/*
 * clsStraico.php © 2024 by Roelfrenkema is licensed under CC BY-NC-SA 4.0. 
 * To view a copy of this license, 
 * visit http://creativecommons.org/licenses/by-nc-sa/4.0/
 *
 * This prompt uses Lavarel their copyright can be found 
 * https://laravel.com/trademark
 * 
 * visit Straico https://platform.straico.com/signup?fpr=roelf14
 */

/*
   Initialize start values.
*/

/*
 *  We asume for this example that your installation lives in
 *  the directory git under your homedirectory. You have to make
 *  changes yourself if needed
 */

$home = $_ENV['HOME'];

// setting paths and including what we need

set_include_path($home.'/git/clsStraico');
require_once $home.'/git/clsStraico/vendor/autoload.php';
use function Laravel\Prompts\textarea;
use function Laravel\Prompts\info;
include('clsStraico.php');

$straico = new Straico;

/*
 * Logpath now equals a working directory. All files are saved here like
 * f.i. the history files omitting the need to use a path in their names
 * logfiles will have extension log and history files will have the
 * extension hist.
 */ 
$straico->aiLog = true;
$straico->logPath = $home.'/git/clsStraico/';

/*
* pipe setting
* placeholder %prompt% and %answer will be replaced by the prompt and/or AI answer.
* then it will be executed in a backtick shell.
* 
* $hug->userPipe = 'echo "%prompt%" >> ~/myprompts.txt';
*/


/*
 * The history switch is used to set chatformat on <true> or off <false>
 * at start. When it is on user input and ai out put are stacked to build a
 * true conversation. This can cost you if you are charged per word(s)
 * You can use the commands to administer history:
 *   /histoff		- Disable history 
 *   /histon		- Enable history
 *   /histload	<name>	- Load history
 *   /histsave	<name>	- Save history
 *   /histdelete	- Delete history
 * 
 */
$straico->historySwitch = false;

// your model to start with

$straico->aiModel = 'cohere/command-r-plus';

/*
    Start looping till finished with /exit
*/


$aiMessage = "";

while( $aiMessage !== "/exit" ){

    //  native input input routine
    //$prompt = $straico->getInput();
    //echo "\n";
    
    // lavarel input box
    $prompt = textarea('<fg=white>Prompting: '.$straico->aiModel.' in Role: '.$straico->pubRole.'</>');
    
    // process prompt
    $aiMessage = $straico->userPrompt($prompt);
  
    // no input available?
    if ($aiMessage == "") continue;
    
    // native answer
    //echo $aiMessage."\n\n";
    
    //lavarel answer
    info($aiMessage);

}
?>
