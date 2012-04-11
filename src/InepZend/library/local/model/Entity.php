<?php
namespace Local\Model;

/**
 * Classe Pai das Entidades do Sistema
 *
 * Utilizando Annotations, torna possivel o mapeamento da tabela,
 * colunas e relacionamentos do banco além de já ter métodos
 * que facilitam o lay load, acesso e alteracao de coleções
 * manytomany e onetomany.
 *
 *
 * @AnnotationClass \Local\Model\EntityAnnotationClass
 * @AnnotationAttribute \Local\Model\EntityAnnotationAttribute
 */
abstract class Entity extends \Zend_Db_Table_Row_Abstract {

    protected $strRequiredMessage = 'O campo %s, é obrigatório e não foi preenchido';

    protected $strMaxLengthMessage = 'O campo %s deve ter no máximo %d caractes';
    
    /**
     * Annotati on of Element
     * 
     * @var CorujaAnnotation
     */
    protected $objAnnotation;

    /**
     * @column CO_ID
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Name of the Table Class
     *
     * @var string
     */
    protected $_tableClass = "";

    /**
     * Singleton instances of the EntityTables
     *
     * @var \Local\Model\EntityTable[]
     */
    protected static $arrTableIntances = array();

    /**
     * Singleton instances of the EntityRelationshipTable
     *
     * @var \Local\Model\EntityRelationshipTable[]
     */
    protected static $arrRelationships = array();

    /**
     * Array of original values of the collection attributes
     * to be compared on save method
     * 
     * @var array
     */
    private $arrOriginalAttributes = array();

    /**
     * Set the Entity Annotation
     *
     * @param EntityAnnotation $objAnnotation
     * @return Entity
     */
    protected function setAnnotation( $objAnnotation )
    {
        $this->objAnnotation = $objAnnotation;
        return $this;
    }

    /**
     * Get the Entity Annotation
     *
     * @return Coruja\Annotation\CorujaAnnotation
     */
    public function getAnnotation()
    {
        return $this->objAnnotation;
    }

    /**
     * Get the annotation of the Method
     *
     * @param string $strMethodName
     * @return Local\Entity\EntityMethodAnnotation
     */
    public function getAnnotationMethod( $strMethodName )
    {
        return $this->objAnnotation->getAnnotationMethod( $strMethodName );
    }

    /**
     * Get the annotation of the Attribute
     *
     * @param string $strAttributeName
     * @return EntityAnnotationAttribute
     */
    public function getAnnotationAttribute( $strAttributeName )
    {
        return $this->objAnnotation->getAnnotationAttribute( $strAttributeName );
    }

    /**
     * Actions to do after insert
     */
    protected function _postInsert()
    {
        $this->loadData();
    }

    /**
     * Atualiza os atributos a partir do _data
     */
    protected function loadData()
    {

        foreach( $this->getAnnotation()->getAnnotationAttributes() as $objAnnotationAttribute )
        {
            if( ( $objAnnotationAttribute->getColumn() ) !== null )
            {
                $mixValueResult = \CorujaArrayManipulation::getArrayField(
                        $this->_data , $objAnnotationAttribute->getColumn()
                );

                $strSetterMethod = $objAnnotationAttribute->getSetter();
                $strGetterMethod = $objAnnotationAttribute->getGetter();
                if( !method_exists( $this , $strSetterMethod ) )
                {
                    throw new \Exception( 'Método ' . $strSetterMethod . ' não foi encontrado na entidade ' . get_class( $this ) );
                }
                $this->{$strSetterMethod}( $mixValueResult );
            }
        }
    }

    /**
     * Initialize the Entity
     *
     * @param mixed $config
     */
    public function __construct( $config = array() ) {

        $this->_tableClass = get_class( $this ) . "Table";
        $this->objAnnotation = new \Coruja\Annotation\CorujaAnnotation( $this );

        if( $config !== false )
        {
            parent::__construct($config);
            $this->loadData();
        }
    }

