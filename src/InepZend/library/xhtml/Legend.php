<?php
namespace xhtml;
/**
 * The HTML Legend Field Element (\<legend>) represents a caption for the
 * content of its parent \<fieldset>.
 *
 * @example {
 *  <!-- Form with fieldset, legend, and label -->
 *  <form action="" method="post">
 *      <fieldset>
 *          <legend>Title</legend>
 *          <input type="radio" name="radio" id="radio"/>
 *          <label for="radio">Click me</label>
 *      </fieldset>
 *  </form>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/legend/
 * @link http://developer.mozilla.org/en/HTML/Element/legend/
 */
class Legend extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'legend';
}
?>