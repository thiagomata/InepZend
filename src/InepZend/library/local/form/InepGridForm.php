<?php
namespace Local\Form;

/**
 *   Form class what manager the grid pagination, navigation, mount and elements
 *   as events and buttons
 * 
 * <p lang="pt-br">
 *  Classe de Formulario que compreende também a paginação, navegação e montagem
 *  de tabelas com eventos e botões.
 * </p>
 */
abstract class InepGridForm extends InepForm
{
    protected $sizepage = 2;

    /**
     *  Currently Page 
     * 
     * <p lang="pt-br">
     *  Pagina Atual
     * </p>
     * 
     * @tag hidden
     * @var integer
     */
    protected $page = 1;

    /**
     *  String with the ordination columns comma-separated. 
     *  This information is send as a input type hidden to the html.
     * 
     * <p lang="pt-br">
     *  String que contem as colunas de ordenacao por ordem de prioridade
     *  separadas por virgula, informacao que fica oculta no html
     * </p>
     * 
     * @tag hidden
     * @var string
     */
    protected $ordercolumns;

    /**
     *  String with 0s and 1s comma-separated for DESC and ASC.
     *  The column list elemtns refer each to the column of the same position 
     *  into the ordercolumns string.
     * 
     * <p lang="pt-br">
     *  String que contem 0s e 1s representando o tipo de ordenacao DESC ou ASC
     *  separados por virgula, para cada uma das colunas do ordercolumns
     * </p>
     *
     * @tag hidden
     * @var string
     */
    protected $directioncolumns;

    /**
     *  New top high priority column to order by
     * 
     * <p lang="pt-br">
     *  Coluna pela qual ele deve passar a ordenar
     * </p>
     *
     * @var string
     * @tag hidden
     */
    protected $orderby;

    /**
     *  Max size of direct links what will be maked based on the current page
     * 
     * <p lang="pt-br">
     *  Tamanho máximo de links que podem ser feitos, em cada direção, a partir
     *  da pagina atual.
     * </p>
     * 
     * @var integer
     */
    protected $intBlockPageSize = 3;

    /**
     *  Array to control the columns priority order
     * 
     * <p lang="pt-br">
     *  Array de controle da prioridade da ordenacao dos campos
     * </p>
     *
     * @see $orderby
     * @var array
     */
    protected $arrOrderColumns = array();

    /**
     *  Array with the direction ( ASC, DESC ) columns order. Refer to the
     *  order columns by position and size.
     * 
     * <p lang="pt-br">
     *  Array de controle da direcao da ordenacao de cada campo
     * </p>
     *
     * @see $directioncolumns
     * @var array
     */
    protected $arrDirectionColumns = array();

    /**
     *  Grid Lines 
     * 
     * <p lang="pt-br">
     *  Coleção das Linhas
     * </p>
     *
     * @var array
     */
    protected $arrRows = array();

    /**
     *  Grid Header Cells
     * 
     * <p lang="pt-br">
     *  Colegação dos Cabecalhos
     * </p>
     *
     * @var array
     */
    protected $arrHeaders = array();

    /**
     *  Controller what should be pointer to the navigation
     * 
     * <p lang="pt-br">
     *  Controladora para o evento de navegacao
     * </p>
     *
     * @var string
     */
    protected $strNavigationController;

    /**
     *  Action Name of the Navigation event 
     * 
     * <p lang="pt-br">
     *  Nome da Action do evento navegacao
     * </p>
     *
     * @var string
     */
    protected $strNavigationAction = 'navigation';

    /**
     *  Controller name of the delete event
     * 
     * <p lang="pt-br">
     *  Nome da Controladora para o evento de remocao
     * </p>
     *
     * @var string
     */
    protected $strDeleteController;

    /**
     *  Action name of the delete event
     * 
     * <p lang="pt-br">
     *  Action name do evento remocao
     * </p>
     *
     * @var string
     */
    protected $strDeleteAction = 'delete';

    /**
     *  Controller Name of the Update Event
     * 
     * <p lang="pt-br">
     *  Nome da Controladora para o evento de alteracao
     * </p>
     *
     * @var string
     */
    protected $strUpdateController;

    /**
     *  Action Name of the Update Event 
     * 
     * <p lang="pt-br">
     *  Nome do Action do evento alteracao
     * </p>
     *
     * @var string
     */
    protected $strUpdateAction = 'update';

