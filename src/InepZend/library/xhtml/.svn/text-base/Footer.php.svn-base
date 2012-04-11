<?php
namespace xhtml;
/**
 * A footer typically contains information about the author of the section,
 * copyright data or links to related document.
 *
 * The HTML Footer Element (\<footer>) represents a footer for its nearest
 * sectioning content or sectioning root element
 * (i.e, its nearest parent \<article>, \<aside>, \<nav>, \<section>,
 * \<blockquote>, \<body>, \<details>, \<fieldset>, \<figure>, \<td>).
 *
 * @example {
 *   <footer>
 *       Some copyright info or perhaps some author info for a <article>?
 *   </footer>
 * }
 *
 * @note {
 *  Enclose information about the author in an <address> element that
 *  can be included into the \<footer> element.
 * }
 *
 * @note {
 *  The \<footer> element is not sectioning content and therefore doesn't
 *  introduce a new section in the outline.
 * }
 *
 * @see xhtml\Article
 * @see xhtml\Aside
 * @see xhtml\Nav
 * @see xhtml\Section
 * @see xhtml\Blockquote
 * @see xhtml\Body
 * @see xhtml\Details
 * @see xhtml\Fieldset
 * @see xhtml\Figure
 * @see xhtml\Td
 * 
 * @link http://htmldog.com/reference/htmltags/footer/
 * @link http://developer.mozilla.org/en/HTML/Element/footer
 */
class Footer extends abstractEntity\FlowEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'footer';

    /**
     * Note that a \<footer> element must not be a descendant of an \<address>, 
     * \<header> or another \<footer> element.
     * 
     * @var String[]
     */
    protected $arrRestrictParents = array(
        'address' ,
        'header' ,
        'footer'
    );

    /**
     * Validate Parent Tag
     *
     * Check if the restriction of parent tags is still valid.
     *
     * @return boolean
     */
    protected function validateParent()
    {
        if( $this->getParent() == null )
        {
            return parent::validateParent();
        }
        
        if( $this->getParent()->hasParentInList( $this->arrRestrictParents ) )
        {
            foreach( $this->arrRestrictParents as $strTagParent )
            {
                $objParent = $this->getParent()->getFirstParentByTagName( $strTagParent );
                if( $objParent !== null )
                {
                    $strMessage = 'The <footer> tag cannot be child of one ' . $strTagParent;
                    throw new CorujaTemplateException( $strMessage );
                }
            }
        }
        return parent::validateParent();
    }
}
?>