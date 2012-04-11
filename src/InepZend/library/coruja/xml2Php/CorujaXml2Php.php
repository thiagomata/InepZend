<?php
namespace Coruja\Xml2Php;

class CorujaXml2Php extends Xml2Php // implements CorujaXml2PhpInterface
{
    protected $sDefaultNamespace = "CorujaTags";
    protected $sTextElement = "CorujaTextContent";
    protected $sTextMethod = "setTextContent";
    protected $sPerformElement = "PerformTag";
    protected $sOpenObjectReference = "{";
    protected $sCloseObjectReference = "}";

    public function refreshObjectTagHeader()
    {
        $this->sObjectTagHeader = "this->" . "oTag" . ucfirst( $this->sPageNamespace );
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

    protected function onObjectReference( $sVarName , $sNamespace, $sTagName, $sAttribute, $sValue )
    {
        // create the perform var //
        $sNewPerfomVar = $this->CreateVarName( $this->sDefaultNamespace , $this->sPerformElement );

        // remove the special chars of the object reference //
        $sReference = ( $this->getObjectReference( $sValue ) );

        // create the command of the perform based on the change of the attribute value //
        $sCommand = $sVarName . "->" . "set" . ucfirst( strtolower( $sAttribute ) ) . "( " . $sReference . " )"  . ";\n";

        // encode command //
        $sCommand = addslashes( $sCommand );

        // create a local script //
        $sScript = "";

        // create the tag textElement //
        $sScript .= $this->onCreateTag( $sNewPerfomVar , $this->sDefaultNamespace , $this->sPerformElement  );

        // append to the tag the text //
        $sScript .= $sNewPerfomVar . "->" . "setTemplate( " . '$this' . " )" . ";\n";
        $sScript .= $sNewPerfomVar . "->" . "setValue( '" . $sCommand . "' )" . ";\n";

        // append the perform element into his father //
        $sScript .= $this->onAppendChild(  $sVarName, $sNewPerfomVar );

        // return the local script //
        return $sScript;
    }

    protected function onSetAttribute( $sVarName , $sNamespace, $sTagName, $sAttribute, $sValue )
    {
        if( !$this->isObjectReference( $sValue ) )
        {
            return parent::onSetAttribute( $sVarName , $sNamespace, $sTagName, $sAttribute, $sValue );
        }
        else
        {
            return $this->onObjectReference( $sVarName , $sNamespace, $sTagName, $sAttribute, $sValue );
        }
    }

    public function createScriptFromFile( $sXmlFile , $sPageNamespace = "" )
    {
        $this->sPageNamespace = $sPageNamespace;
        $this->refreshObjectTagHeader();
        if( !is_file( $sXmlFile ) )
        {
            throw new WarningException( "Unable to find Xml File " , $sXmlFile );
        }
        return $this->createScriptFromXml( file_get_contents($sXmlFile) );
    }

    public function createScriptFromString( $sXmlContent , $sPageNamespace = "" )
    {
        $this->sPageNamespace = $sPageNamespace;
        $this->refreshObjectTagHeader();
        return $this->createScriptFromXml( $sXmlContent );
    }
}

?>