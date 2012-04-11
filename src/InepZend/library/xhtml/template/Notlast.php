<?php
namespace xhtml\template;
/**
 * All then content of this tag should be draw just in the last time of the
 * loop of the foreach tag.
 *
 * It is a good way to create special cases to the last element or footers.
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
class Notlast  extends ChildForeach
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'notlast';

    /**
     * Check if this element should be draw in this loop execution based
     * on it's native rule
     *
     * Draw it in all the loop execution times except the last
     *
     * @return boolean
     */
    protected function isTimeToDraw()
    {
        return ( $this->getParentEachItem()->getCount() != ( sizeof( $this->getParentEachItem()->getList() ) - 1 ) );
    }
}