    /**
     * Return the array of the columns and it's values based on the attributes
     * of the entity
     *
     * @return array
     */
    public function getDataColumns()
    {
        $arrData = array();
        foreach( $this->getAnnotation()->getAnnotationAttributes() as $objAnnotationAttribute ){
            if( ( $objAnnotationAttribute->getColumn() ) !== null )
            {
                $strGetter = $objAnnotationAttribute->getGetter();
                $arrData[ $objAnnotationAttribute->getColumn() ] = $this->$strGetter();
            }
        }

        if( $this->intId == 0 )
        {
            $arrData[ $this->getPrimaryName() ] = null;
        }

        return $arrData;
    }

    /**
     * Read the _data and the attributes and set what has changed and what
     * have not.
     *
     * @param boolean $booInsert
     */
    protected function refreshData( $booInsert = false ){
        $arrNewData = $this->getDataColumns();
        $arrModifieds = array();
        foreach( $arrNewData as $strColumn => $mixValue )
        {
            if( $booInsert || !array_key_exists( $strColumn , $this->_data ) ||
                $this->_data[ $strColumn ] !== $mixValue )
            {
                $arrModifieds[ $strColumn ] = true;
            }
        } 
            $this->_modifiedFields = $arrModifieds;
        $this->_data = $arrNewData;
    }

    /**
     * Just Before Do Insert
     */
    protected function _insert() {
        $this->refreshData( true );
    }
    
    /**
     * Just Before Do Update
     */
    protected function _update(){
        $this->refreshData();
    }

    /**
     * Inform the new primary key value of the entity
     *
     * @param integer $intId
     * @return Entity me
     */
    public function setId( $intId ){
        if( $intId != null && !is_numeric( $intId ) )
        {
            throw new \Exception( "id invalido " . var_export( $intId , true ) );
        }
        $this->intId = ( $intId == 0 ) ? null : $intId ;
        if( $this->intId == null )
        {
            $this->_cleanData = null;
            $this->refreshData();
        }
        return $this;
    }

    /**
     * Get the primary key value of the entity
     *
     * @return integer
     */
    public function getId(){
        return $this->intId;
    }

    /**
     * Return if the entity has changed
     *
     * @return boolean
     */
    public function isChanged()
    {
        return( count( array_intersect_key( $this->_data, $this->_modifiedFields ) ) > 0 );
    }

    /**
     * Search if the Column Name exists into the Entity
     *
     * @param string $strColumnName
     * @return boolean
     */
    public function isColumn( $strColumnName )
    {
        foreach( $this->getAnnotation()->getAnnotationAttributes() as $objAnnotationAttribute )
        {
            if( ( $objAnnotationAttribute->getColumn() ) !== $strColumnName )
            {
                return true;
            }
        }
        return false;
    }

    /**
     * Return the attribute name of some column of the table mapped
     *
     * @throws \Zend_Db_Table_Row_Exception
     * @param string $strColumnName
     * @return string
     */
    protected function _transformColumn( $strColumnName ) {
        foreach( $this->getAnnotation()->getAnnotationAttributes() as $objAnnotationAttribute )
        {
            if( ( $objAnnotationAttribute->getColumn() ) == $strColumnName )
            {
                return $objAnnotationAttribute->getAttributeName();
            }
        }
        throw new \Zend_Db_Table_Row_Exception("Coluna {$strColumnName} não encontrada na entidade " . get_class( $this ) . "." );
    }

    /**
     * Getter Generic
     *
     * @param string $key
     * @return mixer
     */
    function __get( $key ) {
        $strMethod = "get" . ucfirst( $key );
        if( method_exists( $this , $strMethod ) ) {
            return $this->$strMethod();
        }
        return parent::__get( $key );
    }

    /**
     * Setter Generic
     *
     * @param string $key
     * @param array $arrParams
     * @return Entity
     */
    function __set( $key , $arrParams ) {
        $strMethod = "set" . ucfirst( $key );
        if( method_exists( $this , $strMethod ) ) {
            return call_user_func_array(
                array(
                    $this ,
                    $strMethod
                ) ,   
                $arrParams
            );
        }
        return parent::__set( $key , $arrParams );
    }

   /**
    * Retorna o nome da tabela da entidade
    *
    * @return string
    */
   public function getTableName()
   {
        return $this->getAnnotation()->getAnnotationClass()->getTable();
   }

