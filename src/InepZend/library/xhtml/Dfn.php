<?php
namespace xhtml;
/**
 * Definition term.
 *
 * The Definition (\<dfn>) HTML element represents the defining instance of a
 * term.
 *
 * [HTML5] Usage Notes:
 *
 *  - The \<dfn> element marks the term being defined; the definition of the term
 * should be given by the surrounding \<p>, \<section> or definition list group
 * (usually a \<dt>, \<dd> pair).
 *
 *  - The exact value of the term being defined is determined by the following
 * rules:
 *      If the \<dfn> element has a title attribute, then the term is the value
 * of that attribute.
 *      Else, if it contains only an \<abbr> element with a title attribute,
 * then the term is the value of that attribute.
 *      Otherwise, the text content of the <dfn> element is the term being
 * defined.
 *
 * @example {
 *  <!-- Define "The Internet" -->
 *  <p>
 *      <dfn id="def-internet">The Internet</dfn>
 *      is a global system of interconnected networks that use the Internet
 *      Protocol Suite (TCP/IP) to serve billions of users worldwide.
 *  </p>
 * }
 *
 * @example {
 *  <dl>
 *      <!-- Define "World-Wide Web" and reference definition for "the Internet" -->
 *      <dt>
 *          <dfn>
 *              <abbr title="World-Wide Web">WWW</abbr>
 *          </dfn>
 *      </dt>
 *      <dd>
 *          The World-Wide Web (WWW) is a system of interlinked hypertext
 *          documents accessed on <a href="#def-internet">the Internet</a>.
 *      </dd>
 *  </dl>
 * }
 *
 * @see xhtml\P
 * @see xhtml\Section
 * @see xhtml\Dt
 * @see xhtml\Dl
 * @see xhtml\Text
 * @see xhtml\Abbr
 *
 * @link http://htmldog.com/reference/htmltags/dfn/
 * @link http://www.quackit.com/html_5/tags/html_dfn_tag.cfm
 * @link https://developer.mozilla.org/en/HTML/Element/dfn
 */
class Dfn extends abstractEntity\FlowEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'dfn';

    /**
     * Array of Child Nodes Rules
     *
     * @see xhtml\Text
     * @see xhtml\Abbr
     *
     * @var String[]
     */
    protected $arrChildNodes = array(
        'text' => '*',
        'abbr' => '0..1'
    );

    /**
     * Array of Parent Node Rules
     *
     * @see xhtml\P
     * @see xhtml\Section
     * @see xhtml\Dt
     * @see xhtml\Dl
     *
     */
    protected $arrParentNodesRule = array(
        'p' ,
        'section' ,
        'dt',
        'dl'
    );
}
?>