<?php
namespace xhtml;
/**
 * The HTML meter element (<meter>) represents either a scalar value within a
 * known range or a fractional value.
 *
 * @note {
 *   Unless the value attribute is between 0 and 1 (inclusive), the min attribute
 *   and max attribute should define the range so that the value attribute's
 *   value is within it.
 * }
 * @link http://htmldog.com/reference/htmltags/meter/
 * @link http://developer.mozilla.org/en/HTML/Element/meter
 */
class Meter extends abstractEntity\ChildFieldForm
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'meter';

    /**
     * The current numeric value. This must be between the minimum and maximum 
     * values (min attribute and max attribute) if they are specified. 
     * 
     * If unspecified or malformed, the value is 0. If specified, but not within 
     * the range given by the min attribute and max attribute, the value is equal 
     * to the nearest end of the range.
     *
     * @XmlProperty value
     * @var Double
     */
    protected $dblValue;

    /**
     * The lower numeric bound of the measured range. This must be less than the 
     * maximum value (max attribute), if specified. If unspecified, the minimum 
     * value is 0.
     *
     * @xmlProperty min
     * @var Double
     */
    protected $dlbMin;

    /**
     * The upper numeric bound of the measured range.
     * 
     * This must be greater than the minimum value (min attribute),
     * if specified. If unspecified, the maximum value is 1.
     *
     * @xmlProperty max
     * @var Double
     */
    protected $dblMax;

    /**
     * The upper numeric bound of the low end of the measured range.
     *
     * This must be greater than the minimum value (min attribute), and it also
     * must be less than the high value and maximum value (high attribute and
     * max attribute, respectively), if any are specified.
     *
     * If unspecified, or if less than the minimum value, the low value is equal
     * to the minimum value.
     *
     * @xmlProperty low
     * @var Double
     */
    protected $dblLow;

    /**
     * The lower numeric bound of the high end of the measured range.
     * 
     * 
     *
     * @xmlProperty high
     * @var Double
     */
    protected $dblHight;

    /**
     *
     * @xmlProperty optimun
     * @var Double
     */
    protected $dblOptimun;
}
?>