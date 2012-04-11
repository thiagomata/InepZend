<?php
namespace xhtml;
/**
 * The HTML Block Quotation (\<blockquote>) element indicates that the enclosed
 * text is an extended quotation.
 *
 * Usually, this is rendered visually by indentation (see Notes for how to change it).
 * A URL for the source of the quotation may be given using the cite attribute,
 * while a text representation of the source can be given using the \<cite> element.
 * 
 * @example {
 *  <blockquote cite="http://developer.mozilla.org">
 *      <p>This is a quotation taken from the Mozilla Developer Center.</p>
 *  </blockquote>
 * }
 *
 * @note {
 *  To change \<blockquote> indent, use CSS margin property.
 * }
 *
 * @note {
 *  For short quotes use \<q> element.
 * }
 *
 * @see xhtml\Q
 * @see xhtml\Cite
 * @link http://htmldog.com/reference/htmltags/blockquote/
 * @link http://developer.mozilla.org/en/HTML/Element/blockquote
 */
class Blockquote extends abstractEntity\FlowEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'blockquote';

    /**
     * A URL that designates a source document or message for the information
     * quoted.
     *
     * This attribute is intended to point to information explaining the context
     * or the reference for the quote.
     * 
     * @xmlProperty cite
     * @var String
     */
    protected $strCite;

}
?>