<?php
namespace xhtml;

/**
 * The HTML menu element (\<menu>) represents an unordered list of menu choices,
 * or commands.
 * 
 * There is no limitation to the depth and nesting of lists defined with the 
 * \<menu>, \<ol> and \<ul> elements.
 *
 * @example {
 *  <menu type="toolbar">
 *      <li>
 *          <menu label="File">
 *              <button type="button" onclick="new()">New...</button>
 *              <button type="button" onclick="save()">Save...</button>
 *          </menu>
 *      </li>
 *      <li>
 *          <menu label="Edit">
 *              <button type="button" onclick="cut()">Cut...</button>
 *              <button type="button" onclick="copy()">Copy...</button>
 *              <button type="button" onclick="paste()">Paste...</button>
 *          </menu>
 *      </li>
 *  </menu>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/menu/
 * @link http://developer.mozilla.org/en/HTML/Element/menu
 */
class Menu extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'menu';

    /*
     * @see xhtml\Li
     *
     * @var String[]
     */
    protected $arrChildNodesRule = array(
           'li' => 'n'
        );

}
?>