<?php
namespace xhtml;
/**
 * The HTML element fieldset (\<fieldset>) is used to group several controls 
 * as well as labels ( \<label> ) within a web form.
 *
 * Permitted content is an optional \<legend> element, followed by flow content.
 *
 * @example {
 *  <form action="" method="post">
 *      <fieldset>
 *          <legend>Title</legend>
 *          <input type="radio" name="radio" id="radio"> <label for="radio">Click me</label>
 *      </fieldset>
 *  </form>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/fieldset/
 * @link https://developer.mozilla.org/en/HTML/Element/fieldset
 */
class Fieldset extends abstractEntity\ChildForm
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'fieldset';

     /**
     * This Boolean attribute indicates that the form control is not available
     * for interaction.
     *
     * @xmlproperty disabled
     * @xmlValueSelf
     * @var Boolean
     */
    protected $booDisabled;

    /**
     * The form element that the element is associated with
     * (its "form owner").
     *
     * The value of the attribute must be an ID of a form element in the same
     * document.
     *
     * If this attribute is not specified,
     * the element must be a descendant of a form element.
     * This attribute enables you to place child form elements anywhere within a
     * document, not just as descendants of their form elements.
     *
     * This property exists only in [HTML5].
     *
     * @xmlproperty form
     * @var String
     */
    protected $strForm;

    protected function init()
    {
        $this->arrChildNodesRule[ 'legend' ] = '0..1';
        $this->arrChildNodesRule[ 'input' ] = '*';
    }
}
?>