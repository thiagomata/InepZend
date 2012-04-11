<?php
namespace xhtml;
/**
 * The main body of an HTML document where all of the content is placed.
 *
 * You must use this element and it should be used just once.
 * It must start immediately after the closing head tag and end directly
 * before the closing html tag.
 *
 * @example {
 *  <html>
 *      <head>
 *          <!-- meta data -->
 *      </head>
 *      <body>
 *          <!-- main content -->
 *          Hello World!
 *      </body>
 *  </htlm>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/body/
 */
class Body extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'body';
    
    protected $arrChildNodesRule = array(
        "p"     => "n" , 
        "h1"    => "n" , 
        "h2"    => "n", 
        "h3"    => "n", 
        "h4"    => "n", 
        "h5"    => "n", 
        "h6"    => "n", 
        "div"   => "n", 
        "pre"   => "n", 
        "canvas"    => "n", 
        "form"    => "n", 
        "address"   => "n", 
        "article"   => "n", 
        "fieldset"  => "n", 
        "ins"       => "n", 
        "iframe"    => "n", 
        "#"    => "n",
        "del"       => "n"       
    );
}
?>