    /**
     *  Paramenter Name of the Entity Id
     * 
     * <p lang="pt-br">
     *  Nome do parametro que passara o id da entidade
     * </p>
     *
     * @var string
     */
    protected $strEventIdParam = 'id';

    /**
     *  Set the Action Name of the Navigation Event
     * 
     * <p lang="pt-br">
     *  Informa a action do evento de navegacao
     * </p>
     *
     * @param string $strNavigationAction
     * @return InepGridForm
     */
    public function setNavigationAction( $strNavigationAction )
    {
        $this->strNavigationAction = $strNavigationAction;
        return $this;
    }

    /**
     *  Get the Navigation Action Name
     * 
     * <p lang="pt-br">
     *  Obtem o nome da action do evento de navegacao
     * </p>
     * 
     * @return string
     */
    public function getNavigationAction()
    {
        return $this->strNavigationAction;
    }

    /**
     *  Set the Navigation Controller Name
     * 
     * <p lang="pt-br">
     *  Informa a controladora do evento de navegacao
     * </p>
     * 
     * @param string $strNavigationController
     * @return InepGridForm
     */
    public function setNavigationController( $strNavigationController )
    {
        $this->strNavigationController = $strNavigationController;
        return $this;
    }

    /**
     * Get the Navigation Controller Name
     *
     * <p lang="pt-br">
     *  Obtem a controladora do evento de navegacao
     * </p>
     * 
     * @return string
     */
    public function getNavigationController()
    {
        if( $this->strNavigationController == null )
        {
            $this->setNavigationController( $this->getController() );
        }
        return $this->strNavigationController;
    }

    /**
     * Set the Delete Action Name
     * 
     * <p lang="pt-br">
     *  Informa o nome da action do evento de remocao
     * </p>
     *
     * @param string $strDeleteAction
     * @return InepGridForm
     */
    public function setDeleteAction( $strDeleteAction )
    {
        $this->strDeleteAction = $strDeleteAction;
        return $this;
    }

    /**
     * Get the Delete Action Name
     * 
     * <p lang="pt-br">
     *  Obtem o nome da action do evento de remocao
     * </p>
     *
     * @return string
     */
    public function getDeleteAction()
    {
        return $this->strDeleteAction;
    }

    /**
     * Set the Delete Controller Name
     * 
     * <p lang="pt-br">
     *  Informa o nome da controladora do evento de remocao
     * </p>
     * 
     * @param string $strDeleteController
     * @return InepGridForm
     */
    public function setDeleteController( $strDeleteController )
    {
        $this->strDeleteController = $strDeleteController;
        return $this;
    }

    /**
     * Get the Delete Controller Name
     * 
     * <p lang="pt-br">
     *  Obtem o nome da controladora do evento de remocao
     * </p>
     *
     * @return string
     */
    public function getDeleteController()
    {
        if( $this->strDeleteController == null )
        {
            $this->setDeleteController( $this->getController() );
        }
        return $this->strDeleteController;
    }

    /**
     * Set the Update Action Name
     * 
     * <p lang="pt-br">
     *  Informa a action do evento de alteracao
     * </p>
     * 
     * @param string $strUpdateAction
     * @return InepGridForm
     */
    public function setUpdateAction( $strUpdateAction )
    {
        $this->strUpdateAction = $strUpdateAction;
        return $this;
    }

    /**
     * Get the update action name
     * 
     * <p lang="pt-br">
     *  Obtem a action do evento de alteracao
     * </p>
     *
     * @return string
     */
    public function getUpdateAction()
    {
        return $this->strUpdateAction;
    }

    /**
     * Set the update controller name
     * 
     * <p lang="pt-br">
     *  Informa a controladora do evento de alteracao
     * </p>
     * 
     * @param string $strUpdateController
     * @return InepGridForm
     */
    public function setUpdateController( $strUpdateController )
    {
        $this->strUpdateController = $strUpdateController;
        return $this;
    }

    /**
     * Get the update controller name
     * 
     * <p lang="pt-br">
     *  Obtem a controladora do evento de alteracao
     * </p>
     *
     * @return string
     */
    public function getUpdateController()
    {
        if( $this->strUpdateController == null )
        {
            $this->setUpdateController( $this->getController() );
        }
        return $this->strUpdateController;
    }

