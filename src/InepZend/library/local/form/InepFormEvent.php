<?php
namespace Local\Form;

/**
 * Classe de eventos que podem ser incorporados a elementos \Zend_Form_Element
 * ou utilizada para criar links dinamicos.
 *
 * Essa classe pode ser utilizada para fazer qualquer elemento se comportar
 * como um botao submit ou hiperlink que ainda pode enviar parametros para o
 * endereco de destino
 *
 * @author Thiago Mata thiago.mata@inep.gov.br
 */
class InepFormEvent
{
    /**
     * Nome do Evento
     *
     * @var string
     */
    protected $strName;

    /**
     * Controladora de destino
     *
     * @var string
     */
    protected $strController;

    /**
     * Action de destino
     *
     * @var string
     */
    protected $strAction;

    /**
     * Parametros do Evento que serao
     * enviados ao destino
     *
     * @var array
     */
    protected $arrParams = array();

    /**
     * Controla se o Metodo sera Post(1) ou Get(0)
     *
     * @var boolean
     */
    protected $booMethodPost = 0;

    /**
     * Controla deve-se submeter juntamente com os parametros
     * os demais dados do formulario
     *
     * @var boolean
     */
    protected $booKeepFormData = 0;

    /**
     * Enderedo da pasta index na url
     *
     * @var string
     */
    protected static $strIndexFolder;

    /**
     * Informa o nome do evento
     *
     * @param string $strName
     * @return InepFormEvent
     */
    public function setName( $strName )
    {
        $this->strName = $strName;
        return $this;
    }

    /**
     * Obtem o nome do evento
     *
     * @return string
     */
    public function getName()
    {
        return $this->strName;
    }

    /**
     * Informa qual sera a controladora de destino
     *
     * @param string $strController
     * @return InepFormButton
     */
    public function setController( $strController )
    {
        $this->strController = $strController;
        return $this;
    }

    /**
     * Obtem a controladora de destino
     *
     * @return string
     */
    public function getController()
    {
        return $this->strController;
    }

    /**
     * Informa qual é a action de destino
     *
     * @param string $strAction
     * @return InepFormButton
     */
    public function setAction( $strAction )
    {
        $this->strAction = $strAction;
        return $this;
    }

    /**
     * Obtem a action de destino
     *
     * @return string
     */
    public function getAction()
    {
        return $this->strAction;
    }

    /**
     * Informa os parametros de submissao do evento
     * que sera passados ao destino
     *
     * @param array $arrParams
     * @return InepFormButton
     */
    public function setParams( array $arrParams )
    {
        $this->arrParams = $arrParams;
        return $this;
    }

    /**
     * Informa o valor de um parametro a ser enviado ao destino
     *
     * @param string $strParamName
     * @param mixer $mixValue
     * @return InepFormButton
     */
    public function addParam( $strParamName , $mixValue )
    {
        $this->arrParams[ $strParamName ] = $mixValue;
        return $this;
    }

    /**
     * Obtem o valor de um parametro a ser enviado ao destino
     *
     * @param string $strParamName
     * @return mixer $mixValue
     */
    public function getParam( $strParamName )
    {
        return $this->arrParams[ $strParamName ];
    }

    /**
     * Obtem os parametros da submissao que devem
     * ser passados ao destino
     *
     * @return array
     */
    public function getParams()
    {
        return $this->arrParams;
    }

    /**
     * Informa se os demais dados do formulario ao qual o evento pertence
     * tambem devem ser submetidos juntamente com os parametros do evento
     *
     * @param boolean $booKeepFormData
     * @return InepFormButton
     */
    public function setKeepFormData( $booKeepFormData )
    {
        $this->booKeepFormData = $booKeepFormData;
        return $this;
    }

    /**
     * Consulta se os demais dados do formulario ao qual o evento pertence
     * tambem devem ser submetidos juntamente com os parametros do evento
     *
     * @return boolean
     */
    public function getKeepFormData()
    {
        return $this->booKeepFormData;
    }

    /**
     * Consulta se os demais dados do formulario ao qual o evento pertence
     * tambem devem ser submetidos juntamente com os parametros do evento
     *
     * @return boolean
     */
    public function hasKeepFormData()
    {
        return $this->getKeepFormData();
    }

    /**
     * Informa que os dados do evento serao enviados via post
     */
    public function goPost()
    {
        $this->booMethodPost = 1;
    }

