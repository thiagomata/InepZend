<?php 
 /** generated automatically by coruja XmlToDom **/ 
$oTagHtml1 = new xhtml\Html();
$oTagHead1 = new xhtml\Head();
$oTagTitle1 = new xhtml\Title();
$oTagText1 = new xhtml\Text();
$oTagText1->setTextContent( 'Olá mundo' );
$oTagTitle1->addChild( $oTagText1) ;
$oTagHead1->addChild( $oTagTitle1) ;
$oTagHtml1->addChild( $oTagHead1) ;
$oTagBody1 = new xhtml\Body();
$oTagBody1->setStyle( 'background-color: rgb(250,250,255); color: blue' );
$oTagP1 = new xhtml\P();
$oTagSpan1 = new xhtml\Span();
$oTagText2 = new xhtml\Text();
$oTagText2->setTextContent( 'Olá Mundo' );
$oTagSpan1->addChild( $oTagText2) ;
$oTagP1->addChild( $oTagSpan1) ;
$oTagBody1->addChild( $oTagP1) ;
$oTagDiv1 = new xhtml\Div();
$oTagDiv1->setId( 'teste' );
$oTagDiv1->setClass( '{# 1 + 1 #}' );
$oTagForm1 = new xhtml\Form();
$oTagForm1->setAction( '' );
$oTagForm1->setMethod( 'post' );
$oTagNumero1 = new projeto\template\tags\Numero();
$oTagNumero1->setName( 'joao' );
$oTagNumero1->setType( 'checkbox' );
$oTagForm1->addChild( $oTagNumero1) ;
$oTagInput1 = new xhtml\Input();
$oTagInput1->setType( 'text' );
$oTagInput1->setName( 'outro' );
$oTagInput1->setDisabled( 'true' );
$oTagForm1->addChild( $oTagInput1) ;
$oTagDiv1->addChild( $oTagForm1) ;
$oTagBody1->addChild( $oTagDiv1) ;
$oTagIf1 = new xhtml\template\XmlIf();
$oTagIf1->setValue( '{#false#}' );
$oTagText3 = new xhtml\Text();
$oTagText3->setTextContent( 'é falso' );
$oTagIf1->addChild( $oTagText3) ;
$oTagElse1 = new xhtml\template\XmlElse();
$oTagText4 = new xhtml\Text();
$oTagText4->setTextContent( '{# date( "h:i:s" ) #}' );
$oTagElse1->addChild( $oTagText4) ;
$oTagIf1->addChild( $oTagElse1) ;
$oTagBody1->addChild( $oTagIf1) ;
$oTagDiv2 = new xhtml\Div();
$oTagText5 = new xhtml\Text();
$oTagText5->setTextContent( '{# 1 + 2 #} abc {# $this->nome #}' );
$oTagDiv2->addChild( $oTagText5) ;
$oTagBody1->addChild( $oTagDiv2) ;
$oTagForeach1 = new xhtml\template\XmlForeach();
$oTagForeach1->setList( '1 , 2 , 3' );
$oTagForeach1->setItem( 'oi' );
$oTagUl1 = new xhtml\Ul();
$oTagEachitem1 = new xhtml\template\Eachitem();
$oTagLi1 = new xhtml\Li();
$oTagText6 = new xhtml\Text();
$oTagText6->setTextContent( '{# $this->key #}
                        {# $this->oi #}' );
$oTagLi1->addChild( $oTagText6) ;
$oTagEachitem1->addChild( $oTagLi1) ;
$oTagUl1->addChild( $oTagEachitem1) ;
$oTagForeach1->addChild( $oTagUl1) ;
$oTagBody1->addChild( $oTagForeach1) ;
$oTagDiv3 = new xhtml\Div();
$oTagForeach2 = new xhtml\template\XmlForeach();
$oTagForeach2->setList( '{# $this->getNomes() #}' );
$oTagForeach2->setItem( 'nome' );
$oTagUl2 = new xhtml\Ul();
$oTagEachitem2 = new xhtml\template\Eachitem();
$oTagLi2 = new xhtml\Li();
$oTagLast1 = new xhtml\template\Last();
$oTagText7 = new xhtml\Text();
$oTagText7->setTextContent( 'por último, mas não menos importante,' );
$oTagLast1->addChild( $oTagText7) ;
$oTagLi2->addChild( $oTagLast1) ;
$oTagFirst1 = new xhtml\template\First();
$oTagText8 = new xhtml\Text();
$oTagText8->setTextContent( '{# ucfirst( $this->nome ) #}' );
$oTagFirst1->addChild( $oTagText8) ;
$oTagLi2->addChild( $oTagFirst1) ;
$oTagNotfirst1 = new xhtml\template\Notfirst();
$oTagText9 = new xhtml\Text();
$oTagText9->setTextContent( '{# strtolower( $this->nome ) #}' );
$oTagNotfirst1->addChild( $oTagText9) ;
$oTagLi2->addChild( $oTagNotfirst1) ;
$oTagNotlast1 = new xhtml\template\Notlast();
$oTagText10 = new xhtml\Text();
$oTagText10->setTextContent( ',' );
$oTagNotlast1->addChild( $oTagText10) ;
$oTagLi2->addChild( $oTagNotlast1) ;
$oTagLast2 = new xhtml\template\Last();
$oTagText11 = new xhtml\Text();
$oTagText11->setTextContent( '.' );
$oTagLast2->addChild( $oTagText11) ;
$oTagLi2->addChild( $oTagLast2) ;
$oTagEachitem2->addChild( $oTagLi2) ;
$oTagUl2->addChild( $oTagEachitem2) ;
$oTagForeach2->addChild( $oTagUl2) ;
$oTagEmpty1 = new xhtml\template\XmlEmpty();
$oTagText12 = new xhtml\Text();
$oTagText12->setTextContent( 'EMPTY!' );
$oTagEmpty1->addChild( $oTagText12) ;
$oTagForeach2->addChild( $oTagEmpty1) ;
$oTagDiv3->addChild( $oTagForeach2) ;
$oTagBody1->addChild( $oTagDiv3) ;
$oTagForeach3 = new xhtml\template\XmlForeach();
$oTagForeach3->setList( '{# $this->getCarros() #}' );
$oTagTable1 = new xhtml\Table();
$oTagThead1 = new xhtml\Thead();
$oTagTr1 = new xhtml\Tr();
$oTagTh1 = new xhtml\Th();
$oTagText13 = new xhtml\Text();
$oTagText13->setTextContent( 'Chave' );
$oTagTh1->addChild( $oTagText13) ;
$oTagTr1->addChild( $oTagTh1) ;
$oTagTh2 = new xhtml\Th();
$oTagText14 = new xhtml\Text();
$oTagText14->setTextContent( 'Nome' );
$oTagTh2->addChild( $oTagText14) ;
$oTagTr1->addChild( $oTagTh2) ;
$oTagThead1->addChild( $oTagTr1) ;
$oTagTable1->addChild( $oTagThead1) ;
$oTagTbody1 = new xhtml\Tbody();
$oTagEachitem3 = new xhtml\template\Eachitem();
$oTagTr2 = new xhtml\Tr();
$oTagTd1 = new xhtml\Td();
$oTagText15 = new xhtml\Text();
$oTagText15->setTextContent( '{# $this->key + 1 #}º Carro' );
$oTagTd1->addChild( $oTagText15) ;
$oTagTr2->addChild( $oTagTd1) ;
$oTagTd2 = new xhtml\Td();
$oTagText16 = new xhtml\Text();
$oTagText16->setTextContent( '{# $this->item #}' );
$oTagTd2->addChild( $oTagText16) ;
$oTagTr2->addChild( $oTagTd2) ;
$oTagEachitem3->addChild( $oTagTr2) ;
$oTagTbody1->addChild( $oTagEachitem3) ;
$oTagTable1->addChild( $oTagTbody1) ;
$oTagForeach3->addChild( $oTagTable1) ;
$oTagEmpty2 = new xhtml\template\XmlEmpty();
$oTagSpan2 = new xhtml\Span();
$oTagText17 = new xhtml\Text();
$oTagText17->setTextContent( 'Sem Carros' );
$oTagSpan2->addChild( $oTagText17) ;
$oTagEmpty2->addChild( $oTagSpan2) ;
$oTagForeach3->addChild( $oTagEmpty2) ;
$oTagBody1->addChild( $oTagForeach3) ;
$oTagHtml1->addChild( $oTagBody1) ;
 return $oTagHtml1;
 /** end of script **/ 
 ?>