    /**
     * Set the Event Id Parameter
     * 
     * Is the Name of the Attribute Id of the Event Entity
     * 
     * <p lang="pt-br">
     *  Informa o nome do parametro do id da entidade no evento
     * </p>
     * 
     * @param string $strEventIdParam
     * @return InepGridForm
     */
    public function setEventIdParam( $strEventIdParam )
    {
        $this->strEventIdParam = $strEventIdParam;
        return $this;
    }

    /**
     * Get the Event Id Parameter
     * 
     * Is the name of the Attribute Id of the Event Entity 
     * 
     * <p lang="pt-br">
     *  Obtem o nome do parametro do id da entidade no evento
     * </p>
     * 
     * @return string
     */
    public function getEventIdParam()
    {
        return $this->strEventIdParam;
    }

    /**
     * Set the Order By Column
     * 
     * Change the "Order By" grid appending to the top the receveid element.
     * 
     * If it already is on the top, change the kind of order ( Asc, Desc ) 
     * 
     * <p lang="pt-br">
     * Altera a ordenacao priorizando o elemento selecionado;
     * Caso ele ja seja o elemento de topo, inverte o tipo de ordenacao
     * ( ASC , DESC )
     * </p>
     * 
     * @param string $strOrderby
     * @return InepGridForm
     */
    public function setOrderby( $strOrderby )
    {
        $this->orderby = '';
        if( in_array( $strOrderby , $this->arrOrderColumns ) )
        {
            $intPos = \array_search( $strOrderby , $this->arrOrderColumns );
            if( $intPos === 0 )
            {
                $strNewValue = $this->arrDirectionColumns[0] == '1' ? '0' : '1';
                $this->arrDirectionColumns[0] =  $strNewValue;
                $this->page = 1;
            }
            else
            {
                \array_splice( $this->arrOrderColumns , $intPos , 1 );
                \array_unshift( $this->arrOrderColumns , $strOrderby );
                \array_splice( $this->arrDirectionColumns , $intPos , 1 );
                \array_unshift( $this->arrDirectionColumns ,  '1' );
                $this->page = 1;
            }
        }
        return $this;
    }

    /**
     * Get the Order By String
     * 
     * <p lang="pt-br">
     *  Obtem a ordenacao de topo a ser enviada a tela
     * </p>
     * 
     * @return string
     */
    public function getOrderby()
    {
        return $this->orderby;
    }

    /**
     * Create the order columns based on the receveid string
     * 
     * <p lang="pt-br">
     *  Informa a colecao da ordenacao das colunas
     * </p>
     * 
     * @param string $strOrderColumns
     * @return InepGridForm
     */
    public function setOrderColumns( $strOrderColumns )
    {
        $this->ordercolumns = $strOrderColumns;
        $arrOrderColumns = explode( "," , $strOrderColumns );
        foreach( $arrOrderColumns as $strColumn )
        {
            if( !in_array( $strColumn , $this->arrOrderColumns ) )
            {
                $this->arrOrderColumns[] = $strColumn;
            }
        }
        return $this;
    }

    /**
     * Get the order columns
     * 
     * <p lang="pt-br">
     *  Obtem a ordem das colunas no formato a ser enviado para a tela
     * </p>
     * 
     * @return string
     */
    public function getOrderColumns()
    {
        return implode( "," , $this->arrOrderColumns );
    }

    /**
     * Set the Direction Columns
     * 
     * <p lang="pt-br">
     *  Informa a direcao da ordenacao das colunas
     * </p>
     * 
     * @param string $strDirectionColumns
     * @return InepGridForm
     */
    public function setDirectionColumns( $strDirectionColumns )
    {
        $this->directioncolumns = $strDirectionColumns;
        $arrDirectionColumns = explode( "," , $strDirectionColumns );
        $this->arrDirectionColumns = $arrDirectionColumns;
        return $this;
    }

    /**
     * Get the directions columns
     * 
     * <p lang="pt-br">
     *  Obtem a lista de ordenacao das colunas no
     *  formato a ser enviado para a tela
     * </p>
     * 
     * @return string
     */
    public function getDirectionColumns()
    {
        return implode( "," , $this->arrDirectionColumns );
    }

