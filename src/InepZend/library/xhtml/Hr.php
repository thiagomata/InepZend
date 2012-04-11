<?php
namespace xhtml;
/**
 * In [HTML5] the \<hr> element represents a thematic break between
 * paragraph-level elements (for example, a change of scene in a story, or a
 * shift of topic with a section).
 *
 * In previous versions of HTML, it represented a horizontal rule. It may still
 * be displayed as a horizontal rule in visual browsers, but is now defined in
 * semantic terms, rather than presentational terms.
 *
 * @example {
 *  <p>
 *      This is the first paragraph of text. This is the first paragraph of text.
 *      This is the first paragraph of text. This is the first paragraph of text.
 *  </p>
 * <hr/>
 *  <p>
 *      This is second paragraph of text. This is second paragraph of text.
 *      This is second paragraph of text. This is second paragraph of text.
 *  </p>
 * }
 *
 * @note {
 *  To change look of rule or gaps between it and paragraphs, use cascading
 *  style sheets.
 * }
 *
 * @see xhtml\P
 * @link https://developer.mozilla.org/en/DOM/HTMLHRElement
 * @link http://htmldog.com/reference/htmltags/hr/
 * @link http://developer.mozilla.org/en/HTML/Element/hr
 */
class Hr extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'hr';
}
?>