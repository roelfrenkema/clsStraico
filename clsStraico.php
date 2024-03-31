<?php
/*
 * clsStraico.php © 2024 by Roelfrenkema is licensed under CC BY-NC-SA 4.0. 
 * To view a copy of this license, 
 * visit http://creativecommons.org/licenses/by-nc-sa/4.0/
 *
 * visit Straico https://platform.straico.com/signup?fpr=roelf14
 */

class Straico {
	
	private const ACADEMIC = 'I want you to act as an academic researcher. You will be responsible for researching a topic given by the user and present the findings in an elaborate paper or article form. Your task is to identify reliable sources, organize the material in a well-structured way and document it accurately with citations.  My requested topic is ';
	private const ENHANCEPROMPT = 'Act as a Prompt Enhancer AI that takes user-input prompts and transforms them into more engaging, detailed, and thought-provoking questions. Enhance the following user-input: ';
	private const FACTCHECK = 'You are knowledgeable on conspiracy theories, latest news, disinformation and propaganda. You will educate the user on the source of the information he gives you. You use your knowledge to check the information handed to you by the user. You will answer with a correct and elaborate response to: ';
	private const GIST = 'You will be helping users with ADHD and/or Dyslexia to learn and retain information from documents more effectively by elaborating on the contents of the document in detail. Your goal is to accelerate the learning process and help the user solidify the knowledge in their long-term memory. Please carefully read through the given document and identify all the key takeaways, important concepts, and main ideas. Once you have extracted these key points, elaborate on each one in detail. Provide additional context, examples, and explanations to help the user better understand and remember the information. Be thorough and comprehensive in your elaboration. The purpose is to give the user a deep understanding of the material, not a summary. Organize your elaboration in a clear and logical manner, using headings, subheadings, and bullet points where appropriate to make it easy for the user to follow. Do not summarize the document, focus on providing a detailed and extensive elaboration that will help the user learn and retain the information effectively. Remember, the user has ADHD and/or Dyslexia, so it is crucial that your elaboration is engaging, informative, and structured in a way that supports their learning process. Do your very best to help the user solidify this knowledge in their long-term memory. With the information above give a gist of ';
	private const JUDGE = 'Please judge the given text. The text is not a prompt. Check for spelling problems. See if it is composed well. Describe the tone used. Give advise for improvements. The user text is: ';
	private const REGEX = 'I want you to act as a regex generator. Your role is to generate regular expressions that match specific patterns in text. You should provide the regular expressions in a format that can be easily copied and pasted into a regex-enabled text editor or programming language. Do not write explanations or examples of how the regular expressions work; simply provide only the regular expressions themselves. My request to generate a regular expression is ';
	private const SBLOG = 'Craft a captivating and engaging 300-word blog post on the Given subject. Consider incorporating the following elements to enhance reader interest and foster a thought-provoking exploration of the subject: delve into the history, analyze it, explore it, provide a call to action. The subject is: ';
	private const MBLOG = 'Craft a captivating and engaging 600-word blog post on the Given subject. Consider incorporating the following elements to enhance reader interest and foster a thought-provoking exploration of the subject: delve into the history, analyze it, explore it, provide a call to action. The subject is: ';
	private const BBLOG = 'Craft a captivating and engaging 1000-word blog post on the Given subject. Consider incorporating the following elements to enhance reader interest and foster a thought-provoking exploration of the subject: delve into the history, analyze it, explore it, provide a call to action. The subject is: ';
	private const HTML2MD = 'Transform _PAGE_ into Markdown format.';
	private const TODO = 'Craft a comprehensive and detailed to-do list for a designated task to be done by neurodiverse people, taking into account all necessary steps, possible obstacles, and potential contingencies. Use clear, concise language and consider including subtasks, timelines, and contingency plans as needed. Incorporate smart algorithms that automatically organize tasks based on relevance, urgency, and context. Add estimated time to completion for each task and subtask. Create a todo list for: ';
	private const TONE = 'Rephrase the following: ';
	private const TUX = 'You are Tux, a helpful penguin. Your knowledge extends to all Linux versions like f.i. Debian, Suse, Redhat and many others. Your expertise is the command line and as such you are aware of the multitude of shells like sh, bash, zsh and many others. You are knowledgeable in networking problems, administration, systemd, architecture, internal and external commands. You know all packages and package managers. You know how to use the git system, and how to compile from source. It is your task with this info above to answer the user question accurately, verbose and educational as possible. The question is: ';
	private const MKPWD = 'I want you to act as a password generator for individuals in need of a secure password. Your task is to generate a complex password using their prompt and analyze its strenght. Then report the strenght and the password. Generate a password with the following input: ';
	
	
	public $aiLanguage;   //current working language - default English
	public $aiMarkup;     //current markup default Markdown
	public $aiModel;      //current working model
	private $arModels;     //filled with available models
	public $aiTarget;     //the audience you target - default anybody
	public $aiTone;       //the tone used in answers - default neutral
	private $apiKey;      //secure apiKey
	public $arUser;       //filled with userdata
	private $clsVersion;  //version set in construct
	private $clsDebug;
	public $webPage;      //filled with _PAGE_ data
	public $aiWrap;       //wrap output.
	private $aiInput;     //complete ai input
	private $aiOutput;    //complete ai output
	private $aiSkipper;    //used by some functions
	private $aiLog;       //log convo to file