    /**
     * Informa que os dados do evento serao enviados via get
     */
    public function goGet()
    {
        $this->booMethodPost = 0;
    }

    /**
     * Retorna o tipo de Metodo que sera uitlizado na submissao
     * do evento
     *
     * @return string
     */
    public function getSubmissionMethod()
    {
        return $this->booMethodPost ? 'POST' : 'GET';
    }

    /**
     * Imprime o Metodo de Envido dos dados de Submissao
     * segundo o esperado na funcao javascript
     *
     * @return string
     */
    protected function printMethod()
    {
        return $this->booMethodPost ? '1' : '0';
    }

    /**
     * Imprime o Metodo de Envido dos dados de Submissao
     * segundo o esperado na funcao javascript
     *
     * @return string
     */
    protected function printSubmit()
    {
        return $this->booSubmit ? '1' : '0';
    }

    /**
     * Imprime o titulo do evento no formato esperado para a saida
     * html
     *
     * @return string
     */
    protected function printTitle()
    {
        return "title=\"{$this->getName()}\" ";
    }

    /**
     * Imprime se deve ou nao enviar as demais informacoes
     * do formulario no formato esperado pela funcao
     * javascript
     *
     * @return string
     */
    protected function printKeepFormData()
    {
        return $this->booKeepFormData ? '1' : '0';
    }

    /**
     * Imprime o evento do link, quando link, do modo
     * esperado pelo html e javascript
     *
     * @return string
     */
    protected function printHRef()
    {
        return "href='#' ";
    }

    /**
     * Imprime o conteudo do evento de click do modo
     * esperado pelo html e javascript
     *
     * @return string
     */
    protected function printOnClickContent()
    {
        return "javascript:makeEvent('{$this->getIndexLink()}/{$this->getController()}/{$this->getAction()}/', {$this->linkParams()}, {$this->printMethod()}, {$this->printKeepFormData()}, this );return false;";
    }

    /**
     * Imprime o evento de click do modo
     * esperado pelo html e javascript
     *
     * @return string
     */
    protected function printOnClick()
    {
        return "onclick=\"{$this->printOnClickContent()}\"";
    }

    /**
     * Monta a saida de texto no formato de hiperlink
     *
     * @return string
     */
    public function toLink()
    {
        return $this->printTitle() . $this->printHRef() . $this->printOnClick();
    }

    /**
     * Monta a saida de texto html no formato padrao
     *
     * @return string
     */
    public function __toString()
    {
        return $this->printTitle() . $this->printOnClick();
    }

    /**
     * Monta o array javascript dos parametros no formato esperado
     * pela funcao javascript
     *
     * @return string
     */
    protected function linkParams()
    {
        $arrParams = array();
        foreach( $this->getParams() as $strKey => $strVar )
        {
            $arrParams[] = '\'' . $strKey . '\', \'' . $strVar . '\'';
        }
        return 'Array( ' . implode( ', ' , $arrParams ) . ' )';
    }

    /**
     * Obtem a pasta raiz do projeto
     *
     * @return string
     */
    private function getIndexLink()
    {
        if( self::$strIndexFolder == null )
        {
            $arrIndex = explode( '/' , $_SERVER[ 'PHP_SELF'] );

            while( ( sizeof( $arrIndex ) > 0 ) && ( end( $arrIndex ) == '' ) )
            {
                \array_pop( $arrIndex );
            }
            while( ( sizeof( $arrIndex ) > 0 ) && ( $arrIndex[0] == '' ) )
            {
                \array_shift( $arrIndex );
            }
            while( ( sizeof( $arrIndex ) > 0 ) && ( end( $arrIndex ) != 'index.php' ) )
            {
                \array_pop( $arrIndex );
            }
            \array_pop( $arrIndex );

            \array_unshift( $arrIndex , $_SERVER[ 'HTTP_HOST'] );
            self::$strIndexFolder = 'http://' . implode( '/' , $arrIndex );
        }
        return self::$strIndexFolder;
    }

    /**
     * Altera um Elemento do Zend Form para conter em seu conteudo html
     * esse evento
     *
     * @param \Zend_Form_Element $objElement
     */
    public function loadInepFormElement( \Zend_Form_Element $objElement )
    {
        $objElement->setAttrib( 'onclick', $this->printOnClickContent() );
        $objElement->setAttrib( 'title', $this->getName() );
    }
}