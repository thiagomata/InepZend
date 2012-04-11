<?php
namespace Local\Form;

/**
 * Classe Pai para os Formularios no padrao do Inep Zend
 *
 * @AnnotationClass \Local\Form\FormAnnotationClass
 * @AnnotationAttribute \Local\Form\FormAnnotationAttribute
 */
class InepForm extends \Zend_Form
{
    CONST NODE_SEPARATOR = "_";

    /**
     * Counter of tab index
     */
    protected static $intLastTabIndex = 0;

    /**
     * Id of the Entity of the Form
     *
     * @order 100
     * @tag hidden
     * @var integer
     */
    protected $id;


    protected $arrNotLoadByRequest = array( 'controller' , 'action' );
    
    /**
     * Action a ser enviado na submissao
     *
     * @var string
     */
    protected $strAction;

    /**
     * Controller a ser enviado na submissao
     *
     * @var string
     */
    protected $strController;
    
    /**
     * Controle se o Formulario foi submetido
     *
     * @order 101
     * @tag hidden
     * @var boolean
     */
    protected $submitted = false;
    
    /**
     * Entidade Admninistrada pelo Form
     *
     * @var \Local\Model\Entity
     */
    protected $objEntity;

    /**
     * Header of the Form in the name of the html attributes
     *
     * @var string
     */
    private $strHeaderForm;

    /**
     * Entity of the Form
     *
     * @var string
     */
    private $strEntityForm;

    /**
     * Short Entity Name
     *
     * @var string
     */
    private $strShortEntityName;

    /**
     * Annotation of Element
     *
     * @var CorujaAnnotation
     */
    protected $objAnnotation;

    /**
     * Informa se o formulario é de uma submissao
     *
     * @param boolean $booSubmitted
     * @return InepForm
     */
    public function setSubmitted( $booSubmitted )
    {
        if( is_bool( $booSubmitted ) )
        {
            $this->submitted = $booSubmitted;
        }
        else
        {
            $this->submitted = \CorujaStringManipulation::strToBool( $booSubmitted );
        }
        return $this;
    }

    /**
     * Obtem se o formulario é de uma submissao
     * 
     * @return boolean
     */
    public function getSubmitted()
    {
        return $this->submitted ? 1 : 0;
    }

    /**
     * Obtem se o formulario é de uma submissao
     * @return boolean
     */
    public function isSubmitted()
    {
        return $this->getSubmitted();
    }

    /**
     * Informa o Id da Entidade
     *
     * @see setFormId
     * @param integer $intId
     */
    public function setId( $intId )
    {
        $this->id = $intId;
    }

    /**
     * Obtem o Id da Entidade
     *
     * @see getFormId
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Obtem o Id da Tag Form
     *
     * @return string
     */
    public function getFormId()
    {
        return parent::getId();
    }

    /**
     * Informa o Id da Tag Form
     *
     * @param string $strFormId
     * @return InepForm
     */
    public function setFormId( $strFormId )
    {
        $this->setAttrib( 'id', $strFormId );
        return $this;
    }

    /**
     * Informa a Action de destino da Submissão do Formulario
     *
     * @param string $strAction
     * @return InepForm
     */
    public function setAction( $strAction )
    {
        $this->strAction = $strAction;
        $this->updateUrl();
        return $this;
    }

    /**
     * Obtem a Action de destino da Submissão do Formulario
     *
     * @return string
     */
    public function getAction()
    {
        return $this->strAction;
    }

    /**
     * Informa a controladora de destino da submissão do formulário
     *
     * @param string $strController
     * @return InepForm
     */
    public function setController( $strController )
    {
        $this->strController = $strController;
        $this->updateUrl();
        return $this;
    }

    /**
     * Obtem a controladora de destino da submissão do formulário
     *
     * @return string
     */
    public function getController()
    {
        return $this->strController;
    }

    /**
     * Informa a url de destino da submissao do formulário
     *
     * @param string $strUrl
     * @return InepForm
     */
    public function setUrl( $strUrl )
    {
        parent::setAction( $strUrl );
        return $this;
    }

    /**
     * Obtem a url de destino da submissão do formulário
     *
     * @return string
     */
    public function getUrl()
    {
        return parent::getAction();
    }

    /**
     * Constroi a url de destino baseado na action e na controladora
     *
     * @return InepForm
     */
    protected function updateUrl() {
        $strEvent = $this->getController() . '/' . $this->getAction();
        $strUrl = rtrim( $this->getBaseUrl() , '/' ) . '/' . $strEvent;
        $this->setUrl( $strUrl );
        return $this;
    }