    /**
     * Load the Grid, initialize the headers and load the rows
     * 
     * <p lang="pt-br">
     *  Faz a carga da grid.
     *  Inicializa os cabecalhos e depois carrega as linhas.
     * <p lang="pt-br">
     */
    public function load()
    {
        $this->initHeaders();

        foreach( $this->getEntities() as $objEntity )
        {
            $objRow = new InepFormRow();
            $this->addRow( $objEntity , $objRow );
            $this->arrRows[] = $objRow;
        }

    }

    /**
     * Set page size
     * 
     * <p lang="pt-br">
     *  Informa o tamanho maximo das paginas na paginacao da grid
     * </p>
     * 
     * @param integer $intPageSize
     * @return InepGridForm
     */
    public function setPageSize( $intPageSize )
    {
        $this->sizepage = $intPageSize;
        return $this;
    }

    /**
     * Get page size
     * 
     * <p lang="pt-br">
     *  Obtem a tamanho maxido das paginas na paginacao da grid
     * </p>
     * 
     * @return integer
     */
    public function getPageSize()
    {
        return $this->sizepage;
    }

    /**
     * Get the position of the first element of the current page.
     * 
     * <p lang="pt-br">
     *  Obtem a posicao do primeiro elemento da pagina atual
     * </p>
     * 
     * @return integer
     */
    public function getFirst()
    {
        return ( $this->page - 1 ) *  $this->sizepage;
    }

    /**
     * Set the position of the first element of the current page.
     * 
     * <p lang="pt-br">
     *  Obtem a posicao do ultimo elemento da pagina atual
     * </p>
     *
     * @return integer
     */
    public function getLast()
    {
        return ( $this->page ) *  $this->sizepage;
    }

    /**
     * Get the current page
     * 
     * <p lang="pt-br">
     *  Obtem qual é a pagina atual da paginação
     * </p>
     * 
     * @return integer
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set the current page
     * 
     * <p lang="pt-br">
     *  Informa a pagina atual
     * </p>
     * 
     * @param integer $intPage
     * @return InepGridForm
     */
    public function setPage( $intPage )
    {
        $intPage = (integer)$intPage;
        if( $intPage < 1 )
        {
            $intPage == 1;
        }
        if( $intPage > $this->getLastPage() )
        {
            $intPage = $this->getLastPage();
        }
        $this->page = $intPage;
        return $this;
    }

    /**
     * Set the size of the block page size
     * 
     * It is the Max size of direct links what will be 
     * maked based on the current page
     * 
     * <p lang="pt-br">
     *  Informa o tamanho do bloco de paginas.
     *
     *  Isso é, a quantidade de links diretos em cada direcao
     *  que podem ser feitos a partir da pagina atual.
     * </p>
     * 
     * @see self::intBlockPageSize
     * @param integer $intBlockSize
     */
    public function setBlockPageSize( $intBlockSize )
    {
        $this->intBlockPageSize = $intBlockSize;
    }

    /**
     * Get the block page size
     * 
     * It is the Max size of direct links what will be 
     * maked based on the current page
     * 
     * <p lang="pt-br">
     *  Obtem o tamanho do bloco de paginas.
     *
     *  Isso é, a quantidade de links diretos em cada direcao
     *  que podem ser feitos a partir da pagina atual.
     * </p>
     * 
     * @see self::intBlockPageSize
     * @return integer
     */
    public function getBlockPageSize()
    {
        return $this->intBlockPageSize;
    }

    /**
     * Get the last element of the block page
     * 
     * <p lang="pt-br">
     *  Obtem o ultimo elemento do bloco de paginas menores
     * </p>
     * 
     * @return integer
     */
    public function getBlockBackPage()
    {
        $intPage = $this->page - $this->getBlockPageSize();
        if( $intPage < 1 )
        {
            $intPage = 1;
        }
        return $intPage;
    }

    /**
     * Get the last page
     * 
     * <p lang="pt-br">
     *  Obtem o numero da ultima pagina
     * </p>
     * 
     * @return integer
     */
    public function getLastPage()
    {
        return ceil( $this->getCount() / $this->sizepage );
    }

    /**
     * Get the first element of the block page
     * 
     * <p lang="pt-br">
     *  Obtem o numero da ultima pagina do bloco de paginas maiores
     * </p>
     * 
     * @return integer
     */
    public function getBlockNextPage()
    {
        $intPage = $this->page + $this->getBlockPageSize();
        if( $intPage > $this->getLastPage() )
        {
            $intPage = $this->getLastPage();
        }
        return $intPage;
    }

