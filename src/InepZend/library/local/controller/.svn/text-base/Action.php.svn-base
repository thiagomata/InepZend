<?php
namespace Local\Controller;

/**
 * Abstract Action
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 18/11/2010
 *
 * @AnnotationMethod \Local\Controller\ActionMethodAnnotation
 */
abstract class Action extends \Zend_Controller_Action {

    /**
     * Usuario Logado, se existir
     *
     * @var Application_Model_DbTable_Usuario
     */
    protected $objUsuario = null;

    /**
     * Helper das Flash Messages
     *
     * @var Zend_Controller_Action_Helper_Abstract
     */
    protected $_flashMessenger = null;

    /**
     * Helper das Flash Warnings Messages
     *
     * @var Zend_Controller_Action_Helper_Abstract
     */
    protected $_flashWarnings = null;

    /**
     * Array de Mensagens
     *
     * @var string[]
     */
    protected $arrMessages = array();

    /**
     * Array de Warnings
     *
     * @var string[]
     */
    protected $arrWarnings = array();

    /**
     * Total de elementos por pagina, padrão.
     *
     * @var integer
     */
    protected $intPaginatorDefaultCountPerPage = 10;

    /**
     * Class Annotation
     *
     * @var \Coruja\Annotation\CorujaAnnotation
     */
    protected $objAnnotation;
    
    /**
     * Xml Root Tag
     * 
     * @var CorujaXmlEntity
     */
    protected $objTemplateRootTag;
    
    public function init() {

        /**
         * Inicia o Flash Message Helper
         */
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->_flashMessenger->setNamespace( 'messages' );

        /**
         * Inicia o Flash Warning Message Helper
         */
        $this->_flashWarnings = clone $this->_helper->getHelper('FlashMessenger');
        $this->_flashWarnings->setNamespace( 'warnings' );

        /**
         * Inicia a View
         */
        $this->initView();

        /**
         * Carrega o Application.ini
         */
        $applicationIni = \Local\Bootstrap::getInstance()->getOptions();

        /**
         * Carrega o Translator
         */
        $translator = new \Zend_Translate(
                        'csv',
                        $applicationIni['translate']['path'],
                        'pt_BR',
                        array('scan' => \Zend_Translate::LOCALE_DIRECTORY)
        );
        \Zend_Validate_Abstract::setDefaultTranslator($translator);

        /**
         * Confere se existe usuario autenticado
         */
//        $auth = \Zend_Auth::getInstance();
//        if ($auth->hasIdentity()) {
//            $email = $auth->getIdentity();
//            $usuarioTable = new Application_Model_DbTable_UsuarioTable();
//            $this->objUsuario = $usuarioTable->getUsuarioByEmail($email);
//            $this->view->objUsuario = $this->objUsuario;
//        }

        /**
         * Configura o paginator
         */
//        \Zend_Paginator::setDefaultScrollingStyle('Sliding');
//        \Zend_Paginator::setDefaultItemCountPerPage($this->intPaginatorDefaultCountPerPage);
//        \Zend_View_Helper_PaginationControl::setDefaultViewPartial('partial/_pagination.phtml');

        /**
         * Inicia as anotacoes
         */
        $this->objAnnotation = new \Coruja\Annotation\CorujaAnnotation( $this );
        

        $this->getRequest()->setControllerName( $this->getShortName() );
        
        /**
         * Inicializacao padrao
         */
        parent::init();
    }
    
    public function getShortName()
    {
        $strClass = get_class( $this );
        $strClass = \strtolower( \substr( $strClass , 0 , - strlen( "Controller" ) ) );
        return $strClass;
    }
    
    public function addWarnings(array $arrWarnings) {
        foreach ($arrWarnings as $strWarning) {
            $this->addWarning($strWarning);
        }
    }

    public function addWarning($strWarning) {
        $this->arrWarnings[] = $strWarning;
    }

    public function addFlashWarnings(array $arrWarnings) {
        foreach ($arrWarnings as $strWarning) {
            $this->addFlashWarning($strWarning);
        }
    }

    public function addFlashWarning($strWarning) {
        $this->_flashWarnings->addMessage($strWarning);
    }

    public function getWarnings() {
        $arrFlashWarnings = $this->_flashWarnings->getMessages();
        $arrWarnings = $this->arrWarnings;
        return array_unique(array_merge($arrWarnings, $arrFlashWarnings));
    }

    public function addMessages(array $arrMessages) {
        foreach ($arrMessages as $strMessage) {
            $this->addMessage($strMessage);
        }
    }

    public function addMessage($strMessage) {
        $this->arrMessages[] = $strMessage;
    }

    public function addFlashMessages(array $arrMessages) {
        foreach ($arrMessages as $strMessage) {
            $this->addFlashMessage($strMessage);
        }
    }

    public function addFlashMessage($strMessage) {
        $this->_flashMessenger->addMessage($strMessage);
    }

    public function getMessages() {
        $arrFlashMessages = $this->_flashMessenger->getMessages();
        $arrMessages = $this->arrMessages;
        return array_unique(array_merge($arrMessages, $arrFlashMessages));
    }

