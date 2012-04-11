<?php
namespace Local\Form;

/**
 * Entity of implementation of the CorujaAnnotationClassInterface 
 *
 * @authorThiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
class FormAnnotationClass implements  \Coruja\Annotation\Interfaces\CorujaAnnotationClassInterface
{
    /**
     * Class Container Name
     *
     * @var string
     */
    protected $strClassContainerName = "";

    /**
     * Entity Name
     * @var string
     */
     protected $strEntity = "";

    /**
     * Initi the Class Container Annotation
     *
     * @param string $strClassContainerName
     * @implements CorujaAnnotationClassInterface
     */
    public function __construct( $strClassContainerName = "" )
    {
        $this->setClassContainerName( $strClassContainerName );
    }

    /**
     * Set the Class Container Name
     *
     * @param string  $strClassContainerName
     * @implements CorujaAnnotationClassInterface
     */
    public function setClassContainerName( $strClassContainerName )
    {
        $this->strClassContainerName = (string)$strClassContainerName;
    }

    /**
     * Get the Class Container Name
     *
     * @return string
     * @implements CorujaAnnotationClassInterface
     */
    public function getClassContainerName()
    {
        return $this->strClassContainerName;
    }

    /**
     * Set the Entity of the container Class
     *
     * @param string $strEntity
     */
    public function setEntity( $strEntity )
    {
        $this->strEntity = $strEntity;
    }

    /**
     * Get the Entity of the Container Class
     *
     * @return string
     */
    public function getEntity()
    {
        return $this->strEntity;
    }
    
    /**
     * Validate the data inside the Annotation Class
     * after all the information be received
     *
     * @throws CorujaAnnotationException
     * @implements CorujaAnnotationClassInterface
     */
    public function validate()
    {
//        if( $this->getEntity() == "" )
//        {
//            throw new Coruja\Annotation\CorujaAnnotationException( "Anotação do nome da tabela na classe é obrigatória");
//        }
    }
}

?>