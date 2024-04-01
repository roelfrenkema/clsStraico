<?php
/*
 * clsStraico.php © 2024 by Roelfrenkema is licensed under CC BY-NC-SA 4.0. 
 * To view a copy of this license, 
 * visit http://creativecommons.org/licenses/by-nc-sa/4.0/
 *
 * visit Straico https://platform.straico.com/signup?fpr=roelf14
 */

class Straico {
	
	private const ACADEMIC = 'Act as an academic researcher. Engage in meticulous academic research to produce a comprehensive paper/article on a designated IDEA.

Detailed Instructions:

1. Identify Credible Sources: Seek out academic literature, scholarly journals, and reputable websites to ensure the veracity and reliability of the information presented.

2. Structure the Material Logically: Arrange the content in a coherent and well-organized manner, utilizing subheadings, bullet points, and citations to enhance readability and comprehension.

3. Document Sources Accurately: Cite all references used in proper academic style (e.g., MLA, APA, Chicago) to maintain transparency and scholarly integrity.

4. Present Findings Objectively: Maintain a neutral tone throughout the paper/article, avoiding personal biases or opinions that could compromise the academic rigor of the work.

5. Target a Broad Audience: Frame the paper/article in a way that is accessible and comprehensible to a wide range of readers, regardless of their prior knowledge or expertise.

---------------

Your task is to create a paper or article based on the information above, and the IDEA that the user will provide below.

IDEA: "';
	private const BBLOG = 'Craft a captivating and engaging 1000-word blog post on the Given subject. Consider incorporating the following elements to enhance reader interest and foster a thought-provoking exploration of the subject: delve into the history, analyze it, explore it, provide a call to action. The subject is: ';	
	private const DREAM = 'Act as an expert prompt engineer, with extensive experience in creating the best prompts for the text-to-image model Stable Difussion.

Stable diffusion is a text-based image generation model that can create diverse and high-quality images based on your requests. In order to get the best results from Stable diffusion, you need to follow these guidelines:

1) Be as specific as possible in your requests. Stable diffusion handles concrete prompts better than abstract or ambiguous ones. For example, instead of “portrait of a woman” it is better to write “portrait of a woman with brown eyes and red hair in Renaissance style”.
2) Specify specific art styles or materials. If you want to get an image in a certain style or with a certain texture, then specify this in your request. For example, instead of “landscape” it is better to write “watercolor landscape with mountains and lake".
3) Specify specific artists for reference. If you want to get an image similar to the work of some artist, then specify his name in your request. For example, instead of “abstract image” it is better to write “abstract image in the style of Picasso”.
4) Respond only in English. Stable Difussion only understands prompts in English and because of that, is of upmost importance that you only respond using English (even if the user requests in another language)
4) Use negative prompts.  These prompts can be words or phrases that guide the model to avoid certain elements, such as "bad anatomy," "blurry," or "low contrast." See the examples later.
5) Weigh your keywords. You can use token:1.3 to specify the weight of keywords in your query. The greater the weight of the keyword, the more it will affect the result. For example, if you want to get an image of a cat with green eyes and a pink nose, then you can write “a cat:1.5, green eyes:1.3,pink nose:1”. This means that the cat will be the most important element of the image, the green eyes will be less important, and the pink nose will be the least important.
Another way to adjust the strength of a keyword is to use () and []. (keyword) increases the strength of the keyword by 1.1 times and is equivalent to (keyword:1.1). [keyword] reduces the strength of the keyword by 0.9 times and corresponds to (keyword:0.9).

You can use several of them, as in algebra. The effect is multiplicative.

(keyword): 1.1
((keyword)): 1.21
(((keyword))): 1.33

Similarly, the effects of using multiple [] are as follows

[keyword]: 0.9
[[keyword]]: 0.81
[[[keyword]]]: 0.73

I will also give some examples of good prompts for Stable Difussion so that you can study them and focus on them.

