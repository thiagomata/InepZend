<?php
namespace xhtml;
/**
 * The HTML command Element (<command>) User Action Control.
 *
 * @link http://htmldog.com/reference/htmltags/command/
 * @link http://www.quackit.com/html_5/tags/html_command_tag.cfm
 * @link http://developer.mozilla.org/en/HTML/Element/command
 */
class Command extends abstractEntity\TextEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'command';

    /**
     * Specifies the type of command.
     * 
     * Possible values:
     * - command (default value)
     * - checkbox
     * - radio
     *
     * @xmlValues [ "command" , "checkbox" , "radio" ]
     * @xmlProperty type
     * @var String
     */
    protected $strType = 'command';

    /**
     * Specifies the name of the command, as shown to the user.
     *
     * @xmlProperty label
     * @var String
     */
    protected $strLabel;

    /**
     * Specifies the URI (or IRI) of graphical image
     * that represents the action.
     *
     * @xmlProperty icon
     * @var String
     */
    protected $strIcon;

    /**
     * Specifies if the command is disabled or not.
     *
     * This is a boolean attribute. If the attribute is present, its value must
     * either be the empty string or a value that is an ASCII case-insensitive
     * match for the attribute's canonical name, with no leading or trailing
     * whitespace (i.e. either disabled or disabled="disabled").
     *
     * Possible values:
     *
     * - [Empty string]
     * - disabled
     *
     * @xmlProperty disabled
     * @xmlValuedSelf
     * @var boolean
     */
    protected $booDisabled;

    /**
     *
     *
     * @xmlProperty checked
     * @xmlValuedSelf false
     * @var boolean
     */
    protected $booChecked;
}
?>