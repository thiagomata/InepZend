<?php
namespace xhtml;
/**
 * The HTML Headings Group Element (\<hgroup>) represents the heading of a
 * section. 
 * 
 * It defines a single title that participates in the outline of the document 
 * as the heading of the implicit or explicit section that it belongs too.
 * 
 * Its text for the outline algorithm is the text of the first HTML Heading
 * Element of highest rank (i.e., the first \<h1>, \<h2>, \<h3>, \<h4>, \<h5> 
 * or \<h6> with the smallest number among its descendants) and the rank is the 
 * rank of this very same HTML Heading Element.
 * 
 * Therefore this element groups several headings, contributing only the main
 * one to the outline of the document. It allows associating secondary titles,
 * like subheadings, alternative titles, or even taglines, with the main heading,
 * without polluting the outline of the document.
 *
 * @example {
 *   <hgroup>
 *      <h1>Main title</h1>
 *      <h2>Secondary title</h2>
 *   </hgroup>
 * }
 *
 * @see xhtml\Div
 * @see xhtml\H1
 * @see xhtml\H2
 * @see xhtml\H3
 * @see xhtml\H4
 * @see xhtml\H5
 * @see xhtml\H6
 *
 * @link http://htmldog.com/reference/htmltags/hgroup/
 * @link http://developer.mozilla.org/en/HTML/Element/hgroup/
 */
class Hgroup extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'hgroup';

    /**
     * Child Nodes Rules
     * 
     * @var String[]
     */
    protected $arrChildNodesRule = array(
           'h1'			=> 'n' 		,
           'h2'			=> 'n' 		,
           'h3'			=> 'n' 		,
           'h4'			=> 'n' 		,
           'h5'			=> 'n' 		,
           'h6'			=> 'n' 		,
        );

}
?>