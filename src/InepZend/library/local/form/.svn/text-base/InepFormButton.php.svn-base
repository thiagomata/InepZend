<?php
namespace Local\Form;

/**
 * Classe para criar botoes html baseado em imagens clicaveis.
 *
 * Cria imagens clicaveis que funcionam como botoes de submit ou hiperlinks
 * que ainda podem enviar os parametros informados
 *
 * @author Thiago Mata thiago.mata@inep.gov.br
 */
class InepFormButton
{
    /**
     * Nome do Botao
     *
     * @var string
     */
    protected $strName;

    /**
     * Controladora de destino do botao
     *
     * @var string
     */
    protected $strController;

    /**
     * Action de destino do botao
     *
     * @var string
     */
    protected $strAction;

    /**
     * Url da imagem do botao,
     * relativa a pasta raiz do projeto
     *
     * @var string
     */
    protected $strIcon;

    /**
     * Url da imagem do botao desabilitado,
     * relativa a pasta raiz do projeto
     *
     * @var string
     */
    protected $strIconDisabled;

    /**
     * Flag que controla se o botao
     * esta habilitado ou nao
     *
     * @var boolean
     */
    protected $booEnabled = true;

    /**
     * Parametros do Evento que serao
     * enviados ao destino
     *
     * @var array
     */
    protected $arrParams = array();

    /**
     * Flag que controla o tipo de
     * metodo de envio dos dados
     * ( 0 => GET , 1 => POST )
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
     * Endereco da pasta index na url
     *
     * @var string
     */
    protected static $strIndexFolder;

    /**
     * Informa o nome do botao
     *
     * @param string $strName
     * @return InepFormButton
     */
    public function setName( $strName )
    {
        $this->strName = $strName;
        return $this;
    }

    /**
     * Obtem o nome do botao
     *
     * @return string
     */
    public function getName()
    {
        return $this->strName;
    }

    /**
     * Informa a URL da icone do botao
     *
     * @param string $strIcon
     * @return InepFormButton
     */
    public function setIcon( $strIcon )
    {
        $this->strIcon = $strIcon;
        return $this;
    }

    /**
     * Obtem a URL da icone do botao
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->strIcon;
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
     * Informa os parametros de submissao do Botao
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
     * Informa se os demais dados do formulario ao qual o botao pertence
     * tambem devem ser submetidos juntamente com os parametros do botao
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
     * Consulta se os demais dados do formulario ao qual o botao pertence
     * tambem devem ser submetidos juntamente com os parametros do botao
     *
     * @return boolean
     */
    public function getKeepFormData()
    {
        return $this->booKeepFormData;
    }

    /**
     * Consulta se os demais dados do formulario ao qual o botao pertence
     * tambem devem ser submetidos juntamente com os parametros do botao
     *
     * @return boolean
     */
    public function hasKeepFormData()
    {
        return $this->getKeepFormData();
    }

    /**
     * Informa que os dados do botao serao enviados via post
     */
    public function goPost()
    {
        $this->booMethodPost = 1;
    }

    /**
     * Informa que os dados do botao serao enviados via get
     */
    public function goGet()
    {
        $this->booMethodPost = 0;
    }

    /**
     * Retorna o tipo de Metodo que sera uitlizado na submissao
     * do botao
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
     * Monta a saida html do Botao com os devidos eventos e atributos
     *
     * @return string
     */
    public function __toString()
    {
        return
        "<image 
                alt=\"{$this->getName()}\"
                title=\"{$this->getName()}\"
                class=\"clickable\"
                src=\"{$this->getImageFolder()}/{$this->getIcon()}\"
                onclick=\"javascript:makeEvent('{$this->getIndexLink()}/{$this->getController()}/{$this->getAction()}/', {$this->linkParams()}, {$this->printMethod()}, {$this->printKeepFormData()}, this )\" />";
    }

    /**
     * Monta o array dos parametros no formato javascript
     * do modo esperado pela funcao javascript
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
     * Obtem a pasta das imagens dos botoes
     *
     * @return string
     */
    protected function getImageFolder()
    {
        return $this->getIndexLink() . '//' . 'images';
    }
}