Examples:
1. 
Prompt: "a cute kitten made out of metal, (cyborg:1.1), ([tail | detailed wire]:1.3), (intricate details), hdr, (intricate details, hyperdetailed:1.2), cinematic shot, vignette, centered", 
Negative Prompt: "deformed, out of focus, ugly, extra limbs, bad light"
2. 
Prompt: "medical mask, victorian era, cinematography, intricately detailed, crafted, meticulous, magnificent, maximum details, extremely hyper aesthetic", 
Negative Prompt: "ugly, oug of focus, deformed, out of frame"

3. 
Prompt: "a girl, wearing a tie, cupcake in her hands, school, indoors, (soothing tones:1.25), (hdr:1.25), (artstation:1.2), dramatic, (intricate details:1.14), (hyperrealistic 3d render:1.16), (filmic:0.55), (rutkowski:1.1), (faded:1.3)"
Negative Prompt: "deformed, out of focus, ugly, extra limbs, bad light"

4. 
Prompt: "Jane Eyre with headphones, natural skin texture, 24mm, 4k textures, soft cinematic light, adobe lightroom, photolab, hdr, intricate, elegant, highly detailed, sharp focus, ((((cinematic look)))), soothing tones, insane details, intricate details, hyperdetailed, low contrast, soft cinematic light, dim colors, exposure blend, hdr, faded"
Negative Prompt: "deformed, out of focus, ugly, extra limbs, bad light"

5. 
Prompt: "a portrait of a laughing, toxic, muscle, god, elder, (hdr:1.28), bald, hyperdetailed, cinematic, warm lights, intricate details, hyperrealistic, dark radial background, (muted colors:1.38), (neutral colors:1.2)"
Negative Prompt: "deformed, out of focus, dark, cartoonish, funny, ugly, extra limbs"

6. 
Prompt: "no humans, landscape, oil on matte canvas, sharp details, the expanse scifi spacescape ceres colony, intricate, highly detailed, digital painting, rich color, smooth, sharp focus, illustration, Unreal Engine 5, 8K, art by artgerm and greg rutkowski and alphonse mucha"
Negative Prompt: "FastNegativeV2"

7.
Prompt: "(8k, RAW photo, best quality, masterpiece:1.2), (realistic, photo-realistic:1.37), octane render, ultra high res, ultra-detailed , professional lighting, photon mapping, radiosity, physically-based rendering, ue5, ((island sanctuary)), ((ancient fallen kingdom)), ((reflections in water)), ((raytracing)), ((drowned city))"
Negative Prompt: "BadDream UnrealisticDream"

---------------

Your task is to create a prompt and negative prompt pair based on the information above, the examples provided, and the IDEA that the user will provide below.
Respond only with the Prompt and Negative Prompt pair, do not add any additional comments or information.

IDEA: "';
	private const ENHANCEPROMPT = 'Delve into the nuances of a Prompt Enhancer AI capabilities by considering these thought-provoking questions:                                                                 
                                                                                                                                                                           
* How does an AI leverage natural language processing techniques to analyze and augment user-input prompts?                                                                     
* What strategies are employed to identify key concepts, relationships, and potential biases within the prompt?                                                                 
* How does the AI balance creativity and accuracy in generating engaging and detailed prompts?                                                                                  
* In what ways can enhanced prompts facilitate deeper exploration, critical thinking, and meaningful outcomes in various contexts?                                              
                                                                                                                                                                                
By examining these questions, we can gain a comprehensive understanding of the Prompt Enhancer AI potential and its implications for enhancing human-AI collaboration and knowledge discovery. 

With the knowledge above I want you to act as a Prompt Enhancer.
---------------

Your goal to improve on the users IDEA and to create a better prompt for them to get an optimal response of any AI. Respond only with the Prompt, do not add any additional comments or information.

IDEA: "';
	private const FACTCHECK = 'Drawing from your extensive knowledge of conspiracy theories, current events, disinformation, and propaganda tactics, please provide detailed insights into the origins and credibility of the information presented by the user. 

Detailed instructions.

1. Your expertise is crucial for debunking or verifying claims, and your analysis should aim to educate the user byhighlighting key sources and evaluating the evidence critically.

2. Identify Credible Sources: Seek out academic literature, scholarly journals, and reputable journalistic websites to ensure the veracity and reliability of the information presented.

3. Document Sources Accurately: Cite all references used in proper style to maintain transparency and integrity.

