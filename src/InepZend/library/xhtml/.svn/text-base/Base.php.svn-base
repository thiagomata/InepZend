<?php
namespace xhtml;
/**
 * he HTML Base element (\<base>) specifies the base URL to use for all relative 
 * URLs contained within a document.
 *
 * @example {
 *  <base href="http://www.yourdomain.com/" />
 *  <base target="_blank" href="http://www.yourdomain.com/" />
 * }
 * 
 * @note {
 *  If multiple \<base> elements are specified, only the first href and first 
 *  target value are used; all others are ignored.
 * }
 * 
 * @note {
 *  To avoid the creation of ignored \<base> elements, in the template context,
 *  the \<head> tag accepts only one \<base>
 * }
 *
 * @note {
 *  HTML 2.0 and 3.2 define only the href attribute.
 * }
 *
 * @note {
 *  XHTML 1.0 requires a trailing slash: \<base />
 * }
 *
 * @link http://htmldog.com/reference/htmltags/base/
 * @link http://developer.mozilla.org/en/HTML/Element/base
 */
class Base extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'base';
    
    /**
     * The base URL to be used throughout the document for relative URL
     * addresses. If this attribute is specified, this element must come before
     * any other elements with attributes whose values are URLs.
     *
     * @xmlproperty href
     * @var String
     */
    protected $strHref;

    /**
     * A name or keyword indicating the default location to display the result
     * when hyperlinks or forms cause navigation, for elements that do not have
     * an explicit target reference.
     * 
     * In [HTML4], this is the name of, or a keyword for, a frame. In [HTML5], it
     * is a name of, or keyword for, a browsing context 
     * (for example, tab, window, or inline frame). 
     * 
     * The following keywords have special meanings:
     * 
     *  _self: Load the response into the same [HTML4] frame
     *      (or [HTML5] browsing context) as the current one.
     *      This value is the default if the attribute is not specified.
     * 
     * _blank: Load the response into a new unnamed [HTML4] window
     *      or [HTML5] browsing context.
     * 
     * _parent: Load the response into the [HTML4] frameset parent of the current
     *      frame or [HTML5] parent browsing context of the current one.
     *      If there is no parent, this option behaves the same way as _self.
     * 
     * _top: [HTML4] Load the response into the full, original window,
     *      canceling all other frames. [HTML5] Load the response into
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

}
?>