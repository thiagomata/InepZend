<?php
namespace xhtml;
/**
 * The HTML Image Element (\<img>) represents an image to the document.
 * 
 * @note {
 *  Browsers do not always display the image referenced by the element. 
 * 
 *  This is the case for non-graphical browsers 
 *  (including those used by people with vision impairments), or if the user 
 *  chooses not to display images, or if the browser is unable to display the 
 *  image because it is invalid or an unsupported type. 
 * 
 *  In these cases, the browser may replace the image with the text defined in 
 *  this element's alt attribute.
 * }
 * 
 * @example {
 *  <img src="image.jpg" alt="An awesome image" />
 * }
 *
 * @see xhtml/Object
 * @see xhtml/Embed
 * @link http://htmldog.com/reference/htmltags/img/
 * @link http://developer.mozilla.org/en/HTML/Element/img/
 * @link http://www.w3.org/TR/html5/embedded-content-1.html#the-img-element
 * 
 */
class Img extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'img';
    
    /**
     * This attribute defines the alternative text describing the image. 
     * 
     * Users will see this displayed if the image URL is wrong, the image is not 
     * in one of the supported formats, or until the image is downloaded.
     * 
     * @note {
     *  Omitting this attribute indicates that the image is a key part of the 
     *  content, but no textual equivalent is available.
     * }
     * 
     * @note {
     *  Setting this attribute to the empty string indicates that this image 
     *  is not a key part of the content; non-visual browsers may omit it from 
     *  the rendering.
     * }
     * 
     * @xmlProperty alt
     * @var String
     */
    protected $strAlt;    
        
    /**
     * The height of the image in [HTML5] CSS pixels, or 
     * [HTML4] in pixels or as a percentage.
     * 
     * @xmlProperty height
     * @var String
     */
    protected $strHeight;
    
    /**
     * This Boolean attribute indicates that the image is part of a server-side 
     * map. 
     * 
     * If so, the precise coordinates of a click are sent to the server.
     * 
     * @xmlProperty ismap
     * @var Boolean
     */
    protected $booIsMap;
    
    /**
     * Image URL, this attribute is obligatory for the \<img> element.
     * 
     * @xmlProperty src
     * @var String
     */
    protected $strSrc;
    
    /**
     * The width of the image in pixels or percent.
     * 
     * @xmlProperty width
     * @var String
     */
    protected $strWidth;
    
    /**
     * The partial URL (starting with '#') of an image map associated with 
     * the element.
     * 
     * @note {
     *    You cannot use this attribute if the \<img> element is a descendant of 
     *    an \<a> or \<button> element
     * }
     * 
     * @xmlProperty usemap
     * @var String
     */
    protected $strUseMap;
}
?>