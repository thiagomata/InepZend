<?php
namespace xhtml;
/**
 * The HTML Citation Element (\<cite>)
 * 
 * Contains the title of a work,
 * such as a book, song, movie, TV show, sculpture, etc.
 *
 * @note {
 *  In [HTML5], use of this element to mark a person's name is no longer
 *  considered semantically appropriate.
 * }
 *
 * @note {
 *  Use the cite attribute on a \<blockquote> or \<q> element to reference an
 *  online resource for a source.
 * }
 *
 * @example {
 *  <p>
 *      Kurt Vonnegut, author of such classics as
 *      <cite>Slaughterhouse 5</cite>,
 *      <cite>Player Piano</cite>, and
 *      <cite>The Sirens of Titan</cite>,
 *      will be sorely missed by the literary world.
 *  </p>
 * }
 * 
 * @link http://htmldog.com/reference/htmltags/cite/
 * @link http://reference.sitepoint.com/html/cite
 * @link http://developer.mozilla.org/en/HTML/Element/cite
 */
class Cite extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'cite';
}
?>