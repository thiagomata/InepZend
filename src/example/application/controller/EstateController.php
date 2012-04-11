<?php
//namespace Example\Controller;

class EstateController extends \Local\Controller\Action {

    /**
     * Valida e Altera o Estate caso Tenha clicado no Enviar
     * Cancela e Restaura o Estate caso Tenha ciclado no Cancelar
     *
     * @param \Example\Form\EstateForm $objEstateForm
     */
    protected function save( \Example\Form\EstateForm $objEstateForm )
    {
        if( $objEstateForm->isEnviar() )
        {
            $objEstate = $objEstateForm->getAsEntity();
            if( $this->validate( $objEstate ) )
            {
                $objEstate->save();
                $this->addMessage( 'Estate adicionado com sucesso' );
            }
            $objEstateForm->loadEntity( $objEstate );
        }
        else if( $objEstateForm->isCancelar() )
        {
            $intIdEstate = $objEstateForm->getId();
            $objEstate = \Example\Model\EstateTable::getInstance()->getById( (integer)$intIdEstate , true );
            $objEstateForm->loadEntity( $objEstate );
        }
        else if( $objEstateForm->isVoltar() )
        {
            $this->redirectController( 'index' );
        }
    }

    /**
     * Tela principal com a Grid dos Estates
     *
     * @param \Example\Form\EstateGridForm $objEstateGridForm
     */
    public function indexAction(
            \Example\Form\EstateGridForm $objEstateGridForm = null
        )
    {
        if( $objEstateGridForm === null )
        {
            $objEstateGridForm = new \Example\Form\EstateGridForm();
        }
        $objEstateForm = new \Example\Form\EstateForm();
        
        $objEvent = new Local\Form\InepFormEvent();
        $objEvent->setController( 'index' );
        $objEvent->setAction( 'index' );
        $objEstateForm->getOiElement()->setFormEvent( $objEvent );
        $this->view->objFormEstate = $objEstateForm;
        $this->view->objFormGridEstate = $objEstateGridForm;
        $this->render( 'index' );
    }

    /**
     * Criação de Estate Novo
     *
     * @param \Example\Form\EstateForm $objEstateForm
     */
    public function submitAction( \Example\Form\EstateForm $objEstateForm ) {
        $this->save( $objEstateForm );
        $this->indexAction();
    }

    /**
     * Edicação detalhada do Estate e das suas Citys
     *
     * @param integer $id
     * @param \Example\Form\EstateForm $objEstateForm
     */
    public function updateAction(
        \Example\Form\EstateForm $objEstateForm ,
        \Example\Form\CityGridForm $objCityGridForm ,
        $id = null 
    )
    {
        if( $id == null )
        {
            $id = $objCityGridForm->getIdEstate();
        }
        /**
         * Tenta carregar o Estate pelo Id recebido e carrega-lo no formulario
         */
        $objEstate = \Example\Model\EstateTable::getInstance()->getById( (integer)$id , true );
        $objEstateForm->loadEntity( $objEstate );

        $objCityGridForm->setEstate( $objEstate );

        /**
         * Diferente das paginacoes padroes, essa utilizará a action update para
         * fazer a paginacao e nao a action navigator que já é utilizada
         * para a paginação do Estate
         */
        $objCityGridForm->setController( 'Estate' );
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
        $objCityGridForm->setUpdateController( 'City' );

        /**
         * O id da City tera o nome idCity para não colidir com o campo
         * id que esta com a informacao do id do Estate
         */
        $objCityGridForm->setEventIdParam( 'idCity' );

        /**
         * Caso o botao adicionar City tenha sido pressionado, redireciona
         * para o metodo edit da controladora City
         */
        if( $objCityGridForm->isAdicionarCity() )
        {
            $this->redirectController( 'City' , 'edit' , array( 'idEstate' => $objCityGridForm->getIdEstate() ) );
        }

        $this->view->objForm = $objEstateForm;
        $this->view->objFormCitys = $objCityGridForm;
    }

    /**
     * Remove um Estate e encaminha para o Index do Estate
     *
     * @param integer $id
     */
    public function deleteAction( $id )
    {
        $objEstate = \Example\Model\EstateTable::getInstance()->getById( (integer)$id , true );
        if( $objEstate->getId() )
        {
            $objEstate->delete();
            $this->addMessage( 'Estate removido com sucesso.' );
        }
        $this->indexAction();
    }

    /**
     * Navega nas Páginas da Grid do EstateGridForm
     *
     * @param \Example\Form\EstateGridForm $objEstateGridForm
     */
    public function navigationAction( \Example\Form\EstateGridForm $objEstateGridForm  )
    {
        $this->indexAction( $objEstateGridForm );
    }
}