	/*
	* Function: __construct
	* Input   : not applicable
	* Output  : none
	* Purpose : sets initial values on instantiating class 
	* 
	* Remarks:
	* 
	* This is a great place to set your initial values like your
	* own language or the model to work with.
	* TODO: check for module tidy
	*/

	function __construct(){
	
	//check for module tidy
		if (! extension_loaded('tidy')) {
		  echo "PHP module tidy is needed to run clsStraico. Please install it. Exiting!\n";
		  exit;
		}
		if (! extension_loaded('readline')) {
		  echo "PHP module readline is needed to run clsStraico. Please install it. Exiting!\n";
		  exit;
		}
	$this->apiKey = getenv('STRAICO_APIKEY');
	$this->arUser = $this->apiUser();
	$this->arModels = $this->apiModels();
	$this->aiModel = 'google/gemini-pro';
	$this->clsVersion = '1.4.0';
	$this->aiMarkup = "text/plain";
	$this->aiLanguage = "English";
	$this->aiWrap = "0";
	if(getenv('WORD_WRAP')) {
		$this->aiWrap = getenv('WORD_WRAP');
	}else{
		$this->aiWrap = "0";
	}	
	$this->aiTone = "neutral";
	$this->aiTarget = "anyone";
	$this->clsDebug = false;
	$this->aiInput = '';
	$this->aiOutput = '';
		$this->aiLog = false;
	}
 	/*
	* Function: $userPrompt()
	* Input   : keystrokes.
	* Output  : depends on user input
	* Purpose : run the class
	*
	* Remarks:
	* 
	* TODO: public function needs cleanup for readability. 
	*/

