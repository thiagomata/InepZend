<?php
namespace xhtml\template;

/**
 * Interact with a tag replacing the content.
 *
 * Replace the content of the target by the content of the replace tag.
 * 
 * The target tag will be validate after the change and the child rules
 * what will be used are from it.
 *
 * @example {
 * <?php
 *      $objConverter = new \Local\Template\InepXml2Php();
 *      print $objConverter->loadString('
 * <div xmlns:template="xhtml.template" xmlns="xhtml" >
 *      <h2>
 *          Cool Example
 *      </h2>
 *      <p id="niceExample">
 *          I will be!
 *      </p>
 *      <template:replace refId="niceExample">
 *          I am!
 *      </template:replace>
 *      <template:replace refId="niceExample">
 *          I was!
 *      </template:replace>
 *  </div>
 * ');
 * ?>
 * }
 *
 * @example {
 * <?php
 *      $objConverter = new \Local\Template\InepXml2Php();
 *      print $objConverter->loadString('
 * <div xmlns:template="xhtml.template" xmlns="xhtml" >
 *      <div id="intro">
 *          Hello <span id="name">Name</span>, welcome to the example.
 *      </div>
 *      <!-- then in any place into any template file -->
 *      <template:replace refId="name">
 *          Jonh <strong> Do </strong>
 *      </template:replace>
 *  </div>
 * ');
 * }
 *
 * @see \xhtml\template\Add
 */
class Replace extends \coruja\template\XmlNodeOutsideValidationRule
{
    /**
     *
     * @XmlProperty refId
     * @var String
     */
    protected $strRefId;

    /**
     * Replaced Target Element
     * 
     * @var CorujaXmlEntity
     */
    protected $objTarget;
    
    /**
     * Set the Id of the External Element what will receive the content
     *
     * @param string $strRefId
     */
    public function setRefId( $strRefId )
    {
        $this->strRefId= $strRefId;
    }

    /**
     * Get the Id of the External Element what will receive the content
     *
     * @return string
     */
    public function getRefId()
    {
        return $this->strRefId;
    }

    /**
     * Get Target Element
     *
     * @return HtmlEntity
     */
    protected function getTarget()
    {
        if( $this->objTarget == null )
        {
            if( $this->getRefId() == null )
            {
                throw new \Coruja\Template\CorujaTemplateException( 'Missing RefId into Replace Tag' );
            }
            $this->objTarget = $this->getRootParent()->getElementById( $this->getRefId() );
        }
        
        return $this->objTarget;        
    }
    
    /**
     * Load the template data
     */
    protected function load()
    {
        $objTarget = $this->getTarget();

        $arrChildTarget = $objTarget->getChildTags();
        foreach( $arrChildTarget as $objChild )
        {
            $objTarget->removeChild( $objChild );
        }

        $arrChilds = $this->getChildTags();
        foreach( $arrChilds as $objChild )
        {
            $this->removeChild( $objChild );
            $objTarget->addChild( $objChild );
        }
    }

    /**
     * Validate if the Xml Entity should receive the new child.
     * Make all validation what is possible to do on insert.
     *
     * @throws CorujaTemplateException
     * @param CorujaXmlEntity $objChild
     * @return boolean
     */
    public function validateOnInsertChild(\Coruja\Template\CorujaXmlEntity $objChild )
    {
        return;
        if( $this->getTarget() !== null )
        {
            $this->getTarget()->validateOnInsertChild( $objChild );
        }
    }
    
    public function validate()
    {
        $objTarget = $this->getTarget();
        $objTarget->validate();
    }

    public function drawMe( $intDeeper = 0 )
    {
        return '';
    }

}
?>