   /**
    * Retorna a chave primaria da entidade
    *
    * @return string
    */
   public function getPrimaryName()
   {
        return $this->getAnnotationAttribute( 'intId' )->getColumn();
   }

   /**
    * Retorna a instancia singleton de uma classe TableEntity
    *
    * @param string $strTableClass
    * @return TableEntity
    */
   protected function _getTableFromString( $strTableClass )
   {
        if( !array_key_exists( $strTableClass , self::$arrTableIntances ) )
        {
            $objInstanceTable = new $strTableClass();
            $this->addInstance( $objInstanceTable );
        }
        return self::$arrTableIntances[ $strTableClass ];
   }

   /**
    * Adiciona a instance EntityTable a colecao singleton das instances EntityTable
    *
    * @param EntityTable $objTable
    * @return EntityTable
    */
   public static function addInstance( \Local\Model\EntityTable $objTable )
   {
       self::$arrTableIntances[ get_class( $objTable ) ] = $objTable;
       return $objTable;
   }

   public function __call( $strMethod, array $arrParams )
   {
       if( "Column" == substr( $strMethod , -strlen( "Column" ) ) )
       {
           $strInsideMethod = substr( $strMethod , 0 , strlen( $strMethod ) - strlen( "Column" ) );
           $objAnnotation = $this->findAnnotationByMethod( $strInsideMethod );
           if( $objAnnotation->getColumn() == null )
           {
               throw new \Exception( "Metodo $strMethod não tem @column" );
           }
           return $objAnnotation->getColumn();
       }
       parent::__call( $strMethod, $arrParams);
   }
   /**
    * Retorna a primeira EntityAnnotationAttribute que tenha no getter ou no setter
    * o método recebido
    *
    * @param string $strMethod
    * @return EntityAnnotationAttribute
    */
   public function findAnnotationByMethod( $strMethod )
   {
        $arrMethod = explode( "::" , $strMethod );
        $strMethod = array_pop( $arrMethod );
        foreach( $this->getAnnotation()->getAnnotationAttributes() as $objAnnotationAttribute )
        {
            if(
                ( $objAnnotationAttribute->getGetter() == $strMethod ) ||
                ( $objAnnotationAttribute->getSetter() == $strMethod )
            )
            {
                return $objAnnotationAttribute;
            }
        }
        throw new \Exception( "Método $strMethod não existem em anotação de lazy load" );
   }

   /**
    * Lazy Load Set Id
    *
    * Ao informar o Id de uma entidade lazy load deve-se:
    *
    * 1. Alterar o id para o valor informado
    * 2. Alterar a entidade referenciada para nulo
    * 3. retornar a propria entidade atual
    *
    * @throws \Exception
    * @param string $strMethodName
    * @param integer $intIdParam
    * @return Entity
    */
   protected function lazyLoadSetId( $strMethodName , $intIdParam )
   {
        $objAnnotationId        = $this->findAnnotationByMethod( $strMethodName );
        $objAnnotationEntity    = $this->getAnnotationAttribute( $objAnnotationId->getEntity() );

        $strAttributeId         = $objAnnotationId->getAttributeName();
        $strAttributeEntity     = $objAnnotationEntity->getAttributeName();
        
        /**
         * Caso não tenha havido mudança não é preciso alterar nada
         */
        if( $this->{$strAttributeId} == $intIdParam )
        {
            return $this;
        }
        
        /**
         * O valor deve ser alterado diretamente e nao utilizando o setter
         * para nao haver um loop infinito setId => setId => setId ...
         */
        $this->{$strAttributeId} = $intIdParam;
        $this->{$strAttributeEntity} = null;

        return $this;
   }

   /**
    * Lazy Load Get Id
    * 
    * Retorna o id da entidade em lazy load
    *
    * @throws \Exception
    * @param string $strMethodName
    * @return integer
    */
   protected function lazyLoadGetId( $strMethodName )
   {
        $objAnnotationId        = $this->findAnnotationByMethod( $strMethodName );
        $strAttributeId         = $objAnnotationId->getAttributeName();
        $objAnnotationEntity    = $this->getAnnotationAttribute( $objAnnotationId->getEntity() );
        $strAttributeEntity     = $objAnnotationEntity->getAttributeName();

        if( $this->{$strAttributeEntity} !== null )
        {
            $intIdValue = $this->{$strAttributeEntity}->getId();
            $this->{$strAttributeId} = $intIdValue;
        }
        else
        {
            $intIdValue = $this->{$strAttributeId};
        }
        return $intIdValue;
   }

