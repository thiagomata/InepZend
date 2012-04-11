<?php
namespace xhtml;
/**
 * Defines the title of a page. You must have a title element to produce a valid 
 * document and it must be placed within the head element.
 * 
 * The HTML Title Element (<title>) defines title of the document, as shown in 
 * the browser's title bar or on the page's tab. It can only contain text.
 * 
 * @link http://htmldog.com/reference/htmltags/title/
 * @link http://developer.mozilla.org/en/HTML/Element/title
 */
class Title extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'title';
    
    protected $arrChildNodesRule = array
    ( 
      'text' => 1  
    );

}
?>