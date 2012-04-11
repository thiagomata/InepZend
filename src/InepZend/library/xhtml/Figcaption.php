<?php
namespace xhtml;
/**
 * The HTML Figcaption Element (\<figcaption>) represents a caption or a legend
 * associated with a figure or an illustration described by the rest of the data
 * of the \<figure> element which is its immediate ancestor.
 * 
 * @example {
 * <figure>
 *     <img src="picture.jpg" alt="An awesome picture">
 *     <figcaption>Caption for the awesome picture</figcaption>
 * </figure>
 * }
 *
 * @see xhtml\Figure
 * @link http://htmldog.com/reference/htmltags/figcaption/
 * @link http://developer.mozilla.org/en/HTML/Element/figcaption/
 */
class Figcaption extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'figcaption';

    /**
     * Child nodes of body tag
     *
     * @var HtmlEntity[]
     */
    protected $arrChildTags;
}
?>