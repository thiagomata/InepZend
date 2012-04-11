<?php
namespace xhtml;
/**
 * 
 * @link http://htmldog.com/reference/htmltags/form/
 * @link http://developer.mozilla.org/en/HTML/Element/form
 */
class Form extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'form';
    
    /**
     * The URI of a program that processes the information submitted via the 
     * form. 
     * 
     * This value can be overridden by a formaction attribute on a 
     * \<button> or \<input> element.
     *
     * @xmlProperty action
     * @var String
     */
    protected $strAction = "";

    /**
     * Indicates whether controls in this form can by default have their values 
     * automatically completed by the browser. 
     * 
     * This setting can be overridden by an autocomplete attribute on an element 
     * belonging to the form. 
     * 
     * Possible values are:
     * 
     *      - off: The user must explicitly enter a value into each field for 
     * every use, or the document provides its own auto-completion method; 
     * the browser does not automatically complete entries.
     * 
     *      - on: The browser can automatically complete values based on values 
     * that the user has entered during previous uses of the form.
     * 
     * @xmlproperty autocomplete
     * @xmlvalues [ "on" , "off" ]
     * @var String
     */
    protected $strAutoComplete = "on";
    
    /**
     * When the value of the method attribute is post, this attribute is the 
     * MIME type of content that is used to submit the form to the server. 
     * 
     * Possible values are:
     *      - application/x-www-form-urlencoded: The default value if the 
     * attribute is not specified.
     * 
     *      - multipart/form-data: Use this value if you are using an <input> 
     * element with the type attribute set to "file".
     * 
     *      - text/plain [HTML5]
     * 
     * @xmlProperty enctype
     * @xmlValues [ "application/x-www-form-urlencoded" , 
     *                   "multipart/form-data" ,
     *                   "text/plain" ]
     * @var String
     */
    protected $strEncType;
    
    /**
     * The HTTP method that the browser uses to submit the form. 
     * 
     * Possible values are:
     *      - post: Corresponds to the HTTP POST method ; 
     * the data from the form is included in the body of the form and is sent to 
     * the server.
     * 
     *      - get: Corresponds to the HTTP GET method; the data from the form are 
     * appended to the action attribute URI, with a '?' as a separator, and the 
     * resulting URI is sent to the server. Use this method when the form has no 
     * side-effects and contains only ASCII characters.
     * 
     * This value can be overridden by a formmethod attribute on a 
     * <button> or <input> element.
     * 
     * @xmlValues [ "post" , "get" ]
     * @xmlProperty method
     * @var String
     */
    protected $strMethod = "get";
    
    /**
     * The name of the form. It must be unique among the forms in a document 
     * HTML5.
     * 
     * @xmlunique
     * @xmlproperty name
     * @var String
     */
    protected $strName;
    
    /**
     * This Boolean attribute indicates that the form is not to be validated 
     * when it is submitted. 
     * 
     * If this attribute is missing (and therefore the form is validated), 
     * this default setting can be overridden by a formnovalidate attribute 
     * on a <button> or <input> element belonging to the form.
     * 
     * @xmlproperty novalidate
     * @var Boolean
     */
    protected $strNoValidate;
    
    protected $arrChildNodesRule = array(
        'fieldset'  => 'n'      ,
        'input'     => 'n'      ,
        'a'         => 'n' 		,
        'abbr' 		=> 'n' 		,
        'address' 	=> 'n' 		,
        'article' 	=> 'n' 		,
        'aside'  	=> 'n' 		,
        'audio'  	=> 'n' 		,
        'b'      	=> 'n' 		,
        'base' 		=> 'n' 		,
        'blockquote' => 'n' 	,
        'br' 		=> 'n' 		,
        'button' 	=> 'n' 		,
        'canvas' 	=> 'n' 		,
        'cite' 		=> 'n' 		,
        'cite' 		=> 'n' 		,
        'code' 		=> 'n' 		,
        'bdo' 		=> 'n' 		,
        'dd' 		=> 'n' 		,
        'del' 		=> 'n' 		,
        'dfn' 		=> 'n' 		,
        'div' 		=> 'n' 		,
        'dl' 		=> 'n' 		,
        'em' 		=> 'n' 		,
        'embed'      => 'n' 	,
        'figure' 	=> 'n' 		,
        'h1' 		=> 'n' 		,
        'h2' 		=> 'n' 		,
        'h3' 		=> 'n' 		,
        'h4' 		=> 'n' 		,
        'h5' 		=> 'n' 		,
        'h6' 		=> 'n' 		,
        'hr' 		=> 'n' 		,
        'i'         => 'n'      ,
        'iframe' 	=> 'n' 		,
        'img' 		=> 'n' 		,
        'ins' 		=> 'n' 		,
        'kbd' 		=> 'n' 		,
        'keygen' 	=> 'n' 		,
        'map' 		=> 'n' 		,
        'mark' 		=> 'n' 		,
        'meter'     => 'n' 		,
        'nav' 		=> 'n' 		,
        'noscript' 	=> '0..1'   ,
        'object' 	=> 'n' 		,
        'ol' 		=> 'n' 		,
        'output' 	=> 'n' 		,
        'p'         => 'n' 		,
        'pre' 		=> 'n' 		,
        'progress' 	=> 'n' 		,
        'q'         => 'n' 		,
        'samp' 		=> 'n' 		,
        'section' 	=> 'n' 		,
        'span' 		=> 'n' 		,
        'strong' 	=> 'n' 		,
        'sub' 		=> 'n' 		,
        'summary' 	=> 'n' 		,
        'sup' 		=> 'n' 		,
        'text' 		=> 'n' 		,
        'time' 		=> 'n' 		,
        'ul' 		=> 'n' 		,
        'var' 		=> 'n' 		,
        'wbr' 		=> 'n'      ,
        'text'      => 'n'
    );

}
?>