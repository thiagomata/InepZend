<?php
//namespace Projeto\Controller;

class EstadoController extends \Local\Controller\Action {

    /**
     * Valida e Altera o Estado caso Tenha clicado no Enviar
     * Cancela e Restaura o Estado caso Tenha ciclado no Cancelar
     *
     * @param \Projeto\Form\EstadoForm $objEstadoForm
     */
    protected function save( \Projeto\Form\EstadoForm $objEstadoForm )
    {
        if( $objEstadoForm->isEnviar() )
        {
            $objEstado = $objEstadoForm->getAsEntity();
            if( $this->validate( $objEstado ) )
            {
                $objEstado->save();
                $this->addMessage( 'Estado adicionado com sucesso' );
            }
            $objEstadoForm->loadEntity( $objEstado );
        }
        else if( $objEstadoForm->isCancelar() )
        {
            $intIdEstado = $objEstadoForm->getId();
            $objEstado = \Projeto\Model\EstadoTable::getInstance()->getById( (integer)$intIdEstado , true );
            $objEstadoForm->loadEntity( $objEstado );
        }
        else if( $objEstadoForm->isVoltar() )
        {
            $this->redirectController( 'index' );
        }
    }

    /**
     * Tela principal com a Grid dos Estados
     *
     * @param \Projeto\Form\EstadoGridForm $objEstadoGridForm
     */
    public function indexAction(
            \Projeto\Form\EstadoGridForm $objEstadoGridForm = null
        )
    {
        if( $objEstadoGridForm === null )
        {
            $objEstadoGridForm = new \Projeto\Form\EstadoGridForm();
        }
        $objEstadoForm = new \Projeto\Form\EstadoForm();
        
        $objEvent = new Local\Form\InepFormEvent();
        $objEvent->setController( 'index' );
        $objEvent->setAction( 'index' );
        $objEstadoForm->getOiElement()->setFormEvent( $objEvent );
        $this->view->objFormEstado = $objEstadoForm;
        $this->view->objFormGridEstado = $objEstadoGridForm;
        $this->render( 'index' );
    }

    /**
     * Criação de Estado Novo
     *
     * @param \Projeto\Form\EstadoForm $objEstadoForm
     */
    public function submitAction( \Projeto\Form\EstadoForm $objEstadoForm ) {
        $this->save( $objEstadoForm );
        $this->indexAction();
    }

    /**
     * Edicação detalhada do Estado e das suas cidades
     *
     * @param integer $id
     * @param \Projeto\Form\EstadoForm $objEstadoForm
     */
    public function updateAction(
        \Projeto\Form\EstadoForm $objEstadoForm ,
        \Projeto\Form\CidadeGridForm $objCidadeGridForm ,
        $id = null 
    )
    {
        if( $id == null )
        {
            $id = $objCidadeGridForm->getIdEstado();
        }
        /**
         * Tenta carregar o estado pelo Id recebido e carrega-lo no formulario
         */
        $objEstado = \Projeto\Model\EstadoTable::getInstance()->getById( (integer)$id , true );
        $objEstadoForm->loadEntity( $objEstado );

        $objCidadeGridForm->setEstado( $objEstado );

        /**
         * Diferente das paginacoes padroes, essa utilizará a action update para
         * fazer a paginacao e nao a action navigator que já é utilizada
         * para a paginação do estado
         */
        $objCidadeGridForm->setController( 'estado' );
        $objCidadeGridForm->setAction( 'update' );
        $objCidadeGridForm->setNavigationAction( 'update' );

        /**
         * Botao de delete na grid deve enviar para o delete da controller cidade
         */
        $objCidadeGridForm->setDeleteAction( 'delete' );
        $objCidadeGridForm->setDeleteController( 'cidade' );

        /**
         * Botao edit da grid deve enviar para o edit da controller cidade
         */
        $objCidadeGridForm->setUpdateAction( 'edit' );
        $objCidadeGridForm->setUpdateController( 'cidade' );

        /**
         * O id da cidade tera o nome idCidade para não colidir com o campo
         * id que esta com a informacao do id do estado
         */
        $objCidadeGridForm->setEventIdParam( 'idCidade' );

        /**
         * Caso o botao adicionar cidade tenha sido pressionado, redireciona
         * para o metodo edit da controladora cidade
         */
        if( $objCidadeGridForm->isAdicionarcidade() )
        {
            $this->redirectController( 'cidade' , 'edit' , array( 'idEstado' => $objCidadeGridForm->getIdEstado() ) );
        }

        $this->view->objForm = $objEstadoForm;
        $this->view->objFormCidades = $objCidadeGridForm;
    }

    /**
     * Remove um Estado e encaminha para o Index do Estado
     *
     * @param integer $id
     */
    public function deleteAction( $id )
    {
        $objEstado = \Projeto\Model\EstadoTable::getInstance()->getById( (integer)$id , true );
        if( $objEstado->getId() )
        {
            $objEstado->delete();
            $this->addMessage( 'Estado removido com sucesso.' );
        }
        $this->indexAction();
    }

    /**
     * Navega nas Páginas da Grid do EstadoGridForm
     *
     * @param \Projeto\Form\EstadoGridForm $objEstadoGridForm
     */
    public function navigationAction( \Projeto\Form\EstadoGridForm $objEstadoGridForm  )
    {
        $this->indexAction( $objEstadoGridForm );
    }
}

