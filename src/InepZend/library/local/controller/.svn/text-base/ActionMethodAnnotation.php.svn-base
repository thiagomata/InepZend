<?php
namespace Local\Controller;

class ActionMethodAnnotation implements \Coruja\Annotation\Interfaces\CorujaAnnotationMethodInterface
{
    /**
     * Class Container Name
     *
     * @var string
     */
    protected $strClassContainerName;

    /**
     * Method Name
     *
     * @var string
     */
    protected $strMethodName;

    /**
     * Perfil annotation
     *
     * @var string
     */
    protected $strPerfil;

    /**
     * Permissoes annotation
     *
     * @var string
     */
    protected $strPermissoes;

    /**
     *
     * @param string $strClassContainerName
     * @param string $strMethodName
     */
    public function __construct( $strClassContainerName = "" , $strMethodName = "" )
    {
        $this->setClassContainerName( $strClassContainerName );
        $this->setMethodName( $strMethodName );
    }

    /**
     * Set the class container name
     *
     * @param string $strClassContainerName
     */
    public function setClassContainerName( $strClassContainerName )
    {
        $this->strClassContainerName = (string)$strClassContainerName;
    }

    /**
     * Get the class container name
     *
     * @return string
     */
    public function getClassCointainerName()
    {
        return $this->strClassContainerName;
    }

    /**
     * Set the Method Name
     *
     * @param string $strMethodName
     */
    public function setMethodName( $strMethodName )
    {
        $this->strMethodName = $strMethodName;
    }

    /**
     * Get the Method Name
     *
     * @return string
     */
    public function getMethodName()
    {
        return $this->strMethodName;
    }

    /**
     * Set the Perfil annotation
     *
     * @param string $strPerfil
     */
    public function setPerfil( $strPerfil )
    {
        $this->strPerfil = $strPerfil;
    }

    /**
     * Get the Perfil annotation
     *
     * @return string
     */
    public function getPerfil()
    {
        return $this->strPerfil;
    }

    /**
     * Set the Permissoes annotation
     *
     * @param string $strPermissoes
     */
    public function setPermissoes( $strPermissoes )
    {
        $this->strPermissoes = $strPermissoes;
    }

    /**
     * Get the Permissoes annotation
     *
     * @return string
     */
    public function getPermissoes()
    {
        return $this->strPermissoes;
    }

    /**
     * Validate the data inside the annotation Method
     * after all the information be received
     *
     * @throws CorujaAnnotationException
     */
    public function validate()
    {

    }
}

?>