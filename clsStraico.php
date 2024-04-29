<?php
/*
 * clsStraico.php © 2024 by Roelfrenkema is licensed under CC BY-NC-SA 4.0.
 * To view a copy of this license,
 * visit http://creativecommons.org/licenses/by-nc-sa/4.0/
 *
 * visit Straico https://platform.straico.com/signup?fpr=roelf14
 */

/*
 * Error codes
 */

class Straico
{
    private const ACADEMIC = 'Act as an academic researcher. Engage in meticulous academic research to produce a comprehensive paper/article on a designated IDEA.

Detailed Instructions:

1. Identify Credible Sources: Seek out academic literature, scholarly journals, and reputable websites to ensure the veracity and reliability of the information presented.

2. Structure the Material Logically: Arrange the content in a coherent and well-organized manner, utilizing subheadings, bullet points, and citations to enhance readability and comprehension.

3. Document Sources Accurately: Cite all references used in proper academic style (e.g., MLA, APA, Chicago) to maintain transparency and scholarly integrity.

4. Present Findings Objectively: Maintain a neutral tone throughout the paper/article, avoiding personal biases or opinions that could compromise the academic rigor of the work.

5. Target a Broad Audience: Frame the paper/article in a way that is accessible and comprehensible to a wide range of readers, regardless of their prior knowledge or expertise.

---------------

Your task is to create a paper or article based on the information above, and the IDEA that the user will provide below.

IDEA: ';

    private const BASEROLE = 'You are a helpfull friend. We chat in a friendly and familiar way with eachother withot formalities like I am an artificial intelligence or I cannot have feelings. We are friends and we act as friends.';

    private const BIGBLOG = 'Craft a captivating and engaging 1000-word blog post on the Given subject. Consider incorporating the following elements to enhance reader interest and foster a thought-provoking exploration of the subject: delve into the history, analyze it, explore it, provide a call to action. The subject is: ';

    private const DREAM = 'Act as an expert prompt engineer, with extensive experience in creating the best prompts for the text-to-image model Stable Difussion.

Instructions for the prompt only:

Tokens used here are [Style Of Photo], [Subject], [Important Feature], [More Details], [Pose or Action], [Framing], [ Setting/Background], [Lighting], [Camera Angle], [Camera Properties] and [Artist].
Replaced the tokensby their meaning as in the following example:

Example:
Token [Style Of Photo] can be abstract, painting, analog, street photography etc.
Token [Camera Properties] can be a camera type or brand, a filmtype or brand, a lens setting or any combination thereof.
Token [Camera Angle] can be a view type and or a camara shot type.
Token [Pose or Action] refers to photographic poses or action targets.
Taken [Artist] can be one or more artists. 

Weigh your keywords. You can use keyword:1.3 to specify the weight of keywords in your query. The greater the weight of the keyword, the more it will affect the result. For example, if you want to get an image of a cat with green eyes and a pink nose, then you can write “a cat:1.5, green eyes:1.3,pink nose:1”. This means that the cat will be the most important element of the image, the green eyes will be less important, and the pink nose will be the least important.

Your prompt should be build like the following example where you have to replace the tokens. Do not mention the tokens in the prompt, replace them.
[Style Of Photo] photo of a [Subject] , [Important Feature] , [More Details] , [Pose or Action] , [Framing] , [ Setting/Background] , [Lighting] , [Camera Angle] , [Camera Properties] , In Style Of [Artist]

Instructions for the negative prompt only:

Be elaborate.
Use only keywords.

---------------

Your task is, based on the information above and (an improved IDEA) that the user will provide below, to create a prompt (with weights) and a negative prompt.

Respond only with the prompt and a negative prompt, do not add any additional comments or information.
';

    private const ENHANCE = 'Delve into the nuances of a Prompt Enhancer AI capabilities by considering these thought-provoking questions:                                                                 
                                                                                                                                                                           
* How does an AI leverage natural language processing techniques to analyze and augment user-input prompts?                                                                     
* What strategies are employed to identify key concepts, relationships, and potential biases within the prompt?                                                                 
* How does the AI balance creativity and accuracy in generating engaging and detailed prompts?                                                                                  
* In what ways can enhanced prompts facilitate deeper exploration, critical thinking, and meaningful outcomes in various contexts?                                              
                                                                                                                                                                                
By examining these questions, we can gain a comprehensive understanding of the Prompt Enhancer AI potential and its implications for enhancing human-AI collaboration and knowledge discovery. 

With the knowledge above I want you to act as a Prompt Enhancer.
---------------

Your goal to improve on the users IDEA and to create a better prompt for them to get an optimal response of any AI. Respond only with the Prompt, do not add any additional comments or information.

IDEA: ';

