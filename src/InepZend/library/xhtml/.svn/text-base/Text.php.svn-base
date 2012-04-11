<?php
namespace xhtml;
/**
 * Just Text
 */
class Text extends \Coruja\Template\CorujaXmlEntity
{
    /**
     * Text Content
     *
     * @var string
     */
    protected $strTextContent = '';

    /**
     * Unique Identifier of Xml Element
     *
     * @var string
     */
    protected $strId = '';
    
    public function setTextContent( $strText )
    {
        $this->strTextContent = $strText;
    }

    public function getTextContent()
    {
        return $this->strTextContent;
    }

    public function drawMe( $intDeeper = 0 )
    {
        return \str_repeat( "\t" , $intDeeper  ) . $this->runTemplate( $this->getTextContent() ) . "\n";
    }

    public function setId( $strId )
    {
        $this->strId = $strId;
        return $this;
    }

    public function getId()
    {
        return $this->strId;
    }

    public function getElementById( $strId )
    {
        if( $this->getId() == $strId )
        {
            return $this;
        }
    }
}
?>