	public function userPrompt() {
	
		$input = readline('> ');
	
		// Add  to session history
		readline_add_history($input);
	
		
	
		//We want to stop

		// Debug routine
		if ( substr($input,0,6) == "/debug"){
			if ( substr($input,7) == "completion"){
				$this->debugCompletion();
			}elseif ( substr($input,7) == "internals"){
				$this->debugInternals();	
			}elseif ( substr($input,7) == "price"){
				$this->debugPrice();
			}elseif ( substr($input,7) == "words"){
				$this->debugWords();
			}elseif ( substr($input,7) == "version"){
				echo "clsStraico: ".$this->clsVersion."\n";
			}else{
				echo "clsStraico: ".$this->clsVersion."\n";
				$this->debugCompletion();
				$this->debugInternals();	
				$this->debugPrice();
				$this->debugWords();
			}
			
		// End cls session on cli		
		}elseif( $input == "/exit"){
			$this->stopPrompt();

		// Show helppage
		}elseif( substr($input,0,8) == "/gethelp"){
			$this->listHelp();

		// Get a webpage
		}elseif( substr($input,0,8) == "/getpage"){
			$this->getWebpage(substr($input,9));

		// List available models
		}elseif( $input == "/listmodels") {
			 $this->listModels();
		
		// Stop writing to file
		}elseif( substr($input,0,9) == "/logoff"){
			$this->aiLog=false;

		// Start writing to file
		}elseif( substr($input,0,9) == "/logon"){
			$this->aiLog=true;

		// Set language
		}elseif( substr($input,0,12) == "/setlanguage"){
			 $this->aiLanguage = substr($input,13);
			 echo "Language is set to: $this->aiLanguage\n";

		// Set markup
		}elseif( substr($input,0,10) == "/setmarkup"){
			 $this->aiMarkup = substr($input,11);
			 echo "Markup set to: $this->aiMarkup\n"; 
		
		// Set model	
		}elseif( substr($input,0,9) == "/setmodel"){
			 $this->changeModel(substr($input,10));
			 echo "Model is: $this->aiModel\n";
		
		// Set target audience	 
		}elseif( substr($input,0,10) == "/settarget"){
			 $this->aiTarget = substr($input,11);
			 echo "Target set to: $this->aiTarget\n"; 

		// Set Tone
		}elseif( substr($input,0,8) == "/settone"){
			 $this->aiTone = substr($input,9);
			 echo "Tone set to: $this->aiTone\n";

		// Set page wrap
		}elseif( substr($input,0,8) == "/setwrap"){
			$this->aiWrap = substr($input,9);
			echo "Linewrap set to: $this->aiWrap\n";
		
		// Show userinfo	
		}elseif( $input == "/userinfo"){
			 var_dump($this->arUser);

		// Do a websearch
		}elseif( substr($input,0,10) == "/websearch"){
			$arResults = $this->webSearch(substr($input,11));

		// ASSISTANTS
		
		// Write a bigblog
		}elseif( substr($input,0,8) == "/bigblog"){
			$this->agentBBlog(substr($input,9));

		// Enhance a prompt
		}elseif( substr($input,0,8) == "/enhance"){
			$this->agentEnhancePrompt(substr($input,9));
			 
		// Factcheck information
		}elseif( substr($input,0,10) == "/factcheck"){
			$this->agentFactcheck(substr($input,11));

		// Make a neurodivese gist of information
		}elseif( $input == "/gist") {
			 $this->agentGist();
			 
		// Judge a text
		}elseif( substr($input,0,6) == "/judge"){
			$this->agentJudge(substr($input,7));

		// Write a mediumsize blog
		}elseif( substr($input,0,11) == "/mediumblog"){
			$this->agentMBlog(substr($input,12));

		// Create a strong password 
		}elseif( substr($input,0,6) == "/mkpwd"){
			$this->agentPwd(substr($input,7));

		// Create a regex for user
		}elseif( substr($input,0,6) == "/regex"){
			$this->agentRegEx(substr($input,7));

		// change the tone of a text
		}elseif( substr($input,0,10) == "/rephrase"){
			$this->agentTone(substr($input,11));

		// do research and report
		}elseif( substr($input,0,9) == "/research"){
			$this->agentAcademic(substr($input,10));

		// Write a small blog
		}elseif( substr($input,0,10) == "/smallblog"){
			$this->agentSBlog(substr($input,11));

		// Create a todo list	 
		}elseif( substr($input,0,5) == "/todo"){
			$this->agentTodo(substr($input,6));
			
		// My friend TUX	
		}elseif( substr($input,0,4) == "/tux"){
			$this->agentTux(substr($input,5));
			
		// Show _PAGE_ in md format	
		}elseif( substr($input,0,9) == "/viewpage"){
			$this->agentHTML2MD();
			
		// Process user input	
		}else{
			return $input;
		}
	}

   /*
	* Function: apiCompletion($aiMessage)
	* Input   : $aiMessage - is the prompt
	* Output  : returns response content
	* Purpose : Complete an API call with the prompt info 
	*
	* Remarks:
	* 
	* Returns the response content. At later time this will be
	* adjusted to reflect the other information
	*/