    /**
     * Obtem o nome da entidade do form caso esse seja informado
     *
     * @return string
     */
    private function getEntityName()
    {
        if( $this->strEntityForm == null )
        {
            $strEntity = $this->getAnnotationClass()->getEntity();
            $this->strEntityForm = $strEntity;
        }
        return $this->strEntityForm;
    }

    /**
     * Obtem o nome da classe da entidade do form sem os namespaces
     * para servir como apelido
     *
     * @return string
     */
    protected function getShortEntityName()
    {
        if( $this->strShortEntityName == null )
        {
            $this->strShortEntityName =
            lcfirst
            (
                \CorujaClassManipulation::getClassNameFromClassDefinition
                (
                    $this->getEntityName()
                )
            );
        }
        return $this->strShortEntityName;
    }

    /**
     * Obtem a Anotacao da Classe
     *
     * @return FormAnnotationClass
     */
    public function getAnnotationClass()
    {
        return $this->objAnnotation->getAnnotationClass();
    }

    /**
     * Obtem a Anotacao de Algum Atributo
     *
     * @return FormAnnotationAttribute
     */
    public function getAnnotationAttribute( $strAttribute )
    {
        return $this->objAnnotation->getAnnotationAttribute( $strAttribute );
    }

    /**
     * Obtem o cabecalho do formulario
     *
     * @return string
     */
    protected function getHeaderForm()
    {
        if( $this->strHeaderForm == null )
        {
            $strClass = \CorujaClassManipulation::getClassNameFromClassDefinition( get_class( $this ) );
            $this->strHeaderForm = strtolower( str_replace( "Form", "", $strClass ) );
        }
        return $this->strHeaderForm;
    }

    /**
     * Faz a carga das informações a partir da coleção recebida
     *
     * @param array $arrData
     */
    public function loadData( $arrData )
    {
        foreach( $arrData as $strAttribute => $strValue )
        {
            if( !in_array( $strAttribute , $this->arrNotLoadByRequest ) )
            {
                $arrParam = explode( self::NODE_SEPARATOR , $strAttribute );
                $this->loadParam( $arrParam , $strValue );
            }
        }
    }

    /**
     * Utilizar os setters do formulario para preencher as informacoes da carga
     *
     * @param array $arrParam
     * @param string $strValue
     * @return InepForm
     */
    protected function loadParam( $arrParam , $strValue  )
    {
        switch( sizeof( $arrParam ) )
        {
            case 0:
            {
                return $this;
            }
            case 1:
            {
                $strMethodSetter = "set" . ucfirst( $arrParam[0] );
                $this->{$strMethodSetter}( $strValue );
                break;
            }
            case 2:
            {
                if( $arrParam[0] == $this->getHeaderForm() )
                {
                    $strMethodSetter = "set" . ucfirst( $arrParam[1] );
                    $this->{$strMethodSetter}( $strValue);
                }
                break;
            }
            default:
            {
                $strParam = array_shift( $arrParam );
                if( $strParam == $this->getHeaderForm() )
                {
                    $strMethodSetter = implode( self::NODE_SEPARATOR , $arrParam );
                    $strMethodSetter = "set" . 
                    \CorujaStringManipulation::underlineTocamelCase(
                            $strMethodSetter ,
                            self::NODE_SEPARATOR
                    );
                    $this->{$strMethodSetter}( $strValue);
                }
                break;
            }
        }
        return $this;
    }
    
    /**
     * Get AnnotationAttribute by Getter Annotatiton
     *
     * @param Entity $objEntity
     * @param string $strGetter
     * @return \Local\Model\EntityAnnotationAttribute
     */
    protected function getAnnotationAttributeByGetter( \Local\Model\Entity $objEntity , $strGetter )
    {
        $arrAnnotationAttributes = $objEntity->getAnnotation()->getAnnotationAttributes();
        foreach( $arrAnnotationAttributes as $objAnnotationAttribute )
        {
            if( $objAnnotationAttribute->getGetter() == $strGetter )
            {
                return $objAnnotationAttribute;
            }
        }
        return null;
    }

    /**
     * Atualiza o formulario com os dados da entidade recebida
     *
     * @param Entity $objEntity
     */
    public function loadEntity( \Local\Model\Entity $objEntity )
    {
        $this->objEntity = $objEntity;
        
        foreach( $this->getElements() as $objElement )
        {
            $strObjectName = $objElement->getName();
            $arrObjectName = explode( self::NODE_SEPARATOR , $strObjectName );
            $this->getEntityValue( $arrObjectName , $objEntity , $objElement );
        }        
    }

