<?php
namespace xhtml;
/**
 * Table body.
 * 
 * Along with \<thead> and \<tfoot>, \<tbody> can be used to group a series of rows. 
 * \<tbody> can be used more than once to separate different sections and must 
 * be used if \<thead> and \<tfoot> are used. 
 * 
 * The HTML Table Body Element (\<tbody>) defines a set of rows defining the 
 * body of the table. Though not mandatory, as the rows of the body can be defined as 
 * \<tr> elements children of the parent <table> element, if present, all \<tr>
 * elements part of the body must be included into a unique \<tbody> element.
 *
 * @link http://htmldog.com/reference/htmltags/tbody/
 * @link http://developer.mozilla.org/en/HTML/Element/tbody/
 *
 * @see xhtml\Table
 * @see xhtml\Caption
 * @see xhtml\Colgroup
 * @see xhtml\Thead
 * @see xhtml\Tfoot
 * @see xhtml\Tr
 * @see xhtml\Td
 * @see xhtml\Th
 */
class Tbody extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'tbody';
    
    protected $arrChildNodesRule = array(
            "tr"   => "0..1"
    );
}
?>