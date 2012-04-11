<?php
namespace xhtml\template;

/**
 * The \<foreach> tag exists to help to use loop operations inside of the template.
 *
 * This class requires at last one \<eachitem> inside of it. The content of the
 * \<eachitem> will be draw so many times as the number of elements of the array
 * sent into the list parameter of the \<foreach> element.
 *
 * The elements \<first>, \<notfirst>, \<last> and \<notlast> try to help to
 * create special conditions to the first and last element case.
 *
 * The foreach element, as any other not visual element, use the parent validation
 * to make as it's own. But, it requires the existence of the \<eachitem> tag
 * inside of it.
 *
 * The tag \<empty> exists to help you to create special output to the cases
 * when the list attribute receives a empty array. It is not required but is
 * allways a good idea.
 *
 * This class will try to set, into it's controller attribute, the "item" value
 * and "key" value property. If the "item" has the value as "name" and the "key"
 * has value as "counter" this class will try to set the "name" attribute and the
 * "counter" attribute of it's controller class. This values can be read inside
 * the content of the template using the dynamic controller call as can be better
 * seen into the \Coruja\Template\CorujaXmlEntity::runTemplate() method.
 *
 * @example {
 * <?php
 *      $objConverter = new \Local\Template\InepXml2Php();
 *      print $objConverter->loadString('
 * <template:fragment xmlns:template="xhtml.template" xmlns="xhtml" >
 *   <template:foreach list="{# array( \'Jonh\', \'Mary\', \'Anna\' ) #}" item="name" >
 *      <p>
 *          Special thanks to
 *          <template:eachitem>
 *              {# $this->name #}
 *              <template:notlast> and </template:notlast>
 *          </template:eachitem>
 *          for the great help.
 *      </p>
 *      <template:empty>
 *          Special thanks to all.
 *      </template:empty>
 *   </template:foreach>
 *  </template:fragment>
 * ');
 * ?>
 * }
 *
 * @example {
 * <?php
 *      $objConverter = new \Local\Template\InepXml2Php();
 *      print $objConverter->loadString('
 *  <template:fragment xmlns:template="xhtml.template" xmlns="xhtml" >
 *      <template:foreach list="{# array( \'Jonh\', \'Mary\', \'Anna\' ) #}" item="name" >
 *          <p>
 *              Special thanks to:
 *              <ul>
 *                  <template:eachitem>
 *                      <li>
 *                          <template:first>
 *                              My best friend,
 *                          </template:first>
 *                          {# $this->name #}
 *                          <template:notlast>
 *                              ;
 *                          </template:notlast>
 *                          <template:last>
 *                              .
 *                          </template:last>
 *                      </li>
 *                  </template:eachitem>
 *              </ul>
 *              for the great help.
 *          </p>
 *          <template:empty>
 *              Special thanks to all.
 *          </template:empty>
 *      </template:foreach>
 *  </template:fragment>
 * ');
 * ?>
 * }
 *
 *
 * @test {
 *  // this test helps you to remember the \<eachitem> tag
 *  \test\TestTemplate::loadTemplate( '
 *          <!-- this is a really commom error -->
 *          <foreach list="{# array( "Jonh", "Mary", "Anna" ) #}" item="name" >
 *              <!-- don't ou missing something ? -->
 *              {# $this->name #}
 *          </foreach>
 *      ' ,
 *      'throws' ,
 *      ' \Coruja\Template\CorujaTemplateException'
 *   )
 * }
 * 
 * @see xhtml\template\Eachitem
 * @see xhtml\template\First
 * @see xhtml\template\Notfirst
 * @see xhtml\template\Last
 * @see xhtml\template\Notlast
 * @see xhtml\template\Empty
 * @see xhtml\template\Notempty
 */
class XmlForeach extends \Coruja\Template\XmlNodeOutsideValidationRule
{
    /**
     * The list attribute can receive a string of elements separated by this
     * constant value. This class will using it as a array of elements explode
     * this constant. Please don't change it, anything different of "," for
     * this propose it is probaly a bad idea.
     *
     * @note {
     *      The ","
     * }
     *
     * @example {
     *      <foreach list="this,look,nice">
     *          <ol>
     *              <eachitem>
     *                  <li>
     *                      {# $this->item #}
     *                  </li>
     *              </eachitem>
     *          </ol>
     *      </foreach>
     * }
     */
    const ELEMENTS_SEPARATOR = ",";

    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'foreach';

    /**
     * Elements of List
     * 
     * @var boolean
     */
    protected $arrList = null;

    protected $strList = "";

    protected $strItem = "item";

    protected $strKey = "key";

    public function setList( $strList )
    {
        if( is_array( $strList ) )
        {
            $this->arrList = $strList;
        }
        else
        {
            $this->strList = $strList;
        }
    }

    public function getList()
    {
        if( $this->arrList === null && $this->strList != "" )
        {
            if( is_string( $this->strList ) )
            {
                $mixResult = $this->runTemplate( $this->strList );
                if( \is_array( $mixResult ) )
                {
                    $arrResult = $mixResult;
                }
                else
                {
                    $arrResult = explode( self::ELEMENTS_SEPARATOR , $mixResult );
                }
                $this->arrList = $arrResult;
            }
        }
        return $this->arrList;
    }

    public function setItem( $strItem )
    {
        $this->strItem = $strItem;
        return $this;
    }

    public function getItem()
    {
        return $this->strItem;
    }

    public function setKey( $strKey )
    {
        $this->strKey = $strKey;
    }

    public function getKey()
    {
        return $this->strKey;
    }

    public function drawMe( $intDeeper = 0  )
    {
        $strResult = '';
        if( sizeof( $this->getList() ) > 0 )
        {
            return parent::drawMe( $intDeeper );
        }
        else
        {
            $arrEmpty = $this->getChildByTagName( 'xmlempty' );
            foreach( $arrEmpty as $objTagEmpty )
            {
                $strResult .= $objTagEmpty->drawMe();
            }
        }
        return $strResult;
    }

    public function validateChildren()
    {
        if( $this->getFirstElementByTagName( 'eachitem' ) === null )
        {
            $strMessage = 'All foreach element needs has at least on eachitem inside of it. Take a look in the XmlForeach.php and Eachitem.php classes for more info.';
            throw new \Coruja\Template\CorujaTemplateException( $strMessage );
            return false;
        }
        return parent::validateChildren();
    }
}