<?php

class CityController extends \Local\Controller\Action {

    public function indexAction( \Example\Form\CityForm $objCityForm ) {
        $intCount = \Example\Model\StateTable::getInstance()->getCount();
        if( $intCount == 0 )
        {
            $this->addWarning( 'No registered States.' );
            $this->view->objCityForm = null;
        }
        else
        {
            $this->view->objCityForm = $objCityForm;
        }
        $this->render( 'edit' );
    }

    /**
     * Editar ou Criar City
     *
     * @param \Example\Form\CityForm $objCityForm
     * @param integer $idState
     * @param integer $idCity
     */
    public function editAction( \Example\Form\CityForm $objCityForm , $idState = null , $idCity = null )
    {
        if( $idState !== null )
        {
            $objCityForm->setStateId( $idState );
        }
        if( $idCity !== null )
        {
            $objCity = Example\Model\CityTable::getInstance()->getById( (integer)$idCity , true );
            $objCityForm->loadEntity( $objCity );
        }
        $this->view->objCityForm = $objCityForm;
    }

    /**
     * Persistir alteracoes na City
     *
     * @param \Example\Form\CityForm $objCityForm
     */
    public function submitAction( \Example\Form\CityForm $objCityForm )
    {
        if( $objCityForm->isEnviar() )
        {
            $objCity = $objCityForm->getAsEntity();
            $objCity->save();
        }
        if( $objCityForm->isCancelar() )
        {
            $intIdCity = $objCityForm->getId();
            $this->redirectAction( 'edit',  array( 'idCity' => $intIdCity ) );
        }
        if( $objCityForm->isVoltar() )
        {
            $objCity = $objCityForm->getAsEntity();
            $this->redirectController( 'State' , 'update' , array( 'id' => $objCity->getIdState() ) );
        }
        $this->redirectController( 'State' , 'update' , array( 'id' => $objCity->getIdState() ) );
    }

    /**
     * Remover City
     *
     * @param integer $id
     */
    public function deleteAction( $idCity )
    {
        $objCity = \Example\Model\CityTable::getInstance()->getById( (integer)$idCity , true );
        $idState = $objCity->getIdState();
        if( $objCity->getId() )
        {

            $objCity->delete();
            $this->addMessage( 'City successfully removed.' );
        }
        $this->redirectController( 'State' , 'update' , array( 'id' => $idState ) );
    }
}
