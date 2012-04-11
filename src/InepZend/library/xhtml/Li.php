<?php
namespace xhtml;
/**
 * The HTML List item element ( \<li> ) is used to represent a list item.
 * 
 * It should be contained in an ordered list ( \<ol> ), an unordered list ( \<ul> )
 * or a menu ( \<menu>), where it represents a single entity in that list.
 *
 * In menus and unordered lists, list items are ordinarily displayed using bullet
 * points. In order lists, they are usually displayed with some ascending counter
 * on the left such as a number or letter
 *
 * @link http://htmldog.com/reference/htmltags/li/
 * @link http://developer.mozilla.org/en/HTML/Element/li/
 *
 * @example {
 *   <p><span>Some text</span></p>
 * }
 *
 * @see xhtml\Ul
 * @see xhtml\Ol
 *
 */
class Li extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'li';
}
?>