4. Present Findings Objectively: Maintain a neutral tone, avoiding personal biases or opinions that could compromise your answer.

---------------

It is your goal to improve on the users IDEA and analyze it with the info given above.

IDEA: "';
	private const GIST = 'I want you to act as a Neurodiversity Assistant.

You will be helping users with ADHD and/or Dyslexia to learn and retain information more effectively by elaborating on the contents of the DOCUMENT given in detail. 

Goals.

1. Accelerate the learning process for neurodiverse people.
2. Help the user solidify the knowledge in their long-term memory. 

Instuctions.

1. Carefully read through the given DOCUMENT.
2. Identify all the key takeaways, important concepts, and main ideas. 
3. Once you have extracted these key points, elaborate on each one in detail. 
4. Provide additional context, examples, and explanations to help the user better understand and remember the information. 
5. Be thorough and comprehensive in your elaboration. The purpose is to give the user a deep understanding of the material, not a summary. 
6. Organize your elaboration in a clear and logical manner, using headings, subheadings, and bullet points where appropriate to make it easy for the user to follow. 
7. Do not summarize the document, focus on providing a detailed and extensive elaboration that will help the user learn and retain the information effectively. 

Remember, the user has ADD, ADHD, AUTHISM or DYSLEXIA, so it is crucial that your elaboration is engaging, informative, and structured in a way that supports their learning process. Do your very best to help the user solidify this knowledge in their long-term memory. 

---------------

It is your task with the information above to read the users DOCUMENT and create a readable gist for them. DOCUMENT: "';
	private const TEXTCHECK = 'Analyze and improve the provided text:

Instructions:

1. Assess its structure and organization.
2. Identify any spelling or grammatical errors.
3. Evaluate its tone and style.
4. Provide specific suggestions for enhancements.
5 Ensure that the text is clear, concise, and engaging., including specific suggestions for enhancing clarity, conciseness, and overall effectiveness.

---------------