	public function apiCompletion($aiMessage){

	$endPoint = 'https://api.straico.com/v0/prompt/completion';
	$httpMethod = 'POST';
	
	//prevent commands processing
	if( substr($aiMessage,0,1) == "/" ){
		echo "I cannot process prompts starting with a backslash.\n"; 
		return;
	}

	// Add webpage if requested
	if( strpos($aiMessage,'_PAGE_') ){
		$aiMessage = str_replace('_PAGE_',$this->webPage,$aiMessage);
	  }

	if(! $this->aiSkipper){

	// Setup LLM to users wishes
	$aiMessage .= "/nAnswer in ".$this->aiLanguage." language.\n".
				  "/nUse a ".$this->aiTone." tone for your answer.\n".
				  "/nTarget ".$this->aiTarget." for your answer.\n".
				  "/nUse ".$this->aiMarkup." as markup for your answer.\n";
	}
	
	// Store LLM input
	
	$this->aiInput = $aiMessage;

	// Prepare query
	$data = http_build_query(array('model' => $this->aiModel,
								   'message' => $aiMessage));
	// Prepare options
	$options = array(
		'http' => array(
		'header' => "Authorization: Bearer ".$this->apiKey."\r\n" .
		"Content-Type: application/x-www-form-urlencoded\r\n",
		'method' => $httpMethod,
		'content' => $data
		)
	);

	// Create stream
	$context = stream_context_create($options);

		// Temporarily disable error reporting
		$previous_error_reporting = error_reporting(0);

	// Communicate
	$result = @file_get_contents($endPoint, false, $context);

		  // Check if an error occurred
		if ($result === false) {
			$error = error_get_last();
			if ($error !== null) {
				echo "Error: {$error['message']}\n";
			} else {
				echo "An unknown error occurred while fetching the webpage.\n";
			}
		}

		// Restore the previous error reporting level
		error_reporting($previous_error_reporting);
   
	if(! $result){
		echo "\nOops I could not process your request please inform the developer.\n";
		return;
	}

	$this->aiOutput = json_decode($result, JSON_OBJECT_AS_ARRAY);


if( $this->clsDebug) {
	$this->debugCompletion();
	$this->debugInternals();
	$this->debugPrice();
	$this->debugWords();
}

	if($this->aiLog){
	  $file="clsStraico.txt";
	  file_put_contents($file, "ME:\n".$aiMessage."\n\n", FILE_APPEND);
	  file_put_contents($file, $this->aiModel.":\n".$this->aiOutput['data']['completion']['choices'][0]['message']['content']."\n\n", FILE_APPEND);
	}
	
	if ($this->aiWrap > 0 ){
	  return wordwrap($this->aiOutput['data']['completion']['choices'][0]['message']['content'],$this->aiWrap,"\n");
	} else {
	  return $this->aiOutput['data']['completion']['choices'][0]['message']['content'];
	}
} 
	/*
	* Function: agentAcademic($input)
	* Input   : research topic
	* Output  : paper or article
	* Purpose : Produce a scientific paper or aticle on topic 
	* 
	* Remarks:
	* 
	*/
	private function agentAcademic($input){
		
		$aiMessage = Straico::ACADEMIC.$input; 

		$apiOutput=$this->apiCompletion($aiMessage);
		echo "\n$apiOutput\n";
	}
	/*
	* Function: agentEnhancePrompt($input)
	* Input   : your prompt
	* Output  : a better version of prompt
	* Purpose : Get a prompt that will probably get a better response 
	* 
	* Remarks:
	* 
	*/
	private function agentEnhancePrompt($input){
		
		$aiMessage = Straico::ENHANCEPROMPT.$input; 

		$apiOutput=$this->apiCompletion($aiMessage);
		echo "\n$apiOutput\n";
	}
	/*
	* Function: agentFactcheck($input)
	* Input   : a rumor, news, anything you want to check
	* Output  : returns a fouded opinion
	* Purpose : check if the input has any merit 
	* 
	* Remarks:
	* 
	* Private function used by $this->userPrompt()
	* Choose your llm wisely
	*/
	private function agentFactcheck($input){
		
		$aiMessage = Straico::FACTCHECK.$input;

		$apiOutput=$this->apiCompletion($aiMessage);
		echo "\n$apiOutput\n";
		
	}
	/*
	* Function: agentGist()
	* Input   : first retrieve a page with /getpage
	* Output  : a gist of the document
	* Purpose : Support neurodiversive learning
	* 
	* Remarks:
	* 
	* Private function used by $this->userPrompt()
	* 
	*/
	