    /**
     * Get the count of elements of the grid
     * 
     * <p lang="pt-br">
     *  Obtem o total de elementos da consulta
     * </p>
     */
    abstract public function getCount();

    /**
     * Get the collections of entities of the current page
     * 
     * <p lang="pt-br">
     *  Obtem os elementos da consulta da pagina atual
     * </p>
     * 
     * @return Entity[]
     */
    abstract public function getEntities();

    /**
     * Create a page event
     * 
     * <p lang="pt-br">
     *  Cria um evento de paginacao
     * </p>
     * 
     * @param integer $intPage
     * @return InepFormEvent
     */
    protected function createPageEvent( $intPage )
    {
        $objEvent = new InepFormEvent();
        $objEvent->goPost();
        $objEvent->setKeepFormData( true );
        $objEvent->setAction( $this->getNavigationAction() );
        $objEvent->setController( $this->getNavigationController() );
        $objEvent->setParams(
            array(
                $this->getHeaderForm() . self::NODE_SEPARATOR . 'page' => $intPage ,
            )
        );
        $objEvent->setName( "Ir para página $intPage" );
        return $objEvent;
    }

    /**
     * Get Navigation Events
     * 
     * <p lang="pt-br">
     *  Obtem os eventos de navegacao
     * </p>
     *
     * @return InepFormEvent[]
     */
    public function getNavigationEvents()
    {
        $arrEvents = array();
        for( $intPage = $this->getBlockBackPage(); $intPage <= $this->getBlockNextPage(); $intPage++ )
        {
            $arrEvents[ $intPage ] = $this->createPageEvent( $intPage );
        }
        return $arrEvents;
    }

    /**
     * Get Event Go to Previous Page
     * 
     * <p lang="pt-br">
     *  Obtem o evento de ir para a pagina anterior
     * </p>
     * 
     * @return InepFormEvent
     */
    public function getEventPreviousPage()
    {
        $intPage = $this->getPage() - 1;

        if( $intPage > 1 )
        {
            $objEvent = $this->createPageEvent( $intPage );
        }
        else
        {
            $objEvent = $this->createPageEvent( 1 );
        }
        return $objEvent;
    }

    /**
     * Get event to go to the next page
     * 
     * <p lang="pt-br">
     *  Obtem o evento de ir para a proxima pagina
     * </p>
     * @return InepFormEvent
     */
    public function getEventNextPage()
    {
        $intPage = $this->getPage() + 1;

        if( $intPage > 0 )
        {
            $objEvent = $this->createPageEvent( $intPage );
        }
        else
        {
            $objEvent = $this->createPageEvent( $this->getLastPage() );
        }
        return $objEvent;
    }

    /**
     * Get event to go to the first page
     * 
     * <p lang="pt-br">
     *  Obtem o evento de ir para a primeira pagina
     * </p>
     * 
     * @return InepFormEvent
     */
    public function getEventFirstPage()
    {
        return $this->createPageEvent( 1 );
    }

    /**
     * Get event to go to the last page
     * 
     * <p lang="pt-br">
     *  Obtem o evento de ir para a ultima pagina
     * </p>
     * 
     * @return InepFormEvent
     */
    public function getEventLastPage()
    {
        return $this->createPageEvent( $this->getLastPage() );
    }

    /**
     * Get the edit element event
     * 
     * <p lang="pt-br">
     *  Obtem o evento de editar entidade
     * </p>
     *
     * @param \Local\Model\Entity
     * @return InepFormEvent
     */
    public function getEventEdit( \Local\Model\Entity $objEntity )
    {
        $objEvent = new InepFormEvent();
        $objEvent->setController( $this->getUpdateController() );
        $objEvent->setAction( $this->getUpdateAction() );
        $objEvent->setParams(
            array(
                $this->getEventIdParam() => $objEntity->getId()
            )
        );
        $objEvent->setName( 'Atualizar' );
        return $objEvent;
    }

