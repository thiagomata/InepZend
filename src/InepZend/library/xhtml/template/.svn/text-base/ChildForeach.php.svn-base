<?php
namespace xhtml\template;
/**
 * This is a abstract implementation of the commom  methods and attributes
 * of the logical tags childs of \<foreach>
 *
 * @see xhtml\Foreach
 * @see xhtml\Eachitem
 * @see xhtml\First
 * @see xhtml\NotFirst
 * @see xhtml\Last
 * @see xhtml\NotLast
 */
abstract class ChildForeach extends \Coruja\Template\XmlNodeOutsideValidationRule
{
    protected $arrParentNodesRule = array( 'eachitem' );

    /**
     * Parent Node ( or parent of parent )^n what is a Eachitem
     *
     * @var Eachitem
     */
    protected $objEachItem;

    /**
     * Get the first parent node, or parent of parent(+)
     * what is of the tag \<eachitem>.
     *
     * @throws \Coruja\Template\CorujaTemplateException
     * @return Eachitem
     */
    protected function getParentEachItem()
    {
        if( $this->objEachItem == null )
        {
            $objEachItem = $this->getFirstParentByTagName( 'eachitem' );
            if( $objEachItem == null )
            {
                throw new \Coruja\Template\CorujaTemplateException( 'Tag First must be inside of a EachItem tag' );
            }
            $this->objEachItem = $objEachItem;
        }
        return $this->objEachItem;
    }

    /**
     * Check if this element should be draw in this loop execution based
     * on it's native rule
     * 
     * @return boolean
     */
    protected function isTimeToDraw()
    {
        return false;
    }
    
    /**
     * Draw this element if it is time to draw it
     *
     * @param integer $intDeeper
     * @return string
     */
    public function drawMe( $intDeeper = 0 )
    {
        if( !$this->isTimeToDraw() )
        {
            return '';
        }
        return parent::drawMe( $intDeeper );
    }

}