<?php
namespace xhtml;
/**
 * The Definition Description Element (\<dd>) indicates the definition of a term
 * in a definition list ( \<dl>) element. This element can occur only as a child
 * element of a definition list and it must follow a \<dt> element.
 *
 *
 * @example {
 *  <dl>
 *      <dt>Firefox</dt>
 *      <dd>
 *          A free, open source, cross-platform, graphical web browser
 *          developed by the Mozilla Corporation and hundreds of volunteers.
 *      </dd>
 *       <!-- other terms and definitions -->
 *  </dl>
 * }
 *
 * @see xhtml\Dt
 * @see xhtml\Dl
 * 
 * @link http://htmldog.com/reference/htmltags/dd/
 * @link http://www.quackit.com/html_5/tags/html_dd_tag.cfm
 * @link http://developer.mozilla.org/en/HTML/Element/dd
 */
class Dd extends abstractEntity\FlowEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'dd';

}
?>