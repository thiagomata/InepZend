<?php
namespace xhtml;
/**
 *
 * The HTML unordered list element (\<ul>) represents an unordered list of items,
 * namely a collection of items that do not have a numerical ordering, and their
 * order in the list is meaningless. Typically, unordered-list items are displayed
 * with a bullet, which can be of several forms, like a dot, a circle or a squared..
 *
 * The bullet style is not defined in the HTML description of the page, but in
 * its associated CSS, using the list-style-type property.
 *
 * There is no limitation to the depth and imbrication of lists defined 
 * with the \<ol> and \<ul>
 *
 * @note {
 *      The \<ol> and \<ul> both represent a list of items. They differ in the
 *      way that, with the \<ol> element, the order is meaningful.
 *
 *      As a rule of thumb to determine which one to use, try changing the order
 *      of the list items; if the meaning is changed, the \<ol> element should
 *      be used, else the \<ul> is adequate.
 * }
 *
 * @example {
 *  <p>
 *      We need to buy:
 *      <ul>
 *          <li> Apples </li>
 *          <li> Oranges </li>
 *          <li> Breads </li>
 *      <ul>
 * </p>
 * }
 *
 * @see xhtml\Ol
 * @see xhtml\Li
 * 
 * @link http://htmldog.com/reference/htmltags/ul/
 * @link http://developer.mozilla.org/en/HTML/Element/ul/
 */
class Ul extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'ul';

    /**
     * Child Nodes Rules
     *
     * @var String[]
     */
    protected $arrChildNodesRule = array(
        'li'  => '*'
    );
}
?>