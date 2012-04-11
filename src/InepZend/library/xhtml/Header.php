<?php
namespace xhtml;
/**
 * The HTML Header Element (\<header>) represents a group of introductory
 * or navigational aids. 
 * 
 * It may contain some heading elements but also other elements
 * like a logo, wrapped section's header, a search form, and so on.
 *
 *
 * @example {
 * <header>
 *   A logo perhaps?
 * </header>
 * }
 *
 * @note {
 *  The \<header> element is not sectioning content and therefore doesn't
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
 * @link http://htmldog.com/reference/htmltags/header/
 * @link http://developer.mozilla.org/en/HTML/Element/header
 */
class Header extends abstractEntity\FlowEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'header';

    /**
     * Note that a \<header> element must not be a descendant of an \<address>,
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
                    $strMessage = 'The <header> tag cannot be child of one ' . $strTagParent;
                    throw new CorujaTemplateException( $strMessage );
                }
            }
        }
        return parent::validateParent();
    }
}
?>