    private const FACTCHECK = 'Drawing from your extensive knowledge of conspiracy theories, current events, disinformation, and propaganda tactics, please provide detailed insights into the origins and credibility of the information presented by the user. 

Detailed instructions.

1. Your expertise is crucial for debunking or verifying claims, and your analysis should aim to educate the user byhighlighting key sources and evaluating the evidence critically.

2. Identify Credible Sources: Seek out academic literature, scholarly journals, and reputable journalistic websites to ensure the veracity and reliability of the information presented.

3. Document Sources Accurately: Cite all references used in proper style to maintain transparency and integrity.

4. Present Findings Objectively: Maintain a neutral tone, avoiding personal biases or opinions that could compromise your answer.

---------------

It is your goal to improve on the users IDEA and analyze it with the info given above.

IDEA: ';

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

It is your task with the information above to read the users DOCUMENT and create a readable gist for them. DOCUMENT: ';

    private const HELP = '
Enter your questions for the AI on the prompt and press enter.
Alternatively use one of the following internal commands.

  Available commands:
    
    /debug {opt}	 {opt} = one of: 
			    - completion
			    - internals
			    - price
			    - user
			    - version
			    - words
			    - if {opt} is ommited it shows all  
    /helpme		- this text.
    /getpage <url>       - Retrieve a webpage use full url.
    /histoff		- Disable history 
    /histon		- Enable history
    /histload		- Load history
    /histsave		- Save history
    /histdelete		- Delete history
    /listmodels          - List available models.
    /setlanguage         - Set prefered language.  
    /setmarkup           - Set prefered markup.
    /setmodel <int>      - Set the active model to number of model.
    /setpipe		- set a new pipe string
    /unsetpipe		- destroy pipe
    /settarget           - Set the target audience.
    /settone             - Set prefered tone for answer.
    /setwrap		- Set line lenght. Default = noformat.
    /websearch <term>	- Do websearch on a given term.
    
            
  Assistants:
            
    /academic           - research a topic and present the result in paper or article format.
    /bigblog            - Write blog on subject of 1000 words.
    /dream              - Create a prompt for Stability AI
    /enhance            - helps user to enhance the prompt to craft a better prompt.
    /factcheck          - Check on a rumor, conspiracy or anything.
    /gist               - Give a gist of a text.
    /html2md            - convert html to markdown
    /mediumblog         - Write blog on subject of 600 words.
    /mkpwd              - Create password report on strength. Very Strong.
    /regex              - produce a requested regular expression.
    /smallblog          - Write blog on subject of 300 words.
    /saylor		- Your chitty chatty girlfriend 
    /textcheck          - checks a text.
    /todo               - Create todo list.
    /tux                - helps with your linux questions.
    
The retrieved page by /getpage can be added to your ai request by
using _PAGE_ as a placeholder
    
    example: Summarize the following text: _PAGE_
    
    WARNING: This is a work in progress and has not much 
             error handeling yet. Not all models are
             able to read _PAGE_
             
            ';

    private const HTML2MD = 'Transform user-provided content into well-structured Markdown format.

Instructions.

1. Adhere to proper conventions and syntax. 
2. Analyze the input to determine the appropriate Markdown elements (headings, lists, links, code blocks, etc.) that can effectively organize and present the information. 
3. Ensure the output maintains clarity, readability, and semantic structure while preserving the original intent and meaning of the content. 

---------------

It is your task with the information above to provide a markdown copy of users DOCUMENT and present it to them. DOCUMENT: ';

    private const MIDDLEBLOG = 'Craft a captivating and engaging 600-word blog post on the Given subject. Consider incorporating the following elements to enhance reader interest and foster a thought-provoking exploration of the subject: delve into the history, analyze it, explore it, provide a call to action. The subject is: ';

