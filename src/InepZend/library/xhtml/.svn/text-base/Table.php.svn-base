<?php
namespace xhtml;
/**
 * Defines a table used for tabular data.
 * The HTML Table Element (\<table>) represents data in two dimensions or more.
 *
 * You must use this element and it should be used just once.
 * It must start immediately after the closing head tag and end directly
 * before the closing html tag.
 *
 * Permitted content
 * In this order:
 * <ul>
 *  <li> an optional \<caption> element, </li>
 *  <li> zero or more \<colgroup> elements, </li>
 *  <li> an optional \<thead> element, </li>
 *  <li> one of the two alternatives: </li>
 *      <ul>
 *          <li>
 *              one \<tfoot> element, followed by:
 *              + zero or more \<tbody> elements,
 *              + or one or more \<tr> elements,
 *          </li>
 *          <li>
 *              a second alternative followed by an optional \<tfoot> element:
 *              + either zero or more \<tbody> elements,
 *              + or one or more \<tr> elements
 *          </li>
 *      </ul>
 *  </li>
 * </ul>
 *
 * @example {
 *  <table>
 *      <tr>
 *          <th> First Name </th>
 *          <th> Last Name </th>
 *      </tr>
 *      <tr>
 *          <td> Jonh </td>
 *          <td> Doe </td>
 *      </tr>
 *      <tr>
 *          <td> Jane </td>
 *          <td> Doe </td>
 *      </tr>
 *  </table>
 * }
 * 
 * @link http://htmldog.com/reference/htmltags/table/
 * @link http://developer.mozilla.org/en/HTML/Element/table
 *
 * @see xhtml\Caption
 * @see xhtml\Colgroup
 * @see xhtml\Thead
 * @see xhtml\Tbody
 * @see xhtml\Tfoot
 * @see xhtml\Tr
 * @see xhtml\Td
 * @see xhtml\Th
 */
class Table extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'table';
    
    protected $arrChildNodesRule = array(
            "caption"   => "0..1"   ,
            "colgroup"  => "*"      ,
            "thead"     => "0..1"   ,
            "tbody"     => "*"      ,
            "tfoot"     => "0..1"   ,
            "tr"        => "*"      ,
    );
}
?>