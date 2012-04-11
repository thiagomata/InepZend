<?php
namespace xhtml;
/**
 * The HTML Embed Element (\<embed>) [HTML5] represents an integration point for an
 * external application or interactive content (in other words, a plug-in).
 *
 * @example {
 *  <embed type="video/quicktime"
 *          src="movie.mov"
 *          width="640"
 *          height="480"
 *  >
 * }
 *
 * @link http://htmldog.com/reference/htmltags/embed/
 * @link http://developer.mozilla.org/en/HTML/Element/embed
 */
class Embed extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'embed';

    /**
     * The displayed height of the resource, in CSS pixels.
     *
     * @xmlproperty height
     * @var Integer
     */
    protected $intHeight;

    /**
     * The URL of the resource being embedded.
     *
     * @xmlproperty src
     * @var String
     */
    protected $strSrc;

    /**
     * The MIME type to use to select the plug-in to instantiate.
     *
     * @xmlproperty type
     * @var String
     */
    protected $strType;

    /**
     * The displayed width of the resource, in CSS pixels.
     * 
     * @xmlproperty height
     * @var Integer
     */
    protected $intWidth;

    
}
?>