    /**
     * Atualiza uma entidade a partir dos campos do formulario
     *
     * @param Entity $objEntity
     */
    public function fillEntity( \Local\Model\Entity $objEntity )
    {
        $strClassName = strtolower( get_class( $objEntity ) );
        foreach( $this->getElements() as $objElement )
        {
            if( $objElement instanceof \Zend_Form_Element )
            {
                $strObjectName = $objElement->getName();
                $arrObjectName = explode( self::NODE_SEPARATOR , $strObjectName );
                $this->setEntityValue( $arrObjectName , $objEntity , $objElement );
            }
        }        
    }

    /**
     * Atualiza o formulario a partir da entidade recebida
     *
     * @param array $arrObjectName
     * @param Entity $objEntity
     * @param boolean $booValidateClass
     * @param string $strMethodSetter
     */
    protected function getEntityValue( 
            array $arrObjectName ,
            \Local\Model\Entity $objEntity ,
            $booValidateClass = true ,
            $strMethodSetter = null
        )
    {       
        // id = 0
        if( sizeof( $arrObjectName ) < 2 )
        {
            return;
        }

        $strEntity = strtolower(
            \CorujaClassManipulation::getClassNameFromClassDefinition(
                get_class( $objEntity )
            )
        );

        // cidade.nome = teste
        // cidade.prefeito.nome = joao
        if
        (
            ( !$booValidateClass )
            ||
            ( $arrObjectName[0] == $strEntity )
        )
        {
            // cidade.prefeito.nome => prefeito.nome
            \array_shift( $arrObjectName );

            $arrCopy = $arrObjectName;
            foreach( $arrCopy as &$strField )
            {
                $strField = \ucfirst( $strField );
            }

            // getPrefeito
            $strMethodName = "get" . $arrCopy[0];

            // setPrefeitoNome
            if( $strMethodSetter == null )
            {
                $strMethodSetter = "set" . implode( "" , $arrCopy );
            }

            // cidade.nome = teste
            if( sizeof( $arrObjectName ) == 1 )
            {
                if( method_exists( $objEntity , $strMethodName ) )
                {
                    $this->{$strMethodSetter}( $objEntity->$strMethodName() );
                }
            }
            // prefeito.nome = joao
            if( sizeof( $arrObjectName ) > 1 )
            {
                if( method_exists( $objEntity , $strMethodName ) )
                {
                    // child = cidade.prefeito // getPrefeito() //
                    $objChildEntity = $objEntity->$strMethodName();

                    if( ( $objChildEntity ) instanceof \Local\Model\Entity )
                    {
                        $this->getEntityValue( $arrObjectName , $objChildEntity , false , $strMethodSetter );
                    }
                }
            }
        }
    }

    /**
     * Atualiza a entidade a partir dos campos do formulario
     *
     * @param array $arrObjectName
     * @param Entity $objEntity
     * @param boolean $booValidateClass
     */
    protected function setEntityValue( array $arrObjectName , \Local\Model\Entity $objEntity , $booValidateClass = true , $mixValue = null )
    {
        /**
         * Atributo que nao encontrou os metodos ou as entidades que deveria
         */
        if( sizeof( $arrObjectName ) < 1 )
        {
            return;
        }

        /**
         * Remove o cabecalho do formulario e marca como encontrado
         * 
         * A primeira ocorrencia do cabecalho do form é esperada e necessaria
         * As demais navegacoes recursivas terao o validate = false apesar
         * do founded = true
         */
        if( $arrObjectName[0] == $this->getHeaderForm() )
        {
            \array_shift( $arrObjectName );
            $booFounded = true;
        }
        else
        {
            $booFounded = false;
        }
        
        // cidade.nome = teste
        // cidade.prefeito.nome = joao
        if( $mixValue === null )
        {
            $strAttributeName = implode( self::NODE_SEPARATOR , $arrObjectName );
            $strGetter = "get";
            foreach( $arrObjectName as $strNode )
            {
                $strGetter .= ucfirst( $strNode );
            }

            /**
             * Tenta executar o metodo ( que pode ser sobreescrito )
             */
            if( \method_exists( $this , $strGetter ) )
            {
                $mixValue = $this->$strGetter();
            }
            /**
             * Tenta ler o atributo, caso exista
             */
            elseif( \property_exists( $this , $strAttributeName ) )
            {
                $mixValue = $this->$strAttributeName;
            }
            /**
             * Tenta utilizar do elemento de formulario, caso exista
             */
            else
            {
                $objElement = $this->getElement( $strAttributeName );
                if( $objElement )
                {
                    $mixValue = $objElement->getValue();
                }
            }
        }

        if
        (
            $mixValue !== null
            &&
            (
                !( $booValidateClass )
                ||
                ( $booFounded )
            )
        )
        {
            $strMethodName = "set" . ucfirst( $arrObjectName[0] );

            // cidade.nome = teste
            if( sizeof( $arrObjectName ) == 1 )
            {
                if(
                    method_exists( $objEntity , $strMethodName ) 
                )
                {
                    $objEntity->$strMethodName( $mixValue );
                }
            }
            // cidade.prefeito.nome = joao
            if( sizeof( $arrObjectName ) > 1 )
            {
                $strMethodName = "get" . ucfirst( $arrObjectName[0] );

                if( method_exists( $objEntity , $strMethodName ) )
                {
                    // child = cidade.prefeito
                    $objChildEntity = $objEntity->$strMethodName();

                    // cidade.prefeito.nome => prefeito.nome
                    array_shift( $arrObjectName );

                    if( ( $objChildEntity ) instanceof \Local\Model\Entity )
                    {
                        $this->setEntityValue( $arrObjectName , $objChildEntity , false , $mixValue );
                    }
                }
            }
        }
    }

