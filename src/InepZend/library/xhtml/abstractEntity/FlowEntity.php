<?php
namespace xhtml\abstractEntity;
/**
 * The main body of an HTML document where all of the content is placed.
 *
 * You must use this element and it should be used just once.
 * It must start immediately after the closing head tag and end directly
 * before the closing html tag.
 *
 * @link http://htmldog.com/reference/htmltags/body/
 */
abstract class FlowEntity extends HtmlEntity
{
    /**
     * Child Nodes Rules
     *
     * @see xhtml\A
     * @see xhtml\Abbr
     * @see xhtml\Address
     * @see xhtml\Area
     * @see xhtml\Article
     * @see xhtml\Aside
     * @see xhtml\Audio
     * @see xhtml\Base
     * @see xhtml\Blockquote
     * @see xhtml\Br
     * @see xhtml\Canvas
     * @see xhtml\Cite
     * @see xhtml\Code
     * @see xhtml\Dbo
     * @see xhtml\Dd
     * @see xhtml\Del
     * @see xhtml\Dfn
     * @see xhtml\Div
     * @see xhtml\Dl
     * @see xhtml\Em
     * @see xhtml\Embed
     * @see xhtml\Fieldset
     * @see xhtml\Figure
     * @see xhtml\Footer
     * @see xhtml\Form
     * @see xhtml\H1
     * @see xhtml\H2
     * @see xhtml\H3
     * @see xhtml\H4
     * @see xhtml\H5
     * @see xhtml\H6
     * @see xhtml\Hgroup
     * @see xhtml\Hr
     * @see xhtml\I
     * @see xhtml\Iframe
     * @see xhtml\Img
     * @see xhtml\Ins
     * @see xhtml\Input
     * @see xhtml\Kbd
     * @see xhtml\Keygen
     * @see xhtml\Map
     * @see xhtml\Mark
     * @see xhtml\Meter
     * @see xhtml\Nav
     * @see xhtml\Noscript
     * @see xhtml\Object
     * @see xhtml\Ol
     * @see xhtml\Output
     * @see xhtml\P
     * @see xhtml\Pre
     * @see xhtml\Progress
     * @see xhtml\Q
     * @see xhtml\Samp
     * @see xhtml\Section
     * @see xhtml\Span
     * @see xhtml\Strong
     * @see xhtml\Sub
     * @see xhtml\Summary
     * @see xhtml\Sup
     * @see xhtml\Table
     * @see xhtml\Text
     * @see xhtml\Textarea
     * @see xhtml\Time
     * @see xhtml\Ul
     * @see xhtml\Var
     * @see xhtml\Video
     * @see xhtml\Wbr
     *
     * @var String[]
     */
    protected $arrChildNodesRule = array(
           'a'		=> 'n' 		,
           'abbr' 	=> 'n' 		,
           'address' 	=> 'n' 		,
           'area' 	=> 'n' 		,
           'article' 	=> 'n' 		,
           'aside'      => 'n' 		,
           'audio'      => 'n' 		,
           'base' 	=> 'n' 		,
           'blockquote' => 'n'      ,
           'br' 	=> 'n' 		,
           'canvas' 	=> 'n' 		,
           'cite' 	=> 'n' 		,
           'code' 	=> 'n' 		,
           'dbo' 	=> 'n' 		,
           'dd' 	=> 'n' 		,
           'del' 	=> 'n' 		,
           'dfn' 	=> 'n' 		,
           'div' 	=> 'n' 		,
           'dl' 	=> 'n' 		,
           'em' 	=> 'n' 		,
           'embed'      => 'n' 		,
           'fieldset' 	=> 'n' 		,
           'figure' 	=> 'n' 		,
           'footer' 	=> 'n' 		,
           'form' 	=> 'n' 		,
           'h1' 	=> 'n' 		,
           'h2' 	=> 'n' 		,
           'h3' 	=> 'n' 		,
           'h4' 	=> 'n' 		,
           'h5' 	=> 'n' 		,
           'h6' 	=> 'n' 		,
           'hgroup' 	=> 'n' 		,
           'hr' 	=> 'n' 		,
           'i'          => 'n' 		,
           'iframe' 	=> 'n' 		,
           'img' 	=> 'n' 		,
           'ins' 	=> 'n' 		,
           'input' 	=> 'n' 		,
           'kbd' 	=> 'n' 		,
           'keygen' 	=> 'n' 		,
           'map' 	=> 'n' 		,
           'mark' 	=> 'n' 		,
           'meter'      => 'n' 		,
           'nav' 	=> 'n' 		,
           'noscript' 	=> '0..1' 	,
           'object' 	=> 'n' 		,
           'ol' 	=> 'n' 		,
           'output' 	=> 'n' 		,
           'p'          => 'n' 		,
           'pre' 	=> 'n' 		,
           'progress' 	=> 'n' 		,
           'q'          => 'n' 		,
           'samp' 	=> 'n' 		,
           'section' 	=> 'n' 		,
           'span' 	=> 'n' 		,
           'strong' 	=> 'n' 		,
           'sub' 	=> 'n' 		,
           'summary' 	=> 'n' 		,
           'sup' 	=> 'n' 		,
           'table'      => 'n' 		,
           'text' 	=> 'n' 		,
           'textarea' 	=> 'n' 		,
           'time' 	=> 'n' 		,
           'ul' 	=> 'n' 		,
           'var' 	=> 'n' 		,
           'video'  	=> 'n' 		,
           'wbr' 	=> 'n'
    );
}
?>