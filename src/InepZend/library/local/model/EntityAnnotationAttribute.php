<?php
namespace Local\Model;

/**
 * Entity of implementation of the CorujaAnnotationAttributeInterface with
 * the "var" notation
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
class EntityAnnotationAttribute implements \Coruja\Annotation\Interfaces\CorujaAnnotationAttributeInterface
{
    /**
     * Class Container Name
     *
     * @var string
     */
    protected $strClassContainerName;

    /**
     * Attribute Name
     *
     * @var string
     */
    protected $strAttributeName;

    /**
     * Var
     * 
     * @var string
     */
    protected $strVar;

    /**
     * Column Name ORM
     *
     * @var string
     */
    protected $strColumn;

    /**
     * Setter method of the attribute
     *
     * @var string
     */
    protected $strSetter;

    /**
     * Getter method of the attribute
     *
     * @var string
     */
    protected $strGetter;
    
    /**
     * Type
     *
     * @Type string
     */
    protected $strType;

    /**
     * Entity
     *
     * Atributo de entidade para lazy load
     *
     * @Type string
     */
    protected $strEntity;

    /**
     * Id
     *
     * Atributo de id para lazy load
     *
     * @Type string
     */
    protected $strId;

    /**
     * Nome do Relacionamento
     *
     * @var string
     */
    protected $strRelationship;

    /**
     * Nome da Tabela Relacional ManyToMany
     *
     * @var string
     */
    protected $strManyToMany;

    /**
     * Nome da Fk Relacional OneToMany
     *
     * @var string
     */
    protected $strOneToMany;

    /**
     * Nome da Fk Relacional OneToOne
     *
     * @var string
     */
    protected $strOneToOne;

    /**
     * Id da entidade que está servindo como origem
     *
     * @var string
     */
    protected $strLocalId;

    /**
     * Id da entidade que está servindo como destino
     *
     * @var string
     */
    protected $strExternalId;

    /**
     * Mascara do campo
     *
     * @var string
     */
    protected $strMask;

    /**
     * Apelido do campo
     *
     * @var string
     */
    protected $strLabel;

    /**
     * Tamanho maximo do campo de texto
     *
     * @var integer
     */
    protected $intMaxLength;
    
    /**
     * Atributo é obrigatório na entidade
     * 
     * @var boolean 
     */
    protected $booRequired = false;

    /**
     * Construtor da anotação
     *
     * Inicia as anotacoes com os valores padroes
     *
     * @param string $strClassContainerName
     * @param string $strAttributeName
     */
    public function __construct( $strClassContainerName , $strAttributeName )
    {
        $this->setClassContainerName( $strClassContainerName );
        $this->setAttributeName( $strAttributeName );
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
     * Set the Attribute Name
     *
     * @param string $strAttributeName
     */
    public function setAttributeName( $strAttributeName )
    {
        $this->strAttributeName = $strAttributeName;
    }

    /**
     * Get the Attribute Name
     *
     * @return string
     */
    public function getAttributeName()
    {
        return $this->strAttributeName;
    }

    /**
     * Set If Is Required
     *
     * @param string $strRequired
     */
    public function setRequired( $strRequired = 'true' )
    {
        $this->booRequired = \CorujaStringManipulation::strToBool( $strRequired );
    }

    /**
     * Get If Is Required
     *
     * @return boolean
     */
    public function getRequired()
    {
        return $this->booRequired;
    }

    /**
     * Synonymous of getRequired 
     * 
     * @see getRequired
     * @return boolean
     */
    public function isRequired()
    {
        return $this->getRequired();
    }
    /**
     * Set the Column annotation
     *
     * @param string $strColumn
     */
    public function setColumn( $strColumn )
    {
        /**
         * Comportamento que deve ter quando a annotation
         * @column for preenchida mas sem valor
         */
        if( $strColumn === '' )
        {
            $strColumn = strtoupper( $this->getAttributeName() );
        }
        $this->strColumn = $strColumn;
    }

    /**
     * Get the Column annotation
     *
     * @return string
     */
    public function getColumn()
    {
        return $this->strColumn;
    }
    
    /**
     * Set the Type annotation
     *
     * @param string $strType
     */
    public function setType( $strType )
    {
        $this->strType = $strType;
    }

    /**
     * Get the Type annotation
     *
     * @return string
     */
    public function getType()
    {
        if( $this->strType == null )
        {
            $this->strType = "TEXT";
        }
        return $this->strType;
    }

    /**
     * Set the Var annotation
     *
     * @param string $strVar
     */
    public function setVar( $strVar )
    {
        $this->strVar = $strVar;
    }

    /**
     * Get the Var annotation
     *
     * @return string
     */
    public function getVar()
    {
        if( $this->strVar == null )
        {
            $this->strVar = "TEXT";
        }
        return $this->strVar;
    }

    /**
     * Set the Setter Method annotation
     *
     * @param string $strSetter
     */
    public function setSetter( $strSetter )
    {
        $this->strSetter = $strSetter;
    }

    /**
     * Get the Setter Method annotation
     *
     * @return string
     */
    public function getSetter()
    {
        if( $this->strSetter == null )
        {
            $strMethod = 'set' . ucfirst( strtolower( $this->getAttributeName() ) );
            $this->strSetter = $strMethod;
        }
        return $this->strSetter;
    }


    /**
     * Set the Getter Method annotation
     *
     * @param string $strGetter
     */
    public function setGetter( $strGetter )
    {
        $this->strGetter = $strGetter;
    }

    /**
     * Get the Getter Method annotation
     *
     * @return string
     */
    public function getGetter()
    {
        if( $this->strGetter == null )
        {
            $strMethod = 'get' . ucfirst( strtolower( $this->getAttributeName() ) );
            $this->strGetter = $strMethod;
        }
        return $this->strGetter;
    }

    /**
     * Set the Lazy Load Attribute Entity
     *
     * @param string $strEntity
     */
    public function setEntity( $strEntity )
    {
        $this->strEntity = $strEntity;
    }

    /**
     * Get the Lazy Load Attribute Entity
     *
     * @return string
     */
    public function getEntity()
    {
        return $this->strEntity;
    }

    /**
     * Set the Lazy Load Attribute Id
     *
     * @param string $strId
     */
    public function setId( $strId )
    {
        $this->strId = $strId;
    }

    /**
     * Get the Lazy Load Attribute Id
     *
     * @return string
     */
    public function getId()
    {
        return $this->strId;
    }

    /**
     * Set the Text Mask
     *
     * @param string $strMask
     */
    public function setMask( $strMask )
    {
        $this->strMask = $strMask;
    }

    /**
     * Get the Text Mask
     *
     * @return string
     */
    public function getMask()
    {
        return $this->strMask;
    }

    /**
     * Set the Label
     *
     * @param string $strLabel
     */
    public function setLabel( $strLabel )
    {
        $this->strLabel = $strLabel;
    }

    /**
     * Get the Label
     *
     * @return string
     */
    public function getLabel()
    {
        if( $this->strLabel == null )
        {
            $this->strLabel = $this->getAttributeName();
        }
        return $this->strLabel;
    }
    
    /**
     * Set the Text Maxlength
     *
     * @param string $intMaxLength
     */
    public function setMaxlength( $intMaxLength )
    {
        $this->intMaxLength = $intMaxLength;
    }

    /**
     * Get the Text Maxlength
     *
     * @return string
     */
    public function getMaxlength()
    {
        return $this->intMaxLength;
    }

    /**
     * Set the Relationship Attribute Relationship name
     *
     * @param string $strRelationship
     */
    public function setRelationship( $strRelationship )
    {
        $this->strRelationship = $strRelationship;
    }

    /**
     * Get the Relationship Attribute Relationship name
     *
     * @return string
     */
    public function getRelationship()
    {
        return $this->strRelationship;
    }

    /**
     * Set the Relationship Attribute ManyToMany
     *
     * @param string $strManyToMany
     */
    public function setManyToMany( $strManyToMany )
    {
        $this->strManyToMany = $strManyToMany;
    }

    /**
     * Get the Relationship Attribute ManyToMany
     *
     * @return string
     */
    public function getManyToMany()
    {
        return $this->strManyToMany;
    }

    /**
     * Set the Relationship Attribute OneToMany
     *
     * @param string $strOneToMany
     */
    public function setOneToMany( $strOneToMany )
    {
        $this->strOneToMany = $strOneToMany;
    }

    /**
     * Get the Relationship Attribute OneToMany
     *
     * @return string
     */
    public function getOneToMany()
    {
        return $this->strOneToMany;
    }

    /**
     * Set the Relationship Attribute OneToOne
     *
     * @param string $strOneToOne
     */
    public function setOneToOne( $strOneToOne )
    {
        $this->strOneToOne = $strOneToOne;
    }

    /**
     * Get the Relationship Attribute OneToOne
     *
     * @return string
     */
    public function getOneToOne()
    {
        return $this->strOneToOne;
    }

    /**
     * Set the Relationship Attribute LocalId
     *
     * @param string $strLocalId
     */
    public function setLocalId( $strLocalId )
    {
        $this->strLocalId = $strLocalId;
    }

    /**
     * Get the Relationship Attribute LocalId
     *
     * @return string
     */
    public function getLocalId()
    {
        return $this->strLocalId;
    }

    /**
     * Set the Relationship Attribute ExternalId
     *
     * @param string $strExternalId
     */
    public function setExternalId( $strExternalId )
    {
        $this->strExternalId = $strExternalId;
    }

    /**
     * Get the Relationship Attribute ExternalId
     *
     * @return string
     */
    public function getExternalId()
    {
        return $this->strExternalId;
    }

    /**
     * Valida se o atributo de relationship tem o @var tipo lista
     *
     * @throws \Coruja\Annotation\CorujaAnnotationException
     */
    protected function validateRelationshipVarComoLista()
    {
        $strVar = $this->getVar();
        $strListaInicio = strpos( $strVar , '[' );
        if( $strListaInicio === false )
        {
            throw new \Coruja\Annotation\CorujaAnnotationException(
                'Era esperado que tipo do atributo $' .
                $this->getAttributeName() .
                ' da entidade ORM ' .
                $this->getClassCointainerName() .
                ' de relação (' .
                $this->getRelationship() . ') ' .
                ' definido no @var, fosse uma coleção, mas ' .
                $this->getVar() .
                ' foi recebido, ao invéz disso.' .
                ' Altere o @var para um tipo de coleção como @var Exemplo[]'
            );
        }
    }

    /**
     * Valida se o atributo ManyToMany tem os campos obrigatorios preenchidos
     *
     * @throws \Coruja\Annotation\CorujaAnnotationException
     */
    protected function validateManyToManyCamposObrigatorios()
    {
        $arrTiposObrigatoriosNaoPreenchidos = array();

        if( strlen( $this->getManyToMany() ) == 0 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@ManyToMany';
        }

        if( strlen( $this->getOneToMany() ) != 0 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@OneToMany';
        }

        if( strlen( $this->getOneToOne() ) != 0 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@OneToOne';
        }

        if( strlen( $this->getLocalId() ) == 0 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@localId';
        }

        if( strlen( $this->getExternalId() ) == 0 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@externalId';
        }
        
        if( strlen( $this->getVar() ) == 0 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@var';
        }

        if( sizeof( $arrTiposObrigatoriosNaoPreenchidos ) > 0 )
        {
            throw new \Coruja\Annotation\CorujaAnnotationException(
                'As anotações do mapeamento de entidade relacional ' . 
                implode( ',' , $arrTiposObrigatoriosNaoPreenchidos ) . 
                ' não foram adequadamente preenchidas na entidade ' .
                $this->getClassCointainerName() .
                ' no atributo ' .
                $this->getAttributeName()
            );
        }
    }

    /**
     * Valida se o atributo OneToMany tem os campos obrigatorios preenchidos
     *
     * @throws \Coruja\Annotation\CorujaAnnotationException
     */
    protected function validateOneToManyCamposObrigatorios()
    {
        $arrTiposObrigatoriosNaoPreenchidos = array();

        if( strlen( $this->getOneToMany()    ) == 0 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@OneToMany';
        }

        if( sizeof( explode( "::" , $this->getOneToMany() )  ) > 2 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@OneToMany';
        }

        if( sizeof( explode( "::" , $this->getOneToMany() )  ) < 1 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@OneToMany';
        }

        if( strlen( $this->getManyToMany()    ) != 0 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@ManyToMany';
        }

        if( strlen( $this->getOneToOne()    ) != 0 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@OneToOne';
        }

        if( strlen( $this->getVar()       ) == 0 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@var';
        }

        if( sizeof( $arrTiposObrigatoriosNaoPreenchidos ) > 0 )
        {
            throw new \Coruja\Annotation\CorujaAnnotationException(
                'As anotações do mapeamento de entidade relacional ' .
                implode( ',' , $arrTiposObrigatoriosNaoPreenchidos ) .
                ' não foram adequadamente preenchidas na entidade ' .
                $this->getClassCointainerName() .
                ' no atributo ' .
                $this->getAttributeName()
            );
        }
    }

    /**
     * Valida se o atributo OneToOne tem os campos obrigatorios preenchidos
     *
     * @throws \Coruja\Annotation\CorujaAnnotationException
     */
    protected function validateOneToOneCamposObrigatorios()
    {
        $arrTiposObrigatoriosNaoPreenchidos = array();

        if( strlen( $this->getOneToOne()    ) == 0 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@OneToOne';
        }

        if( sizeof( explode( "::" , $this->getOneToMany() )  ) > 2 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@OneToOne';
        }

        if( sizeof( explode( "::" , $this->getOneToMany() )  ) < 1 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@OneToOne';
        }

        if( strlen( $this->getManyToMany()    ) != 0 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@ManyToMany';
        }

        if( strlen( $this->getOneToMany()    ) != 0 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@OneToMany';
        }

        if( strlen( $this->getVar()       ) == 0 )
        {
            $arrTiposObrigatoriosNaoPreenchidos[] = '@var';
        }

        if( sizeof( $arrTiposObrigatoriosNaoPreenchidos ) > 0 )
        {
            throw new \Coruja\Annotation\CorujaAnnotationException(
                'As anotações do mapeamento de entidade relacional ' .
                implode( ',' , $arrTiposObrigatoriosNaoPreenchidos ) .
                ' não foram adequadamente preenchidas na entidade ' .
                $this->getClassCointainerName() .
                ' no atributo ' .
                $this->getAttributeName()
            );
        }
    }

    /**
     * Retorna se algum dos campos que caraterizam uma entidade relacional foi
     * ManyToMany preenchido
     *
     * @return boolean
     */
    public function isManyToMany()
    {
        /**
         * Se existir as anotações de tabela relacional
         */
        return (
            ( strlen( $this->getManyToMany()    ) > 0 ) ||
            ( strlen( $this->getLocalId()       ) > 0 ) ||
            ( strlen( $this->getExternalId()    ) > 0 ) 
        );
    }

    /**
     * Retorna se algum dos campos que caraterizam uma entidade relacional foi
     * OneToMany preenchido
     *
     * @return boolean
     */
    public function isOneToMany()
    {
        /**
         * Se existir as anotações de chave estrangeira
         */
        return (
            ( strlen( $this->getOneToMany()    ) > 0 )
        );
    }

    /**
     * Retorna se algum dos campos que caraterizam uma entidade relacional foi
     * OneToOne preenchido
     *
     * @return boolean
     */
    public function isOneToOne()
    {
        /**
         * Se existir as anotações de chave estrangeira
         */
        return (
            ( strlen( $this->getOneToOne()    ) > 0 )
        );
    }

    /**
     * Valida se as anotações do atributo de entidade relacional ManyToMany foram
     * adequadamente preenchidos
     * 
     * @throws \Coruja\Annotation\CorujaAnnotationException
     */
    protected function validateManyToMany()
    {
        $this->validateManyToManyCamposObrigatorios();
        $this->validateRelationshipVarComoLista();
    }
    

    /**
     * Valida se as anotações do atributo de entidade relacional OneToMany foram
     * adequadamente preenchidos
     *
     * @throws \Coruja\Annotation\CorujaAnnotationException
     */
    protected function validateOneToMany()
    {
        $this->validateOneToManyCamposObrigatorios();
        $this->validateRelationshipVarComoLista();
    }

    /**
     * Valida se as anotações do atributo de entidade relacional OneToOne foram
     * adequadamente preenchidos
     *
     * @throws \Coruja\Annotation\CorujaAnnotationException
     */
    protected function validateOneToOne()
    {
        $this->validateOneToOneCamposObrigatorios();
    }


    protected function validateTextElement()
    {
        if( \strtolower( $this->getVar() ) !== 'string' )
        {
            throw new \Coruja\Annotation\CorujaAnnotationException(
                'Era esperado que tipo do atributo $' .
                $this->getAttributeName() .
                ' da entidade ORM ' .
                $this->getClassCointainerName() .
                ' de relação (' .
                $this->getRelationship() . ') ' .
                ' definido no @var, fosse uma string, mas ' .
                $this->getVar() .
                ' foi recebido, ao invéz disso.'
            );
        }
    }

    /**
     * Validate the data inside the annotation attribute
     * after all the information be received
     *
     * @throws \Coruja\Annotation\CorujaAnnotationException
     */
    public function validate()
    {
        /**
         * Se for uma entidade relacional ManyToMany, valida como tal
         */
        if( $this->isManyToMany() )
        {
            $this->validateManyToMany();
        }
        /**
         * Se for uma entidade relacional OneToMany, valida como tal
         */
        if( $this->isOneToMany() )
        {
            $this->validateOneToMany();
        }
        /**
         * Se for uma entidade relacional OneToMany, valida como tal
         */
        if( $this->isOneToOne() )
        {
            $this->validateOneToOne();
        }
        /**
         * Se for um campo com mascara, tem que ter validacao
         */
        if( ( strlen( $this->getMask() ) > 0 ) || ( $this->getMaxlength() > 0 ) )
        {
            $this->validateTextElement();
        }
    }
}

?>