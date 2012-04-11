<?php
namespace xhtml\template;
/**
 * Child tag of Foreach what will have the content replicated
 *
 *
 * @example {
 * <?php
 *      $objConverter = new \Local\Template\InepXml2Php();
 *      print $objConverter->loadString('
 *  <template:foreach list="{# array( \'cat\' , \'dog\' , \'money\' ) #}"
 *  item="name" xmlns:template="xhtml.template" xmlns="xhtml" >
 *      <ul>
 *          <template:eachitem>
 *              <li>
 *                  <template:first>
 *                      {# ucfirst( $this->name ) #}
 *                  </template:first>
 *                  <template:notfirst>
 *                      {# $this->name #}
 *                  </template:notfirst>
 *                  <template:notlast>
 *                          ;
 *                  </template:notlast>
 *                  <template:last>
 *                          .
 *                  </template:last>
 *              </li>
 *          </template:eachitem>
 *      </ul>
 *  </template:foreach>
 * ');
 * ?>
 * }
 *
 * @see xhtml\template\XmlForeach
 * @see xhtml\template\Eachitem
 * @see xhtml\template\First
 * @see xhtml\template\NotFirst
 * @see xhtml\template\Last
 * @see xhtml\template\NotLast
 * @see xhtml\template\XmlEmpty
 * 
 */
class Eachitem extends \Coruja\Template\XmlNodeOutsideValidationRule
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'eachitem';

    protected $arrParentNodesRule = array( 'foreach' );

    protected $intCount = 0;

    /**
     * Get the \<Foreach> Parent Tag, or parent of parent(+) of this \<EachItem>
     *
     * @return XmlForeach
     */
    protected function getForeachParent()
    {
        $objForeach = $this->getFirstParentByTagName( 'foreach' );
        if( $objForeach == null )
        {
            throw new \Coruja\Template\CorujaTemplateException( 'Tag EachItem must be inside of a foreach tag' );
        }
        return $objForeach;
    }

    public function getList()
    {
        return $this->getForeachParent()->getList();
    }

    protected function loadValue( $objValue , $strKey )
    {
        $this->getContext()->{ $this->getForeachParent()->getItem() } = $objValue;
        $this->getContext()->{ $this->getForeachParent()->getKey() } = $strKey;
    }

    protected function setCount( $intCount )
    {
        $this->intCount = $intCount;
        return $this;
    }

    public function getCount()
    {
        return $this->intCount;
    }

    protected function incrementCounter()
    {
        $this->setCount( $this->getCount() + 1 );
    }

    public function drawMe( $intDeeper = 0 )
    {
        $strResult = '';
        $this->setCount(0);
        foreach( $this->getList() as $strKey => $objValue )
        {
            $this->loadValue( $objValue , $strKey );
            foreach( $this->getChildTags() as $objChild )
            {
                $strResult .= $objChild->drawMe( $intDeeper );
            }
            $this->incrementCounter();
        }
        return $strResult;
    }
}