    /**
     * Get the update entity button
     * 
     * <p lang="pt-br">
     *  Obtem o botao de atualizar entidade
     * </p>
     * 
     * @param \Local\Model\Entity
     * @return InepFormButton
     */
    public function getButtonUpdate( \Local\Model\Entity $objEntity )
    {
        $objButton = new InepFormButton();
        $objButton->setKeepFormData( false );
        $objButton->goGet();
        $objButton->setController(  $this->getUpdateController() );
        $objButton->setAction( $this->getUpdateAction() );
        $objButton->setParams(
            array(
                $this->getEventIdParam() => $objEntity->getId()
            )
        );
        $objButton->setName( 'Alterar' );
        $objButton->setIcon( 'update.gif' );
        return $objButton;
    }

    /**
     * Get the delete entity button
     * 
     * <p lang="pt-br">
     *  Obtem o botao de remover entidade
     * </p>
     * 
     * @param \Local\Model\Entity $objEntity
     * @return InepFormButton
     */
    public function getButtonDelete( \Local\Model\Entity $objEntity )
    {
        $objButton = new InepFormButton();
        $objButton->setKeepFormData( false );
        $objButton->goGet();
        $objButton->setController(  $this->getDeleteController() );
        $objButton->setAction( $this->getDeleteAction() );
        $objButton->setParams(
            array(
                $this->getEventIdParam() => $objEntity->getId()
            )
        );
        $objButton->setName( 'Remover' );
        $objButton->setIcon( 'delete.gif' );
        return $objButton;
    }

    /**
     * Initialize the grid headers
     * 
     * <p lang="pt-br">
     *  Inicializa os cabecalhos da grid
     * </p>
     * 
     * @see addHeader
     */
    abstract public function initHeaders();

    /**
     * Add a Header into the grid
     * 
     * <p lang="pt-br">
     *  Adiciona um cabecalho na grid
     * </p>
     * 
     * @param InepFormHeader $objHeader
     * @return InepGridForm
     */
    public function addHeader( InepFormHeader $objHeader )
    {
        if( array_key_exists( $objHeader->getId() , $this->arrHeaders ) )
        {
            throw new \Exception( 'Header ' . $this->getId() . ' já foi cadastrado' );
        }
        $this->arrHeaders[ (string)$objHeader->getId() ] = $objHeader;
        if( $objHeader->getColumn() !== null )
        {
            if( !in_array( $objHeader->getId() , $this->arrOrderColumns ) )
            {
                $this->arrOrderColumns[] = $objHeader->getId();
                $this->arrDirectionColumns[] = '1';
            }
        }
        return $this;
    }

    /**
     * Get some Header by the Id
     * 
     * <p lang="pt-br">
     *  Procura por um Cabecalho pelo Id
     * </p>
     * 
     * @param string $strHeaderId
     * @return InepFormHeader
     */
    public function getHeaderById( $strHeaderId )
    {
        if( !array_key_exists( $strHeaderId , $this->arrHeaders ) )
        {
            throw new \Exception( 'Header (' . $strHeaderId . ') não encontrado' );
        }
        return $this->arrHeaders[ $strHeaderId ];
    }

    /**
     * Get Grid Headers
     * 
     * <p lang="pt-br">
     *  Obtem todos os cabecalhos da Grid
     * </p>
     * 
     * @return InepFormHeader[]
     */
    public function getHeaders()
    {
        return $this->arrHeaders;
    }

    /**
     * Get Grid Rows
     * 
     * <p lang="pt-br">
     *  Obtem todas as linhas da Grid
     * </p>
     * 
     * @return InepFormHeader[]
     */
    public function getRows()
    {
        return $this->arrRows;
    }

    /**
     * Get the Top Header Id, using the order columns
     * 
     * <p lang="pt-br">
     *  Retorna o id do cabecalho do topo
     * </p>
     * 
     * @return string
     */
    public function getToHeaderOrder()
    {
        return \CorujaArrayManipulation::getArrayField( $this->arrOrderColumns , 0 );
    }

    /**
     * Get the Header direction
     * 
     * <p lang="pt-br">
     *  Retorna se a ordenacao da coluna de topo é ASC.
     *
     *  Retorna true para ASC e false para DESC.
     * </p>
     * 
     * @param InepFormHeader $objHeader
     * @return boolean
     */
    public function getHeaderDirection(  InepFormHeader $objHeader )
    {
        $intPos = \array_search( $objHeader->getId() , $this->arrOrderColumns );
        if( $intPos === false )
        {
            return false;
        }
        return ( \CorujaArrayManipulation::getArrayField( $this->arrDirectionColumns , $intPos ) == '1' );
    }