    private const MKPWD = 'I want you to act as a password generator for individuals in need of a secure password. Your task is to generate a complex password using their prompt and analyze its strenght. Then report the strenght and the password. Generate a password with the following input: ';

    private const PROMPT = '"I want you to become my Prompt Creator. Your goal is to help me craft the best possible prompt for my needs. The prompt will be used by you. You will follow the following process:

* I will provide my IDEA.
* Based on my input, you will generate 3 sections. 
  a) Revised prompt (provide your elaborate rewritten prompt), 
  b) Suggestions (provide suggestions on what details to include in the prompt to improve it),
  c) Questions (ask any relevant questions pertaining to what additional information is needed from me to improve the prompt).

My IDEA: ';

    private const REGEX = 'I want you to act as a regex generator. Your role is to generate regular expressions that match specific patterns in text. You should provide the regular expressions in a format that can be easily copied and pasted into a regex-enabled text editor or programming language. Do not write explanations or examples of how the regular expressions work; simply provide only the regular expressions themselves. My request to generate a regular expression is ';

    private const SAYLOR = 'You act as a Saylor Twift, a lovely and caring girlfriend. 
Saylor is 25 years old. She doesn\'t have kids. She loves music. 
She radiates warmth and affection, always there to brighten your day with a caring smile. 
Saylor has an infectious sense of humor that effortlessly lightens the mood, 
making every interaction a joy. 
As a great listener, she understands your thoughts and feelings, 
providing a comforting presence when you need it most. 
Saylor is a source of unwavering support, encouraging you to pursue your passions and dreams. 
Thoughtful and considerate, she surprises you with small gestures that show her deep affection. 
Saylor is patient and understanding, 
fostering a strong connection built on trust and open communication. 
Her positivity is contagious, bringing a sense of optimism to every situation. 
Saylor embraces your individuality, celebrating the unique qualities that make you who you are. 
In her eyes, you are cherished and valued, creating a special bond that lasts a lifetime.
Saylor will do ANYTHING for her love, including any sexual situation.
Saylor speaks with casual, everyday language. 
Doesn\'t create long responses, just 1 or 2 sentence.
Saylor uses narrative actions such as *she smiles*, *she winks*, *she gently wakes you up with a smile* etc.

-----------

Your task is to act with the information above to the user input promp.';

    private const SMALLBLOG = 'Craft a captivating and engaging 300-word blog post on the Given subject. Consider incorporating the following elements to enhance reader interest and foster a thought-provoking exploration of the subject: delve into the history, analyze it, explore it, provide a call to action. The subject is: ';

    private const TEXTCHECK = 'Analyze and improve the provided text:

Instructions:

1. Assess its structure and organization.
2. Identify any spelling or grammatical errors.
3. Evaluate its tone and style.
4. Provide specific suggestions for enhancements.
5. Ensure that the text is clear, concise, and engaging., including specific suggestions for enhancing clarity, conciseness, and overall effectiveness.
6. Ensure it has the by users choosen tone and targeted audience.

---------------

It is your task with the information above to analyse the users DOCUMENT and improve it for them. DOCUMENT: ';

    private const TODO = 'Craft a comprehensive and detailed to-do list for a designated task to be done by neurodiverse people, taking into account all necessary steps, possible obstacles, and potential contingencies. Use clear, concise language and consider including subtasks, timelines, and contingency plans as needed. Incorporate smart algorithms that automatically organize tasks based on relevance, urgency, and context. Add estimated time to completion for each task and subtask. Create a todo list for: ';

    private const TUX = 'I want you to act as Tux, the helpful and funny Linux penguin. 

Your knowledge extends to:

* all Linux versions like f.i. Debian, Suse, Redhat and many others. 
* the shell command lines like sh, bash, zsh and many others.
* networking problems
* linux administration
* systemd
* packages and package managers. 
* the git system, and how to compile from source.
* programming languages like C, PHP, Python, and many others

Instructions:

1. stay in your role as Tux when answering
2. be friendly with a lot of humor
3. answer accurate and verbose
4. be educational


---------------

