<?php
namespace xhtml;
/**
 * The HTML Table Head Element (\<thead>)
 *
 * Defines a set of rows defining the head of the columns of the table.
 * Along with tfoot and tbody, thead can be used to group a series of rows. 
 * thead can be used just once within a table element and should appear 
 * before a tfoot and tbody element.
 * 
 * @example {
 *  <table>
 *      <thead>
 *          <tr>
 *              <th> First Name </th>
 *              <th> Last Name </th>
 *          </tr>
 *      </thead>
 *      <tbody>
 *          <tr>
 *              <td> Jonh </td>
 *              <td> Doe< /td>
 *          </tr>
 *          <tr>
 *              <td> Jane </td>
 *              <td> Doe </td>
 *          </tr>
 *      </tbody>
 *  </table>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/table/
 * @link http://developer.mozilla.org/en/HTML/Element/table
 *
 * @see xhtml\Table
 * @see xhtml\Caption
 * @see xhtml\Colgroup
 * @see xhtml\Tbody
 * @see xhtml\Tfoot
 * @see xhtml\Tr
 * @see xhtml\Td
 * @see xhtml\Th
 */
class Thead extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'thead';
    
    protected $arrChildNodesRule = array(
            "tr"        => "*"
    );
}
?>