   /**
    * Lazy Load Set Entity
    *
    * Ao informar o objeto de uma entidade lazy load deve-se:
    *
    * 1. Atualizar a entidade em lazy load
    * 2. Atualizar o id para o id da entidade informada
    * 3. Retornar a propria entidade atual
    *
    * @param string $strMethodName
    * @param Entity $objEntity
    * @return Entity
    * @throws \Exception
    */
   protected function lazyLoadSetEntity( $strMethodName , Entity $objEntity )
   {
        $objAnnotationEntity    = $this->findAnnotationByMethod( $strMethodName );
        $objAnnotationId        = $this->getAnnotationAttribute( $objAnnotationEntity->getId() );

        $strAttributeId         = $objAnnotationId->getAttributeName();
        $strAttributeEntity     = $objAnnotationEntity->getAttributeName();

        /**
         * O valor deve ser alterado diretamente e nao utilizando o setter
         * para nao haver um loop infinito setEntidade => setEntidade => setEntidade ...
         */
        $this->{$strAttributeEntity} = $objEntity;
        $this->{$strAttributeId} = $objEntity->getId();

        return $this;
   }

   /**
    * Lazy Load Get Entity
    *
    * Retorna a entidade de uma carga lazy load
    *
    * 1. Se a entidade ja existir retorna esta
    * 2. Se o id nao for nulo faz carga a partir do id
    * 3. Se a entidade nao existir cria a entidade com id nulo
    *
    * @param string $strMethodName
    * @throws \Exception
    */
   protected function lazyLoadGetEntity( $strMethodName )
   {
        $objAnnotationEntity    = $this->findAnnotationByMethod( $strMethodName );
        $objAnnotationId        = $this->getAnnotationAttribute( $objAnnotationEntity->getId() );

        $strAttributeId         = $objAnnotationId->getAttributeName();
        $strAttributeEntity     = $objAnnotationEntity->getAttributeName();

        /**
         * Se a classe já tiver sido carregada, nada faz e retorna esta
         */
        if( $this->{$strAttributeEntity} !== null )
        {
            return $this->{$strAttributeEntity};
        }
        
        $strNamespace = \CorujaClassManipulation::getNamespaceFromClassDefinition( get_class( $this ) , false );
        $strClassEntity = $objAnnotationEntity->getVar();
        if( ( substr( $strClassEntity , 0 , 1 ) != '\\' ) && ( $strNamespace != '' ) )
        {
            $strClassEntity = $strNamespace . '\\' . $strClassEntity;
        }
        if( ( substr( $strClassEntity , 0 , 1 ) == '\\' ) )
        {
            $strClassEntity = \substr( $strClassEntity , 1 );
        }
        
        /**
         * Se a class nao estiver carragada mas o id estiver preenchido
         */
        if( $this->{$strAttributeId} !== null )
        {
            /**
             * Faz a carga da entidade
             */
            $strClassEntityTable = $strClassEntity . 'Table';
            $objTable = $strClassEntityTable::getInstance();
            
            $objEntity = $objTable->getById( $this->{$strAttributeId} );
            $this->{$strAttributeEntity} = $objEntity;
            return $this->{$strAttributeEntity};
        }
        /**
         * Nao existe a entidade referenciada, cria uma entidade vazia
         */

        $objEntity = new $strClassEntity();
        $this->{$strAttributeEntity} = $objEntity;
        return $this->{$strAttributeEntity};
   }


   /**
    * Reverse Load Set Id
    *
    * Ao informar o Id de uma entidade reverse load deve-se:
    *
    * 1. Alterar o id para o valor informado
    * 2. Alterar a entidade referenciada para nulo
    * 3. retornar a propria entidade atual
    *
    * @throws \Exception
    * @param string $strRelationship
    * @param integer $intIdParam
    * @return Entity
    */
   protected function reverseLoadSetId( $strRelationship , $intIdParam )
   {
        $objEntity = $this->reverseLoadGetEntity( $strRelationship );

        /**
         * Caso não tenha havido mudança não é preciso alterar nada
         */
        if( $objEntity->getId() == $intIdParam )
        {
            return $this;
        }

        $objEntity->setId( $intIdParam );

        return $this;
   }

