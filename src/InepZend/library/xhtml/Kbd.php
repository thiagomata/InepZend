<?php
namespace xhtml;
/**
 * The HTML Keyboard Input Element (\<kbd>) produces an inline element
 * displayed in the browser's default monotype font.
 *
 * This element is used to identify user input..
 *
 * @note {
 *  A CSS rule can be defined for the kbd selector to override the browser's
 *  default font face.
 *
 *  Preferences set by the user might take precedence over the specified CSS
 * }
 *
 * @example {
 *  <p>Type the following in the Run dialog: <kbd>cmd</kbd><br />Then click the OK button.</p>
 * }
 *
 * @see xhtml\Code
 * @link http://htmldog.com/reference/htmltags/kbd/
 * @link http://developer.mozilla.org/en/HTML/Element/kbd/
 */
class Kbd extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'kbd';
}
?>