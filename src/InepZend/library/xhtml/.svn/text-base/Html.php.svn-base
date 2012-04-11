<?php
namespace xhtml;

/**
 * Meta information.
 * Used to provide information about the HTML page.
 * It must be placed within the head element.
 * 
 * @test {
 *      \test\TestTemplate::loadTemplate( '
 *          <htlm>
 *              <head>
 *                  <title> Short Page </title>
 *              </head>
 *              <body>
 *                  Hello World!
 *              </body>
 *          </html>
 *      ')->getHead()->getTitle()->getText(),
 *      '==',
 *      ' Short Page '
 * }
 *
 * @test {
 *      \test\TestTemplate::loadTemplate( '
 *          <htlm>
 *              <!-- This Kerberos Page should generate a error -->
 *              <head>
 *                  <title> Past </title>
 *              </head>
 *              <head>
 *                  <title> Present </title>
 *              </head>
 *              <head>
 *                  <title> Future </title>
 *              </head>
 *              <body>
 *                  <strong> Guards the gates of Hades </strong>
 *              </body>
 *          </html>
 *      ' ),
 *      'throws',
 *      '\Coruja\Template\CorujaTemplateException'
 * }
 *
 * @link http://htmldog.com/reference/htmltags/html/
 */
class Html extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'html';

    /**
     * a character encoding, as per [RFC2045]
     *
     * @xmlProperty encoding
     * @xmlValues [ "UTF-8" , "ISO-8859-1" , "Windows-1252" ]
     * @var String
     */
    protected $strEncoding;

    /**
     * xmlns is used to define the XML namespace. 
     * The value must be http://www.w3.org/1999/xhtml.
     *
     * @xmlproperty xmlns
     * @var String
     */
    protected $strXmlns = 'http://www.w3.org/1999/xhtml';

    /**
     * Array of Child Nodes Rules
     *
     * @var String[]
     */
    protected $arrChildNodesRule = array(
           'head'		=> '1' 		,
           'body' 		=> '1' 		,
           'text'       => 'n'
    );

    /**
     * Specifies the language of an element.
     *
     * Values can be abbreviations
     * such as en (English), fr (French) or de (German).
     *
     * @xmlproperty lang
     * @var String
     */
    protected $strLanguage = "en";
    
    protected function drawHeader()
    {
        return <<<HEADER
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
HEADER
         . "\n" ;
    }
    public function drawMe( $intDeeper = 0 )
    {
        return $this->drawHeader() . parent::drawMe();
    }
}
?>