    /**
     * Get the Entity Table
     *
     * @param string $strEntityClass
     * @return \Local\Model\EntityTable
     */
    protected function getEntityTable( $strEntityClass = null )
    {
        if( $strEntityClass == null )
        {
            $strEntityClass = $this->getEntityName();
        }
        $strEntityTable = $strEntityClass . "Table";
        if(!\class_exists( $strEntityTable ) )
        {
            throw new \Exception( "Persistencia $strEntityTable não existe em " . get_class( $this ) . '.' );
        }
        $objEntityTable = $strEntityTable::getInstance();
        return $objEntityTable;
    }

    /**
     * Obtem uma entidade pelo id ( caso informado ) ou cria ( caso nao informado )
     * Preenche os dados na entidade conforme os campos do formulario
     * Retorna a entidade.
     *
     * @param string $strEntityClass
     * @return Entity
     */
    public function getAsEntity( $strEntityClass = null )
    {
        if( $strEntityClass == null )
        {
            $strEntityClass = $this->getEntityName();
        }
        $intId = (integer)$this->getId();
        $objEntityTable = $this->getEntityTable( $strEntityClass , 1 );
        $objEntity = $objEntityTable->getById( $intId , true );
        $this->fillEntity( $objEntity );
        return $objEntity;
    }

    /**
     * Monta e retorna todas es entidades que são alimentadas no form
     *
     * @param boolena $booInitNotEntityVars
     * @return Entity[]
     */
    public function getAllEntities( $booInitNotEntityVars = false )
    {
        $arrEntities = array();
        foreach( $this->getElements() as $objElement )
        {
            $strObjectName = $objElement()->getName();
            $arrObjectName = explode( self::NODE_SEPARATOR , $strObjectName );
            if( sizeof( $arrObjectName ) > 0 )
            {
                $strClassEntity = $arrObjectName[ 0 ];
                if( !array_key_exists( $strClassEntity, $arrEntities ) )
                {
                    $arrEntities[ $strClassEntity ] = $this->getAsEntity( $strClassEntity );
                }
            }
            else
            {
                if( $booInitNotEntityVars )
                {
                    $strMethod = "set" . ucfirst( $strObjectName );
                    $this->$strMethod( $objElement->getValue() );
                }
            }
        }
        return $arrEntities;
    }

    /**
     * Monta o Nome do parametro a partir do nome do metodo e do cabecalho
     *
     * @param string $strMethod
     * @param string $strHeaderName
     * @return string
     */
    protected function getCallParamByMethod( $strMethod , $strHeaderName )
    {
        $strParam = lcfirst( substr( $strMethod , strlen( $strHeaderName ) ) );
        $strParam = strtolower( \CorujaStringManipulation::camelCaseToUnderlineCase( $strParam , self::NODE_SEPARATOR ) );
        return $strParam;
    }

