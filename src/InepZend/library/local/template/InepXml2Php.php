<?php
namespace Local\Template;

class InepXml2Php extends \Coruja\Xml2Php\Xml2Php
{
    protected $sDefaultNamespace = "xhtml";
    protected $sTextElement = "Text";
    protected $sTextMethod = "setTextContent";
    protected $sPerformElement = "load";
    protected $sOpenObjectReference = "{";
    protected $sCloseObjectReference = "}";
    protected $strTemplateName = "Template";
    protected $strTemplateNamespace = "Template";

    protected function onCloseTag ($sVarName, $sNamespace, $sTagName)
    {
        return '';
    }

    protected function onAppendChild(  $sVarParent, $sVarChild )
    {
        return $sVarParent . "->" . "addChild( " . $sVarChild . ") "  . ";\n";
    }

    protected function isObjectReference( $sValue )
    {
        return
        (
        ( $sValue[0] == $this->sOpenObjectReference )
        and
        ( $sValue[ strlen( $sValue ) - 1 ] == $this->sCloseObjectReference )
        );
    }

    protected function getObjectReference( $sValue )
    {
        return substr( $sValue  , 1, strlen( $sValue ) - 2 );
    }

    public function createScriptFromFile( $sXmlFile , $sPageNamespace = "" , $booPhpTags = true )
    {
        $this->sPageNamespace = $sPageNamespace;
        if( !is_file( $sXmlFile ) )
        {
            throw new \Exception( "Unable to find Xml File " . $sXmlFile );
        }
        return $this->createScriptFromXml( file_get_contents($sXmlFile) , $booPhpTags );
    }

    public function createScriptFromString( $sXmlContent , $sPageNamespace = "" , $booPhpTags = true )
    {
        $this->sPageNamespace = $sPageNamespace;
        return $this->createScriptFromXml( $sXmlContent , $booPhpTags );
    }
}
?>