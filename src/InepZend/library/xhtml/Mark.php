<?php
namespace xhtml;
/**
 * The HTML Mark Element (\<mark>) represents highlighted text, i.e., a run of 
 * text marked for reference purpose, due to its relevance in a particular 
 * context. 
 * 
 * For example it can be used in a page showing search results to highlight 
 * every instance of the searched for word.
 * 
 * @example {
 *      <p>
 *          The <mark> element is used to <mark>highlight</mark> text
 *      </p>
 * }
 *
 * @note {
 *  In a quotation or another block, the highlighted text typically marks
 *  text that is referenced outside the quote, or marked for specific scrutiny
 *  even though the original author didn't consider it important.
 * }
 *
 * @note {
 *  In the main text, the highlighted text typically marks text that may be
 *  of special relevance for the user's current activity, like search results.
 * }
 *
 * @note {
 *  Do not use the \<mark> element for syntax highlighting; use the \<span>
 *  element for this purpose.
 * }
 *
 * @note {
 *  Do not confuse the \<mark> element with the \<strong> element.
 *  The \<strong> element is used to denote spans of text of special importance,
 *  when the \<mark> element is used to denote spans of text of special relevance.
 * }
 *
 * @link http://www.whatwg.org/specs/web-apps/current-work/multipage/text-level-semantics.html#the-mark-element
 * @link http://htmldog.com/reference/htmltags/mark/
 * @link http://developer.mozilla.org/en/HTML/Element/mark/
 */
class Mark extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'mark';
}
?>