    public function postDispatch() {
        $this->view->messages = $this->getMessages();
        $this->view->warnings = $this->getWarnings();

        parent::postDispatch();
    }

    public function checkAdministrator() {
        if (!isset($this->objUsuario) || !$this->objUsuario->isAdministrador()) {
            $this->addFlashMessage('Usuário não está autenticado.');
            $this->_helper->redirector('index', 'index');
        }
    }

    /**
     *
     * @param string $strMethodName
     * @return Local\Controller\ActionMethodAnnotation
     */
    public function getAnnotationMethod( $strMethodName )
    {
        return $this->objAnnotation->getAnnotationMethod( $strMethodName );
    }

    protected function isDispatchable()
    {
        if ($this->getRequest()->isDispatched()) {
            if (null === $this->_classMethods) {
                $this->_classMethods = get_class_methods($this);
            }

            if ($this->getInvokeArg('useCaseSensitiveActions') || in_array($action, $this->_classMethods)) {
                if ($this->getInvokeArg('useCaseSensitiveActions')) {
                    trigger_error('Using case sensitive actions without word separators is deprecated; please do not rely on this "feature"');
                }
                $this->$action();
            }
        }
    }

    protected function prepareParameters( $action )
    {
        if( !method_exists( $this , $action ) )
        {
            return array();
        }
        $objAnnotationMethod = $this->getAnnotationMethod( $action );
        $objReflectMethod = new \ReflectionMethod( $this , $action );
        $arrParameters = $objReflectMethod->getParameters();
        $arrReturn = array();
        foreach( $arrParameters as $objParameter )
        {
            $strName = $objParameter->getName();
            $objClassParameter = $objParameter->getClass();
            if( $objClassParameter !== null )
            {
                $strClassParameter = $objClassParameter->getName();
                $objElement = new $strClassParameter();
                if( $objElement instanceof \Local\Form\InepForm )
                {
                    $objElement->loadData( $this->_getAllParams() );
                }
            }
            else
            {
                if( $objParameter->isOptional() )
                {
                    $objElement = $this->_getParam( $strName , $objParameter->getDefaultValue() );
                }
                else
                {
                    $objElement = $this->_getParam( $strName , false );
                    if( $objElement === false )
                    {
                        throw new \Exception( "Parametro {$strName} é Obrigatório no método {$action} da controladora " . get_class( $this ) );
                    }
                }
            }
            $arrReturn[] = $objElement;
        }
        return $arrReturn;
    }

    public function dispatch( $action ) {

        if( !method_exists( $this , $action ) )
        {
            throw new \Exception( 'Requisicao Invalida' );
        }
        // Notify helpers of action preDispatch state
        $this->_helper->notifyPreDispatch();

        $this->preDispatch();
        $arrParams = $this->prepareParameters( $action );

        call_user_func_array( array( $this , $action ) , $arrParams );
        $this->postDispatch();

        // whats actually important here is that this action controller is
        // shutting down, regardless of dispatching; notify the helpers of this
        // state
        $this->_helper->notifyPostDispatch();
    }

    protected function validate( \Local\Model\Entity $objEntity )
    {
        try
        {
           $objEntity->validate();
           return true;
        }
        catch( \Local\Model\EntityValidateException $objException )
        {
            $this->addWarnings( $objException->getMessages() );
            return false;
        }
    }

    public function __call( $strMethod, $arrParams )
    {
        return parent::__call( $strMethod , $arrParams );
    }

    protected function redirectController( $strController, $strAction = 'index', array $arrParams = array() )
    {
        $this->addFlashMessages( $this->getMessages() );
        $this->addFlashWarnings( $this->getWarnings() );
        $this->_helper->redirector( $strAction , $strController , null ,  $arrParams );
    }

    protected function redirectAction( $strAction , $arrParams )
    {
        $this->addFlashMessages( $this->getMessages() );
        $this->addFlashWarnings( $this->getWarnings() );
        $this->_helper->redirector( $strAction, null, null, $arrParams );
    }

    /**
     *
     * @param string $strTemplate
     * @return InepTemplate
     */
    public function getTemplate( $strTemplate )
    {
        $objTemplate = \Local\Template\InepTemplate::getInepTemplate( $strTemplate );
        return $objTemplate;
    }

    protected function requireFile( $strFile )
    {
        return include( $strFile  );
    }
    
    /**
     *
     * @param string $strTemplate
     * @return return HtmlEntity
     */
    public function loadTemplate( $strTemplate )
    {
        $objTemplate = $this->getTemplate( $strTemplate );
        $objTag = $this->requireFile( $objTemplate->getPhpCodeFile() );
        $objTag->setContext( $this );
        if( $this->objTemplateRootTag == null )
        {
            $this->objTemplateRootTag = $objTag;
        }
        else
        {
            $this->objTemplateRootTag->addChild( $objTag );
        }
        return $objTag;
    }
    
    public function loadStringTemplate( $strTemplate )
    {
        $objXml2Php = new \Coruja\Xml2Php\InepXml2Php();
        $strScript = $objXml2Php->createScriptFromString( $strTemplate , "" , false );
        return eval( $strScript );
    }

}