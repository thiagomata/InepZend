<?php
namespace Coruja\Xml2Php;

class Xml2Php // implements CorujaXml2PhpInterface
{
    /**
     * These words have special meaning in PHP.
     *
     * Some of them represent things which look like functions,
     * some look like constants, and so on--but they're not, really:
     * they are language constructs. You cannot use any of the following
     * words as constants, class names, function or method names.
     *
     * Using them as variable names is generally OK, but could lead to confusion.
     *
     * @link http://www.php.net/manual/en/reserved.keywords.php
     * @var String[]
     */
    protected static $arrListReservedWords = array(
        'abstract'   ,  'and'       , 'array'          , 'as'           , 'break'       ,
        'case'       ,  'catch'     , 'cfunction'      , 'class'        , 'clone'       ,
        'const'      , 'continue'   , 'declare'        , 'default'      , 'do'          ,
        'else'       , 'elseif'     , 'enddeclare'     , 'endfor'       , 'endforeach'  ,
        'endif'      , 'endswitch'  , 'endwhile'       , 'extends'      , 'final'       ,
        'for'        , 'foreach'    , 'function'       , 'global'       , 'goto'        ,
        'if'         , 'implements' , 'interface '     , 'instanceof'   , 'include_once',
        'namespace'  , 'new'        , ' old_function'  , 'or'           , 'private'     ,
        'protected ' , 'public'     , 'static'         , 'switch'       , 'throw'       ,
        'try'        , 'use'        , 'var'            , 'while'        , 'xor'         ,
        'die'        , 'echo'       , 'empty'          , 'exit'         , 'eval'        ,
        'include'    , 'isset'      , 'list'           , 'require'      , 'require_once' ,
        'return'     , 'print'      , 'unset'
    );

    protected static $strReservedWordTagPrefix = 'Xml';

    protected static $strReservedWordTagSufix = '';

    protected static $arrCountByTagName = Array();

    protected $objDomElement;

    protected $sDefaultNamespace = "";

    protected $sPageNamespace = "";

    protected $sTextElement = "textElement";

    protected $sTextMethod = "setText";

    protected $sObjectTagHeader = "oTag";

    protected $booIgnoreEmptyText = true;

    protected $booKeepTabs = false;

    protected $strOpenPhpTag = '{php';

    protected $strClosePhpTag = 'php}';

    protected function onHeaderScript( $sFileName = "" , $booPhpTags )
    {
        $sScript = "";
        if( $booPhpTags )
        {
            $sScript .= "<?php \n ";
        }
        $sScript .= "/** generated automatically by coruja XmlToDom **/ " . "\n";
        if( $this->sPageNamespace )
        {
            $sScript .= " namespace " . $this->sPageNamespace . "; " . "\n";
        }
        return $sScript;
    }

    protected function onFooterScript( $sVarName = "" , $booPhpTags = true )
    {
        $strScript =  "";
        $strScript .= " return " . $sVarName . ";\n";
        $strScript .= " /** end of script **/ ";
        if( $booPhpTags )
        {
            $strScript .= "\n ?>";
        }
        return $strScript;
    }

    protected function CreateVarName( $sNamespace , $sTagName )
    {
        $sName = strtolower( $sTagName );
        if( !isset( self::$arrCountByTagName[ $sName ] ) )
        {
            self::$arrCountByTagName[ $sName ] = 1;
        }
        else
        {
            ++self::$arrCountByTagName[ $sName ];
        }

        if( $this->sPageNamespace != "" )
        {
            $sPageNamespace = "";
            //$sPageNamespace = $this->sPageNamespace . "::";
        }
        else
        {
            $sPageNamespace = "";
        }

        $strVarName = ucfirst( strtolower( $sTagName ) );

        return $sPageNamespace . '$' . $this->sObjectTagHeader . $strVarName . self::$arrCountByTagName[ $sName ];
    }

