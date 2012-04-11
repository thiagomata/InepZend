<?php
namespace xhtml;
/**
 * Abbreviation.
 *
 * Defines an element that is a shortened word or phrase, such as 'HTML'.
 * 
 * The HTML Abbreviation Element (\<abbr>) represents an abbreviation and
 * optionally provides a full description for it. If present,
 * the title attribute must contain this full description and nothing else.
 *
 * An acronym is also an abbreviation, but an abbreviation is not necessarily
 * an acronym. Acronym is Deprecated.
 *
 * Note: The abbr tag is not recognised in Internet Explorer.
 *
 * @example {
 *      <p>
 *          Tony Blair is the prime minister of the 
 *          <abbr title="United Kingdom">UK</abbr>
 *      </p>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/abbr/
 * @link http://developer.mozilla.org/en/HTML/Element/abbr
 */
class Abbr extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'abbr';
    
    /**
     * The title attribute has the semantic meaning of the 
     * full description of the abbreviation.
     *
     * @xmlproperty title
     * @var String
     */
    protected $strTitle;

}
?>