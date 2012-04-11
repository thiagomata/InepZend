<?php
namespace Projeto\Form;

/**
 * @entity Projeto\Model\Estado
 * 
 */
class EstadoGridForm extends \Local\Form\InepGridForm
{

    public function getCount()
    {
        return \Projeto\Model\EstadoTable::getInstance()->getCount();
    }
    public function getEntities()
    {
        
        return \Projeto\Model\EstadoTable::getInstance()->getPage(
            $this->getFirst() ,
            $this->getPageSize() ,
            null  ,
            $this->getHeaderOrder()
        );
    }

    public function initHeaders()
    {
        $objHeaderEstado = new  \Local\Form\InepFormHeader( 'Estado');
        $objHeaderEstado->setLabel( 'Estado' );
        $objHeaderEstado->setWidth( 50 );
        $objHeaderEstado->setColumn( \Projeto\Model\EstadoTable::getInstance()->getRow()->getNomeColumn() );
        $this->addButtonToHeader( $objHeaderEstado );
        $this->addHeader( $objHeaderEstado );

        $objHeaderUF = new \Local\Form\InepFormHeader( 'UF');
        $objHeaderUF->setLabel( 'Unidade Federação' );
        $objHeaderUF->setWidth( 200 );
        $objHeaderUF->setColumn( \Projeto\Model\EstadoTable::getInstance()->getRow()->getUfColumn() );
        $this->addButtonToHeader( $objHeaderUF );
        $this->addHeader( $objHeaderUF );

        $objHeaderCidades = new \Local\Form\InepFormHeader( 'Cidades');
        $objHeaderCidades->setLabel( 'Total de Cidades' );
        $objHeaderCidades->setWidth( 100 );
        $this->addHeader( $objHeaderCidades );

        $objHeaderButtons = new \Local\Form\InepFormHeader( 'Buttons');
        $objHeaderButtons->setLabel( '' );
        $objHeaderButtons->setWidth( 100 );
        $this->addHeader( $objHeaderButtons );
    }

    public function addRow(
       \Local\Model\Entity $objEntity ,
       \Local\Form\InepFormRow $objRow
    )
    {
        return $this->addEstadoRow( $objEntity , $objRow );
    }
    
    public function addEstadoRow(
        \Projeto\Model\Estado $objEntity ,
        \Local\Form\InepFormRow $objRow
    )
    {
        $objRow->setColumnValue( $this->getHeaderById( 'Estado' )  , $objEntity->getNome() );
        $objRow->setColumnValue( $this->getHeaderById( 'UF' )      , $objEntity->getUf() );
        $objRow->setColumnValue( $this->getHeaderById( 'Cidades' ) , $objEntity->getQtdCidades() );

        $objRow->setEvent( $this->getEventEdit( $objEntity ) );

        $objButtonsHeader = $this->getHeaderById( 'Buttons' );
        $objRow->addButton( $objButtonsHeader , $this->getButtonUpdate( $objEntity ) );
        if( $objEntity->getQtdCidades() == 0 )
        {
            $objRow->addButton( $objButtonsHeader , $this->getButtonDelete( $objEntity ) );
        }
    }
}
 