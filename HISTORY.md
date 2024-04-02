```
/*
 * clsStraico.php © 2024 by Roelfrenkema is licensed under CC BY-NC-SA 4.0. 
 * To view a copy of this license, 
 * visit http://creativecommons.org/licenses/by-nc-sa/4.0/
 * 
 * visit Straico https://platform.straico.com/signup?fpr=roelf14
 */
```

# Updates for testing branch

## Other

**ROADMAP** added a roadmap page to the wiki.
**Bug fixes** plenty as usual

## Version 1.5.0 - released 31-03-24


## Methods

**private function agentDream** provides prompt for the text-to-image model Stable Difussion
**private function agentGist($input)** now wil take input from cli too you will still be able to use \_PAGE\_ as input.
**private function agentTextcheck($input)** new name for judge method. Seem nicer right? 

## Commands

**/userinfo** removed. Use **/debug user** now. 
**/research** changed name to **/academic** to reflect method and prompt.
**/dream** provides prompt for the text-to-image model Stable Difussion
**/textcheck** renames **/judge** and was updated with better prompt.
**/rephrase** was removed as **/textcheck** should fully replace it

## Other

**apikey** - check if apikey is passed and correct. Check in \_-construct as well in Straico::apiUser
**debug user** - removed command /userinfo and added user as option for debug

## Version 1.4.0 - released 31-03-24

Github release
 
## Commands

* **debug** - Get debug info, Optional add completion, internals, price, words or version. If options ommited shows all info. 

 
## Other

* **Changed command /models** to /listmodels for better understanding
* **removed command /completion** see new command debug
* **removed command /version** see new command debug
* **removed command /costs** see new command debug
* **removed command /words** see new command debug
* **removed command /internals** see new command debug

## Version 1.3.0 - released 29-03-24

### Properties

* **private $aiSkipper** - Used to skip user references in some ai calls 
* **private $aiLog** - Used to log output to file

### Methods

* **private function agentEnhancePrompt** - Takes a prompt and tries to improve on it. Ofcause choice of LLM matters.
* **private function agentAcademic** - Do research present in paper
* **private functiom agentRegEx** - Help with the often tedious task of making one. Could probably done by /tux too
* **private function agentPwd** - Help creating a save password
* **private function agentHTML2MD** - gives a markdown presentation of \_PAGE\_


### Commands

* **/enhance** - helps user to enhance the prompt to craft a better prompt.
* **/research** - research a topic and present the result in paper or article format
* **/regex** - produce a requested regular expression
* **/mkpwd** - Create password report on strength. Very Strong.
* **/viewpage** - Show contents of \_PAGE\_
* **/logon** - Write conversation to file
* **/logoff** - Stop writing to file 

### Other

* **wordwrap setting** - will now look for an environment variable WORD_WRAP to be initialized on start. This will aid in setting a fitting wordwrap for different devices.
* **websearch** - added errorhandeling
* **tidy mod** - added test on startup if mod tidy is available. Thanks to Arturo.
* **bugfixes** - too many little nagging things exterminated.

## Version 1.2.0 - released 28-03-24

### Properties:

* **public $aiWrap** - The value of the wrap position for the class. Default 0 = is no wrap.
* **private $aiOutput** - The JASON decoded information returned by the LLM
* **private $aiInput** - The complete input string for the LLM

### Methods:
     
* **private function agentTone** -  Find the right tone for your text. Becomes extremely powerfull in combination with /settone, /settarget and even /setlanguage if you are looking for a translation.
* **private function agentJudge** - Get an opinion on your text. Becomes extremely powerfull in combination with /settone, /settarget and even /setlanguage if you are looking for a translation.
* **private function agentSBlog** - Will return a 300 word test
* **private function agentMBlog** - Will return a 600 word test
* **private function agentBBlog** - Will return a 1000 word test
* **private function debugInternals** - Outputs internals
* **private function debugCompletion** - Outputs the completion info
* **private function debugPrice** - Outputs token costs
* **private function debugWords** - Output information on used words

### Commands:

* **/rephrase {text}** - Rephrase or even translate a text to your liking by combining with /settone /settarget or /setlanguage
* **/judge {text}**    - Judge a text on form tone and spelling
* **/setwrap {int}**   - Set a wordwrap for ai output         
* **/smallblog {subject}** - write a small 300 word blog on subject. Modify output with /settone, /settarget, /setlanguage, /setmarkup.    
* **/mediumblog {subject}** - write a small 600 word blog on subject. Modify output with /settone, /settarget, /setlanguage, /setmarkup.  
* **/bigblog {subject}** - write a small 1000 word blog on subject. Modify output with /settone, /settarget, /setlanguage, /setmarkup.  
* **/completion** - Show completion output
* **/internals** - Show internal variables
* **/price** - Show the token cost
* **/words** - Show words

### Other:

* **removed command /update**, update history can now be found in file HISTORY in download directory.
* **bugfixes** a fuzzy programmer made.
* **documentation** takes a lot of time trying to cut down on that and make it more efficient
* **confirmation feedback** on set set commands
* **default llm** changed to 'google/gemini-pro' for better handling languages

## Version 1.1.0 - released 23-03-25
    
### Properties:

* public $aiLanguage;   //current working language - default English
* public $aiMarkup;     //current markup - default Markdown
* public $aiTone;       //the tone used in answers - default neutral
* public $aiTarget;     //the audience you target - default anybody

   
### Commands
     
* /factcheck <fact>           - Check on a rumor, conspiracy or anything
* /gist                       - Give a gist of page retrieved by getpage
* /tux                        - helps you coding
    
*    /settone <str tone>         - Set prefered tone for answer.
*    /settarget <str audience>   - Set the target audience.
*    /setlanguage <str language> - Set prefered language.  
*    /setmarkup <str markup>     - Set prefered markup.
 
### Other

    * several code changes to facilitate new properties.
    * bugfixes
    * license - See top

## Version 1.0.0 - released 23-03-24

	* cleaned up code of userpromp for better readability
	* added version and update information (see: /gethelp)
	* minor bugfixes
	
';
	}
