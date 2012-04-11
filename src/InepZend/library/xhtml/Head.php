<?php
namespace xhtml;
/**
 * The header of an HTML document where information about the document is placed.
 *
 * You must use the title element within the head element and meta,
 * style, script, base and link can also be used.
 *
 * You must use this element and it should be used just once.
 * It must start immediately after the opening html tag and
 * end directly before the opening body tag.
 *
 * @link http://htmldog.com/reference/htmltags/head/
 */
class Head extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'head';

    /**
     * profile can be used to specify the location of information
     * about the document.
     * The value can be a URI or a number of URI's separated by spaces.
     *
     * @xmlproperty profile
     * @xmlmultivalues String[]
     * @xmlseparated " "
     * @var String
     */
    protected $strProfile;

    /**
     * Child Nodes Rules
     *
     * @see xhtml/Title
     * @see xhtml/Link
     * @see xhtml/Base
     * @see xhtml/Meta
     * @see xhtml/Script
     * @var String[]
     */
    protected $arrChildNodesRule = array(
        'title'  => '1'    ,
        'link'   => 'n'    ,
        'base'   => '0..1' ,
        'meta'   => 'n'    ,
        'script' => 'n'
    );

    /**
     * Child tags of head tag
     *
     * @var HtmlEntity[]
     */
    protected $arrChildTags;
}
?>