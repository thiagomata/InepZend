<?php
namespace xhtml;
/**
 * @see xhtml\Table
 * @see xhtml\Tr
 * @see xhtml\Th
 * @link http://htmldog.com/reference/htmltags/td/
 * @link http://developer.mozilla.org/en/HTML/Element/td
 */
class Td extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'td';

    /**
     * Specify across how many columns the cell should spread.
     *
     * This attribute contains a non-negative integer value that indicates on
     * how many columns does the cell extend. Its default value is 1; if its
     * value is set to 0, it does extend until the end of the \<colgroup>,
     * eventually implicitly defined, the cell belongs to.
     *
     * @see xhtml\Colgroup
     * @xmlproperty colspan
     * @var Integer
     */
    protected $intColSpan;

    /**
     * This attributes a list of space-separated strings,
     * each corresponding to the id attribute of the
     * \<th> elements that applies to this element.
     *
     * @see xhtml\Th
     * @xmlproperty header
     * @var String
     */
    protected $strHeader;

    /**
     * This attribute contains a non-negative integer value 
     * that indicates on how many rows does the cell extend. 
     * Its default value is 1; if its value is set to 0, it 
     * does extend until the end of the table section 
     * ( \<thead>, \<tbody>, \<tfoot>, eventually implicitly
     *  defined ) the cell belongs to.
     *
     * @see xhtml\Thead
     * @see xhtml\Tbody
     * @see xhtml\Tfoot
     * @xmlproperty rowspan
     * @var Integer
     */
    protected $intRowSpan;
    
}
?>