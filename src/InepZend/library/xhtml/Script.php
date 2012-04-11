<?php
namespace xhtml;
/**
 * Used to define a scripting language, such as JavaScript.
 * @link http://htmldog.com/reference/htmltags/script/
 */
class Script extends abstractEntity\HtmlEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'script';

    /**
     * Type is used to specify what type of scripting language is used.
     * This takes the form of a MIME type such as text/javascript.
     *
     * @xmlproperty type
     * @var String
     * @required
     */
    protected $strType = 'text/javascript';

    /**
     * src can be used to specify an external source of a script file.
     *
     * @xmlproperty src
     * @var String
     */
    protected $strSrc;

    /**
     * charset can be used to specify the character set of the element.
     *
     * @xmlproperty charset
     * @var String
     */
    protected $strCharset;

    /**
     * defer can be used to specify that the script does not generate any
     * document content so that the browser doesn't have to worry about
     * it while the page loads.
     *
     * It must be used in the format defer="defer".
     *
     * @xmlproperty defer
     * @var boolean
     */
    protected $booDefer = false;

     /**
     * Child Nodes Rules
     *
     * @var String[]
     */
    protected $arrChildNodesRule = array(
            'text' => 'n'
    );
    
   /**
     * Because some browsers bug on interpretation of HMTML with leaves <script/>
     * on script it is necessary open and close the script tag even when this
     * doesn't has any content.
     *
     * @param integer $intDepper
     * @return string
     */
    public function drawMe( $intDepper = 0 )
    {
        $strResult = '';
        $strResult .= \str_repeat( "\t", $intDepper ) . $this->openTag();
        foreach( $this->getChildTags() as $objChild )
        {
            $strResult .= $objChild->drawMe( $intDepper + 1 );
        }
        $strResult .= \str_repeat( "\t", $intDepper ) . $this->closeTag();
        return $strResult;
    }

}
?>