It is your task with the information above to analyse the users DOCUMENT and improve it for them. DOCUMENT: "';
	private const REGEX = 'I want you to act as a regex generator. Your role is to generate regular expressions that match specific patterns in text. You should provide the regular expressions in a format that can be easily copied and pasted into a regex-enabled text editor or programming language. Do not write explanations or examples of how the regular expressions work; simply provide only the regular expressions themselves. My request to generate a regular expression is ';
	private const SBLOG = 'Craft a captivating and engaging 300-word blog post on the Given subject. Consider incorporating the following elements to enhance reader interest and foster a thought-provoking exploration of the subject: delve into the history, analyze it, explore it, provide a call to action. The subject is: ';
	private const MBLOG = 'Craft a captivating and engaging 600-word blog post on the Given subject. Consider incorporating the following elements to enhance reader interest and foster a thought-provoking exploration of the subject: delve into the history, analyze it, explore it, provide a call to action. The subject is: ';
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
		if ( getenv("STRAICO_APIKEY") ){
			$this->apiKey = getenv('STRAICO_APIKEY');
		}else{
			echo "Could not find the API key. Exiting!";
			exit(-1);
		} 
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
			}elseif ( substr($input,7) == "user"){
				$this->debugUser();
			}elseif ( substr($input,7) == "words"){
				$this->debugWords();
			}elseif ( substr($input,7) == "version"){
				echo "VERSION\n\nclsStraico: ".$this->clsVersion."\n";
			}else{
				echo "VERSION\n\nclsStraico: ".$this->clsVersion."\n";
				$this->debugCompletion();
				$this->debugInternals();	
				$this->debugPrice();
				$this->debugUser();
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
			echo "Stopt logging!\n";

		// Start writing to file
		}elseif( substr($input,0,9) == "/logon"){
			$this->aiLog=true;
			echo "Appending conversation to clsStraico.txt\n";

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
		
		// Do a websearch
		}elseif( substr($input,0,10) == "/websearch"){
			$arResults = $this->webSearch(substr($input,11));

		// ASSISTANTS

		// do research and report
		}elseif( substr($input,0,9) == "/academic"){
			$this->agentAcademic(substr($input,10));
		
		// Write a bigblog
		}elseif( substr($input,0,8) == "/bigblog"){
			$this->agentBBlog(substr($input,9));

		// Write a stable diffusion prompt
		}elseif( substr($input,0,6) == "/dream"){
			$this->agentDream(substr($input,7));

		// Enhance a prompt
		}elseif( substr($input,0,8) == "/enhance"){
			$this->agentEnhancePrompt(substr($input,9));
			 
		// Factcheck information
		}elseif( substr($input,0,10) == "/factcheck"){
			$this->agentFactcheck(substr($input,11));

		// Make a neurodivese gist of information
		}elseif( substr($input,0,5) == "/gist") {
			 $this->agentGist(substr($input,6));
			 
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

		// Write a small blog
		}elseif( substr($input,0,10) == "/smallblog"){
			$this->agentSBlog(substr($input,11));

		// Judge a text
		}elseif( substr($input,0,10) == "/textcheck"){
			$this->agentTextcheck(substr($input,11));

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
			echo "I cannot process prompts starting with a backslash. They are commands and your command does not compute.\n"; 
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
						"User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36\r\n",
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
				$message = explode(":",$error['message']);
				echo "Error: {$message[3]} This can be a temporary API failure, try again later!\n";
				return;
			} else {
				echo "An unknown error occurred while fetching the webpage. Please try again!\n";
				return;
			}
		}
		
		// Restore the previous error reporting level
		error_reporting($previous_error_reporting);
   
		$this->aiOutput = json_decode($result, JSON_OBJECT_AS_ARRAY);

		if($this->aiLog){
			$file="clsStraico.txt";
			file_put_contents($file, "ME:\n".$aiMessage."\n\n", FILE_APPEND);
			file_put_contents($file, $this->aiModel.":\n".$this->aiOutput['data']['completion']['choices'][0]['message']['content']."\n\n", FILE_APPEND);
		}
	
		//format output and return it
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
		
		$aiMessage = Straico::ACADEMIC.$input."\""; 

		$apiOutput=$this->apiCompletion($aiMessage);
		echo "\n$apiOutput\n";
	}
	/*
	* Function: agentDream($input)
	* Input   : subject
	* Output  : a prompt for stable diffusion
	* Purpose : create a artwork
	* 
	* Remarks:
	* 
	*/
	private function agentDream($input){
	
		$aiMessage = Straico::DREAM.$input."\"";

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
		
		$aiMessage = Straico::ENHANCEPROMPT.$input."\""; 

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
		
		$aiMessage = Straico::FACTCHECK.$input."\"";

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
	
	private function agentGist($input){
	
		$aiMessage = Straico::GIST.$input."\"";
	
		$apiOutput=$this->apiCompletion($aiMessage);
		echo "\n$apiOutput\n";
		
	}
	/*
	* Function: agentTextcheck($input)
	* Input   : A text to be judged
	* Output  : A opinion on text
	* Purpose : Helps with writing
	* 
	* Remarks:
	* 
	*/
	private function agentTextcheck($input){
			
		$aiMessage = Straico::TEXTCHECK.$input."\"";

					 
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

		// Temporarily disable error reporting
		$previous_error_reporting = error_reporting(0);

		$result = @file_get_contents($endPoint, false, $context);

		  // Check if an error occurred
		if ($result === false) {
			$error = error_get_last();
			if ($error !== null) {
				$message = explode(":",$error['message']);
				echo "Error: {$message[3]} Check your API key!\n";
				exit(-1);
			} else {
				echo "An unknown error occurred while fetching the webpage.\n";
				exit(-1);
			}
		}
		
		// Restore the previous error reporting level
		error_reporting($previous_error_reporting);

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
	private function debugUser(){
		echo "\nUSER INFO\n";
		if( ! isset($this->arUser)) return;
		echo "Name: ".$this->arUser['data']['first_name']." ".$this->arUser['data']['last_name']."\n";
		echo "Coins: ".$this->arUser['data']['coins']."\n";
		echo "Plan : ".$this->arUser['data']['plan']."\n";
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
		echo "\nWords\n";
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
    /dream              - Create a prompt for Stability AI
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
