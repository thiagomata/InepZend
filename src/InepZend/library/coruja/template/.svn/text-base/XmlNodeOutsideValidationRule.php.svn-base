<?php
namespace Coruja\Template;

class XmlNodeOutsideValidationRule extends \Coruja\Template\CorujaXmlEntity
{
    /**
     * Unique Identifier
     *
     * @var String
     */
    protected $strId;

    /**
     * Inform or Replace the Id value
     *
     * @param string $strId
     */
    public function setId( $strId )
    {
        $this->strId = $strId;
    }

    /**
     * Get the Id value
     *
     * @return string
     */
    public function getId()
    {
        return $this->strId;
    }

    /**
     * Validate if the Xml Entity should receive the new child.
     * Make all validation what is possible to do on insert.
     *
     * @throws CorujaTemplateException
     * @param CorujaXmlEntity $objChild
     * @return boolean
     */
    public function validateOnInsertChild( CorujaXmlEntity $objChild )
    {
        if( $this->getParent() !== null )
        {
            $this->getParent()->validateOnInsertChild( $objChild );
        }
    }

    /**
     * Draw the child nodes
     *
     * @return String
     */
    public function drawMe( $intDeeper = 0 )
    {
        $strResult = '';
        foreach( $this->getChildTags() as $objChild )
        {
            $strResult .= $objChild->drawMe( $intDeeper );
        }
        return $strResult;
    }
}
?>