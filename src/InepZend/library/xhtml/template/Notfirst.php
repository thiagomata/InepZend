<?php
namespace xhtml\template;
/**
 * All the content of this tag should not be draw only into the first
 * time when the loop of the parent tag happens. In all the other
 * cases it should be draw.
 *
 * It is good to create the default case to the first element of loop.
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
class Notfirst extends ChildForeach
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'notfirst';
    

    /**
     * Check if this element should be draw in this loop execution based
     * on it's native rule
     *
     * Draw it in all the loop execution times except the first
     *
     * @return boolean
     */
    protected function isTimeToDraw()
    {
        return ( $this->getParentEachItem()->getCount() != 0 );
    }
}