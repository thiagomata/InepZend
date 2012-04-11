<?php
namespace xhtml\template;

/**
 * The content of this tag will be draw or not based on it's value.
 *
 * If the value is true, the content should be draw, otherwise not.
 *
 * The value can be dynamic, getting the value based on context.
 * If the received value is a string, the cast to boolean will be
 * maded, using the rules of \CorujaStringManipulation::strToBool method.
 *
 * If exist \<else> childrens, if the value of the \<if> tag be false, the
 * else childrens tags should be draw. If the value of the \<if> tag be true,
 * the else childrens tags should not be draw.
 *
 * @example {
 * <?php
 *      $objConverter = new \Local\Template\InepXml2Php();
 *      print $objConverter->loadString('
 *  <template:fragment  xmlns:template="xhtml.template" xmlns="xhtml">
 *      Display if the clock time is even
 *      <template:if value="{# ( time() % 2 ) == 0 #}" >
 *          <div class="even">
 *              {# time() #}
 *              Time is even
 *          </div>
 *          <template:else>
 *              <div class="odd">
 *                  {# time() #}
 *                  Time is odd
 *              </div>
 *          </template:else>
 *      </template:if>
 *  </template:fragment>
 * ');
 * ?>
 * }
 *
 * @see \CorujaStringManipulation
 * @see \xhtml\template\XmlElse
 */
class XmlIf extends \Coruja\Template\XmlNodeOutsideValidationRule
{
    /**
     * Condition of tag If
     * 
     * @var boolean
     */
    protected $booValue;
    
    /**
     * Dynamic value condition
     * 
     * @var string
     */
    protected $strValue = "false";

    public function setValue( $mixValue )
    {
        if( \is_string( $mixValue ) )
        {
            $this->strValue = $mixValue;
            return $this;
        }
        $this->booValue = $mixValue;
        return $this;
    }

    public function getValue()
    {
        if( $this->booValue === null )
        {
            $booValue = $this->runTemplate( $this->strValue );
            if( \is_string( $booValue ) )
            {
                $booValue = \CorujaStringManipulation::strToBool( $booValue );
            }
            $this->booValue = $booValue;
        }
        return $this->booValue;
    }

    public function drawMe( $intDeeper = 0 )
    {
        $strResult = '';
        if( $this->getValue() )
        {
            return parent::drawMe( $intDeeper );
        }
        else
        {
            $arrElse = $this->getChildByTagName( 'xmlelse' );
            foreach( $arrElse as $objTagElse )
            {
                $strResult .= $objTagElse->drawMe( $intDeeper );
            }
            return $strResult;
        }
    }
}