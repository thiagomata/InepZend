<?php
namespace xhtml;
/**
 * The button (\<button>) HTML element represents a clickable button.
 *
 * @note {
 *  The \<button> element must not be a descendant of an \<a> element;
 * }
 *
 * @note {
 *  The \<button> element must not be a descendant of another \<button> element;
 * }
 *
 * @note {
 *  If descendant of a \<label> element, the \<button> element's id attribute
 *   must have the same value as the label's for attribute.
 * }
 *
 * @example {
 *      <button name="button">Click me</button>
 * }
 *
 * 
 * @link http://htmldog.com/reference/htmltags/button/
 * @link http://developer.mozilla.org/en/HTML/Element/button
 */
class Button extends abstractEntity\ChildForm
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'button';

    /**
     * The type of the button.
     *
     * Possible values are:
     *
     *  - submit: The button submits the form data to the server.
     * This is the default if the attribute is not specified, or if the
     * attribute is dynamically changed to an empty or invalid value.
     *
     *  - reset: The button resets all the controls to their initial values.
     *
     *  - button: The button has no default behavior.
     * It can have client-side scripts associated with the element's events,
     * which are triggered when the events occur.
     *
     * @xmlproperty type
     * @xmlvalues [ "submit" , "reset" , "button" ]
     * @var String
     */
    protected $strType = "button";

    /**
     * Overriden the parent required property because this property don't exists
     * into the button.
     *
     * In pratical ways, this property stop to exists in the button tag.
     *
     * @var boolean
     */
    protected $booRequired = false;

    /**
     * The initial value of the control.
     *
     * @var String
     */
    protected $strValue;
}
?>