    /**
     * Obtem o Elemento a partir do nome do parametro
     *
     * @param string $strParam
     * @return \Zend_Form_Element
     */
    protected function getCallElementByParam( $strParam )
    {
        $strIdElement = $this->getHeaderForm() . self::NODE_SEPARATOR . $strParam;
        $objElement = $this->getElement( $strIdElement );
        return $objElement;
    }

    /**
     * Metodo Magico para Informar o valor de um atributo / elemento
     * 
     * se comecar com "set" {
     *  se o valor enviado for um Zend_Form_Element {
     *   substitui o element existente no atributo pelo recebido
     *  }
     *  se o valor enviado nao for um Zend_Form_Element {
     *   altera o valor do Zend_Form_Element para o valor recebido
     *   altera o valor do atributo para o valor recebido
     *  }
     * }
     */
    protected function magicSetter( $strMethod , $arrParam )
    {
        if( sizeof( $arrParam ) == 0 )
        {
            return $this;
        }

        /**
         * Novo valor enviado por parametro
         */
        $mixNewValue = $arrParam[0];
        
        /**
         * Monta o Nome do Parametro a Partir do Metodo
         */
        $strParam = $this->getCallParamByMethod( $strMethod, "set" );

        /**
         * Obtem o Elemento a partir do Nome do Parametro
         */
        $objElement = $this->getCallElementByParam( $strParam );

        /**
         * Se o Novo valor não é um objeto e o Element já existe
         */
        if( $objElement && !is_object( $mixNewValue ) )
        {
            /**
             * Altera o valor do element com o novo valor
             */
            $objElement->setValue( $mixNewValue ) ;
        }

        /**
         *  Se o novo valor for um elemento
         */
        if( $mixNewValue instanceof \Zend_Form_Element )
        {
            /**
             * Se o antigo element também existir
             */
            if( $objElement )
            {
                /**
                 * Remove o element antigo
                 */
                $this->removeElement( $objElement );
            }
            /**
             * Adiciona o element novo recebido por parametro
             */
            $this->addElement( $mixNewValue );
        }

        /**
         * Se o atributo informado existir
         */
        if( array_key_exists( $strParam , get_object_vars( $this ) ) )
        {
            if( $mixNewValue instanceof \Zend_Form_Element )
            {
                // salva o valor do element recebido como o parametro
                $this->{$strParam} = $mixNewValue->getValue();
            }
            else
            {
                // salva o valor recebido como parametro
                $this->{$strParam} = $mixNewValue;
            }
        }

        return $this;
    }

    /**
     * Metodo Magico para Obter o Valor de um Atributo ou Element
     *
     * se comecar com "get" e terminar com "Element" {
     *  procura o element a partir do metodo e retorna este
     * }
     *
     * se comecar com "get" e nao terminar com "Element" {
     *  se existir o atributo {
     *   retorna o valor do atributo
     *  }
     *  se nao existir o atributo e existir o element {
     *   retorna o valor do element
     *  }
     * }
     *
     * @param <type> $strMethod
     * @return Zend_Form_Element
     */
    public function magicGetter( $strMethod )
    {
        /**
         * Monta o Nome do Parametro a Partir do Metodo
         */
        $strParam = $this->getCallParamByMethod( $strMethod, "get" );

        /**
         * Para os atributos dos tipos simples
         */
        if( \array_key_exists( $strParam , get_object_vars( $this ) ) )
        {
            return $this->$strParam;
        }

        /**
         * Para o Getter de Element
         */
        $booIsElement = ( substr( $strMethod , -strlen( "Element" ) ) == "Element" );
        if( $booIsElement )
        {
            /**
             * Remove o Element do final do metodo
             */
            $strMethod = substr( $strMethod , 0 , strlen( $strMethod ) - strlen( "Element") );
            /**
             * Monta o Nome do Parametro a Partir do Metodo
             */
            $strParam = $this->getCallParamByMethod( $strMethod , "get" );
        }

        /**
         * Localiza o element a partir do nome do parametro
         */
        $objElement = $this->getCallElementByParam( $strParam );

        /**
         * Caso o retorno seja um Element
         */
       if( $objElement instanceof \Zend_Form_Element )
        {
           /**
            * E o metodo deseja mostrar o element
            */
            if( $booIsElement )
            {
                /**
                 * Retorna o Element
                 */
                return $objElement;
            }
            /**
             * Retorna o value do Element
             */
            return $objElement->getValue();
        }
        return null;
    }