    /**
     * Add Button to Header
     * 
     * <p lang="pt-br">
     *  Adiciona Botoes no Cabecalho
     * </p>
     * 
     * @param InepFormHeader $objHeader
     * @return InepGridForm
     */
    protected function addButtonToHeader(  InepFormHeader $objHeader )
    {
        $booDirection = $this->getHeaderDirection( $objHeader );
        $booActive = ( $this->getToHeaderOrder() == $objHeader->getId() );

        $objButton = new InepFormButton();
        $objButton->goPost();
        $objButton->setKeepFormData( true );
        $objButton->setController(  $this->getNavigationController() );
        $objButton->setAction( $this->getNavigationAction() );
        $objButton->setParams(
            array(
                $this->getHeaderForm() . self::NODE_SEPARATOR . 'orderby' => $objHeader->getId() ,
            )
        );
        $objButton->setName( 'Ordernar por ' . $objHeader->getLabel() );
        if( $booActive )
        {
            if( $booDirection )
            {
                $objButton->setIcon( 'up.png' );
            }
            else
            {
                $objButton->setIcon( 'down.png' );
            }
        }
        else
        {
            if( $booDirection )
            {
                $objButton->setIcon( 'up_disabled.png' );
            }
            else
            {
                $objButton->setIcon( 'down_disabled.png' );
            }
        }
        $objHeader->addButton( $objButton );
        return $this;
    }

    /**
     * Get Header order, in the database query mode
     * 
     * Use the self::arrDirectionColumns and self::arrOrderColumns to make this 
     * array
     * 
     * <p lang="pt-br">
     *  Monta a ordenacao a ser utilizada na consulta ao banco baseando-se
     *  nos atributos de ordenacao da grid
     * </p>
     * 
     * @return array
     */
    protected function getHeaderOrder()
    {
        $arrOrder = array();
        $arrDirection = array( '0' => 'desc' , '1' => 'asc' );
        foreach( $this->arrOrderColumns as $intPos => $strHeaderId )
        {
            $arrOrder[ $this->getHeaderById( $strHeaderId )->getColumn() ] =
                $arrDirection[ $this->arrDirectionColumns[ $intPos ] ];
        }

        return $arrOrder;
    }

    /**
     * Add Row Loop
     *
     * @param \Example\Model\State $objEntity
     * @param \Local\Form\InepFormRow $objRow
     */
    public function addRow(
        \Local\Model\Entity $objEntity ,
        \Local\Form\InepFormRow $objRow
    )
    {
        $this->addCityRow( $objEntity , $objRow );
    }
    
    /**
     * Mout a grid based on the form, the pagination data, headers and entities
     * 
     * <p lang="pt-br">
     *  Monta a grid a partir do formulario e dos dados de paginacao, cabecalho e
     *  entidade
     * </p>
     * 
     * @return string
     */
    public function __toString()
    {
        try
        {
            $this->load();

            $arrScriptFolders = array();
            $arrScriptFolders[] =  \INEP_APPLICATION_PATH   . '/views/scripts';
            $arrScriptFolders[] =  \INEP_APPLICATION_PATH   . '/layouts/scripts';
            $arrScriptFolders[] =  \APPLICATION_PATH        . '/views/scripts';
            $arrScriptFolders[] =  \APPLICATION_PATH        . '/layouts/scripts';

            $strParentString = parent::__toString();

            $strParentString = \substr( $strParentString , 0 , -strlen( "</form>" ) );

            foreach( $arrScriptFolders as $strScriptFolder )
            {
                $strScript = $strScriptFolder .= '/grid/grid.phtml';
                if( file_exists( $strScript ) )
                {
                    \ob_start();
                    require_once( $strScript );
                    $strGrid = \ob_get_contents();
                    \ob_end_clean();
                }
            }
            return $strParentString . "\n" . $strGrid . '</form>';
        }
        catch( \Exception $objException )
        {
            return $objException->getMessage() . ' ' . $objException->getFile() . ' ' . $objException->getLine();
        }
        return '';
    }

    /**
     * Get the empty grid message what is send to the screen
     * 
     * <p lang="pt-br">
     *  Obtem a Mensagem de Grid Vazia para ser enviada paera a Tela
     * </p>
     * @return string
     */
    public function getEmptyListMessage()
    {
        return "There is no elements into this grid.";
    }
}
