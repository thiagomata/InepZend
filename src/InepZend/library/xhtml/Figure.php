<?php
namespace xhtml;
/**
 * The [HTML5] Figure Element (<figure>) represents self-contained content, 
 * frequently with a caption. 
 * 
 * While it is related to the main flow, its position is independent of the main 
 * flow. Usually this is an image, an illustration, a diagram, a code snippet, 
 * or a schema that is referenced in the main text, but that can be moved to 
 * another page or to an appendix without affecting the main flow.
 *
 * @note {
 *  Being a sectioning root, the outline of the content of the \<figure>
 *  element is excluded from the main outline of the document.
 * }
 *
 * @note {
 *  A caption can be associated with the \<figure> element by inserting a
 *  \<figcaption> inside it (as the first or the last child).
 * }
 *
 * @example {
 * <figure>
 *     <img src="picture.jpg" alt="An awesome picture">
 * </figure>
 * }
 *
 * @example {
 * <figure>
 *     <img src="picture.jpg" alt="An awesome picture">
 *     <figcaption>Caption for the awesome picture</figcaption>
 * </figure>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/figure/
 * @link http://developer.mozilla.org/en/HTML/Element/figure
 */
class Figure extends abstractEntity\FlowEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'figure';

    /**
     * On init, keep the Flow Entity Childs into the Child Node Rules and append
     * the new rule to the \<figcaption> tag
     */
    protected function init()
    {
        $this->arrChildNodesRule[ 'figcaption' ] = '0..1';
    }
}
?>