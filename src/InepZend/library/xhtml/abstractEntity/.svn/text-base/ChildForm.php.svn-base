<?php
namespace xhtml\abstractEntity;
/**
 * Abstract class of the childs of Form
 * 
 * Childs of Form
 */
abstract class ChildForm extends HtmlEntity
{
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
     * Child Nodes Rules
     *
     * @var String[]
     */
    protected $arrChildNodesRule = array(
    );

    /**
     * Necessary Parent Node of this Element
     *
     * @var String[]
     */
    protected $arrParentNodesRule = array(
        'form'
    );

    /**
     * Overrides the validate parent to deal with the special case when the
     * Form parent it is not in tag parent but informed by id into the
     * form property
     *
     * @overrides
     * @return boolean
     */
    protected function validateParent()
    {
        if( $this->strForm !== null )
        {
            $objRoot = $this->getRootParent();
            if( $objRoot instanceof HtmlEntity )
            {
                $objForm = $objRoot->getElementById( $this->strForm );
            }
            if( $objForm instanceof \Coruja\Template\CorujaXmlEntity && !$objForm instanceof Form )
            {
                $strMessage = "Invalid form attribute value into the " . $this->getTagName() . ".\n" ;
                $strMessage .= "The value shoud be an id of form " . $objForm->getTagName() . " received instead.\n";
                if( $this->getAnnotation()->getAnnotationClass()->getLink() )
                {
                    $strMessage .= "<br/>\n" . ' Please visit the '. \strtoupper( $this->getTagName() ) .
                                    ' <a href="' . $this->getAnnotation()->getAnnotationClass()->getLink() .
                                    '">reference</a> for more information.';
                }
                throw new CorujaTemplateException( $strMessage );
                return false;
            }
            if( $objForm === null )
            {
                $strMessage = "Invalid form attribute value into the " . $this->getTagName() . ".\n" ;
                $strMessage .= "The value shoud be an id of form. The element with id [" . $this->strForm . "] was not founded.\n";
                if( $this->getAnnotation()->getAnnotationClass()->getLink() )
                {
                    $strMessage .= "<br/>\n" . ' Please visit the '. \strtoupper( $this->getTagName() ) .
                                    ' <a href="' . $this->getAnnotation()->getAnnotationClass()->getLink() .
                                    '">reference</a> for more information.';
                }
                throw new CorujaTemplateException( $strMessage );
                return false;
            }
            if( $objForm instanceof Form )
            {
                /**
                 * Everthing is fine!
                 */
                return true;
            }
            else
            {
                $strMessage = "Something bad and unexpected happened on the validation of this " . $this->getTagName() .
                        ". I'm sorry.";
                throw new CorujaTemplateException( $strMessage );
                return false;
            }
        }
        else
        {
            parent::validateParent();
        }
    }
}
?>