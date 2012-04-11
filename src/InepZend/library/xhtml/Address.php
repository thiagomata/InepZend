<?php
namespace xhtml;
/**
 * The HTML Address Element 
 *
 * The HTML Address Element (\<address>) may be used by authors to supply contact
 * information for its nearest \<article> or \<body> ancestor; in the later case,
 * it applies to the whole document.
 * 
 * @example {
 * <address>
 *      You can contact author at 
 *      <a href="www.somedomain.com/contact">www.somedomain.com</a>.
 *      <br/>
 *      If you see any bugs, please 
 *      <a href="mailto:webmaster@somedomain.com">contact webmaster</a>
 * </address>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/address/
 * @link http://developer.mozilla.org/en/HTML/Element/address/
 */
class Address extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'address';

}
?>