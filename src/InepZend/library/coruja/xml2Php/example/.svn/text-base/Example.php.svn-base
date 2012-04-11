<?php
namespace Coruja\Xml2Php\Example;

class Example
{
    public static function example2()
    {
        ini_set( "display_errors" , "On" );
        error_reporting( E_ALL | E_STRICT );
        set_time_limit( 0 );

        $strXml = <<<EOD
<?xml version="1.0" ?>
    <html xmlns:special="special" xmlns:outro="outro" >
        <head>
            <title>
                Exemplo
            </title>
        </head>
        <body>
            <div class="cool">
                <span class="tema">
                    Noticias
                </span>
                <strong>
                    #$this->nome#
                </strong>
                <special:number />
                <outro:number />
            </div>
        </body>
    </html>
EOD;

        \Coruja\Debug\CorujaDebug::debugHtmlCode( $strXml );
        $objXml2Php = new \Coruja\Xml2Php\InepXml2Php();
        $strCode = $objXml2Php->createScriptFromString( $strXml );
        highlight_string( $strCode );
    }

    public static function example1()
    {
        ini_set( "display_errors" , "On" );
        error_reporting( E_ALL | E_STRICT );
        set_time_limit( 0 );

        $strXml = <<<EOD
<?xml version="1.0" ?>
    <book>
        <chapter xmlns:xi="NomeDoNameSpaceNoPhp" >
        <title>Books of the other guy..</title>
        <para>
         <xi:include href="book.xml">
          <xi:fallback>
           <error>xinclude: book.xml not found</error>
          </xi:fallback>
         </xi:include>
         <include>
          This is another namespace
         </include>
        </para>
        </chapter>
        <chapter xmlns:xa="opa" >
        <title>Books of the other guy..</title>
        <para>
         <xa:include href="book.xml">
          <xa:fallback>
           <error>xinclude: book.xml not found</error>
          </xa:fallback>
         </xa:include>
         <include>
          This is another namespace
         </include>
        </para>
        </chapter>
    </book>
EOD;

        print \Coruja\Debug\CorujaDebug::debugHtmlCode( $strXml );
        $objXml2Php = new \Coruja\Xml2Php\CorujaXml2Php();
        $objXml2Php = new \Coruja\Xml2Php\Xml2Php();
        $strCode = $objXml2Php->createScriptFromString( $strXml );
        highlight_string( $strCode );
    }
}
?>