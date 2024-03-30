# Documentation clsStraico.php

![straico](https://blog.roelfrenkema.com/img/AI/straicoclass.png){: title="Straico" .w3-image}

[TOC]
## Download

[Latest version clsStraico here](https://blog.roelfrenkema.com/ai/){:target="_blank"} 

## About

This is the documentation for clsStraico.php, a PHP class to interact with the Straico api that comes with a punch intergrating several agents. It makes interacting with the Straico api from the commandline a great experience and offers insight, through its extensive documentation, in how to use the api.

## License

clsStraico.php © 2024 by Roelfrenkema is licensed under CC BY-NC-SA 4.0. To view a copy of this license, visit [http://creativecommons.org/licenses/by-nc-sa/4.0/](http://creativecommons.org/licenses/by-nc-sa/4.0/){:target="_blank"}.


## Properties

| Property | Description |
| -------- | ----------- |
| public $aiLanguage | Current working language, default **English** set in the construct function. Can be changed from the prompt by command /setlanguage {language}. |
| public $aiMarkup | Current markup for the output, default **plain/text**. Mime types available or other desigations depend on the LLM you use. Can be changed from the prompt by command /setmarkup {type}. |
| public $aiModel | Current working model, default **anthropic/claude-3-haiku:beta**. Can be changed from the prompt by command /setmodel {int} You can retrieve the {int} from the modellist, being the number in front of the model.|
| private $arModels | Filled with available models by construct to avoid unnececary calls. |
| public $aiTarget | The audience you target - default **anybody**. Can be changed from the prompt by command /settarget {target}|
| public $aiTone | the tone used in answers - default **neutral**. Can be changed from the prompt by command /settone {tone}|
| private $apiKey | secure apiKey retrieval by env variable **STRAICO_APIKEY**, Set this before starting the class or better set it in your shell.|
| private $arUser | filled with userdata on construct to avoid unneccacery calls. Can be called by command /userinfo.|
| private $clsVersion | version set in construct to reflect current version. Can be called by command /version|
| private $webPage| filled with data of command /getpage {url} |
| public $aiWrap | The value of the wrap position for the class. **Default 0** = is no wrap.|
| private $aiOutput | The **JASON decoded** array information returned by the LLM |
| private $aiInput | The complete **input string** for the LLM |
| private $aiSkipper | Used to skip user references in some ai calls |
| private $aiLog | Used to log output to file |
{: .w3-table .w3-striped .w3-bordered }

## Methods

| Method | Description |
| ------ | ----------- |
|Function: \_\_construct|Input   : not applicable<br>Output  : none<br>Purpose : sets initial values on instantiating class <br><br>Remarks:<br><br>This is a great place to set your initial values like your own language or the model to work with.|
|Function: apiCompletion($aiMessage)|Input   : $aiMessage - is the prompt<br>Output  : returns response content<br>Purpose : Complete an API call with the prompt info <br><br>Remarks:<br><br>Returns the response content. At later time this will be<br>adjusted to reflect the other information|
|Function: agentFactcheck($input)|Input   : a rumor, news, anything you want to check<br>Output  : returns a fouded opinion<br>Purpose : check if the input has any merit <br><br>Remarks:<br><br>Private function used by $this->userPrompt()<br>Choose your llm wisely<br>TODO: output format choice|
|Function: agentGist()|Input   : first retrieve a page with /getpage<br>Output  : a gist of the document<br>Purpose : Support neurodiversive learning<br><br>Remarks:<br><br>Private function used by $this->userPrompt()|
|Function: agentTodo($input)|Input   : a task for a todo list<br>Output  : returns a todo list<br>Purpose : Create a Todo list from a given task<br><br>Remarks:<br><br>Private function used by $this->userPrompt()<br>I advise the use anthropic/claude-3-sonnet for this because it<br>seems best up to the task atm.|
|Function: agentTux($input)|Input   : requeston linux related maters<br>Output  : returns a solution<br>Purpose : Help the user with linux problems<br><br>Remarks:<br><br>Private function used by $this->userPrompt()<br>I advise the use a LLM that is specialized in coding.|
|Function: apiModels()|Input   : none<br>Output  : Returns array of models available<br>Purpose : List current models and info<br><br>Remarks:<br><br>Private function used by $this->userPrompt()|
|Function: apiUser()|Input   : none<br>Output  : Returns array of userinfo<br>Purpose : List current user and info<br><br>Remarks:<br><br>Private function used by $this->userPrompt()|
|Function: changeModel($input)|Input   : $input - user input string<br>Output  : info on new model<br>Purpose : change llm in use<br><br>Remarks:<br><br>Private function used by $this->userPrompt()|
|Function: getWebpage($url)|Input   : url of page<br>Output  : Stores retrieved page as string in $this->webPage<br>Purpose : retrieve a webpage to use in a prompt<br><br>Remarks:<br><br>TODO: Private function used by $this->userPrompt(). Need way to<br>      include stored page in prompt.|
|Function: listModels()|Input   : none<br>Output  : print model list<br>Purpose : printing a nicely formated model list with info and <br>          pointer to use for /setmodel<br><br>Remarks:<br><br>Private function used by $this->userPrompt()|
|Function: listHelp()|Input   : none<br>Output  : Shows a help page <br>Purpose : Help the user with internal commands<br><br>Remarks:<br><br>Private function used by $this->userPrompt()|
|Function: listUpdates()|Input   : none<br>Output  : Shows a page with updates<br>Purpose : Inform user about changes<br><br>Remarks:<br><br>Private function used by $this->userPrompt()|
|Function: stopPrompt()|Input   : none<br>Output  : stops execution with errorcode 0<br>Purpose : stop app<br><br>Remarks:<br><br>Private function used by $this->userPrompt()|
|Function: $userPrompt()|Input   : keystrokes<br>Output  : depends on user input<br>Purpose : run the class<br><br>Remarks:<br><br>TODO: public function needs cleanup for readability.| 
|Function: $webSearch($strQ)|Input   : $strQ - search string<br>Output  : result from duckduckgo<br>Purpose : find pages for user<br><br>Remarks:<br><br>private function used by this->userPrompt()|
| private function agentTone|   Find the right tone for your text. Becomes extremely powerfull in combination with /settone, /settarget and even /setlanguage if you are looking for a translation.| private function agentJudge|  Get an opinion on your text. Becomes extremely powerfull in combination with /settone, /settarget and even /setlanguage if you are looking for a translation.|
| private function agentSBlog|  Will return a 300 word test|
| private function agentMBlog|  Will return a 600 word test|
| private function agentBBlog|  Will return a 1000 word test|
| private function debugInternals|  Outputs internals|
| private function debugCompletion|  Outputs the completion info|
| private function debugPrice|  Outputs token costs|
| private function debugWords|  Output information on used words|
| private function agentEnhancePrompt | Takes a prompt and tries to improve on it. Ofcause choice of LLM matters. |
| private function agentAcademic | Do research present in paper |
| private functiom agentRegEx | Help with the often tedious task of making one. Could probably done by /tux too |
| private function agentPwd | Help creating a save password |
| private function agentHTML2MD | gives a markdown presentation of \_PAGE\_ |
{: .w3-table .w3-striped .w3-bordered }

## Commands

| Command | Description |
| ------- | ----------- |
| /gethelp | this text |
| /websearch {term} | Do websearch on {term} |
| /getpage {url} | Retrieve a webpage |
| /models | List available models |
| /setmodel {int} | Set the active model to {int}|
| /setlanguage {language} | Set prefered language|  
| /setmarkup {markup} | Set prefered markup.|
| /settone {tone} | Set prefered tone for answer. |
| /settarget {audience} | Set the target audience. |
| /userinfo | Display userinfo |
| /version | Current version |
| /setwrap {int} | Set a wordwrap for ai output|         
| /completion |  Show completion output |
| /internals |  Show internal variables |
| /price |  Show the token cost |
| /words |  Show words |
| /viewpage | Show contents of \_PAGE\_ |
| /logon | Write conversation to file |
| /logoff | Stop writing to file |

| | |   
| Agents:| |
| | |   
| /factcheck {fact} | Check on a rumor, conspiracy or anything|
| /gist | Give a neurodiverse gist of page retrieved by getpage|
| /todo {task} | Create todo list, Sonnet is highly recomended.|
| /tux {request} - helps you coding|
| /rephrase {text} |  Rephrase or even translate a text to your liking by combining with /settone /settarget or /setlanguage |
| /judge {text} | Judge a text on form tone and spelling |
| /smallblog {subject} |  write a small 300 word blog on subject. Modify output with /settone, /settarget, /setlanguage, /setmarkup.    |
| /mediumblog {subject} |  write a small 600 word blog on subject. Modify output with /settone, /settarget, /setlanguage, /setmarkup.  |
| /bigblog {subject} |  write a small 1000 word blog on subject. Modify output with /settone, /settarget, /setlanguage, /setmarkup.  |
| /enhance | helps user to enhance the prompt to craft a better prompt. |
| /research | research a topic and present the result in paper or article format |
| /regex | produce a requested regular expression |
| /mkpwd | Create password report on strength. Very Strong. |
{: .w3-table .w3-striped .w3-bordered }


## Other info

If you've become curious and would like to try Straico for yourself, feel free to use [this affiliate link](https://platform.straico.com/signup?fpr=roelf14){:target="_blank"}.

clsStraico.php is released under [http://creativecommons.org/licenses/by-nc-sa/4.0/](http://creativecommons.org/licenses/by-nc-sa/4.0/){:target="_blank"}

Hashtags: #ai #straico #blog #roelfrenkema #clsStraico #StraicoClass 
