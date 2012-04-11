<?php
namespace xhtml;
/**
 * Table Row.
 *
 * The HTML Table Row Element (\<tr>) defines a row of cells in a table.
 * Those can be a mix of <td> and \<th> elements. It must appear
 * within a \<table> element
 *
 * @see xhtml\Table
 * @see xhtml\Td
 * @see xhtml\Th
 * @link http://htmldog.com/reference/htmltags/tr/
 * @link https://developer.mozilla.org/en/HTML/Element/tr
 */
class Tr extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'tr';

    /**
     * @see xhtml\Td
     * @see xhtml\Th
     * @var String[]
     */
    protected $arrChildNodesRule = array(
            "td"   => "*"      ,
            "th"   => "*"      ,
    );
}
?>