    protected function onCreateTag( $sVarName , $sNamespace , $sTagName )
    {
        $strClassName = strtolower( $sTagName );
        if( \in_array( $strClassName , self::$arrListReservedWords ) )
        {
            $strClassName = self::$strReservedWordTagPrefix . ucfirst( $strClassName ) .
                self::$strReservedWordTagSufix;
        }
        $strClassName = ucfirst( $strClassName );

        if( $sNamespace == "" )
        {
            $sVarCommand = $sVarName . " = new " . $strClassName . "();\n";
        }
        else
        {
            $sVarCommand = $sVarName . " = new " . $sNamespace . "\\" . $strClassName . "();\n";
        }
        return $sVarCommand;
    }

    protected function onCloseTag( $sVarName , $sNamespace, $sTagName )
    {
        return $sVarName . "->closeTag()" . ";\n";
    }

    protected function onAppendChild(  $sVarParent, $sVarChild )
    {
        return $sVarParent . "->" . "appendChild( " . $sVarChild . ") "  . ";\n";
    }

    protected function onSetAttribute( $sVarName , $sNamespace, $sTagName, $sAttribute, $sValue )
    {
        $strPattern = '/^' . $this->strOpenPhpTag . '(?P<value>.+)' . $this->strClosePhpTag . '/';
        $arrMatchs = array();
        if( preg_match( $strPattern , $sValue , $arrMatchs ) )
        {
            $sValue = $arrMatchs[ 'value' ];
        }
        else
        {
             $sValue = "'" . addslashes( $sValue ) . "'";
        }
        return $sVarName . "->" . "set" . ucfirst( strtolower( $sAttribute ) ) . "( " .$sValue . " )"  . ";\n";
    }

    protected function createScriptOfText( $objDomText , $sVarParent = null )
    {
        if( $this->booIgnoreEmptyText && trim( $objDomText->nodeValue ) == "" )
        {
            return "";
        }
        // 1 get  the tag attributes //
        $sNamespace = $this->sDefaultNamespace;
        $sTagName = $this->sTextElement;
        $sVarName = $this->CreateVarName( $sNamespace , $sTagName );

        // 2 create a local script //
        $sScript = "";

        // 3 create the tag textElement //
        $sScript .= $this->onCreateTag( $sVarName , $sNamespace , $sTagName );

        // 4 append to the tag the text //
        $strValue = $objDomText->nodeValue;
        if( !$this->booKeepTabs  )
        {
            $strValue = trim( ( $strValue ) );
        }

        $strPattern = '/' . $this->strOpenPhpTag . '(?P<value>.+)' . $this->strClosePhpTag . '/';
        $strValue = preg_replace( $strPattern , "' . \\1 . '" , $strValue );

        $sScript .= $sVarName . "->" . $this->sTextMethod . "( '" . $strValue . "' )" . ";\n";

        // 5 append the text element into its father //
        if ( $sVarParent != null )
        {
            $sScript .= $this->onAppendChild(  $sVarParent, $sVarName );
        }

        // 6 return the local script //
        return $sScript;
    }

    protected function getPhpTagNamespace( $sNamespace )
    {
        $strUri = $this->objDomElement->lookupNamespaceURI( $sNamespace );
        $strPhpNamespace = \str_replace( ".", "\\",  $strUri );
        return $strPhpNamespace;
    }