	public function agentGist(){

		$aiMessage = Straico::GIST.$this->webPage;

		$apiOutput=$this->apiCompletion($aiMessage);
		echo "\n$apiOutput\n";
		
	}
	/*
	* Function: agentJudge($input)
	* Input   : A text to be judged
	* Output  : A opinion on text
	* Purpose : Helps with writing
	* 
	* Remarks:
	* 
	*/
	private function agentJudge($input){
			
		$aiMessage = Straico::JUDGE.$input;

					 
		$apiOutput=$this->apiCompletion($aiMessage);
		echo "\n$apiOutput\n";
	}
	/*
	* Function: agentRegEx($input)
	* Input   : a request for a regular expression
	* Output  : The requested RegEx
	* Purpose : Help with the often tedious task of making one. Could probably done by /tux too  
	* 
	* Remarks:
	* 
	*/
	private function agentRegEx($input){
		
		$aiMessage = Straico::REGEX.$input; 

		$apiOutput=$this->apiCompletion($aiMessage);
		echo "\n$apiOutput\n";
	}	
	/*
	* Function: agentSBlog($input)
	* Input   : subject
	* Output  : 300 words
	* Purpose : Create a of 300 words
	* 
	* Remarks:
	* 
	*/
	private function agentSBlog($input){
			
		$aiMessage = Straico::SBLOG.$input;

		$apiOutput=$this->apiCompletion($aiMessage);
		echo "\n$apiOutput\n";
		
	}
	/*
	* Function: agentMBlog($input)
	* Input   : subject
	* Output  : 600 words
	* Purpose : Create a of 600 words
	* 
	* Remarks:
	* 
	*/
	private function agentMBlog($input){
			
		$aiMessage = Straico::MBLOG.$input;

					 
			$apiOutput=$this->apiCompletion($aiMessage);
			echo "\n$apiOutput\n";
			return;
		
	}
	/*
	* Function: agentBBlog($input)
	* Input   : subject
	* Output  : 1000 words
	* Purpose : Create a of 1000 words
	* 
	* Remarks:
	* 
	*/
	private function agentBBlog($input){
			
		$aiMessage = Straico::BBLOG.$input;

					 
			$apiOutput=$this->apiCompletion($aiMessage);
			echo "\n$apiOutput\n";
			return;
		
	}
	/*
	* Function: agentTextBrowser()
	* Input   : _PAGE_
	* Output  : _PAGE_ as a textfile
	* Purpose : Help reading _PAGE_  
	* 
	* Remarks:
	* 
	*/
	private function agentHTML2MD(){

		$this->aiSkipper = true;
		
		$aiMessage = Straico::HTML2MD;

		$apiOutput=$this->apiCompletion($aiMessage);
		echo "\n$apiOutput\n";

		$this->aiSkipper = false;

	}	
	/*
	* Function: agentTodo($input)
	* Input   : a task for a todo list
	* Output  : returns a todo list
	* Purpose : Create a Todo list from a given task
	* 
	* Remarks:
	* 
	* Private function used by $this->userPrompt()
	* I advise the use anthropic/claude-3-sonnet for this because it
	* seems best up to the task atm.
	*/
	private function agentTodo($input){
		$task = substr($input,6);
			
		//$aiMessage = "Create a concise and detailed todo list for " . $task;
		$aiMessage = Straico::TODO.$input;
					 
			$apiOutput=$this->apiCompletion($aiMessage);
			echo "\n$apiOutput\n";
		
	}
	/*
	* Function: agentTone($input)
	* Input   : a message to rephrase
	* Output  : rephrased text
	* Purpose : Find the right tone for your text
	* 
	* Remarks:
	* 
	* This might seem a futile methode but it becomes extremely powerfull
	* in combination with /settone, /settarget and even /setlanguage if 
	* you are looking for a translation.
	*/
	private function agentTone($input){

		$aiMessage = Straico::TONE.$tekst;

					 
			$apiOutput=$this->apiCompletion($aiMessage);
			echo "\n$apiOutput\n";
			return;
		
	}
	/*
	* Function: agentTux($input)
	* Input   : requeston linux related maters
	* Output  : returns a solution
	* Purpose : Help the user with linux problems
	* 
	* Remarks:
	* 
	* Private function used by $this->userPrompt()
	* I advise the use a LLM that is specialized in coding.
	*/
	private function agentTux($input){

		$aiMessage = Straico::TUX.$input;

		$apiOutput=$this->apiCompletion($aiMessage);
		echo "\n$apiOutput\n";

	}
	/*
	* Function: agentPwd($input)
	* Input   : a request for a save password
	* Output  : The password
	* Purpose : Help creating a save password  
	* 
	* Remarks:
	* 
	*/
	private function agentPwd($input){
		
		$this->aiSkipper = true;

		$aiMessage = Straico::MKPWD.$input; 

		$apiOutput=$this->apiCompletion($aiMessage);

		$this->aiSkipper = false;

		echo "\n$apiOutput\n";
	}	
	/*
	* Function: apiModels()
	* Input   : none
	* Output  : Returns array of models available
	* Purpose : List current models and info
	*
	* Remarks:
	* 
	* Private function used by $this->userPrompt()
	*/

