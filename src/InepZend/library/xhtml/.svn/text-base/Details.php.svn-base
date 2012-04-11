<?php
namespace xhtml;
/**
 * The HTML details element (\<details>) is used as a disclosure widget
 * from which the user the retrieve additional information.
 *
 * @example {
 *  <details>
 *      <summary>Some details</summary>
 *      <p>More info about the details.</p>
 *  </details>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/del/
 * @link http://www.quackit.com/html_5/tags/html_del_tag.cfm
 * @link https://developer.mozilla.org/en/HTML/Element/del
 */
class Details extends abstractEntity\FlowEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'details';

    /**
     * @see xhtml/Div
     * @see xhtml/Sumary
     */
    public function init()
    {
        $this->arrChildNodesRule[ 'summary' ] = '1';
    }
}
?>