   /**
    * Reverse Load Get Id
    *
    * Retorna o id da entidade em reverse load
    *
    * @throws \Exception
    * @param string $strMethodName
    * @return integer
    */
   protected function reverseLoadGetId( $strRelationship )
   {
        $objEntity = $this->reverseLoadGetEntity( $strRelationship );
        return $objEntity->getId();
   }

   /**
    * Reverse Load Set Entity
    *
    * Ao informar o objeto de uma entidade reverse load deve-se:
    *
    * 1. Atualizar a entidade em reverse load
    * 2. Atualizar o id para o id da entidade informada
    * 3. Retornar a propria entidade atual
    *
    * @param string $strMethodName
    * @param Entity $objEntity
    * @return Entity
    * @throws \Exception
    */
   protected function reverseLoadSetEntity( $strRelationship , Entity $objEntity )
   {
        $objAnnotationReverse = $this->findAnnotationByRelationship( $strRelationship );
        $strAttribute = $objAnnotationReverse->getAttributeName();

        $objAnnotationAttribute = $objEntity->getAnnotationAttribute( $strAttribute );
        $strSetter = $objAnnotationAttribute->getSetter();

        $arrChangeds = array();

        $objEntityBefore = $this->reverseLoadGetEntity( $strMethodName );
        if( $objEntityBefore->getId() != null )
        {      
            $objAnnotationAttribute = $objEntity->getAnnotationAttribute( $strAttribute );
            $objEntityBefore->{$strSetter}( null );
            $arrChangeds[] = $objEntityBefore;
        }

        if( $objEntity !== null )
        {
            $objEntity->{$strSetter}( $objEntity );
            $arrChangeds[] = $objEntity;
        }

        $this->arrOriginalAttributes[ $objAnnotationReverse->getAttributeName() ] =
            $arrChangeds;
        
        return $this;
   }

   protected function reverseIsEntity( $strRelationship )
   {
        $objEntity = $this->reverseLoadGetEntity( $strRelationship );
        return $objEntity->getId() !== null;
   }
   
   /**
    * Reverse Load Get Entity
    *
    * Retorna a entidade de uma carga reverse load
    *
    * 1. Se a entidade ja existir retorna esta
    * 2. Faz a carga a partir do atributo externo
    *
    * @param string $strMethodName
    * @throws \Exception
    */
   protected function reverseLoadGetEntity( $strRelationship )
   {
        $objAnnotationReverse = $this->findAnnotationByRelationship( $strRelationship );
        $strAttribute = $objAnnotationReverse->getAttributeName();

        /**
         * Se a classe já tiver sido carregada, nada faz e retorna esta
         */
        if( $this->{$strAttribute} !== null )
        {
            return $this->{$strAttribute};
        }

        /**
         * Faz a carga da entidade
         */
        $strClassEntity = $objAnnotationReverse->getVar();
        $objEntity = new $strClassEntity();
        $strExternalAttribute = $objAnnotationReverse->getOneToOne();
        $arrExternalAttribute = explode( "::" , $strExternalAttribute );
        $strExternalAttribute = array_pop( $arrExternalAttribute );        
        $strClassEntityTable = $strClassEntity . 'Table';
        $objTable = $strClassEntityTable::getInstance();
        $arrEntity = $objTable->getByReference( $this , $strExternalAttribute );
        if( sizeof( $arrEntity ) > 1 )
        {
            throw new \Exception( "A Relação ($strRelationship) na classe " . get_class( $this ) . " não é OneToOne" );
        }
        if( sizeof( $arrEntity ) == 1 )
        {
            $objEntity = array_pop( $arrEntity );
        }
        $this->{$strAttribute} = $objEntity;
        return $this->{$strAttribute};
   }

