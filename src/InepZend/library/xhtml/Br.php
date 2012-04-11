<?php
namespace xhtml;
/**
 * A line break.
 *
 * The HTML Line Break element (\<br>) produces a line break in text
 * (carriage-return).
 *
 * It is useful for writing a poem or an address,
 * where the division of lines is significant.
 *
 * @note {
 *  Do not use \<br> to increase the gap between lines of text; use the
 *  CSS margin property or the \<p> element.
 * }
 *
 * @note {
 *  This attribute is obsolete in HTML5 and should not be used 
 *  by authors. Use the CSS clear property instead.
 * }
 * 
 * @example {
 *  <h4> If You Forget Me by Pablo Neruda </h4>
 *  (...) <br/>
 *  If suddenly <br/>
 *  you forget me <br/>
 *  do not look for me, <br/>
 *  for I shall already have forgotten you. <br/>
 *  (...)
 * }
 *
 * @link http://htmldog.com/reference/htmltags/br/
 * @link http://developer.mozilla.org/en/HTML/Element/br
 */
class Br extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'br';
}
?>