<?php
namespace xhtml;

/**
 * The HTML Table Column Group Element (\<colgroup>) defines a group of column
 * within a table.
 *
 * @note {
 * CSS properties and pseudo-classes that may be specially useful to style the
 * \<col> element:
 *  - the width property to control the width of the column;
 *  - the :nth-child pseudo-class to set the alignment on the cells of the column;
 *  - the text-align property to align all cells content on the same character, like '.'.
 * }
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
 * @see xhtml\Table
 * @see xhtml\Tr
 * @see xhtml\Td
 * @see xhtml\Th
 * @see xhtml\Thead
 * @see xhtml\Tbody
 * @see xhtml\Tfoot
 * @see xhtml\Caption
 *
 * @link http://htmldog.com/reference/htmltags/colgroup/
 * @link http://developer.mozilla.org/en/HTML/Element/colgroup
 */
class Colgroup extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'colgroup';

    /*
     * @see xhtml\Col
     *
     * @var String[]
     */
    protected $arrChildNodesRule = array(
           'col' => 'n'
        );

}
?>