   /**
    * Get EntityRelationshipTable from EntityAnnotationAttribute
    *
    * @param EntityAnnotationAttribute $objAnnotationAttribute
    * @return EntityRelationshipTable
    */
   protected function getTableFromRelationship( EntityAnnotationAttribute $objAnnotationAttribute )
   {
        if( !array_key_exists( $objAnnotationAttribute->getRelationship() , self::$arrRelationships ) )
        {
            $objInstanceTable = new EntityRelationshipTable( $objAnnotationAttribute );
            self::$arrRelationships[ $objAnnotationAttribute->getRelationship() ] = $objInstanceTable;
        }
        return self::$arrRelationships[ $objAnnotationAttribute->getRelationship() ];
   }

   /**
    * Procura pela anotação de atributo que tenha o relationship informado
    *
    * @param string $strRelationship
    * @return Local\Model\EntityAnnotationAttribute
    */
   protected function findAnnotationByRelationship( $strRelationship = null )
   {
        foreach( $this->getAnnotation()->getAnnotationAttributes() as $objAnnotationAttribute )
        {
            if(
                ( $objAnnotationAttribute->getRelationship() == $strRelationship )
                ||
                (
                    ( $objAnnotationAttribute->getRelationship() == '' )
                    &&
                    (
                        ( $objAnnotationAttribute->getManyToMany() != '' )
                        ||
                        ( $objAnnotationAttribute->getOneToMany() != '' )
                    )
                    &&
                    ( $strRelationship == null )
                )
            )
            {
                return $objAnnotationAttribute;
            }
        }
        throw new \Exception( "Método $strRelationship não existem em anotação de lazy load da classe " . get_class( $this ) );
   }

   /**
    * Obtem todas as entidades que são vinculadas a esta por esse relacionamento
    *
    * @param string $strMethodName
    * @param string $strRelationship
    * @return Entity[]
    */
   protected function getAllRelationalEntity( $strMethodName , $booUseCache = true , $strRelationship = null )
   {
        $objAnnotationRelationship = $this->findAnnotationByRelationship( $strRelationship );
        $strAttribute = $objAnnotationRelationship->getAttributeName();
        if( $this->{$strAttribute} == null || $booUseCache == false )
        {
            $objTableRelationship = $this->getTableFromRelationship( $objAnnotationRelationship );
            $arrEntities = $objTableRelationship->getAll( $this );
            $this->{$strAttribute} = $arrEntities;
        }
        return $this->{$strAttribute};
   }

   /**
    * Obtem a quantidade de entidades que são vinculadas a esta por esse relacionamento
    *
    * @param string $strMethodName
    * @param string $strRelationship
    * @return integer
    */
   protected function getQtdRelationalEntity( $strMethodName , $booUseCache = true , $strRelationship = null )
   {
        $objAnnotationRelationship = $this->findAnnotationByRelationship( $strRelationship );
        $strAttribute = $objAnnotationRelationship->getAttributeName();
        /**
         * Se a colecao já foi preenchida e o uso de cache esta autorizado
         * o tamanho da colecao pode ser obtido a partir do atributo
         */
        if( $this->{$strAttribute} != null && $booUseCache )
        {
            return sizeof( $this->{$strAttribute} );
        }
        /**
         * Acessa ao banco para acessar a quantidade de entidades relacionadas
         */
        $objTableRelationship = $this->getTableFromRelationship( $objAnnotationRelationship );
        $intQtd = $objTableRelationship->getQtd( $this );
        
        /**
         * Se o tamanho do array em cache estiver diferente do total estraido 
         * do banco de dados, é certo que o cache está desatualizado
         */
        if( ( $this->{$strAttribute} != null ) && ( $intQtd != sizeof( $this->{$strAttribute} ) ) )
        {
            /**
             * Destroi o cache desatualizado
             */
            $this->{$strAttribute} = null;
        }
        return $intQtd;
   }

   /**
    * Gera o cache da situacao original de um relacionamento para futura comparacao
    * e persistencia das alteracoes
    *
    * @param string $strMethodName
    * @param EntityAnnotationAttribute $objAnnotationRelationship
    */
   protected function loadRelationalEntity( $strMethodName , EntityAnnotationAttribute $objAnnotationRelationship )
   {
        $strAttribute = $objAnnotationRelationship->getAttributeName();
        
        if( !array_key_exists( $strAttribute , $this->arrOriginalAttributes ) )
        {
            $this->arrOriginalAttributes[ $strAttribute ] =
                $this->getAllRelationalEntity
                (
                    $strMethodName,
                    false,
                    $objAnnotationRelationship->getRelationship()
                );
        }
   }

