<?php
//namespace Example\Controller;

class StateController extends \Local\Controller\Action {

    /**
     * Validate and Change the State
     *
     * Case Submit Button Clicked, validate and save
     * Case Cancel Button Clicked, restore the entity
     * Case Back Button Clicked, return to index
     *
     * @param \Example\Form\StateForm $objStateForm
     */
    protected function save( \Example\Form\StateForm $objStateForm )
    {
        if( $objStateForm->isSend() )
        {
            $objState = $objStateForm->getAsEntity();
            if( $this->validate( $objState ) )
            {
                $objState->save();
                $this->addMessage( 'State successfully added' );
            }
            $objStateForm->loadEntity( $objState );
        }
        else if( $objStateForm->isCancel() )
        {
            $intIdState = $objStateForm->getId();
            $objState = \Example\Model\StateTable::getInstance()->getById( (integer)$intIdState , true );
            $objStateForm->loadEntity( $objState );
        }
        else if( $objStateForm->isBack() )
        {
            $this->redirectController( 'index' );
        }
    }

    /**
     *
     * State Main Screen with the State Grid
     *
     * @param \Example\Form\StateGridForm $objStateGridForm
     */
    public function indexAction(
            \Example\Form\StateGridForm $objStateGridForm = null
        )
    {
        if( $objStateGridForm === null )
        {
            $objStateGridForm = new \Example\Form\StateGridForm();
        }
        $objStateForm = new \Example\Form\StateForm();
        
        $objEvent = new Local\Form\InepFormEvent();
        $objEvent->setController( 'index' );
        $objEvent->setAction( 'index' );
        $this->view->objFormState = $objStateForm;
        $this->view->objFormGridState = $objStateGridForm;
        $this->render( 'index' );
    }

    /**
     * Creating a New State
     *
     * @param \Example\Form\StateForm $objStateForm
     */
    public function submitAction( \Example\Form\StateForm $objStateForm ) {
        $this->save( $objStateForm );
        $this->indexAction();
    }

    /**
     * Update the State or Add / Remove Citys to It
     *
     * @param integer $id
     * @param \Example\Form\StateForm $objStateForm
     */
    public function updateAction(
        \Example\Form\StateForm $objStateForm ,
        \Example\Form\CityGridForm $objCityGridForm ,
        $id = null 
    )
    {
        if( $id == null )
        {
            $id = $objCityGridForm->getIdState();
        }
        /**
         * Tenta carregar o State pelo Id recebido e carrega-lo no formulario
         */
        $objState = \Example\Model\StateTable::getInstance()->getById( (integer)$id , true );
        $objStateForm->loadEntity( $objState );

        $objCityGridForm->setState( $objState );

        /**
         * Diferente das paginacoes padroes, essa utilizará a action update para
         * fazer a paginacao e nao a action navigator que já é utilizada
         * para a paginação do State
         */
        $objCityGridForm->setController( 'state' );
        $objCityGridForm->setAction( 'update' );
        $objCityGridForm->setNavigationAction( 'update' );

        /**
         * Botao de delete na grid deve enviar para o delete da controller City
         */
        $objCityGridForm->setDeleteAction( 'delete' );
        $objCityGridForm->setDeleteController( 'City' );

        /**
         * Botao edit da grid deve enviar para o edit da controller City
         */
        $objCityGridForm->setUpdateAction( 'edit' );
        $objCityGridForm->setUpdateController( 'city' );

        /**
         * O id da City tera o nome idCity para não colidir com o campo
         * id que esta com a informacao do id do State
         */
        $objCityGridForm->setEventIdParam( 'idCity' );

        /**
         * Caso o botao adicionar City tenha sido pressionado, redireciona
         * para o metodo edit da controladora City
         */
        if( $objCityGridForm->isAdicionarCity() )
        {
            $this->redirectController( 'City' , 'edit' , array( 'idState' => $objCityGridForm->getIdState() ) );
        }

        $this->view->objForm = $objStateForm;
        $this->view->objFormCitys = $objCityGridForm;
    }

    /**
     * Remove one state and redirect the user to the index
     *
     * @param integer $id
     */
    public function deleteAction( $id )
    {
        $objState = \Example\Model\StateTable::getInstance()->getById( (integer)$id , true );
        if( $objState->getId() )
        {
            $objState->delete();
            $this->addMessage( 'State removido com sucesso.' );
        }
        $this->indexAction();
    }

    /**
     * Navigation of the State Grid
     *
     * @param \Example\Form\StateGridForm $objStateGridForm
     */
    public function navigationAction( \Example\Form\StateGridForm $objStateGridForm  )
    {
        $this->indexAction( $objStateGridForm );
    }
}