    protected function createScriptOfNode( $objDomElement , $sVarParent = null , $booPhpTags = true )
    {
        // 1. get the attributes of the actual tag //

        $arrTag = explode( ":" , $objDomElement->tagName );
        $sTagName = array_pop( $arrTag );
        $sNamespace = $objDomElement->prefix;


        if( $sNamespace == "" )
        {
            $sNamespace = $this->sDefaultNamespace;
        }
        else
        {
            $sNamespace = $this->getPhpTagNamespace( $sNamespace );
        }
        $sVarName = $this->CreateVarName( $sNamespace , $sTagName );

        // 2. init the local script //

        $sScript = "";

        // 3. if the tag is the root, add the header script into the local script //

        if( $sVarParent == null )
        {
            $sScript .= $this->onHeaderScript( "" , $booPhpTags );
        }

        // 4. create the script of creation of the tag //

        $sScript .= $this->onCreateTag( $sVarName , $sNamespace , $sTagName );

        // 5. create the script of creation of the attributes //

        foreach( $objDomElement->attributes as $objDomAttribute )
        {
            $sAttributeName = $objDomAttribute->name;
            $sValue = $objDomAttribute->value;
            $sScript .= $this->onSetAttribute( $sVarName , $sNamespace, $sTagName, $sAttributeName, $sValue );
        }

        // 6. append the script of the child tags //

        foreach( $objDomElement->childNodes as $objDomChild )
        {
            $strClass = get_class( $objDomChild );
            switch( $strClass )
            {
                case "DOMText":
                    {
                        // 6.1 case the child be a text element, //
                        // append to the local script the script //
                        // of creation of the child text element //
                        $sScript .= $this->createScriptOfText( $objDomChild , $sVarName );
                        break;
                    }
                case "DOMElement":
                    {
                        // 6.2 case the child be a node,         //
                        // append to the local script the script //
                        // of creation of the child node element //
                        $sScript .= $this->createScriptOfNode( $objDomChild , $sVarName );
                        break;
                    }
                case "DOMComment":
                    {
                        // 6.3 comments should be ingored //
                        break;
                    }
                default:
                    {
                        // 6.4 otherwise, it is a unknow type of object //
                        // and a error should be throw                  //
                        throw new \Exception( "Error, unknow class " . $strClass );
                    }
            }
        }

        // 7. generate the script of the closing tag //

        $sScript .= $this->onCloseTag( $sVarName , $sNamespace, $sTagName );

        // 8. if the script have a father, generate the script to append to it //

        if( $sVarParent != null )
        {
            $sScript .= $this->onAppendChild(  $sVarParent, $sVarName );
        }

        // 9. if the node is the root, generate the footer script //

        if( $sVarParent == null )
        {
            $sScript .= $this->onFooterScript( $sVarName , $booPhpTags );
        }

        // 10. return the generated script //
        return $sScript;
    }

    public function createScriptFromXml( $sXml , $booPhpTags = true )
    {
        $this->objDomElement = new \DomDocument( "1.0" );
        try
        {
            $booResult = @$this->objDomElement->loadXml( trim( $sXml ) );
            if( $booResult === false )
            {
                throw new \Exception( 'Unable to read the Xml' );
            }
        }
        catch( \Exception $objException )
        {
            \Coruja\Debug\CorujaDebug::debug( $objException->getMessage() );
            \Coruja\Debug\CorujaDebug::debugHtmlCode( $sXml );
            \Coruja\Debug\CorujaDebug::debug( $sXml );
            throw $objException;
        }
        return $this->createScriptOfNode( $this->objDomElement->documentElement , null , $booPhpTags );
    }

    public function createScriptFromFile( $sFileName , $sPageNamespace = "")
    {
        $this->sPageNamespace = $sPageNamespace;
        $sXml = get_file_content( $sFileName );
        $this->createScriptFromXml( $sXml );
        return $sXml;
    }

    public function createScriptFromString( $sXmlString, $sPageNamespace = "")
    {
        $this->sPageNamespace = $sPageNamespace;
        $sScript = $this->createScriptFromXml( $sXmlString );
        return $sScript;
    }

    public function loadString( $sXmlString, $sPageNamespace = "" , $objContext = null )
    {
        if( $objContext === null )
        {
            $objContext = new \stdClass();
        }
        $this->sPageNamespace = $sPageNamespace;
        $sScript = $this->createScriptFromXml( $sXmlString , false );
        $objResult = eval( $sScript );
        $objResult->setContext( $objContext );
        return $objResult;
    }

}
?>