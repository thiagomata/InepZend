<?php
namespace xhtml;
/**
 *
 * The HTML ordered list element (\<ol>) represents an ordered list of items.
 *
 * Typically, ordered-list items are displayed with a preceding numbering,
 * which can be of any form, like numerals, letters or Romans numerals or even
 * simple bullets. This numbered style is not defined in the HTML description
 * of the page, but in its associated CSS, using the list-style-type property.
 *
 * There is no limitation to the depth and imbrication of lists defined with
 * the \<ol> and \<ul> elements.
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
 *      And the winner positions are:
 *      <ol>
 *          <li> Paul </li>
 *          <li> Mary </li>
 *          <li> Anna </li>
 *      <ol>
 * </p>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/ol/
 * @link http://developer.mozilla.org/en/HTML/Element/ol/
 */
class Ol extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'ol';

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