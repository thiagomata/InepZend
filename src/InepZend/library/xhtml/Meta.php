<?php
namespace xhtml;
/**
 * The HTML Meta Element (\<meta>) represents any metadata information which cannot 
 * be represented using one of the another meta-related element 
 * ( \<base>, \<link>, \<script>, \<style> or \<title>). 
 * 
 * According to the attributes set, the kind of metadata can be one of the following:
 *  <ul>
 *      <li>
 *          if the name is set, a document-level metadata, applying to the whole page;
 *      </li>
 *      <li>
 *          if the http-equiv is set, a pragma directive, i.e. information given to 
 *          the webserver on how the webpage should be served;
 *      </li>
 *      <li>
 *          if the charset is set, a charset declaration, i.e. the charset used 
 *          for the serialized-form of the webpage; [HTML5]
 *      </li>
 *  </ul>
 *  
 * @example {
 *  	<meta charset="utf-8">
 * }
 *
 * @link http://htmldog.com/reference/htmltags/meta/
 * @link http://developer.mozilla.org/en/HTML/Element/meta/
 */
class Meta extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'meta';

    /**
     * This attribute declares the character encoding used of the page. 
     * 
     * It can be locally overriden using the lang attribute on any element. 
     * This attribute is a literal string and must be one of the preferred MIME 
     * name for a character encoding as defined by the IANA.
     * 
     * @see http://www.iana.org/assignments/character-sets
     * 
     * @note {
     *  The declared character set must match the one of the page. It is pointless, 
     *  and will lead to a poor user experience, to declare an erroneous character set.
     * }
     * 
     * @note {
     *  This \<meta> element must be inside the \<head> element and within the 512 
     *  first bytes of the page, as some browsers only look at these first bytes 
     *  before choosing a character set for the page.
     * }
     * 
     * @note {
     *  This \<meta> element is only a part of the algorithm to determine the character 
     *  set of a page that browsers apply. Especially, the HTTP Content-Type header and 
     *  any BOM elements have precedence over this element.
     * }
     * 
     * @note {
     *  It is good practice, and strongly recommended, to define the character set using 
     *  this attribute. If no character set is defined for a page, several cross-scripting 
     *  techniques may become practical to harm the page user, like the UTF-7 fallback 
     *  cross-scripting technique. Always setting this meta will protect against these risks.
     * }
     * 
     * @note {
     *  This \<meta> element is a synonym for the pre-HTML5 
     *  \<meta http-equiv="Content-Type" content="text/html; charset=IANAcharset"> 
     *  where IANAcharset corresponds of the value of the equivalent charset attribute. 
     *  This syntax is still allowed, although obsolete and no more recommended.
     * }
     *
     * @note {
     *  Authors are encouraged to use UTF-8
     * }
     * 
     * @xmlProperty charset
     * @var String
     */
    protected $strCharset = 'UTF-8';
    
    /**
     * This attribute defines the name of a document-level metadata. 
     * 
     * It should not be set if one of the attribute itemprop , 
     * http-equiv or charset is also set.
     * 
     * This document-level metadata name is associated with a value, 
     * contained by the content attribute. 
     * 
     * @xmlProperty name
     * @var String
     */
    protected $booAutoPlay = null;

    /**
     * This enumerated attribute defines the pragma that can alter servers and user-agents behavior. 
     * 
     * The value of the pragma is defined using the content and can be one of the following:
     * <del>content-language</del>,<del>content-type</del>,default-style, refresh,<del>set-cookie</del>
     * 
     * @xmlValues [ "default-style" , "refresh" ]
     * @xmlProperty http-equiv
     * @var String
     */
    protected $strHttpEquiv;
    
    /**
     * This attribute gives the value associated with the http-equiv or name attribute, 
     * depending of the context.
     * 
     * @xmlProperty content
     * @var String
     */
    protected $strContent;
    
    /**
     * Set Http Equiv
     */
    public function setHttpEquiv( $strHttpEquiv )
    {
        return $this->magicSetter( 'setHttp-Equiv', $strHttpEquiv );
    }
}
?>