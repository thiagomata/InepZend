<?php
namespace xhtml;
/**
 * The \<summary> [HTML5] tag contains a header for the details element,
 * which is used to describe details about a document,
 * or parts of a document.
 * 
 * @example {
 *  <details>
 *   <summary>Copyright 1999-2011.</summary>
 *   <p>All pages and graphics on this web site are the property of the company Refsnes Data.</p>
 *  </details>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/sumary/
 * @link http://developer.mozilla.org/en/HTML/Element/sumary
 * @link http://www.w3schools.com/html5/tag_summary.asp
 * @link http://www.quackit.com/html_5/tags/html_summary_tag.cfm
 * 
 */
class Summary extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'summary';
}
?>