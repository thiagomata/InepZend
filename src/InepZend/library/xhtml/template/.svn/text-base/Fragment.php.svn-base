<?php
namespace xhtml\template;

/**
 * This tag do nothing.
 *
 * Ok, just kidding, it is good to create fragments to interact with others tags
 * without need the creation of HTML real tags.
 * 
 * It can be used too to be the root node of some template xml file,
 * without be a html real tag.
 *
 * All content of this tag will be draw. The parent rules will be apply in each
 * child element.
 
 * @example {
 * <?php
 *      $objConverter = new \Local\Template\InepXml2Php();
 *      print $objConverter->loadString('
 * <template:fragment xmlns:template="xhtml.template" xmlns="xhtml" >
 *      <h2>
 *          Cool Example
 *      </h2>
 *      <p id="niceExample">
 *          I will be!
 *      </p>
 *      <template:replace refId="niceExample">
 *          I am!
 *      </template:replace>
 *      <template:replace refId="niceExample">
 *          I was!
 *      </template:replace>
 *  </template:fragment>
 * ');
 * ?>
 * }
 *
 * @example {
 * <?php
 *      $objConverter = new \Local\Template\InepXml2Php();
 *      print $objConverter->loadString('
 * <div xmlns:template="xhtml.template" xmlns="xhtml" >
 *      <div id="intro">
 *          Hello <template:fragment id="name">Name</template:fragment>, welcome to the example.
 *      </div>
 *      <!-- then in any place into any template file -->
 *      <template:replace refId="name">
 *          Jonh <strong> Do </strong>
 *      </template:replace>
 *  </div>
 * ');
 * }
 *
 * @see \xhtml\template\Add
 */
class Fragment extends \coruja\template\XmlNodeOutsideValidationRule
{
    /**
     * Load the template data
     */
    protected function load()
    {
        foreach( $this->getChildTags() as $objChild )
        {
            $objChild->load();
        }
    }

    /**
     * Draw the child elements
     *
     * @param integer $intDeeper
     * @return String
     */
    public function drawMe( $intDeeper = 0)
    {
        $this->load();
        return parent::drawMe( $intDeeper );
    }
}
?>