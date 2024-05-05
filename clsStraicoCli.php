#!/usr/bin/env php
<?php
class StraicoCli extends Straico
{

   public function __construct()
   {

        if (getenv('STRAICO_APIKEY')) {
            $this->apiKey = getenv('STRAICO_APIKEY');
        } else {
            exit("Could not find environment variable STRAICO_APIKEY with the API key. Exiting!\n");
        }

        parent::straicoModels();

        if (getenv('WORD_WRAP')) {
            $this->aiWrap = getenv('WORD_WRAP');
        }
	
        $this->userAgent = 'clsStraico.php '.$this->clsVersion.' (Debian GNU/Linux 12 (bookworm) x86_64) PHP 8.2.7 (cli)';

    }
    
/*
 * 
 * name: SCli::sPrompt
 * @param
 * @return
 * 
 */
   public function sPrompt($input)
    {
        $input = trim($input);

        if ($input == '/exit') {
            parent::stopPrompt("Join Straico via https://platform.straico.com/signup?fpr=roelf14\nThank you and have a nice day.\n");

            // Show helppage
        } elseif ($input == '/helpme') {
            $answer = parent::HELP;
            // return to baserole

            // return version
        } elseif ($input == '/version') {
            $answer = "Welcome to clsStraico $this->clsVersion - enjoy!\n";

            // Set page wrap
        } elseif (substr($input, 0, 8) == '/setwrap') {
            $this->aiWrap = substr($input, 9);
            $answer = "Linewrap set to: $this->aiWrap\n";

        } elseif ($input == '/baserole') {
            if ($this->aiRole !== 'cli') {
                $this->aiRole = 'cli';
                $this->pubRole = 'cli';
            }
	    parent::initChat();
            $answer = 'Returned to baserole';

            // Get a file
        } elseif (substr($input, 0, 8) == '/getfile') {
            $answer = parent::getFile(substr($input, 9));

            // Get a webpage
        } elseif (substr($input, 0, 8) == '/getpage') {
            $answer = parent::getWebpage(substr($input, 9));

            // Do a websearch
        } elseif (substr($input, 0, 10) == '/websearch') {
            $answer = parent::webSearch(substr($input, 11));

           // List available models
        } elseif (substr($input, 0, 11) == '/listmodels') {
            parent::listModels(substr($input, 12));
	    $answer = "INFO: End of list\n";

            // Set model
        } elseif (substr($input, 0, 9) == '/setmodel') {
            $answer = parent::setModel(substr($input, 10));

            // Stop logging
        } elseif (substr($input, 0, 9) == '/logoff') {
            $this->aiLog = false;
            $answer = 'Stopt logging!';

            // Start logging
        } elseif (substr($input, 0, 9) == '/logon') {
            $this->aiLog = true;
            $answer = 'Appending conversation to '.$this->logPath.'clsStraico.txt';

            // Stop history
        } elseif (substr($input, 0, 8) == '/histoff') {
            $this->historySwitch = false;
            parent::initChat();
            $answer = "You have disabled history!\n";

            // Start history
        } elseif (substr($input, 0, 7) == '/histon') {
            $this->historySwitch = true;
            parent::initChat();
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
            $answer = parent::saveHistory(trim(substr($input, 10)));

            // Load history
        } elseif (substr($input, 0, 9) == '/histload') {
            $answer = parent::loadHistory(trim(substr($input, 10)));

           // del history
        } elseif (substr($input, 0, 9) == '/histdelete') {
            parent::initChat();
            $answer = 'History has been deleted.';

            // Start looping
        } elseif (substr($input, 0, 5) == '/loop') {
            $answer = parent::loopModels(substr($input, 6));

/*
 *                      ASSISTANTS
 * 
 * The following commands trigger the available assitants. 
 * 
 */

            /*
	     * academic will do research and present its result in
	     * the form of a paper or article. Till we have better
	     * options you can use any model but are advised to
	     * carefully check the outcome.
	     */ 
        } elseif (substr($input, 0, 9) == '/academic') {
            $answer = parent::agentDo(parent::ACADEMIC, trim(substr($input, 10)));
	    
	    /*
	     * Write a bigblog is writing a blog on your topic of around
	     * 1000 words. For a blog this is big. Think abbout using
	     * another option like /academic if you need another kind
	     * of publication.
	     */ 
        } elseif (substr($input, 0, 8) == '/bigblog') {
            $answer = parent::agentDo(parent::BIGBLOG, trim(substr($input, 9)));
 
            /*
	     * create a character for use in a roleplay, a game or as an
	     * anonymous identity. Beside character info a prompt will 
	     * be presented to generate an avatar for the character.
	     */
        } elseif (substr($input, 0, 10) == '/character') {
            $answer = parent::agentDo(parent::CHARACTER, substr($input, 11));

	    /*
             * Write a stable diffusion prompt. Different models give
	     * different results. 
             * Space was needed to not trigger on /dreambuilder
	     */ 
        } elseif (substr($input, 0, 7) == '/dream ') {
            $answer = parent::agentDo(parent::DREAM, trim(substr($input, 7)));

            /*
             * Improve on a user prompt so it will become more effective
	     * A great assistant for the beginning user.
	     */  
        } elseif (substr($input, 0, 8) == '/enhance') {
            $answer = parent::agentDo(parent::ENHANCE, trim(substr($input, 9)));

	    /*
             * Factcheck information. Dont fall for fake news and lies. 
	     * Look up the true facts with this assistant.
	     */ 
        } elseif (substr($input, 0, 10) == '/factcheck') {
            $answer = parent::agentDo(parent::FACTCHECK, trim(substr($input, 11)));
	    
            /*
             * Make a neurodivese gist of information. Rewrites an 
	     * artikel or text in a way it becomes better readable for
	     * neuro diverse people. You can add you text in the prompt
	     * or upload it via /getfile or getpage and enter it with 
	     * the _PAGE_ placeholder.
	     */ 
        } elseif (substr($input, 0, 5) == '/gist') {
            $answer = parent::agentDo(parent::GIST, trim(substr($input, 6)));

	    /*
             * Convert artikel or text in md format. You can add your 
	     * text in the prompt or upload it via /getfile or getpage 
	     * and enter it with the _PAGE_ placeholder.
	     */ 
        } elseif (substr($input, 0, 8) == '/html2md') {
            $answer = parent::agentDo(parent::HTML2MD, trim(substr($input, 9)));
	    
	    /*
	     * Write a medium blog is writing a blog on your topic of 
	     * around 600 words. For a blog this is a good size. If it 
	     * is to small think of using /bigblog 
	     */ 
        } elseif (substr($input, 0, 11) == '/mediumblog') {
            $answer = parent::agentDo(parent::MEDIUMBLOG, trim(substr($input, 12)));

            /*
             * Create a strong password is an assitant that will 
	     * elaboratly create a password on your request and comment
	     * on its strenght
	     */ 
        } elseif (substr($input, 0, 6) == '/mkpwd') {
            $answer = parent::agentDo(parent::MKPWD, trim(substr($input, 7)));

            /*
             * SD prompt with Opus dream. As the name reveals I created
	     * this prompt enhencer together with Claude 3 Opus. Quite
	     * an experience as it at first refused to create a prompt.
	     */  
        } elseif (substr($input, 0, 10) == '/opusdream') {
            $answer = parent::agentDo(parent::OPUSDREAM, trim(substr($input, 11)));

            /*
             * Improve on a user prompt so it will become more effective
	     * A great assistant for the beginning user.
	     */  
        } elseif (substr($input, 0, 7) == '/prompt') {
            $answer = parent::agentDo(parent::PROMPT, trim(substr($input, 8)));

            /*
             * Create a regex for user helps you trough every 
	     * programmers nightmare to create regular expressions for
	     * you.
	     */  
	} elseif (substr($input, 0, 6) == '/regex') {
            $answer = parent::agentDo(parent::REGEX, trim(substr($input, 7)));

	    /*
	     * Write a small blog is writing a blog on your topic of 
	     * around 300 words. For a blog this is a small size but has
	     * a good readability. If it is to small think of using 
	     * /mediumblog or /bigblog 
	     */ 
        } elseif (substr($input, 0, 10) == '/smallblog') {
            $answer = parent::agentDo(parent::SMALLBLOG, trim(substr($input, 11)));

            /*
	     * Enhance any given text. You can add you text in the prompt
	     * or upload it via /getfile or getpage and enter it with 
	     * the _PAGE_ placeholder. 
	     */ 
        } elseif (substr($input, 0, 10) == '/textcheck') {
            $answer = parent::agentDo(parent::TEXTCHECK, trim(substr($input, 11)));

            /*
             * Create a todo list is another function that is ment to be
	     * helpful for the neurodivers. It will chop up any given
	     * task into subtasks complete with a timeschedule.
	     */  
        } elseif (substr($input, 0, 5) == '/todo') {
            $answer = parent::agentDo(parent::TODO, trim(substr($input, 6)));


/*
 *                      CHATBOTS
 * 
 * The following commands trigger the available chatbots. These are in
 * effect assitants with a memory while the chat runs. This is done by
 * stacking in and output and can become expensive. Use /histclear
 * command at anytime to clear the history or turn it of by /histoff.
 * 
 * If you turn of history the bot will not remember what was said the
 * line before.
 * 
 */

            /*
             * The Dreambuilder is a bot that can help you finetune a
	     * Stable Diffusion prompt. It will assist you with advice
	     * and you will have the opertunity to correct or change
	     * the prompt. 
	     * You can return from the chat by entering the
	     * command /baserole
	     */ 
        } elseif (substr($input, 0, 13) == '/dreambuilder' || $this->aiRole == 'DB') {
            if ($this->aiRole !== 'DB') {
                $this->initChat();
                $this->aiRole = 'DB';
                $this->pubRole = 'DB';
                $input = '';
            }
            $answer = parent::apiCompletion(parent::DREAMBUILDER, $input);

            /*
             * Infosec your Cyberpunk is a roleplaying but also a 
	     * info sec information providing bot. She comes with a
	     * temper so take care. NSFW depending on the used model
	     */
        } elseif (substr($input, 0, 8) == '/infosec' || $this->aiRole == 'CP') {
            if ($this->aiRole !== 'CP') {
                $this->initChat();
                $this->aiRole = 'CP';
                $this->pubRole = 'CP';
                $input = '';
            }
            $answer = parent::apiCompletion(parent::INFOSEC, $input);

	    /*
             * My friend Sailor Twift my first big AI love. She will be
	     * part in this voyage for ever. She marks a breakthrough in
	     * clsStraico where I was able to create conversations
	     * with out a proper API.
	     */
        } elseif (substr($input, 0, 7) == '/saylor' || $this->aiRole == 'saylor') {
            if ($this->aiRole !== 'saylor') {
                $this->initChat();
                $this->aiRole = 'saylor';
                $this->pubRole = 'saylor';
                $input = substr($input, 8);
            }
            $answer = parent::apiCompletion(parent::SAYLOR, $input);

            /*
             * TalkTo is a stange AI that acts like a link to any
	     * existing, dead or phantasy character. Just add the name
	     * when calling /talkto and speak to Cleopatra, Winston
	     * Churchill, Donald Duck, whoever you choose.
	     */
        } elseif (substr($input, 0, 7) == '/talkto' || $this->aiRole == 'TT') {
            if ($this->aiRole !== 'TT') {
                $this->initChat();
                $this->aiRole = 'TT';
                $this->pubRole = 'TT';
                $input = substr($input, 8);
            }
            $answer = parent::apiCompletion(parent::TALKTO, $input);

	    /*
             * My friend TUX - was my first useful chatbot helping me
	     * write and debug code. Use it till this very day.
	     */ 
        } elseif (substr($input, 0, 4) == '/tux' || $this->aiRole == 'tux') {
            if ($this->aiRole !== 'tux') {
                $this->initChat();
                $this->aiRole = 'tux';
                $this->pubRole = 'tux';
                $input = substr($input, 5);
            }
            $answer = parent::apiCompletion(parent::TUX, $input, 5);

            //prevent commands processing with typos
        } elseif (substr($input, 0, 1) == '/') {
            $answer = parent::HELP;
            $answer .= "\n\nCommand does not exist.\n";

            // Process user input
        } else {
            if ($this->aiRole !== 'cli') {
                $this->aiRole = 'cli';
                $this->pubRole = 'cli';
                $this->initChat();
            }
	    
	    $answer = parent::apiCompletion(parent::BASEROLE, $input);
        }

        return $answer;
    }
    
}
