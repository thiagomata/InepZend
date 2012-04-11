<?php
namespace xhtml;
/**
 * The <aside> tag defines some content aside from the content it is placed in.
 * The aside content should be related to the surrounding content.
 *
 * The HTML Aside Element (\<aside>) represents a section of a page that consists
 * of content that is tangentially related to the content around it,
 * which could be considered separate from that content.
 *
 * Such sections are often represented as sidebars or as inserts;
 * they often contains side explanation like a glossary definition,
 * more loosely related stuff like advertisements, the biography of the author,
 * or in web-applications, profile information or related blog links..
 *
 * The \<aside> element is for marking up pieces of content that are related to
 * the main content, but don't fit directly into the main flow.
 * For for example in this case we have a bunch of quick fire facts and statistics
 * about the band, which wouldn't work so well shoehorned into the main content.
 *
 * Other suitable condidates for \<aside> elements include lists of links to
 * external related content, background information, pull quotes, and sidebars.
 *
 * @example {
 *  <p>My family and I visited The Epcot center this summer.</p>
 *  <aside>
 *      <h4>Epcot Center</h4>
 *      The Epcot Center is a theme park in Disney World, Florida.
 *  </aside>
 * }
 *
 * @link http://www.w3schools.com/html5/tag_aside.asp
 * @link http://dev.opera.com/articles/view/new-structural-elements-in-html5/#aside
 * @link http://htmldog.com/reference/htmltags/aside/
 * @link http://developer.mozilla.org/en/HTML/Element/aside
 */
class Aside extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'aside';

}
?>