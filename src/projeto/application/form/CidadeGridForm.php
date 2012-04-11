<?php
namespace Projeto\Form;

/**
 * @entity Projeto\Model\Cidade
 * 
 */
class CidadeGridForm extends \Local\Form\InepGridForm
{
    /**
     *
     * @label Adicionar Cidade
     * @var string
     * @tag submit
     */
    protected $adicionarcidade;

    /**
     *
     * @var integer
     * @tag hidden
     */
    protected $idEstado;

    protected $objEstado;

    public function init()
    {
        $this->setController( 'estado' );
    }

    public function setIdEstado( $intIdEstado )
    {
        $intIdEstado = (integer)$intIdEstado;
        $objEstado = \Projeto\Model\EstadoTable::getInstance()->getById( $intIdEstado , true );
        $this->setEstado( $objEstado );
    }

    public function getIdEstado()
    {
        if( $this->objEstado )
        {
            return $this->objEstado->getId();
        }
        return $this->idEstado;
    }

    public function setEstado(\Projeto\Model\Estado $objEstado )
    {
        $this->objEstado = $objEstado;
        $this->idEstado = $objEstado->getId();
    }

    /**
     *
     * @return \Projeto\Model\Estado
     */
    public function getEstado()
    {
        return $this->objEstado;
    }

    /**
     *
     * @return Cidade
     */
    protected function getInstanceRow()
    {
        return \Projeto\Model\CidadeTable::getInstance()->getRow();
    }

    public function getCount()
    {
        return \Projeto\Model\CidadeTable::getInstance()->getCount();
    }

    public function getEntities()
    {
        $strWhere =  $this->getInstanceRow()->getIdEstadoColumn() . ' = :idCidadeEstado ';
        $arrWhere = array( 'idCidadeEstado' => $this->getIdEstado() );

        return \Projeto\Model\CidadeTable::getInstance()->getPage(
            $this->getFirst() ,
            $this->getPageSize() ,
            $strWhere  ,
            $this->getHeaderOrder() ,
            $arrWhere
        );
    }

    public function initHeaders()
    {
        $objHeaderCidade = new  \Local\Form\InepFormHeader( 'Cidade');
        $objHeaderCidade->setLabel( 'Cidade' );
        $objHeaderCidade->setWidth( 50 );
        $objHeaderCidade->setColumn( \Projeto\Model\CidadeTable::getInstance()->getRow()->getNomeColumn() );
        $this->addButtonToHeader( $objHeaderCidade );
        $this->addHeader( $objHeaderCidade );

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
        return $this->addCidadeRow( $objEntity , $objRow );
    }
    
    public function addCidadeRow(
        \Projeto\Model\Cidade $objEntity ,
        \Local\Form\InepFormRow $objRow
    )
    {
        $objRow->setColumnValue( $this->getHeaderById( 'Cidade' )  , $objEntity->getNome() );
        $objRow->setEvent( $this->getEventEdit( $objEntity ) );

        $objButtonsHeader = $this->getHeaderById( 'Buttons' );
        $objRow->addButton( $objButtonsHeader , $this->getButtonUpdate( $objEntity ) );
        $objRow->addButton( $objButtonsHeader , $this->getButtonDelete( $objEntity ) );
    }

    public function getEmptyListMessage()
    {
        return "Não existem cidades neste estado.";
    }

}