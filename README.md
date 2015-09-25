#FeMo IO Backend

Backend for the femo.io webpage

##REST Links

###Pages

Request all Pages that are stored from the server

    GET /pages/
   
Responds with a JSON Array of all pages

    [
        {
            "id":"<page_id>"
            "title": {
                "<lang>":"<lang_title>"
            }
        }
    ]
    
###Page Title
Requests a title of a page in a specific language

    GET /title/:lang/:page_id
    
    lang ... the short language locale
    page_id ... the id of the page, obtained from Pages
    
Responds with a JSON String of the title in the specific language

    "<title>"
    
###Page Content
Requests the content of a page in a specific language

    GET /content/:lang/:page_id
    
    lang ... the short language locale
    page_id ... the if of the page, obtained from Pages
    
Responds with a JSON Object containing the content and format information

    {
        "content":"<content>",
        "format":{
            "source":"<source_format>",
            "output":"<output_format>"
        }
    }

##Installation

Installation of this tool requires the command line tool *composer*. Install the tools dependencies as follows.

    composer install