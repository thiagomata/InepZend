<?php
namespace xhtml\template;
/**
 * \<else> tag is that what will be draw as alternative content to the \<if> tag.
 *
 * This tag shoud exists only inside of some \<if> tag and
 * will be draw only when the value of the \<if value="#"> tag be false.
 *
 * One \<if> tag can have many \<else> tags and the same rule will value
 * for all of them.
 *
 * @example {
 * <?php
 *      // This example shows how to use nested tags <if> and <else>;
 *      //
 *      // In real world, <switch> / <case> will be a better choice
 *      //
 *      $objConverter = new \Local\Template\InepXml2Php();
 *      $objContext = new \stdClass();
 *      $objContext->intScore = rand( 0 , 10 );
 *      print $objConverter->loadString('
 *  <template:fragment xmlns:template="xhtml.template" xmlns="xhtml" >
 *      <div>
 *          <span> Your score was: {# $this->intScore #} </span>
 *          <template:if value="{# $this->intScore == 10 #}">
 *              You mastered the exam!
 *              <template:else>
 *                  <template:if value="{# $this->intScore > 8 #}">
 *                      Well done.
 *                      <template:else>
 *                          <template:if value="{# $this->intScore > 6 #}">
 *                              Good result.
 *                              <template:else>
 *                                  More lucky in the next time!
 *                              </template:else>
 *                          </template:if>
 *                      </template:else>
 *                  </template:if>
 *               </template:else>
 *          </template:if>
 *      </div>
 *  </template:fragment>
 * ' , '' , $objContext );
 * ?>
 * }
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
 * } *
 */
class XmlElse extends \Coruja\Template\XmlNodeOutsideValidationRule
{
    protected $arrParentNodesRule = array( 'xmlif' );

    public function drawMe( $intDeeper = 0 )
    {
        if( !$this->getParent()->getValue() )
        {
            return parent::drawMe();
        }
    }
}
