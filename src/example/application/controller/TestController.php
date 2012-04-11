<?php
class TestController extends \Local\Controller\Action {

    public function indexAction()
    {
        $this->fileAction();
    }

    public function stringAction()
    {
        $objHtml = $this->loadStringTemplate('
<html>
    <head><title>joao</title></head>
    <body><div><span>oi</span></div></body>
</html>
            ');
        Coruja\Debug\CorujaDebug::show( $objHtml->drawMe() );
        Coruja\Debug\CorujaDebug::debugHtmlCode( $objHtml->drawMe() , 1 );
    }

    public function fileAction()
    {
        $this->nome = "joao";
        $objTemplate = $this->getTemplate( "example" );
        Coruja\Debug\CorujaDebug::debugHtmlCode( file_get_contents( $objTemplate->getTemplateFile() ) );
        $objHtml = require_once( $objTemplate->getPhpCodeFile() );
        $objHtml->setController( $this );

        $objHtml->getFirstChildByTagName( "Body" )->addStyle( "font-size:20px" );
        Coruja\Debug\CorujaDebug::show( $objHtml->drawMe() );
        Coruja\Debug\CorujaDebug::debugHtmlCode( $objHtml->drawMe()  , 1 );
    }

    public function objectAction()
    {
        $objHtml = new \xhtml\Html();
        $objBody = new \xhtml\Body();
        $objHead = new \xhtml\Head();
        $objTitle = new xhtml\Title();
        $objScript = new \xhtml\Script();
        $objDiv = new \xhtml\Div();
        $objHtml->addChild( $objHead );
        $objHtml->addChild( $objBody );
        $objHead->addChild( $objScript );
        $objHead->addChild( $objTitle );
        $objText = new \xhtml\Text();
        $objText->setTextContent( "oi" );
        $objTitle->addChild( $objText );
        $objBody->addChild( $objDiv );

        $objSpan = new xhtml\Span();
        $objSpan->setId( 'eu' );
        $objSpan->addText( 'oi' );
        $objDiv->addChild( $objSpan );

        $objSpan = new xhtml\Span();
        $objSpan->setId( 'ele' );
        $objSpan->addText( 'mundo' );
        $objDiv->addChild( $objSpan );

        $objForm = new xhtml\Form();
        $objNumero = new xhtml\Numero();
        $objForm->addChild( $objNumero );
        $objDiv->addChild( $objForm );
        Coruja\Debug\CorujaDebug::show( $objHtml->drawMe() );
        Coruja\Debug\CorujaDebug::debugHtmlCode( $objHtml->drawMe() , 1 );
    }

    public function getNames()
    {
        return array( "Jonh" , "Joe" , "Albert" );
    }

    public function getCars()
    {
        return array( 'Beetle' , 'Punto' , 'Chepala');
    }
}

