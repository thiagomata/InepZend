<?php
namespace xhtml;
/**
 * The Deleted Text (\<del>) HTML element represents a range of text that has 
 * been deleted from a document. 
 * 
 * This element is often (but need not be) rendered with strike-through text.
 * 
 * @example {
 *  <p><del>This text has been deleted</del></p>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/del/
 * @link http://www.quackit.com/html_5/tags/html_del_tag.cfm
 * @link https://developer.mozilla.org/en/HTML/Element/del
 */
class Del extends abstractEntity\FlowEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'del';

}
?>