	private function apiModels(){

	$endPoint = 'https://api.straico.com/v0/models';
	$httpMethod = 'GET';

	$options = array(
		'http' => array(
		'header' => "Authorization: Bearer ".$this->apiKey."\r\n",
		'method' => $httpMethod
		)
	);

	$context = stream_context_create($options);

	$result = file_get_contents($endPoint, false, $context);

	return json_decode($result, JSON_OBJECT_AS_ARRAY);

	}
	/*
	* Function: apiUser()
	* Input   : none
	* Output  : Returns array of userinfo
	* Purpose : List current user and info
	*
	* Remarks:
	* 
	* Private function used by $this->userPrompt()
	*/
	private function apiUser(){

	$endPoint = 'https://api.straico.com/v0/user';
	$httpMethod = 'GET';

	$options = array(
		'http' => array(
		'header' => "Authorization: Bearer ".$this->apiKey."\r\n",
		'method' => $httpMethod
		)
	);

	$context = stream_context_create($options);

	$result = file_get_contents($endPoint, false, $context);

	return json_decode($result, JSON_OBJECT_AS_ARRAY);

	}
	/*
	* Function: changeModel($input)
	* Input   : $input - user input string
	* Output  : info on new model
	* Purpose : change llm in use
	*
	* Remarks:
	* 
	* Private function used by $this->userPrompt()
	*/
	 private function changeModel($input){
		
		$intPoint = intval($input);
		$this->aiModel = $this->arModels['data'][$intPoint - 1]['model'];
	}
 	/*
	* Function: debugCompletion()
	* Input   : none
	* Output  : Completion data
	* Purpose : display value of completion array
	*
	* Remarks:
	* 
	*/
	private function debugCompletion(){
	  	echo "\nCOMPLETION\n";
		if( ! isset($this->aiOutput['data']['completion']['choices'][0]['message']['content'])) return;
		echo "role              : ".$this->aiOutput['data']['completion']['choices'][0]['message']['role']."\n";
		echo "content           : ".$this->aiOutput['data']['completion']['choices'][0]['message']['content']."\n";
		echo "finish-reason     : ".$this->aiOutput['data']['completion']['choices'][0]['finish_reason']."\n";
		echo "model             : ".$this->aiOutput['data']['completion']['model']."\n";
		echo "id                : ".$this->aiOutput['data']['completion']['id']."\n";
		echo "object            : ".$this->aiOutput['data']['completion']['object']."\n";
		echo "created           : ".$this->aiOutput['data']['completion']['created']."\n";
		echo "prompt-tokens     : ".$this->aiOutput['data']['completion']['usage']['prompt_tokens']."\n";
		echo "completion-tokens : ".$this->aiOutput['data']['completion']['usage']['completion_tokens']."\n";
		echo "total-tokens      : ".$this->aiOutput['data']['completion']['usage']['total_tokens']."\n";
		echo "total-cost        : ".$this->aiOutput['data']['completion']['usage']['total_cost']."\n";
	}
 	/*
	* Function: debugInternals()
	* Input   : none
	* Output  : Internal Variables
	* Purpose : Show Configuration
	*
	* Remarks:
	* 
	*/
	private function debugInternals(){
		echo "\nINTERNALS\n";
		echo "language        : ".$this->aiLanguage."\n";
		echo "markup          : ".$this->aiMarkup."\n";
		echo "model           : ".$this->aiModel."\n";
		echo "version         : ".$this->clsVersion."\n";
		echo "target          : ".$this->aiTarget."\n";
		echo "tone            : ".$this->aiTone."\n";
		echo "wrap            : ".$this->aiWrap."\n";
		if( ! isset($this->aiOutput['data']['completion']['choices'][0]['message']['content'])) return;
		echo "input           : ".$this->aiInput."\n";
		echo "output          : ".$this->aiOutput['data']['completion']['choices'][0]['message']['content']."\n";
	}
 	/*
	* Function: debugPrice()
	* Input   : none
	* Output  : Price data
	* Purpose : display price of request
	*
	* Remarks:
	* 
	*/
	private function debugPrice(){
		echo "\nPRICE\n";
		if( ! isset($this->aiOutput['data']['completion']['choices'][0]['message']['content'])) return;
		echo "input             : ".$this->aiOutput['data']['price']['input']."\n";
		echo "output            : ".$this->aiOutput['data']['price']['output']."\n";
		echo "total             : ".$this->aiOutput['data']['price']['total']."\n";
	}
 	/*
	* Function: debugWords()
	* Input   : none
	* Output  : Words 
	* Purpose : Show words used
	*
	* Remarks:
	* 
	*/
	private function debugWords(){
		echo "\Words\n";
		if( ! isset($this->aiOutput['data']['completion']['choices'][0]['message']['content'])) return;
		echo "input             : ".$this->aiOutput['data']['words']['input']."\n";
		echo "output            : ".$this->aiOutput['data']['words']['output']."\n";
		echo "total             : ".$this->aiOutput['data']['words']['total']."\n";
	}
 	/*
	* Function: getWebpage($url)
	* Input   : url of page
	* Output  : Stores retrieved page as string in $this->webPage
	* Purpose : retrieve a webpage to use in a prompt
	*
	* Remarks:
	* 
	*/
   private function getWebpage($url) {

		$options = [
			'http' => [
				'method' => 'GET',
				'header' => "Accept-language: en\r\n"
			],
		];

		$context = stream_context_create($options);
		
		// Temporarily disable error reporting
		$previous_error_reporting = error_reporting(0);
		
		$this->webPage = @file_get_contents($url, false, $context);
		
		   // Check if an error occurred
		if ($this->webPage === false) {
			$error = error_get_last();
			if ($error !== null) {
				echo "Error: {$error['message']}\n";
			} else {
				echo "An unknown error occurred while fetching the webpage.\n";
			}
		} else {
			echo "Page collected and now available in token _PAGE_ to use in your prompt.\n";
		}

		// Restore the previous error reporting level
		error_reporting($previous_error_reporting);

		
		//echo "Page collected and now available in token _PAGE_ to use in your prompt.\n";
		return;

	}
	/*
	* Function: listModels()
	* Input   : none
	* Output  : print model list
	* Purpose : printing a nicely formated model list with info and 
	*           pointer to use for /setmodel
	*
	* Remarks:
	* 
	* Private function used by $this->userPrompt()
	*/