    /**
     * Informa se o Atributo existe, se é Element ou se foi clicado
     * quando cabivel.
     *
     * se comecar com "is" {
     *  procura o element a partir do metodo
     *  se o element nao existir {
     *    retorna false
     *  }
     *  se o element existir mas nao for um InepFormElementSubmit {
     *   retorna true
     *  }
     *  se o element existir e for um InepFormElementSubmit {
     *   retorna o InepFormElementSubmit::wasClicked
     *  }
     * }
     * 
     * @param string $strMethod
     * @return boolean
     */
    protected function magicChecker( $strMethod )
    {
        $strParam = $this->getCallParamByMethod( $strMethod, "is" );
        $objElement = $this->getCallElementByParam( $strParam );
        if( $objElement instanceof Elements\InepFormElementSubmit )
        {
            return $objElement->wasClicked();
        }
        if( $objElement instanceof \Zend_Form_Element )
        {
            return true;
        }
        return false;

    }
    
    /**
     * Metodo magico do InepForm de chamada de metodos nao existentes
     * 
     *
     * @param string $strMethod
     * @param array $arrParam
     * @return InepForm
     */
    public function __call( $strMethod, $arrParam )
    {
        if( strpos( $strMethod , "set" ) === 0 )
        {
            return $this->magicSetter( $strMethod, $arrParam );
        }
        if( strpos( $strMethod , "get" ) === 0 )
        {
            return $this->magicGetter( $strMethod );
        }
        if( strpos( $strMethod , "is" ) === 0 )
        {
            return $this->magicChecker( $strMethod );
        }
    }

    /**
     * Monta a url da base do Projeto
     *
     * @return string
     */
    protected function getBaseUrl()
    {
        $objServerUrl = new \Zend_View_Helper_ServerUrl();
        $objBaseUrl = new \Zend_View_Helper_BaseUrl();
        return $objServerUrl->serverUrl() . $objBaseUrl->baseUrl();
    }

    /**
     * Initialize the Form
     */
    public function __construct( $arrOptions = null )
    {
        $this->objAnnotation = new \Coruja\Annotation\CorujaAnnotation( $this );
        $strEntity = strtolower( 
            \CorujaClassManipulation::getClassNameFromClassDefinition(
                $this->getEntityName()
            )
        );
        $this->initElements();
        parent::__construct( $arrOptions );
        $this->setController( $this->getShortEntityName() ? $this->getShortEntityName() : 'index' );
        $this->setAction( 'submit' );
        $this->setFormId( $this->getHeaderForm() );

    }

    /**
     * Monta o nome do element a partir do nome do atributo
     *
     * @param string $strAttribute
     * @return string
     */
    protected function makeElementAttributeName( $strAttribute )
    {
        return $this->getHeaderForm() . self::NODE_SEPARATOR . $strAttribute;
    }

    /**
     * Monta um Element Select do Inep
     *
     * @param string $strAttribute
     * @return \Local\Form\Elements\InepFormElementSelect
     */
    public function createElementSelect( $strAttribute )
    {
        $strId = $this->makeElementAttributeName( $strAttribute );
        $objSelect = new \Local\Form\Elements\InepFormElementSelect( $strId );
        $this->addElement( $objSelect );
        return $objSelect;
    }

    /**
     * Monta um Elemento de Texto
     *
     * @param string $strAttribute
     * @return \Local\Form\Elements\InepFormElementText
     */
    public function createElementText( $strAttribute )
    {
        $strId = $this->makeElementAttributeName( $strAttribute );
        $objText = new \Local\Form\Elements\InepFormElementText( $strId );
        $this->addElement( $objText );
        return $objText;
    }

    /**
     * Monta um Elemento de Senha
     *
     * @param string $strAttribute
     * @return \Local\Form\Elements\InepFormElementPassword
     */
    public function createElementPassword( $strAttribute )
    {
        $strId = $this->makeElementAttributeName( $strAttribute );
        $objPassword = new \Local\Form\Elements\InepFormElementPassword( $strId );
        $this->addElement( $objPassword );
        return $objPassword;
    }

    /**
     * Monta um Elemento de Radio
     *
     * @param string $strAttribute
     * @return \Local\Form\Elements\InepFormElementRadio
     */
    public function createElementRadio( $strAttribute )
    {
        $strId = $this->makeElementAttributeName( $strAttribute );
        $objRadio = new \Local\Form\Elements\InepFormElementRadio( $strId );
        $this->addElement( $objRadio );
        return $objRadio;
    }

