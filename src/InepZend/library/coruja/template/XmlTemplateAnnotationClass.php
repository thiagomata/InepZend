<?php
namespace Coruja\Template;

/**
 * XmlTemplateAnnotationClass
 */

/**
 * @Link Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
class XmlTemplateAnnotationClass implements \Coruja\Annotation\Interfaces\CorujaAnnotationClassInterface
{
    /**
     * Class Container Name
     *
     * @var string
     */
    protected $strClassContainerName = "";

    /**
     * Link Name
     * @var string
     */
     protected $strLink = "";

    /**
     * Tag Name
     * @var string
     */
     protected $strTag = "";

    /**
     * Schema Name
     * @var string
     */
     protected $strSchema = "";

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
     * Set the Link of the container Class
     *
     * @param string $strLink
     */
    public function setLink( $strLink )
    {
        $this->strLink = $strLink;
    }

    /**
     * Get the Link of the Container Class
     *
     * @return string
     */
    public function getLink()
    {
        return $this->strLink;
    }

    /**
     * Set the Tag of the container Class
     *
     * @param string $strTag
     */
    public function setTag( $strTag )
    {
        $this->strTag = $strTag;
    }

    /**
     * Get the Tag of the Container Class
     *
     * @return string
     */
    public function getTag()
    {
        if( $this->strTag == null )
        {
            $this->setTag(
                strtolower(
                    \CorujaClassManipulation::getClassNameFromClassDefinition(
                        $this->getClassContainerName()
                    )
                )
            );
        }
        return $this->strTag;
    }

    /**
     * Set the Schema of the container Class
     *
     * @param string $strSchema
     */
    public function setSchema( $strSchema )
    {
        $this->strSchema = $strSchema;
    }

    /**
     * Get the Schema of the Container Class
     *
     * @return string
     */
    public function getSchema()
    {
        return $this->strSchema;
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
//        if( $this->getLink() == "" )
//        {
//            throw new CorujaAnnotationException( "Link Name Is Binding");
//        }
    }
}

?>