   /**
    * Obtem todas as entidades que são vinculadas a esta por esse relacionamento
    *
    * @param string $strMethodName
    * @param Entity[] $arrEntities
    * @return Entity me
    */
   protected function setAllRelationalEntity( $strMethodName , array $arrEntities , $strRelationship = null )
   {
        $objAnnotationRelationship = $this->findAnnotationByRelationship( $strRelationship );
        $strAttribute = $objAnnotationRelationship->getAttributeName();

        $this->loadRelationalEntity( $strMethodName, $objAnnotationRelationship );
        $this->{$strAttribute} = $arrEntities;
        return $this;
   }

   /**
    * Adiciona entidade External vinculada a esta Local por esse relacionamento
    *
    * @param string $strMethodName
    * @param Entity $objEntity
    * @return Entity me
    */
   protected function addRelationalEntity( $strMethodName , Entity $objEntity , $booUseCache = true , $strRelationship = null )
   {
        $objAnnotationRelationship = $this->findAnnotationByRelationship( $strRelationship );
        $strAttribute = $objAnnotationRelationship->getAttributeName();
        $this->loadRelationalEntity( $strMethodName, $objAnnotationRelationship );

        $objTableRelationship = $this->getTableFromRelationship( $objAnnotationRelationship );
        $booFound = $this->hasRelationalEntity( $strMethodName , $objEntity , $booUseCache , $strRelationship );
        
        /**
         * Se o cache já estava instanciado
         */
        if( $this->{$strAttribute} !== null )
        {
            if( !$booFound )
            {
                /**
                 * Mantem o cache sincronizado
                 */
                //array_push( $this->{$strAttribute} , $objEntity );
                $this->{$strAttribute}[ $objEntity->getId() ] = $objEntity;
            }
        }
        
        return $this;
   }

   /**
    * Busca entidade External vinculada a esta Local por esse relacionamento
    *
    * @param string $strMethodName
    * @param Entity $objEntity
    * @return Entity me
    */
   protected function hasRelationalEntity( $strMethodName , Entity $objEntity , $booUseCache = true , $strRelationship = null )
   {
        $objAnnotationRelationship = $this->findAnnotationByRelationship( $strRelationship );
        $strAttribute = $objAnnotationRelationship->getAttributeName();

        $objTableRelationship = $this->getTableFromRelationship( $objAnnotationRelationship );
        $booFound = false;
        
        if( $booUseCache && $this->{$strAttribute} !== null )
        {
            $booFound  = ( array_key_exists( $objEntity->getId() , $this->{$strAttribute} ) );
        }

        /**
         * Se, segundo o cache a entidade já estava no relacionamento,
         * e se o cache deve ser utilizado, entao existe
         */
        if( $booFound && $booUseCache )
        {
            return true;
        }

        /**
         * Busca no banco de dados
         */
        return $objTableRelationship->has( $this , $objEntity );
   }

   /**
    * Remove uma Entidade do Relacionamento
    *
    * @param string $strMethodName
    * @param Entity $objEntity
    * @param boolean $booUseCache
    * @param string $strRelationship
    * @return Entity me
    */
   protected function removeRelationalEntity( $strMethodName , Entity $objEntity , $booUseCache = true , $strRelationship = null )
   {
        $objAnnotationRelationship = $this->findAnnotationByRelationship( $strRelationship );
        $strAttribute = $objAnnotationRelationship->getAttributeName();


        $objTableRelationship = $this->getTableFromRelationship( $objAnnotationRelationship );
        $booFound = $this->hasRelationalEntity( $strMethodName , $objEntity , $booUseCache , $strRelationship );

        if( $booFound )
        {
            /**
             * Executa a remocao
             */
            $this->loadRelationalEntity( $strMethodName, $objAnnotationRelationship );
        }

        $this->{$strAttribute} = $this->getAllRelationalEntity( $strMethodName , $booUseCache, $strRelationship );
        /**
         * Se o cache já estava instanciado
         */
        if( $this->{$strAttribute} !== null )
        {
            /**
             * Mantem o cache sincronizado
             */
            if( ( array_key_exists( $objEntity->getId() , $this->{$strAttribute} ) ) )
            {
                /**
                 * Caso encontre a entidade removida no cache,
                 * destroi o elemento
                 */
                array_splice( $this->{$strAttribute} , $objEntity->getId() );
            }
        }

        return $this;
   }