    /**
     * Monta um Elemento de Checkbox
     *
     * @param string $strAttribute
     * @return \Local\Form\Elements\InepFormElementCheckbox
     */
    public function createElementCheckbox( $strAttribute )
    {
        $strId = $this->makeElementAttributeName( $strAttribute );
        $objCheckbox = new \Local\Form\Elements\InepFormElementCheckbox( $strId );
        $this->addElement( $objCheckbox );
        return $objCheckbox;
    }

    /**
     * Monta o Elemento de Botao
     *
     * @param string $strAttribute
     * @return \Local\Form\Elements\InepFormElementButton
     */
    public function createElementButton( $strAttribute )
    {
        $strId = $this->makeElementAttributeName( $strAttribute );
        $objButton = new \Local\Form\Elements\InepFormElementButton( $strId );
        $this->addElement( $objButton );
        return $objButton;
    }

    /**
     * Monta o Elemento de Arquivo
     *
     * @param string $strAttribute
     * @return \Local\Form\Elements\InepFormElementFile
     */
    public function createElementFile( $strAttribute )
    {
        $strId = $this->makeElementAttributeName( $strAttribute );
        $objFile = new \Local\Form\Elements\InepFormElementFile( $strId );
        $this->addElement( $objFile );
        return $objFile;
    }

    /**
     * Monta o Elemento de Valor Oculto 
     *
     * @param string $strAttribute
     * @return \Local\Form\Elements\InepFormElementHidden
     */
    public function createElementHidden( $strAttribute )
    {
        $strId = $this->makeElementAttributeName( $strAttribute );
        $objHidden = new \Local\Form\Elements\InepFormElementHidden( $strId );
        $this->addElement( $objHidden );
        return $objHidden;
    }

    /**
     * Monta o Elemento de Caixa de Texto
     *
     * @param string $strAttribute
     * @return \Local\Form\Elements\InepFormElementTextarea
     */
    public function createElementTextarea( $strAttribute )
    {
        $strId = $this->makeElementAttributeName( $strAttribute );
        $objTextarea = new \Local\Form\Elements\InepFormElementTextarea( $strId );
        $this->addElement( $objTextarea );
        return $objTextarea;
    }

    /**
     * Inicializa os Elementos a partir de suas anotações
     */
    public function initElements()
    {
        $arrAnnotationAttributes = $this->objAnnotation->getAnnotationAttributes();
        $intOrder = sizeof( $arrAnnotationAttributes );

        $intMaxOrder = 0;
        
        foreach( $arrAnnotationAttributes as $objAnnotationAttribute )
        {
            $strAttributeName = $objAnnotationAttribute->getAttributeName();
            $strNodeName = $this->makeElementAttributeName( $strAttributeName );
            $objElement = null;
            
            switch( $objAnnotationAttribute->getTag() )
            {
                case 'input':
                {
                    $objElement = new Elements\InepFormElementText( $strNodeName );
                    break;
                }
                case 'password':
                {
                    $objElement = new Elements\InepFormElementPassword( $strNodeName );
                    break;
                }
                case 'textarea':
                {
                    $objElement = new Elements\InepFormElementTextarea( $strNodeName );
                    break;
                }
                case 'radio':
                {
                    $objElement = new Elements\InepFormElementRadio( $strNodeName );
                    break;
                }
                case 'checkbox':
                {
                    $objElement = new Elements\InepFormElementCheckbox( $strNodeName );
                    break;
                }
                case 'button':
                {
                    $objElement = new Elements\InepFormElementButton( $strNodeName );
                    break;
                }
                case 'submit':
                {
                    $objElement = new Elements\InepFormElementSubmit( $strNodeName );
                    break;
                }
                case 'cancel':
                {
                    $objElement = new Elements\InepFormElementCancel( $strNodeName );
                    break;
                }
                case 'file':
                {
                    $objElement = new Elements\InepFormElementFile( $strNodeName );
                    break;
                }
                case 'hidden':
                {
                    $objElement = new Elements\InepFormElementHidden( $strNodeName );
                    break;
                }
                case 'select':
                {
                    $objElement = new Elements\InepFormElementSelect( $strNodeName );

                    if( $objAnnotationAttribute->getOptions() !== null )
                    {
                        $objElement->setMultiOptions(
                            $objAnnotationAttribute->getOptions()
                        );
                    }
                    break;
                }
            }
            if( $objElement !== null )
            {
                $objElement->setValue( $this->$strAttributeName );
                
                if( $objAnnotationAttribute->getVisible() !== null )
                {
                    $objElement->setVisible( $objAnnotationAttribute->getVisible() );
                }
                
                if( $objAnnotationAttribute->getRender() !== null )
                {
                    $objElement->setRender( $objAnnotationAttribute->getRender() );
                }
                
                if( strlen( $objAnnotationAttribute->getLabel() ) > 0 )
                {
                    $objElement->setLabel( ucfirst( $objAnnotationAttribute->getLabel() ) );
                }

                if( $objAnnotationAttribute->getOrder() > 0 )
                {
                    $objElement->setOrder( $objAnnotationAttribute->getOrder() );
                }
                else
                {
                    $objElement->setOrder( $intOrder );
                    ++$intOrder;
                }

                if( $intMaxOrder < $objElement->getOrder() )
                {
                    $intMaxOrder = $objElement->getOrder();
                }
                $intTabIndex = $objElement->getOrder() + self::$intLastTabIndex;
                $objElement->setAttrib( 'tabindex' , $intTabIndex );
                $this->addElement( $objElement );
                
                if( $this->getEntityName() !== '' )
                {
                    $objEntityTable = $this->getEntityTable();
                    $strSetter = ( "set" . ucfirst( $objAnnotationAttribute->getAttributeName() ) );
                    try
                    {
                        $objAnnotationEntity = $objEntityTable->getRow()->findAnnotationByMethod( $strSetter );
                        if( $objAnnotationEntity->getMaxlength() )
                        {
                            $objElement->setAttrib('maxLength',
                                \CorujaArrayManipulation::coalesce(
                                    $objAnnotationEntity->getMaxlength() ,
                                    $objAnnotationAttribute->getMaxlength()
                                )
                           );
                            $objElement->setAttrib(
                                'size',
                                \CorujaArrayManipulation::coalesce(
                                    $objAnnotationAttribute->getSize() ,
                                    $objAnnotationEntity->getMaxlength()
                                )
                           );
                           $objElement->setAttrib('class', 'text');
                        }
                    }
                    catch( \Exception $objException )
                    {
                        // .. nao existe atributo na entidade
                    }
                }

                if( strlen( $objAnnotationAttribute->getFill() ) > 0 )
                {
                    $strFill = $objAnnotationAttribute->getFill();
                    /**
                     * Caso a anotacao fill seja preenchida
                     */
                    if( method_exists( $this , $strFill ) )
                    {
                        $this->{$strFill}( $objElement );
                    }
                }
            }
        }

        self::$intLastTabIndex += $intMaxOrder;
    }

