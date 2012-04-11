<?php
namespace xhtml;
/**
 * The HTML Area element (\<area>) defines a hot-spot region on an image, 
 * and optionally associates it with a hypertext link. 
 * 
 * This element is used only within a \<map> element.
 *
 * @example {
 *      <map name="primary">
 *          <area shape="circle" coords="200,250,25" href="another.htm" />
 *          <area shape="default" nohref />
 *      </map>
 * }
 *
 * @note {
 *  Under the HTML 3.2, 4.0, and 5 specifications, the closing tag \</area> is
 *  forbidden.
 * }
 *
 * @note {
 *  The XHTML 1.0 specification requires a trailing slash: \<area />.
 * }
 *
 * @note {
 *  The id, class, and style attributes have the same meaning as the core
 *  attributes defined in the HTML 4 specification, but only Netscape and
 *  Microsoft define them.
 * }
 *
 * @note {
 *  Netscape 1–level browsers do not understand the target attribute as it
 *  relates to frames.
 * }
 *
 * @note {
 *  HTML 3.2 defines only alt, coords, href, nohref, and shape.
 * }
 *
 * @link http://htmldog.com/reference/htmltags/area/
 * @link http://developer.mozilla.org/en/HTML/Element/area
 */
class Area extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'area';

    /**
     * Necessary Parent Node of this Element
     *
     * @var String[]
     */
    protected $arrParentNodesRule = array(
        'map'
    );
    
    /**
     * A text string alternative to display on browsers that do not display
     * images.
     *
     * The text should be phrased so that it presents the user with the same
     * kind of choice as the image would offer when displayed without the
     * alternative text.
     *
     * In [HTML4], this attribute is required, but may be the empty string ("").
     * In [HTML5], this attribute is required only if the href attribute is used.
     *
     * @xmlproperty alt
     * @var String
     */
    protected $strAlt = "";

    /**
     * A set of values specifying the coordinates of the hot-spot region.
     *
     * The number and meaning of the values depend upon the value specified for
     * the shape attribute. For a rect or rectangle shape, the coords value is
     * two x,y pairs: left, top, right, and bottom.
     *
     * For a circle shape, the value is x,y,r where x,y is a pair specifying the
     * center of the circle and r is a value for the radius.
     *
     * For a poly or polygon< shape, the value is a set of x,y pairs for each
     * point in the polygon: x1,y1,x2,y2,x3,y3, and so on.
     *
     * In [HTML4], the values are numbers of pixels or percentages,
     * if a percent sign (%) is appended; in [HTML5], the values are numbers of
     * CSS pixels.
     *
     * @xmlproperty coords
     * @var String
     */
    protected $strCoords;

    /**
     * The hyperlink target for the area. Its value is a valid URL.
     *
     * In [HTML4], either this attribute or the nohref attribute must be
     * present in the element.
     *
     * In [HTML5], this attribute may be omitted; if so, the area element does
     * not represent a hyperlink.
     *
     * @xmlProperty href
     * @var String
     */
    protected $strHref;

    /**
     * Indicates the language of the linked resource.
     * 
     * Allowed values are determined by [BCP47]. 
     * Use this attribute only if the href attribute is present.
     *
     * @xmlProperty hreflang
     * @var String
     */
    protected $strHrefLang;

    /**
     * A hint of the media for which the linked resource was designed, for 
     * example print and screen. 
     * 
     * If omitted, it defaults to all. Use this attribute only if the href 
     * attribute is present.
     * 
     * @xmlProperty media
     * @var String
     */
    protected $strMedia;

    /**
     * For anchors containing the href attribute, this attribute specifies the
     * relationship of the target object to the link object.
     *
     * The value is a comma-separated list of relationship values.
     * The values and their semantics will be registered by some authority that
     * might have meaning to the document author. The default relationship,
     * if no other is given, is void.
     *
     * Use this attribute only if the href attribute is present.
     *
     * @xmlMultiValues String[]
     * @xmlValueSeparated ","
     * @var String
     */
    protected $strRel;

    /**
     * If present, this attribute should be a space-separated list of URIs
     * that wish to be notified when the user follows the hyperlink.
     *
     * @xmlValue [ "rect" , "circle" , "default" ,
     *             "polygon" , "rectangle" ]
     * @xmlProperty shape
     * @var String
     */
    protected $strShape = "default";

    /**
     * This attribute specifies where to display the linked resource.
     *
     * In HTML 4, this is the name of, or a keyword for, a frame. In HTML5, it
     * is a name of, or keyword for, a browsing context
     * (for example, tab, window, or inline frame).
     *
     * The following keywords have special meanings:
     *
     *  _self: Load the response into the same HTML 4 frame
     *      (or HTML5 browsing context) as the current one.
     *      This value is the default if the attribute is not specified.
     *
     * _blank: Load the response into a new unnamed HTML 4 window
     *      or HTML5 browsing context.
     *
     * _parent: Load the response into the HTML 4 frameset parent of the current
     *      frame or HTML5 parent browsing context of the current one.
     *      If there is no parent, this option behaves the same way as _self.
     *
     * _top: HTML 4 Load the response into the full, original window,
     *      canceling all other frames. HTML5 Load the response into
     *      the top-level browsing context (that is, the browsing context
     *      that is an ancestor of the current one, and has no parent).
     *      If there is no parent, this option behaves the same way as _self.
     *
     * Use this attribute only if the href attribute is present.
     *
     * @xmlProperty target
     * @xmlValue [ "_self" , "_blank" , "_parent" , "_top" ]
     * @var String
     */
    protected $strTarget;

    /**
     * This attribute specifies the media type in the form of a MIME type
     * for the link target.
     *
     * Generally, this is provided strictly as advisory information;
     * however, in the future a browser might add a small icon for
     * multimedia types.
     *
     * For example, a browser might add a small speaker icon when type is set
     * to audio/wav. For a complete list of recognized MIME types, see
     * http://www.w3.org/TR/html4/references.html#ref-MIMETYPES.
     *
     * Use this attribute only if the href attribute is present.
     *
     * @xmlProperty type
     * @xmlValue String
     * @var String
     */
    protected $strType;
}
?>