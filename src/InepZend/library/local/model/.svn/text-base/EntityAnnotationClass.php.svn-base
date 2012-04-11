<?php
namespace Local\Model;

/**
 * Entity of implementation of the CorujaAnnotationClassInterface with
 * the "Table" necessary notation
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
class EntityAnnotationClass implements  \Coruja\Annotation\Interfaces\CorujaAnnotationClassInterface
{
    /**
     * Class Container Name
     *
     * @var string
     */
    protected $strClassContainerName = "";

    /**
     * Table Name
     * @var string
     */
     protected $strTable = "";

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
     * Set the Table of the container Class
     *
     * @param string $strTable
     */
    public function setTable( $strTable )
    {
        $this->strTable = $strTable;
    }

    /**
     * Get the Table of the Container Class
     *
     * @return string
     */
    public function getTable()
    {
        return $this->strTable;
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
//        if( $this->getTable() == "" )
//        {
//            throw new Coruja\Annotation\CorujaAnnotationException( "Anotação do nome da tabela na classe é obrigatória");
//        }
    }
}

?>