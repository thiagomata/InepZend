<?php
namespace xhtml;
/**
 * Anchor.
 *
 * Primarily used as a hypertext link.
 * The link can be to another page, a part of a page or any other
 * location on the web.
 * 
 * @example {
 *  <a href="http://www.niceplace.com">
 *      Go to a Nice Place!
 *  </a>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/a/
 * @link http://developer.mozilla.org/en/HTML/Element/a
 */
class A extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'a';
    
    /**
     * This is the single required attribute for anchors defining a hypertext 
     * source link. 
     * 
     * It indicates the link target, either a URL or a URL fragment, 
     * that is a name preceded by a hash mark (#), which specifies an internal 
     * target location (an ID) within the current document. 
     * 
     * URLs are not restricted to Web (HTTP)-based documents. 
     * URLs might use any protocol supported by the browser. 
     * For example, file, ftp, and mailto work in most user agents.
     *
     * @xmlproperty href
     * @var String
     */
    protected $strHref;

    /**
     * This attribute indicates the language of the linked resource. 
     * 
     * It is purely advisory Allowed values are determined by BCP47 for HTML5 
     * and by RFC1766 for HTML 4. Use this attribute only if the 
     * href attribute is present.
     *
     * @xmlproperty hreflang
     * @var String
     */
    protected $strHrefLang;

    /**
     * This attribute specifies the media which the linked resource applies to.
     *
     * Its value must be a media query. This attribute is mainly useful when
     * linking to external stylesheets by allowing the user agent to pick
     * the best adapted one for the device it runs on.
     *
     * @xmlProperty media
     * @var String
     */
    protected $strMedia;

    /**
     * If present, this attribute should be a space-separated list of URIs
     * that wish to be notified when the user follows the hyperlink.
     *
     * @xmlValue [ 1 , 0 ]
     * @xmlProperty ping
     * @xmlValueSeparated " "
     * @var boolean
     */
    protected $booPing = false;

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