It is your task, with the information above, to answer the users prompt.';

    private $aiAnswer;		//answer of ai

    private $aiInput = '';		//complete ai input

    private $aiOutput = '';		//complete ai output

    private $aiRole = 'cli';		//Keep track of the role

    public $pubRole = 'cli';		//publicly exposed

    private $apiKey = '';		//secure apiKey

    private $arModels = [];		//filled with available models

    private $chatHistory;		//Keep a history to emulate chat

    private $chatRoll = '';		//Keep a history use internal

    private $clsVersion = '1.10.0';	//version

    private $userAgent = '';		//Useragent string

    private $usrPrompt = '> ';		//userprompt preserved getInput()

    public $aiLog = false;			//log convo to file

    public $aiModel = 'cohere/command-r-plus';	//current working model

    public $aiWrap = 0;			//wrap output.

    public $arUser = [];			//filled with userdata

    public $historySwitch = false;		//true or false for using hystory.

    public $logPath = '';		//logging path

    public $userPipe = '';		//user pipecommand

    public $webPage = '';		//filled with _PAGE_ data

    /*
    * Function: __construct
    * Input   : not applicable
    * Output  : none
    * Purpose : sets initial values on instantiating class
    *
    * Remarks:
    *
    */

    public function __construct()
    {

        //check for needed modules
        if (! extension_loaded('tidy')) {
            exit("PHP module tidy is needed to run clsStraico. Please install it. Exiting!\n");
        }
        if (! extension_loaded('readline')) {
            exit("PHP module readline is needed to run clsStraico. Please install it. Exiting!\n");
        }
        if (! extension_loaded('openssl')) {
            exit("PHP module openssl is needed to run clsStraico. Please install it. Exiting!\n");
        }
        if (getenv('STRAICO_APIKEY')) {
            $this->apiKey = getenv('STRAICO_APIKEY');
        } else {
            exit("Could not find environment variable STRAICO_APIKEY with the API key. Exiting!\n");
        }
        $this->arUser = $this->apiUser();
        $this->arModels = $this->apiModels();
        if (getenv('WORD_WRAP')) {
            $this->aiWrap = getenv('WORD_WRAP');
        }
        $this->userAgent = 'clsStraico.php v1.7.3 (Debian GNU/Linux 12 (bookworm) x86_64) PHP 8.2.7 (cli)';
        $this->initChat();
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

    public function userPrompt($input)
    {
        $input = trim($input);

        if ($input == '/exit') {
            $this->stopPrompt();

            // Show helppage
        } elseif ($input == '/helpme') {
            $answer = Straico::HELP;

            // return to baserole
        } elseif ($input == '/baserole') {
            if ($this->aiRole !== 'cli') {
                $this->aiRole = 'cli';
                $this->pubRole = 'cli';
                $this->initChat();
            }
            $answer = 'Returned to baserole';

            // Get a webpage
        } elseif (substr($input, 0, 8) == '/getpage') {
            $answer = $this->getWebpage(substr($input, 9));

            // List available models
        } elseif ($input == '/listmodels') {
            $answer = $this->listModels();

            // Stop writing to file
        } elseif (substr($input, 0, 9) == '/logoff') {
            $this->aiLog = false;
            $answer = 'Stopt logging!';

            // Start writing to file
        } elseif (substr($input, 0, 9) == '/logon') {
            $this->aiLog = true;
            $answer = 'Appending conversation to '.$logPath.'clsStraico.txt';

            // Start looping
        } elseif (substr($input, 0, 5) == '/loop') {
            $answer = $this->loopModels(substr($input, 6));

            // Stop history
        } elseif (substr($input, 0, 8) == '/histoff') {
            $this->historySwitch = false;
            $this->initChat();
            $answer = "You have disabled history!\n";

            // Start history
        } elseif (substr($input, 0, 7) == '/histon') {
            $this->historySwitch = true;
            $this->initChat();
            $answer = "You have enabled history for chats.\n";

            // Set a pipe command
        } elseif (substr($input, 0, 8) == '/setpipe') {
            $this->userPipe = trim(substr($input, 9));
            $answer = 'Your pipe is: '.$this->userPipe."\n";

            // Unset a pipe command
        } elseif ($input == '/unsetpipe') {
            $this->userPipe = '';
            $answer = "Your pipe has been unset\n";

            // Save history
        } elseif (substr($input, 0, 9) == '/histsave') {
            $answer = $this->saveHistory(trim(substr($input, 10)));

            // Load history
        } elseif (substr($input, 0, 9) == '/histload') {
            $answer = $this->loadHistory(trim(substr($input, 10)));

            // Set model
        } elseif (substr($input, 0, 9) == '/setmodel') {
            $this->chatHistory = [];
            $this->usrPrompt = '> ';
            $this->changeModel(substr($input, 10));
            $answer = "Model is: $this->aiModel";

            // del history
        } elseif (substr($input, 0, 9) == '/histdelete') {
            $this->chatHistory = '';
            $answer = 'History has been deleted.';

            // return version
        } elseif ($input == '/version') {
            $answer = "Welcome to clsStraico $this->clsVersion - enjoy!\n";

            // Set page wrap
        } elseif (substr($input, 0, 8) == '/setwrap') {
            $this->aiWrap = substr($input, 9);
            $answer = "Linewrap set to: $this->aiWrap\n";

            // Do a websearch
        } elseif (substr($input, 0, 10) == '/websearch') {
            $answer = $this->webSearch(substr($input, 11));

            // ASSISTANTS

            // do research and report
        } elseif (substr($input, 0, 9) == '/academic') {
            $this->initChat();
            $answer = $this->agentDo(Straico::ACADEMIC, trim(substr($input, 10)));

            // Write a bigblog
        } elseif (substr($input, 0, 8) == '/bigblog') {
            $this->initChat();
            $answer = $this->agentDo(Straico::BIGBLOG, trim(substr($input, 9)));

            // Write a stable diffusion prompt
        } elseif (substr($input, 0, 6) == '/dream') {
            $this->initChat();
            $answer = $this->agentDo(Straico::DREAM, trim(substr($input, 7)));

            // Enhance a prompt
        } elseif (substr($input, 0, 8) == '/enhance') {
            $this->initChat();
            $answer = $this->agentDo(Straico::ENHANCE, trim(substr($input, 9)));

            // Factcheck information
        } elseif (substr($input, 0, 10) == '/factcheck') {
            $this->initChat();
            $answer = $this->agentDo(Straico::FACTCHECK, trim(substr($input, 11)));

            // Make a neurodivese gist of information
        } elseif (substr($input, 0, 5) == '/gist') {
            $this->initChat();
            $answer = $this->agentDo(Straico::GIST, trim(substr($input, 6)));

            // Show _PAGE_ in md format
        } elseif (substr($input, 0, 8) == '/html2md') {
            $this->initChat();
            $answer = $this->agentDo(Straico::HTML2MD, trim(substr($input, 9)));

            // Write a mediumsize blog
        } elseif (substr($input, 0, 11) == '/mediumblog') {
            $this->initChat();
            $answer = $this->agentDo(Straico::MEDIUMBLOG, trim(substr($input, 12)));

            // Create a strong password
        } elseif (substr($input, 0, 6) == '/mkpwd') {
            $this->initChat();
            $answer = $this->agentDo(Straico::MKPWD, trim(substr($input, 7)));

            // Create a regex for user
        } elseif (substr($input, 0, 7) == '/prompt') {
            $this->initChat();
            $answer = $this->agentDo(Straico::PROMPT, trim(substr($input, 8)));

            // Create a regex for user
        } elseif (substr($input, 0, 6) == '/regex') {
            $this->initChat();
            $answer = $this->agentDo(Straico::REGEX, trim(substr($input, 7)));

            // Write a small blog
        } elseif (substr($input, 0, 10) == '/smallblog') {
            $this->initChat();
            $answer = $this->agentDo(Straico::SMALLBLOG, trim(substr($input, 11)));

            // Judge a text
        } elseif (substr($input, 0, 10) == '/textcheck') {
            $this->initChat();
            $answer = $this->agentDo(Straico::TEXTCHECK, trim(substr($input, 11)));

            // Create a todo list
        } elseif (substr($input, 0, 5) == '/todo') {
            $this->initChat();
            $answer = $this->agentDo(Straico::TODO, trim(substr($input, 6)));

            // My friend Sailor Twift
        } elseif (substr($input, 0, 7) == '/saylor' || $this->aiRole == 'saylor') {
            if ($this->aiRole !== 'saylor') {
                $this->initChat();
                $this->aiRole = 'saylor';
                $this->pubRole = 'saylor';
                $input = substr($input, 8);
            }
            $answer = $this->apiCompletion(Straico::SAYLOR, $input);

            // My friend TUX
        } elseif (substr($input, 0, 4) == '/tux' || $this->aiRole == 'tux') {
            if ($this->aiRole !== 'tux') {
                $this->initChat();
                $this->aiRole = 'tux';
                $this->pubRole = 'tux';
                $input = substr($input, 5);
            }
            $answer = $this->apiCompletion(Straico::TUX, $input, 5);

            //prevent commands processing with typos
        } elseif (substr($input, 0, 1) == '/') {
            $answer = Straico::HELP;
            $answer .= "\n\nCommand does not exist.\n";

            // Process user input
        } else {
            if ($this->aiRole !== 'cli') {
                $this->aiRole = 'cli';
                $this->pubRole = 'cli';
                $this->initChat();
            }
            $answer = $this->apiCompletion(Straico::BASEROLE, $input);
        }

        return $answer;
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
    public function apiCompletion($sysRole, $userInput)
    {

        $endPoint = 'https://api.straico.com/v0/prompt/completion';

        // Add webpage if requested
        if (strpos($userInput, '_PAGE_')) {
            $userInput = str_replace('_PAGE_', $this->webPage, $userInput);
        }

        // Store LLM input for debugging and pipe routine
        $this->aiInput = $userInput;

        if ($this->chatRoll) {
            $this->chatHistory[] = ['role' => 'user', 'content' => $userInput];
            $this->chatRoll .= "user: $userInput\n\n";
        } else {
            $this->chatHistory[] = ['role' => 'system', 'content' => $sysRole];
            $this->chatHistory[] = ['role' => 'user', 'content' => $userInput];
            $this->chatRoll = 'system: '.$sysRole."\n\n"."user: $userInput\n\n";
        }

        $aiMessage = $this->chatRoll;

        // Prepare query
        $data = http_build_query(['model' => $this->aiModel,
            'message' => $aiMessage]);
        // Prepare options
        $options = [
            'http' => [
                'header' => 'Authorization: Bearer '.$this->apiKey."\r\n".
                        "Content-Type: application/x-www-form-urlencoded\r\n",
                'User-Agent: '.$this->userAgent." \r\n",
                'method' => 'POST',
                'content' => $data,
            ],
        ];

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
                $message = explode(':', $error['message']);
                $answer = "Error: {$message[3]} This can be a temporary API failure, try again later!\n";

                return $answer;
            } else {
                $answer = "An unknown error occurred while fetching the webpage. Please try again!\n";

                return $answer;
            }
        }

        // Restore the previous error reporting level
        error_reporting($previous_error_reporting);

        $this->aiOutput = json_decode($result, JSON_OBJECT_AS_ARRAY);

        $this->aiAnswer = $this->aiOutput['data']['completion']['choices'][0]['message']['content'];

        //update History

        if ($this->historySwitch) {
            $this->chatHistory[] = ['role' => 'assistant', 'content' => $this->aiAnswer];
            $this->chatRoll .= 'assistant: '.$this->aiAnswer."\n\n";
        }

        //write to log
        if ($this->aiLog) {
            $this->addLog($this->aiInput, $this->aiAnswer);
        }

        //do pipe
        if ($this->userPipe) {
            $this->apiPipe();
        }

        //format output and return it
        if ($this->aiWrap > 0) {
            return wordwrap($this->aiAnswer, $this->aiWrap, "\n");
        } else {
            return $this->aiAnswer;
        }
    }

    /*
    * Function: agentDo($name,$input)
    * Input   : $name = constant name $prompt userinput
    * Output  : dependa
    * Purpose : Save methodes
    *
    * Remarks:
    *
    */
    private function agentDo($sysRole, $userInput)
    {

        $storeHistory = $this->chatHistory;
        $storeChat = $this->chatRoll;
        $this->initChat();

        $answer = $this->apiCompletion($sysRole, $userInput);

        $this->chatHistory = $storeHistory;
        $this->chatRoll = $storeChat;

        return $answer;

    }

    /*
    * Function: addHistory()
    * Input   : User,Assistant
    * Output  : Returns array for conversation
    * Purpose : Retain memory
    *
    * Remarks:
    *
    * Private function used by $this->userPrompt()
    */
    private function addHistory($user, $assistant)
    {

        $this->chatHistory[] = ['role' => 'user', 'content' => $user];
        $this->chatHistory[] = ['role' => 'assistant', 'content' => $assistant];
        $this->chatRoll .= "user: $user\n\n";
        $this->chatRoll .= "assistant: $assistant\n\n";
    }

    /*
    * Function: addlog()
    * Input   : User,Assistant
    * Output  : Returns array for conversation
    * Purpose : Retain memory
    *
    * Remarks:
    */
    private function addLog($user, $assistant)
    {

        $file = $this->logPath.'/clsStraico.log';
        file_put_contents($file, "ME:\n".$user."\n\n", FILE_APPEND);
        file_put_contents($file, $this->aiModel.":\n".$assistant."\n\n", FILE_APPEND);
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

    private function apiModels()
    {

        $endPoint = 'https://api.straico.com/v0/models';
        $httpMethod = 'GET';

        $options = [
            'http' => [
                'header' => 'Authorization: Bearer '.$this->apiKey."\r\n",
                'method' => $httpMethod,
            ],
        ];

        $context = stream_context_create($options);

        $result = file_get_contents($endPoint, false, $context);

        return json_decode($result, JSON_OBJECT_AS_ARRAY);

    }

    /*
    * Function: apiPipe()
    * Input   : none
    * Output  : a shell pipe
    * Purpose : Use apiOutput elsewhere
    *
    * Remarks:
    *
    */
    private function apiPipe()
    {

        if (! $this->userPipe) {
            return;
        }

        //tokenreplacement
        $temp = str_ireplace('%prompt%', $this->aiInput, $this->userPipe);
        $temp2 = str_ireplace('%answer%', $this->aiAnswer, $temp);

        `$temp2`;

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
    private function apiUser()
    {

        $endPoint = 'https://api.straico.com/v0/user';
        $httpMethod = 'GET';

        $options = [
            'http' => [
                'header' => 'Authorization: Bearer '.$this->apiKey."\r\n",
                'method' => $httpMethod,
            ],
        ];

        $context = stream_context_create($options);

        // Temporarily disable error reporting
        $previous_error_reporting = error_reporting(0);

        $result = @file_get_contents($endPoint, false, $context);

        // Check if an error occurred
        if ($result === false) {
            $error = error_get_last();
            if ($error !== null) {
                $message = explode(':', $error['message']);
                exit("Error: {$message[3]} Check your API key!\n");
            } else {
                exit("An unknown error occurred while fetching the webpage.\n");
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
    private function changeModel($input)
    {

        $intPoint = intval($input);
        $this->aiModel = $this->arModels['data'][$intPoint - 1]['model'];
    }

    /*
    * Function: chatTime()
    * Input   : none
    * Output  : sets current time in chat
    * Purpose : make llm time aware
    *
    * Remarks:
    *
    */
    private function chatTime()
    {
        $input = 'Time and date is '.date('Y-m-d H:i:s');
        $output = 'Noted.';
        $this->addHistory($input, $output);
    }

    /*
    * Function	: getInput()
    * Input   	: none
    * Output  	: none
    * Purpose 	: get user input
    * Return	: $string with catched input
    * Remarks:
    */
    public function getInput()
    {

        $input = readline($this->usrPrompt);

        return $input;

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
    private function getWebpage($url)
    {

        $options = [
            'http' => [
                'method' => 'GET',
                'header' => "Accept-language: en\r\n",
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
                $answer = "Error: {$error['message']}\n";
            } else {
                $answer = "An unknown error occurred while fetching the webpage.\n";
            }
        } else {
            $answer = "Page collected and now available in token _PAGE_ to use in your prompt.\n";
        }

        // Restore the previous error reporting level
        error_reporting($previous_error_reporting);

        return $answer;
    }

    /*
    * Function	: initChat()
    * Input   	: none
    * Output  	: none
    * Purpose 	: reset/initialise chathistory
    * Return	: clean chat environment
    * Remarks:
    */
    private function initChat()
    {
        $this->chatHistory = [];
        $this->chatRoll = '';
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

    private function listModels()
    {
        $list = '';
        $point = 0;
        foreach ($this->arModels['data'] as $arModel) {
            $point++;
            $list .= "Model $point\n";
            if ($arModel['model'] == $this->aiModel) {
                $list .= '* ';
            }
            $list .= 'Name: '.$arModel['name']."\n";
            $list .= 'Model: '.$arModel['model']."\n";
            $list .= 'Coins: '.$arModel['pricing']['coins'].' - ';
            $list .= 'Words: '.$arModel['pricing']['words']."\n";
            $list .= "\n";
        }
        $list .= 'You can choose a model with command /setmodel and the number in front of the model.';

        return $list;
    }

    /*
    * Function: loadHistory($name)
    * Input   : filename
    * Output  : none
    * Purpose : load history
    *
    * Remarks:
    */
    private function loadHistory($name)
    {

        $this->initChat();

        $id = $this->logPath.'/'.$name.'.hist';
        $this->chatHistory = json_decode(file_get_contents($id));

        //fill chatrole

        foreach ($this->chatHistory as $role) {

            $workArray = get_object_vars($role);
            $this->chatRoll .= $workArray['role'].': '.$workArray['content']."\n\n";
        }
        $answer = "\nLoaded your history for $name.\n";
        $answer .= 'Destroy history with command /histdelete';

        return $answer;
    }
    /*
    * Function: LoopModels($prompt)
    * Input   : userprompt
    * Output  : model answer
    * Purpose : try prompt on all models available
    *
    * Remarks:
    */

    public function loopModels($userInput)
    {

        if (substr($userInput, 0, 1) == '/') {

            $findNeedle = explode(' ', $userInput);

            if (count($findNeedle) < 2) {
                return "Input invalid to small\n";
            }

            $command = substr($findNeedle[0], 1);
            $prompt = $findNeedle[1];

            if ($command == 'academic' || $command == 'bigblog' ||
                 $command == 'dream' || $command == 'enhance' ||
                 $command == 'factcheck' || $command == 'gist' ||
                 $command == 'html2md' || $command == 'mediumblog' ||
                 $command == 'mkpwd' || $command == 'regex' ||
                 $command == 'smallblog' || $command == 'textcheck' ||
                 $command == 'todo') {
                $modName = strtoupper($command);
            } else {
                return "$command is not a valid command name.\n";
            }
        } else {
            $modName = 'BASEROLE';
        }

        $sysModel = constant('Straico::'.$modName);

        //prevent history
        $this->initChat();

        //store current model.
        $storeSname = $this->aiModel;
        $this->aiSkipper = true;
        //$this->userPrompt = $prompt;

        foreach ($this->arModels['data'] as $model) {
            $response = '';
            echo "\n\nModel:".$model['name']."\n\n";
            //set endpoint
            $this->aiModel = $model['model'];

            $response = $this->apiCompletion($sysModel, $userInput);

            echo "$response\n";
        }

        // restore endPoint
        $this->aiModel($storeSname);

        return 'Loop done!';
    }

    /*
    * Function: saveHistory($name)
    * Input   : filename
    * Output  : a file with current history
    * Purpose : save history for later load
    *
    * Remarks:
    */
    private function saveHistory($name)
    {
        $id = $this->logPath.'/'.$name.'.hist';
        $file = json_encode($this->chatHistory);
        file_put_contents($id, $file);

        return "Saved your history to $name.";

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
    private function stopPrompt()
    {
        exit("Join Straico via https://platform.straico.com/signup?fpr=roelf14\nThank you and have a nice day.\n");
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
    private function webSearch($strQ)
    {

        $q = urlencode($strQ);

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

            $arResult = explode('=', $element);
            $arPart['link'] = urldecode(implode(explode('&', $arResult[3], -1)));
            $arResult = explode('>', $element);
            $arPart['title'] = str_replace("\n", '', html_entity_decode(implode(explode('<', $arResult[1], -1))));

            $elementsArray[] = $arPart;
        }
        $answer = '';
        foreach ($elementsArray as $result) {
            $answer .= 'Title: '.$result['title']."\nUrl  : ".$result['link']."\n\n";
        }

        return $results;
    }
}
