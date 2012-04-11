<?php
namespace xhtml;
/**
 * The HTML Link Element (\<link>) specifies relationships between the current 
 * document and other documents. 
 * 
 * Possible uses for this element include defining a relational framework for 
 * navigation and linking the document to a style sheet.
 * 
 * @example {
 *  <link href="style.css" rel="stylesheet" type="text/css" media="all">
 * }
 *
 * @example {
 *  <link href="default.css" rel="stylesheet" type="text/css" title="Default Style">
 *  <link href="fancy.css" rel="alternate stylesheet" type="text/css" title="Fancy">
 *  <link href="basic.css" rel="alternate stylesheet" type="text/css" title="Basic">    
 * }
 *
 * @link http://htmldog.com/reference/htmltags/link/
 * @link http://developer.mozilla.org/en/HTML/Element/link/
 */
class Link extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'link';

    /**
     * This attribute specifies the URL of the linked resource. 
     * 
     * A URL might be absolute or relative.
     * 
     * @xmlProperty href
     * @var String
     */
    protected $strHref;

    /**
     * This attribute indicates the language of the linked resource. 
     * It is purely advisory. 
     * 
     * Allowed values are determined by BCP47 for HTML5 and by RFC1766 for HTML 4. 
     * Use this attribute only if the href attribute is present.
     * 
     * @xmlProperty hreflang
     * @var String
     */
    protected $strHrefLang;
    
    /**
     * This attribute specifies the media which the linked resource applies to. 
     * 
     * Its value must be a media query. This attribute is mainly useful when 
     * linking to external stylesheets by allowing the user agent to pick the 
     * best adapted one for the device it runs on.
     * 
     * @xmlProperty media
     * @var String
     */
    protected $strMedia;
    
    /**
     * This attribute names a relationship of the linked document to the 
     * current document. 
     * 
     * The attribute must be a space-separated list of the link types values. 
     * The most common use of this attribute is to specify a link to an external 
     * style sheet: the rel attribute is set to stylesheet, and the href 
     * attribute is set to the URL of an external style sheet to format the page. 
     * 
     * WebTV also supports the use of the value next for rel to preload the next 
     * page in a document series.
     * 
     * @xmlProperty rel
     * @xmlMultivalues String[]
     * @xmlValueSeparated " "
     * @var String
     */
    protected $strRel;
    
    /**
     * This attribute defines the sizes of the icons for visual media contained 
     * in the resource. 
     * 
     * It must be present only if the rel contains the icon link types value. 
     * It may have the following values:
     * <ul>
     *  <li>
     *      any, meaning that the icon can be scaled to any size as it is in a 
     *      vectorial format, like image/svg.
     *  </li>
     *  <li>
     *      a white-space separated list of sizes, each in the format 
     *      \<width in pixels>x\<height in pixels> or 
     *      \<width in pixels>X\<height in pixels>. 
     * 
     *      Each of these size must be contained in the resource.
     *  </li>
     * </ul>
     * 
     * @xmlProperty sizes
     * @var String
     */
    protected $strSizes;
    
    /**
     * This attribute is used to define the type of the content linked to. 
     * 
     * The value of the attribute should be a MIME type such as text/html, 
     * text/css, and so on. 
     * 
     * The common use of this attribute is to define the type of style sheet 
     * linked and the most common current value is text/css, which indicates a 
     * Cascading Style Sheet format.
     * 
     * @xmlProperty type
     * @var String
     */
    protected $strType;
    
}
?>