   /**
    * Executa na persistencia as alteracoes feitas nas colecoes
    */
   protected function saveRelationshipsChanges()
   {
       /**
        * Para cada um dos relacionamentos Alterados
        */
       foreach( $this->arrOriginalAttributes as $strAttribute => $arrOldValues )
       {
            $arrOldIds = array();
            $arrNewIds = array();
            $arrEntities = array();
            $objAnnotationRelationship = $this->getAnnotationAttribute( $strAttribute );
            $objTableRelationship = $this->getTableFromRelationship( $objAnnotationRelationship );
            /**
             * Pega todos os Ids das Entidades do
             * Relacionamento Antes das Mudanças
             */
            foreach( $arrOldValues as $objOldEntity )
            {
                $arrOldIds[] = $objOldEntity->getId();
                $arrEntities[ $objOldEntity->getId() ] = $objOldEntity;
            }
            /**
             * Pega todos os Ids das Entidades do
             * Relacionmanento Após as Mudanças
             */
            foreach( $this->{$strAttribute} as $objNewEntity )
            {
                $arrNewIds[] = $objNewEntity->getId();
                $arrEntities[ $objNewEntity->getId() ] = $objNewEntity;
            }
            /**
             * Pega os Ids das Que Foram Inseridas
             */
            $arrInsertId = \array_diff( $arrNewIds , $arrOldIds );
            /**
             * Pega os Ids das Que Foram Removidas
             */
            $arrDeleteId = \array_diff( $arrOldIds , $arrNewIds );
            /**
             * Aplica a Insercao desses Elementos na Persistencia
             */
            foreach( $arrInsertId as $intNewIdElement )
            {
                $objNewEntity = $arrEntities[ $intNewIdElement ];
                $objTableRelationship->add( $this , $objNewEntity );
                $this->{$strAttribute}[ $intNewIdElement ] = $objNewEntity;
            }
            /**
             * Aplica a Remocao desses Elementos na Persisntencia
             */
            foreach( $arrDeleteId as $intDeleteIdElement )
            {
                $objOldEntity = $arrEntities[ $intDeleteIdElement ];
                $objTableRelationship->remove( $this , $objOldEntity );
                array_splice( $this->{$strAttribute} , $intDeleteIdElement );
            }
            /**
             * Nesse ponto As Mudanças foram Sincronizadas nesse relacionameto
             */
            $this->arrOriginalAttributes[ $strAttribute ] = $this->{$strAttribute};
       }
   }

   /**
    * Persiste as alteracoes na entidade
    * @return Entity me
    */
   public function save()
   {
       $this->validate();
       $this->saveRelationshipsChanges();
       parent::save();
       return $this;
   }

   public function validate()
   {
       $objException = new EntityValidateException();
        foreach( $this->getAnnotation()->getAnnotationAttributes() as $objAnnotationAttribute )
        {
            $strAttribute = $objAnnotationAttribute->getAttributeName();
            $strGetter = $objAnnotationAttribute->getGetter();

            /**
             * Required Validation
             */
            if  (
                    ( $objAnnotationAttribute->isRequired() )
                    &&
                    ( $this->{$strGetter}() == null )
                )
            {
                $objException->addMessage(
                    sprintf( $this->strRequiredMessage , $objAnnotationAttribute->getLabel() )
                );
            }
            /**
             * MaxLength Validation
             */
            if  (
                    ( $objAnnotationAttribute->getMaxlength() > 0 ) &&
                    ( $objAnnotationAttribute->getMaxlength() < strlen( $this->{$strGetter}() ) )
                )
            {
                $objException->addMessage(
                    sprintf( $this->strMaxLengthMessage ,
                        $objAnnotationAttribute->getLabel() ,
                        $objAnnotationAttribute->getMaxlength()
                    )
                );
            }
        }
        $objException->validate();
   }
}
?>
