<?php
namespace xhtml;
/**
 * The HTML Table Caption Element (\<caption>) represents the title of a table.
 *
 * Though it is always the first descendant of a \<table>, its styling, using CSS,
 * may place it elsewhere, relative to the table.
 *
 * @note {
 *  CSS properties that may be specially useful to style the \<caption> element:
 *  text-align , caption-side .
 * }
 * @example {
 *  <table>
 *      <caption> colors of fruit </caption>
 *      <thead>
 *          <tr>
 *              <th class="fruit"> Fruit </th>
 *              <th class="color"> Color </th>
 *          </tr>
 *      </thead>
 *      <tbody>
 *          <tr>
 *              <td class="fruit"> Lime </td>
 *              <td class="color"> Green</td>
 *          </tr>
 *          <tr>
 *              <td class="fruit"> Lemon </td>
 *              <td class="color"> Yellow</td>
 *          </tr>
 *          <tr>
 *              <td class="fruit"> Orange </td>
 *              <td class="color"> Orange </td>
 *          </tr>
 *      </tbody>
 *  </table>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/caption/
 * @link https://developer.mozilla.org/en/HTML/Element/caption
 */
class Caption extends abstractEntity\FlowEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'caption';

}
?>