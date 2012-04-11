<?php
namespace xhtml\template;

/**
 * Interact with a tag appendind new content into it.
 *
 * Add the content of this tag to some existent tag. The tag will be validate
 * after the change and the child rules what will be used are from it.
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
 *          This is a nice template, <br/>
 *          but something is still missing... <br/>
 *      </p>
 *      <template:add refId="niceExample">
 *          That is what i am talinkg about! <br/>
 *      </template:add>
 *      <template:add refId="niceExample" position="before">
 *          This is how all started, <br/>
 *      </template:add>
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
 *      <div id="messages">
 *      </div>
 *      <template:add refId="messages">
 *          <div class="message">
 *              Example created with success!!
 *          </div>
 *      </template:add>
 *      <template:add refId="messages">
 *          <div class="message">
 *              Nice!
 *          </div>
 *      </template:add>
 *      <template:add refId="messages" position="before">
 *          <div class="priority message">
 *              Priority Message!!
 *          </div>
 *      </template:add>
 *  </div>
 * ');
 * }
 *
 * @see \xhtml\template\Replace
 */
class Add extends \coruja\template\XmlNodeOutsideValidationRule
{
    /**
     *
     * @xmlValue [ "before" , "after" ]
     * @xmlProperty position
     * @var String
     */
    protected $strPosition = "after";

    /**
     *
     * @XmlProperty refId
     * @var String
     */
    protected $strRefId;

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
     * Get the Position of the Append
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->strPosition;
    }

    public function setPosition( $strPosition )
    {
        if( in_array( $strPosition , array( 'before' , 'after' ) ) )
        {
            $this->strPosition = $strPosition;
            return $this;
        }
        throw new \Coruja\Template\CorujaTemplateException( 'Invalid Add position value [' . $strPosition . ']' );
    }

    /**
     * Get Target Element
     *
     * @return HtmlEntity
     */
    protected function getTarget()
    {
        return $this->getRootParent()->getElementById( $this->getRefId() );        
    }
    
    /**
     * Load the template data
     */
    protected function load()
    {
        $objTarget = $this->getTarget();
        $arrChilds = $this->getChildTags();
        switch( $this->getPosition() )
        {
            case "after":
            {
                foreach( $arrChilds as $objChild )
                {
                    $this->removeChild( $objChild );
                    $objTarget->addChild( $objChild );
                }
                break;
            }
            case "before":
            {
                 $arrChilds = \array_reverse( $arrChilds );
                foreach( $arrChilds as $objChild )
                {
                    $this->removeChild( $objChild );
                    $objTarget->addChild( $objChild , false );
                }
                break;
            }
            default:
            {
                break;
            }
        }

    }

    public function validate()
    {
        $objTarget = $this->getTarget();
        $objTarget->validate();
    }

    /**
     * Draw the child nodes
     *
     * @return String
     */
    public function drawMe( $intDeeper = 0 )
    {
        return '';
    }
}
?>