    /**
     * Monta o Formulario a partir das informacoes dos objetos
     *
     * @return string
     */
    public function __toString()
    {
        $this->setSubmitted( true );
        /**
         * Caso não tenha id nem precisa enviar o id hidden
         */
        if( $this->getId() == null )
        {
            if( $this->getIdElement() )
            {
                $this->getIdElement()->setRender( false );
            }
        }
        $this->loadAttributes();
        return parent::__toString();
    }

    /**
     * Atualiza os Elements a partir dos valores dos atributos que fazem
     * referencia.
     */
    protected function loadAttributes()
    {
        $arrAnnotationAttributes = $this->objAnnotation->getAnnotationAttributes();
        foreach( $arrAnnotationAttributes as $objAnnotationAttribute )
        {
            $strNodeName = $this->getHeaderForm() . self::NODE_SEPARATOR . $objAnnotationAttribute->getAttributeName();
            $objElement = $this->getElement( $strNodeName );

            $strAttribute = $objAnnotationAttribute->getAttributeName();
            $strAttributeGetter = $objAnnotationAttribute->getGetter();
            if( $objElement instanceof Elements\InepFormElementInterface )
            {
                if( !$objElement->isRender() )
                {
                    /**
                     * Remove o elemento
                     */
                    $this->removeElement( $objElement->getName() );
                }
                if( !$objElement->isVisible() )
                {
                    /**
                     * Substitui o elemento por um tipo hidden
                     */
                    $objNewElement = new Elements\InepFormElementHidden( $objElement->getName() );
                    $objNewElement->setValue( $objElement->getValue() );
                    $this->removeElement( $objElement->getName() );
                    $this->addElement( $objNewElement );
                }
            }
            if( $objElement instanceof \Zend_Form_Element )
            {
                if(\method_exists( $this , $strAttributeGetter ) )
                {
                    $objValue =  $this->{$strAttributeGetter}();
                }
                else
                {
                    $objValue =  $this->{$strAttribute};
                }
                $objElement->setValue( $objValue );
            }
        }
    }
}
?>