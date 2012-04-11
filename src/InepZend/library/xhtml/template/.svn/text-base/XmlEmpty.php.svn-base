<?php
namespace xhtml\template;

class XmlEmpty extends \Coruja\Template\XmlNodeOutsideValidationRule
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'empty';

    protected $arrParentNodesRule = array( 'foreach' );

    /**
     * Parent Node ( or parent of parent )^n what is a Foreach
     *
     * @var Foreach
     */
    protected $objForeach;

    /**
     * Get the first parent node, or parent of parent(+)
     * what is of the tag \<Foreach>.
     *
     * @throws \Coruja\Template\CorujaTemplateException
     * @return XmlForeach
     */
    protected function getParentForeach()
    {
        if( $this->objForeach == null )
        {
            $objForeach = $this->getFirstParentByTagName( 'foreach' );
            if( $objForeach == null )
            {
                throw new \Coruja\Template\CorujaTemplateException( 'Tag empty must be inside of a Foreach tag' );
            }
            $this->objForeach = $objForeach;
        }
        return $this->objForeach;
    }

    /**
     * Check if this element should be draw in this loop execution based
     * on it's native rule
     *
     * @return boolean
     */
    protected function isTimeToDraw()
    {
        return $this->getParentForeach()->getList() == 0;
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