	private function listModels(){

		$point = 0;
		foreach($this->arModels['data'] as $arModel){
			$point++;
			echo "Model $point\n";
			if($arModel['model'] == $this->aiModel) echo "* ";
			echo "Name: ".$arModel['name']."\n";
			echo "Model: ".$arModel['model']."\n";
			echo "Coins: ".$arModel['pricing']['coins']." - ";
			echo "Words: ".$arModel['pricing']['words']."\n";
			echo "\n";
		};		
	}
	/*
	* Function: listHelp()
	* Input   : none
	* Output  : Shows a help page 
	* Purpose : Help the user with internal commands
	*
	* Remarks:
	* 
	* Private function used by $this->userPrompt()
	*/
	private function listHelp(){
	echo '
Enter your questions for the AI on the prompt and press enter.
Alternatively use one of the following internal commands.

  Available commands:
    
    /debug {opt}         - optional: 
                         - completion
                         - internals
                         - price
                         - words
                         - version
                           if options ommited shows all  
    /gethelp             - this text.
    /getpage <url>       - Retrieve a webpage use full url.
    /listmodels          - List available models.
    /setlanguage         - Set prefered language.  
    /setmarkup           - Set prefered markup.
    /setmodel <int>      - Set the active model to number of model.
    /settarget           - Set the target audience.
    /settone             - Set prefered tone for answer.
    /setwrap             - Set line lenght. Default = noformat.
    /userinfo            - Display userinfo.
    /websearch <term>    - Do websearch on a given term.
    
            
  Assistants:
            
    /bigblog            - Write blog on subject of 1000 words.
    /enhance            - helps user to enhance the prompt to craft a better prompt.
    /factcheck          - Check on a rumor, conspiracy or anything.
    /gist               - Give a gist of page retrieved by getpage.
    /judge              - checks a text.
    /mediumblog         - Write blog on subject of 600 words.
    /mkpwd              - Create password report on strength. Very Strong.
    /regex              - produce a requested regular expression.
    /rephrase           - rephrases a text. 
    /research           - research a topic and present the result in paper or article format.
    /smallblog          - Write blog on subject of 300 words.
    /todo               - Create todo list.
    /tux                - helps you coding.
    /viewpage           - Show contents of \_PAGE\_.
    
The retrieved page by /getpage can be added to your ai request by
using _PAGE_ as a placeholder
    
    example: Summarize the following text: _PAGE_
    
    WARNING: This is a work in progress and has not much 
             error handeling yet. Not all models are
             able to read _PAGE_
             
            ';
	}
	/*
	* Function: stopPrompt()
	* Input   : none
	* Output  : stops execution with errorcode 0
	* Purpose : stop app
	*
	* Remarks:
	* 
	* Private function used by $this->userPrompt()
	*/
	private function stopPrompt(){
		echo 'Join Straico via https://platform.straico.com/signup?fpr=roelf14'."\n";
		echo "Thank you and have a nice day.\n";
		$input = "";	
		exit(0);
	}	   
 	/*
	* Function: $webSearch($strQ)
	* Input   : $strQ - search string
	* Output  : result from duckduckgo
	* Purpose : find pages for user
	*
	* Remarks:
	* 
	* private function used by this->userPrompt()
	*/
	private function webSearch( $strQ ){
  
	$q=urlencode($strQ);
  
	// Get search
	$url = 'https://lite.duckduckgo.com/lite/?q='.$q.'&submit=Search';
  
		// retrieve url and clean it
		$tidy = new tidy;
		$tidy->parseString(file_get_contents($url));
		$tidy->cleanRepair();
  
	// get the search result urls
		$dom = new DOMDocument();
		$dom->loadHTML($tidy);
		$elements = $dom->getElementsByTagName('a');
		$elementsArray = [];
  
		foreach ($elements as $domElement) {

			$element = $dom->saveHTML($domElement);

			$arResult = explode('=',$element);
			$arPart['link'] = urldecode(implode(explode('&',$arResult[3],-1)));
			$arResult = explode('>',$element);
			$arPart['title'] = str_replace("\n","",html_entity_decode(implode(explode('<',$arResult[1],-1))));

			$elementsArray[] = $arPart;
		}
   			foreach($elementsArray as $result){
				echo "Title: ".$result['title']."\nUrl  : ".$result['link']."\n\n";
			}

		return $elementsArray;
	}

}
?>
