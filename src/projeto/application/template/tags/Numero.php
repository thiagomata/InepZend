<?php
namespace Projeto\template\tags;
/**
 * Used to group in-line HTML.
 *
 * span applies no meaning and is commonly used solely to apply CSS.
 *
 * @link http://htmldog.com/reference/htmltags/span/
 */
class Numero extends \xhtml\Input
{
    public function load()
    {
        $this->strType = "text";
        $objHtml = $this->findParent( "Html" );
        if( $objHtml->getElementById( 'textMask' ) == null )
        {
            $objTextMask = new \xhtml\Text();
            $objTextMask->setId( 'textMask' );
            $objTextMask->setTextContent(
                '

                    function textMask( objInput )
                    {
                        var strMask = "1234567890";
                        var strFinalText = "";
                        for( var i = 0; i < objInput.value; ++i )
                        {
                            if( strMask.indexOf( objInput.value[i] ) > 0 )
                            {
                                strFinalText += objInput.value[i];
                            }
                        }
                        objInput.value = strFinalText;
                    }
                '
            );
            $objHead = $objHtml->getFirstChildByTagName( "Head" , true );
            $objScript = $objHead->getFirstChildByTagName( "Script" );
            if( !$objScript )
            {
                $objScript = new \xhtml\Script();
                $objHead->addChild( $objScript );
            }
            $objScript->addChild( $objTextMask );
            $this->strOnKeyUp = "javascript:textMask(this)";
        }
    }
}
?>