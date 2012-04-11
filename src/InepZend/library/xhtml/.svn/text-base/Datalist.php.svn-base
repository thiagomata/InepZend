<?php
namespace xhtml;
/**
 * The HTML Datalist Element (\<datalist>) contains a set of \<option> elements
 * that represent the possible options for the value of other controls.
 *
 * The HTML \<datalist> tag is used for providing an "autocomplete" feature on
 * form elements. It enables you to provide a list of predefined options to the
 * user as they input data.
 * 
 * For example, if a user began entering some text into a text field, a list
 * would drop down with prefilled values that they could choose from.
 *
 * The list attribute is linked to the \<datalist> tag by the \<datalist> tag's ID.
 * For example, if the \<datalist> tag contains id="myData", then the list attribute
 * will look like this: list="myData".
 * 
 * You can fill the \<datalist> element by nesting \<option> tags inside the
 * \<datalist> tag.
 * 
 * The <datalist> tag was introduced in [HTML5].
 *
 * @example {
 *  <form name="example" action="" method="post">
 *      <datalist id="characters">
 *          <option value="Homer Simpson">
 *          <option value="Bart">
 *          <option value="Fred Flinstone">
 *      </datalist>
 *      <p>
 *          <label>
 *              <span class="description">
 *                  Enter your favorite cartoon character:
 *              </span>
 *              <span class="dataValue">
 *                  <input type="text" name="favCharacter" list="characters">
 *              </span>
 *          </label>
 *      </p>
 * </form>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/datalist/
 * @link http://www.quackit.com/html_5/tags/html_datalist_tag.cfm
 * @link http://developer.mozilla.org/en/HTML/Element/datalist
 */
class Datalist extends abstractEntity\HtmlEntity
{
    
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'datalist';

    /**
     * Childs nodes of datalist
     * 
     * @see HtmlEntity::$arrChildNodesRule
     * @see \html\Option
     */
    protected $arrChildNodesRule = array(
        'option' => '*'
    );
}
?>