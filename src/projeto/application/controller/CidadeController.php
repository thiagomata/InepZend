<?php

class CidadeController extends \Local\Controller\Action {

    public function indexAction( \Projeto\Form\CidadeForm $objCidadeForm ) {
        $intCount = \Projeto\Model\EstadoTable::getInstance()->getCount();
        if( $intCount == 0 )
        {
            $this->addWarning( 'Não existem Estados cadastrados!' );
            $this->view->objCidadeForm = null;
        }
        else
        {
            $this->view->objCidadeForm = $objCidadeForm;
        }
        $this->render( 'edit' );
    }

    /**
     * Editar ou Criar Cidade
     *
     * @param \Projeto\Form\CidadeForm $objCidadeForm
     * @param integer $idEstado
     * @param integer $idCidade
     */
    public function editAction( \Projeto\Form\CidadeForm $objCidadeForm , $idEstado = null , $idCidade = null )
    {
        if( $idEstado !== null )
        {
            $objCidadeForm->setEstadoId( $idEstado );
        }
        if( $idCidade !== null )
        {
            $objCidade = Projeto\Model\CidadeTable::getInstance()->getById( (integer)$idCidade , true );
            $objCidadeForm->loadEntity( $objCidade );
        }
        $this->view->objCidadeForm = $objCidadeForm;
    }

    /**
     * Persistir alteracoes na cidade
     *
     * @param \Projeto\Form\CidadeForm $objCidadeForm
     */
    public function submitAction( \Projeto\Form\CidadeForm $objCidadeForm )
    {
        if( $objCidadeForm->isEnviar() )
        {
            $objCidade = $objCidadeForm->getAsEntity();
            $objCidade->save();
        }
        if( $objCidadeForm->isCancelar() )
        {
            $intIdCidade = $objCidadeForm->getId();
            $this->redirectAction( 'edit',  array( 'idCidade' => $intIdCidade ) );
        }
        if( $objCidadeForm->isVoltar() )
        {
            $objCidade = $objCidadeForm->getAsEntity();
            $this->redirectController( 'estado' , 'update' , array( 'id' => $objCidade->getIdEstado() ) );
        }
        $this->redirectController( 'estado' , 'update' , array( 'id' => $objCidade->getIdEstado() ) );
    }

    /**
     * Remover Cidade
     *
     * @param integer $id
     */
    public function deleteAction( $idCidade )
    {
        $objCidade = \Projeto\Model\CidadeTable::getInstance()->getById( (integer)$idCidade , true );
        $idEstado = $objCidade->getIdEstado();
        if( $objCidade->getId() )
        {

            $objCidade->delete();
            $this->addMessage( 'Cidade removida com sucesso.' );
        }
        $this->redirectController( 'Estado' , 'update' , array( 'id' => $idEstado ) );
    }
}
