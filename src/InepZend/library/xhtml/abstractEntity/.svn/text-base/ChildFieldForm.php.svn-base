<?php
namespace xhtml\abstractEntity;
/**
 * Abstract class of the childs of Form
 *
 * Childs of Form
 */
abstract class ChildFieldForm extends ChildForm
{

    /**
     * ...
     * 
     * @xmlProperty name
     * @var String
     */
    protected $strName;
    
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

    /**
     * This Boolean attribute lets you specify that a form control should
     * have input focus when the page loads, unless the user overrides it,
     * for example by typing in a different control.
     *
     * Only one form-associated element in a document
     * can have this attribute specified.
     *
     * @xmlproperty autofocus
     * @xmlValueSelf
     * @var Boolean
     */
    protected $booAutoFocus;

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
     * The URI of a program that processes the information submitted by the
     * input element, if it is a submit button or image.
     *
     * If specified, it overrides the action attribute of the element's form owner.
     *
     * This property exists only in [HTML5].
     *
     * @xmlproperty formaction
     * @var String
     */
    protected $strFormAction;

    /**
     * If the input element is a submit button or image, this attribute specifies
     * the type of content that is used to submit the form to the server.
     *
     * Possible values are:
     *
     * - application/x-www-form-urlencoded: The default value if the attribute
     * is not specified.]
     *
     * - multipart/form-data: Use this value if you are using an <input> element
     * with the type attribute set to file.
     *
     * - text/plain
     *
     * This property exists only in [HTML5].
     *
     * @xmlproperty fromenctype
     * @var String
     */
    protected $strFormEnctype;

    /**
     * If the input element is a submit button or image, this attribute specifies
     * the HTTP method that the browser uses to submit the form.
     *
     * Possible values are:
     *
     *  - post: The data from the form is included in the body of the form and
     * is sent to the server.
     *
     *  - get: The data from the form are appended to the form attribute URI,
     * with a '?' as a separator, and the resulting URI is sent to the server.
     *
     * Use this method when the form has no side-effects and contains only ASCII
     * characters.
     *
     * If specified, this attribute overrides the method attribute of the
     * element's form owner.
     *
     * This property exists only in [HTML5].
     *
     * @xmlvalues [ "get" , "post" ]
     * @var String
     */
    protected $strFormMethod;

    /**
     * If the input element is a submit button or image, this Boolean attribute
     * specifies that the form is not to be validated when it is submitted.
     *
     * If this attribute is specified, it overrides the novalidate attribute of
     * the element's form owner.
     *
     * This property exists only in [HTML5].
     *
     * @xmlProperty formnovalidate
     * @var boolean
     */
    protected $strFormNoValidate;

    protected $strFormTarget;

    /**
     * This Boolean attribute indicates that the user cannot modify the value
     * of the control.
     *
     * [HTML5] This attribute is ignored if the value of the type attribute is
     * hidden, range, color, checkbox, radio, file, or a button type.
     *
     * @var type
     */
    protected $booReadOnly;

    /**
     * Child Nodes Rules
     *
     * @var String[]
     */
    protected $arrChildNodesRule = array(
    );

    /**
     * This attribute specifies that the user must fill in a value before
     * submitting a form.
     *
     * It cannot be used when the type attribute is hidden, image, or a button
     * type (submit, reset, or button).
     *
     * The :optional and :required CSS pseudo-classes will be applied to the
     * field as appropriate.
     *
     * @xmlProperty required
     * @var Boolean
     */
    protected $booRequired;

    /**
     * A hint to the user of what can be entered in the control.
     *
     * The placeholder text must not contain carriage returns or line-feeds.
     *
     * @xmlproperty placeholder
     * @var String
     */
    protected $strPlaceHolder;

}
?>