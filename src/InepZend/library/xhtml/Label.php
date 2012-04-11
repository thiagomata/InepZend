<?php
namespace xhtml;
/**
 * The HTML Label Element (\<label>) represents a caption for an item in a
 * user interface.
 *
 * It can be associated with a control either by using the for attribute,
 * or by placing the control element inside the label element.
 *
 * Such a control is called the labeled control of the label element.
 *
 * @example {
 *  <input type="radio" name="radio" id="radio"> <label for="radio">Click me</label>
 * }
 *
 * @link http://www.w3.org/TR/html5/forms.html#the-label-element
 * @link http://htmldog.com/reference/htmltags/label/
 * @link https://developer.mozilla.org/en/HTML/Element/label
 */
class Label extends abstractEntity\ChildForm
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'label';

    /**
     * Child Nodes Rules
     *
     * @var String[]
     */
    protected $arrChildNodesRule = array(
        
    );

}
?>