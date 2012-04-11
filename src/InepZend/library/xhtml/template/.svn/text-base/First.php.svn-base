<?php
namespace xhtml\template;
/**
 * All the content of this tag should be draw only into the first
 * time when the loop of the parent tag happens.
 *
 * It is good to create special cases to the first element of loop.
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
class First extends ChildForeach
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'first';

    /**
     * Check if this element should be draw in this loop execution based
     * on it's native rule
     *
     * Draw it in only the first loop execution time
     *
     * @return boolean
     */
    protected function isTimeToDraw()
    {
        return ( $this->getParentEachItem()->getCount() == 0 );
    }
}