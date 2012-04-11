<?php
namespace xhtml;

/**
 * The HTML Table Column Element (\<col>)
 *
 * Defines a column within a table and is used for defining common semantic on
 * all common cells.
 *
 * It is generally found within a \<colgroup> element.
 *
 * @example {
 * 	<table>
 * 	  <colgroup>
 * 	    <col class="column1">
 * 	    <col class="columns2plus3" span="2">
 * 	  </colgroup>
 * 	  <tr>
 * 	    <th>Lime</th>
 * 	    <th>Lemon</th>
 * 	    <th>Orange</th>
 * 	  </tr>
 * 	  <tr>
 * 	    <td>Green</td>
 * 	    <td>Yellow</td>
 * 	    <td>Orange</td>
 * 	  </tr>
 * 	</table>
 * }
 *
 * @see xhtml\Colgroup
 * @see xhtml\Table
 * @see xhtml\Tr
 * @see xhtml\Td
 * @see xhtml\Th
 * @see xhtml\Thead
 * @see xhtml\Tbody
 * @see xhtml\Tfoot
 * @see xhtml\Caption
 *
 * @link http://htmldog.com/reference/htmltags/col/
 * @link http://developer.mozilla.org/en/HTML/Element/col
 */
class Col extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'col';

    /**
     * This attribute contains a positive integer indicating the number of
     * additional consecutive columns to apply he attributes of the \<col> element.
     *
     * If not present, its default value is 0.
     *
     * @xmlProperty span
     * @var integer
     */
    protected $intSpan;
}
?>