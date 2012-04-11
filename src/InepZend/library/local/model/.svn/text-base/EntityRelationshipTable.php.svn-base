<?php
namespace Local\Model;

class EntityRelationshipTable extends \Zend_Db_Table_Abstract {

    protected $_row;

    protected $_rowClass;

    protected $_name = '';

    protected $_primary = '';

    protected $booManyToMany;

    protected $booOneToMany;

    protected $booOneToOne;

    protected $strFkTable;

    protected $strFkColumn;
    
    /**
     * Anotação de Origem do Elemento
     *
     * @var EntityAnnotationAttribute
     */
    protected $objAnnotationAttribute;

    public function __construct( EntityAnnotationAttribute $objAnnotationAttribute )
    {
        $this->objAnnotationAttribute = $objAnnotationAttribute;
        $this->_rowClass = $this->getRowClass();
        parent::__construct( array() );
    }

    /**
     * Get the Entity Annotation Attribute
     *
     * @return EntityAnnotationAttribute
     */
    public function getAnnotationAttribute()
    {
        return $this->objAnnotationAttribute;
    }

    /**
     * Retorna a Entidade de Resultado do relacionamento
     *
     * @return string
     */
    public function getRowClass()
    {
        $strVar = $this->getAnnotationAttribute()->getVar();
        $intListaInicio = strpos( $strVar , '[' );
        if( $intListaInicio === false )
        {
            throw new \Exception(
                'Tipo inválido para o ' .
                $this->getAnnotationAttribute()->getAttributeName() .
                ' da entidade ORM ' .
                $this->getAnnotationAttribute()->getClassCointainerName() .
                ' de relação (' .
                $this->getAnnotationAttribute()->getRelationship() . '); ' .
                ' deve ser uma coleção, mas ' .
                $this->getAnnotationAttribute()->getVar() .
                ' foi recebido, ao invéz disso.'
            );
        }

        $strType = substr( $strVar , 0 , $intListaInicio );

        $strClassOrigem =  $this->getAnnotationAttribute()->getClassCointainerName();

        $strNamespaces = \CorujaClassManipulation::getNamespaceFromClassDefinition( $strClassOrigem , false );

        if( $strType{0} != '\\' )
        {
            $strClassDestino = $strNamespaces . "\\" . $strType;
        }
        else
        {
            $strClassDestino = $strType;
        }

        return $strClassDestino;
    }
    /**
     * Get a singleton of the row
     *
     * @return \Local\Model\Entity
     */
    protected function getRow()
    {
        if( $this->_row == null )
        {
            $strRowClass = $this->_rowClass;
            /**
             * @var $objRow \Local\Model\Entity
             */
            $objRow = new $strRowClass( false );
            $this->_row = $objRow;
        }
        return $this->_row;
    }

    public function init()
    {
        $this->_name = $this->getRow()->getTableName();
        $this->_primary = $this->getRow()->getPrimaryName();
    }

    /**
     * Recupera entidade pelo id
     * 
     * @param $intId integer
     * @return \Local\Model\Entity
     */
    public function getById( $intId , $booCriaSeNaoTiver = false ) {

        $intId  = (int) $intId ;
        $objRow = $this->fetchRow( $this->select()->where( implode( " " , (array)$this->_primary ) . ' =  ? ' ,  $intId ) );

        if (!$objRow) {
            if( !$booCriaSeNaoTiver )
            {
                throw new \Exception("Nao foi possivel encontrar entidade de id = $intId em " . get_class( $this ) );
            }
            else
            {
                $strClass = $this->_rowClass;
                $objEntity = new $strClass();
                return $objEntity;
            }
        }
        
        return $objRow;
    }

    /**
     * Converte um array de recordsets em um array de entidades
     *
     * @param array $arrRecordset
     * @return Application_Model_DbTable_Entity[]
     */
    protected function emerge( $arrRecordset )
    {
        $arrObjects = array();
        foreach( $arrRecordset as $arrObjData )
        {
            $strRowClass = $this->_rowClass;
            $objRowElement = new $strRowClass( array( 'data' => $arrObjData ) );
            $arrObjects[] = $objRowElement;
        }
        return $arrObjects;
    }

    /**
     * Executa um sql e retorna o array do recordset
     *
     * @param string $strSql
     * @param array $arrParams
     * @return array
     */
    protected function runSql( $strSql , $arrParams = null )
    {
        if($arrParams === null || count($arrParams) == 0) {
            return ( $this->_db->fetchAll( $strSql ) );
        } else {
            return ( $this->_db->fetchAll( $strSql , $arrParams ) );
        }
    }

    /**
     * Valida se a Entidade Local é da classe adequada
     *
     * @param Entity $objEntityLocal 
     * @throws \Exception
     */
    protected function validateLocalEntityClass( $objEntityLocal )
    {
        $strLocalClass = $this->getAnnotationAttribute()->getClassCointainerName();

        if( !( $objEntityLocal instanceof $strLocalClass ) )
        {
            throw \Exception(
                'Entidade local deveria ser da classe ' .
                $strLocalClass .
                ' mas é da classe ' . get_class( $objEntityLocal )
            );
        }
    }

    /**
     * Valida se a Entidade Externa é da classe adequada
     *
     * @param Entity $objEntityExternal
     * @throws \Exception
     */
    protected function validateExternalEntityClass( $objEntityExternal )
    {
        if( !( $objEntityExternal instanceof $this->_rowClass ) )
        {
            throw \Exception(
                'Entidade external deveria ser da classe ' .
                $this->_rowClass .
                ' mas é da classe ' . get_class( $objEntityExternal )
            );
        }
    }

    /**
     * Is Many To Many
     *
     * @return boolean
     */
    protected function isManyToMany()
    {
        if( $this->booManyToMany === null )
        {
            $this->booManyToMany = strlen( $this->getAnnotationAttribute()->getManyToMany() ) > 0;
        }
        return $this->booManyToMany;
    }

    /**
     * Is One To Many
     *
     * @return boolean
     */
    protected function isOneToMany()
    {
        if( $this->booOneToMany === null )
        {
            $this->booOneToMany = strlen( $this->getAnnotationAttribute()->getOneToMany() ) > 0;
        }
        return $this->booOneToMany;
    }

    /**
     * Is One To One
     *
     * @return boolean
     */
    protected function isOneToOne()
    {
        if( $this->booOneToOne === null )
        {
            $this->booOneToOne = strlen( $this->getAnnotationAttribute()->getOneToOne() ) > 0;
        }
        return $this->booOneToOne;
    }

    private function getFkOne()
    {
        if( $this->strFkColumn == null )
        {
            $strOneToMany = trim( $this->getAnnotationAttribute()->getOneToMany() );
            $arrOneToMany = explode( "::" , $strOneToMany );
            if  (
                    ( sizeof( $arrOneToMany ) == 0 )
                    ||
                    ( sizeof( $arrOneToMany ) > 2 )
                    ||
                    ( strlen( $arrOneToMany[0] ) == 0 )
                )
            {
                throw new \Exception(
                    'Valor inválido para a annotation @OneToMany do atributo ' .
                    $this->getAnnotationAttribute()->getAttributeName() .
                    ' da entidade ORM ' .
                    $this->getAnnotationAttribute()->getClassCointainerName() .
                    ' de relação (' .
                    $this->getAnnotationAttribute()->getRelationship() . '); ' .
                    ' deve ser uma referencia estática ao id da entidade referenciada mas ' .
                    $this->getAnnotationAttribute()->getVar() .
                    ' foi recebido, ao invéz disso.'
                );
            }
            if( sizeof( $arrOneToMany ) == 2 )
            {
                $strClassLink = $arrOneToMany[0];
                $strAttribute = $arrOneToMany[1];

                if( $strClassLink{0} != '\\' )
                {
                    $strClassOrigem =  $this->getAnnotationAttribute()->getClassCointainerName();
                    $strNamespaces = \CorujaClassManipulation::getNamespaceFromClassDefinition( $strClassOrigem , false );
                    $strClassLink = $strNamespaces . '\\' . $strClassLink;
                }

                $objClassInstance = new $strClassLink();
                if( get_class( $objClassInstance ) !== get_class( $this->getRow() ) )
                {
                    throw new \Exception(
                        'O Relacionamento ' .
                        $this->getAnnotationAttribute()->getRelationship() .
                        ' do atributo ' .
                        $this->getAnnotationAttribute()->getAttributeName() .
                        ' da entidade ORM ' .
                        $this->getAnnotationAttribute()->getClassCointainerName() .
                        ' apresenta tipos incompatíveis entre as anotações do @var ' .
                        $this->getAnnotationAttribute()->getVar() .
                        ' e @OneToMany ' .
                        $this->getAnnotationAttribute()->getOneToMany()
                    );
                }
            }
            else
            {
                $strAttribute = $arrOneToMany[0];
            }
            
            $this->strFkColumn = $this->getRow()->getAnnotationAttribute( $strAttribute )->getColumn();
            if( $this->strFkColumn == null )
            {
                throw new \Exception( 'Não se pode fazer um @OneToMany para um atributo que não é uma coluna.' );
            }
        }

        return $this->strFkColumn;
    }

    public function getAll( Entity $objEntity )
    {
        if( $this->isManyToMany() )
        {
            return $this->getAllManyToMany( $objEntity );
        }
        if( $this->isOneToMany() )
        {
            return $this->getAllOneToMany( $objEntity );
        }
        throw new \Exception(
            'O Relacionamento ' .
            $this->getAnnotationAttribute()->getRelationship() .
            ' do atributo ' .
            $this->getAnnotationAttribute()->getAttributeName() .
            ' da entidade ORM ' .
            $this->getAnnotationAttribute()->getClassCointainerName() .
            ' não foi apropriadamente instanciado. '
        );
    }
    
    public function getQtd( Entity $objEntity )
    {
        if( $this->isManyToMany() )
        {
            return $this->getQtdManyToMany( $objEntity );
        }
        if( $this->isOneToMany() )
        {
            return $this->getQtdOneToMany( $objEntity );
        }
    }

    public function has( Entity $objEntity , Entity $objEntityExternal )
    {
        if( $this->isManyToMany() )
        {
            return $this->hasManyToMany( $objEntity , $objEntityExternal );
        }
        if( $this->isOneToMany() )
        {
            return $this->hasOneToMany( $objEntity , $objEntityExternal );
        }
    }

    public function add( Entity $objEntity , Entity $objEntityExternal )
    {
        if( $this->isManyToMany() )
        {
            return $this->addManyToMany( $objEntity , $objEntityExternal );
        }
        if( $this->isOneToMany() )
        {
            return $this->addOneToMany( $objEntity , $objEntityExternal );
        }
    }

    public function remove( Entity $objEntity , Entity $objEntityExternal )
    {
        if( $this->isManyToMany() )
        {
            return $this->removeManyToMany( $objEntity , $objEntityExternal );
        }
        if( $this->isOneToMany() )
        {
            return $this->removeOneToMany( $objEntity , $objEntityExternal );
        }
    }

    /**
     * Obtem toda a colecao de entidades externas associadas a entidade local
     * por esse relacionamento
     *
     * @param Entity $objEntity
     * @return Entity[]
     */
    public function getAllManyToMany( Entity $objEntity )
    {
        $this->validateLocalEntityClass( $objEntity );

        $strSql =
        ' SELECT
                external.*
          FROM
                ' . $this->getAnnotationAttribute()->getManyToMany() . ' relacional
          INNER JOIN
                ' . $this->getRow()->getTableName() . ' external
          ON
          (
                external.' . $this->getRow()->getPrimaryName() . '
                =
                relacional.' . $this->getAnnotationAttribute()->getExternalId() . '
          )
          WHERE
                relacional.' . $this->getAnnotationAttribute()->getLocalId() . '
                =
                ?
        ';

        $rowset =   $this->emerge(
            $this->runSql
            (
                $strSql
                ,
                array(
                    $objEntity->getId()
                )
            )
        );

        return $rowset;
    }

    /**
     * Obtem toda a colecao de entidades externas associadas a entidade local
     * por esse relacionamento
     *
     * @param Entity $objEntity
     * @return Entity[]
     */
    public function getAllOneToMany( Entity $objEntity )
    {
        $this->validateLocalEntityClass( $objEntity );

        $strSql =
        ' SELECT
                external.*
          FROM
                ' . $this->getRow()->getTableName() . ' external
          WHERE
                ' . $this->getFkOne()  . '
                =
                ?
        ';

        $rowset =   $this->emerge(
            $this->runSql
            (
                $strSql
                ,
                array(
                    $objEntity->getId()
                )
            )
        );

        return $rowset;
    }

    /**
     * Obtem a quantidade de entidades externas que estao relacionadas a
     * entidade local
     *
     * @param Entity $objEntity
     * @return integer
     */
    public function getQtdManyToMany( Entity $objEntity )
    {
        $this->validateLocalEntityClass( $objEntity );

        $strSql =
        ' SELECT
                count( * ) as total
          FROM
                ' . $this->getAnnotationAttribute()->getManyToMany() . ' relacional
          INNER JOIN
                ' . $this->getRow()->getTableName() . ' external
          ON
          (
                external.' . $this->getRow()->getPrimaryName() . '
                =
                relacional.' . $this->getAnnotationAttribute()->getExternalId() . '
          )
          WHERE
                relacional.' . $this->getAnnotationAttribute()->getLocalId() . '
                =
                ?
        ';

        $arrResult = $this->runSql
        (
            $strSql
            ,
            array(
                $objEntity->getId()
            )
        );

        return $arrResult[0][ 'total' ];
    }

    /**
     * Obtem a quantidade de entidades externas que estao relacionadas a
     * entidade local
     *
     * @param Entity $objEntity
     * @return integer
     */
    public function getQtdOneToMany( Entity $objEntity )
    {
        $this->validateLocalEntityClass( $objEntity );

        $strSql =
        ' SELECT
                count( * ) as total
          FROM
                ' . $this->getRow()->getTableName() . ' external
          WHERE
                ' . $this->getFkOne() . '
                =
                ?
        ';

        $arrResult = $this->runSql
        (
            $strSql
            ,
            array(
                $objEntity->getId()
            )
        );

        return $arrResult[0][ 'total' ];
    }

    /**
     * Atualiza todo o relacionamento da entidade para a colecao recebida
     * por parametro
     *
     * @param Entity $objEntityLocal
     * @param Entity[] $arrEntities
     * @return EntityRelationshipTable me
     * @throws \Exception
     */
    public function setAllManyToMany( Entity $objEntityLocal , array $arrEntities )
    {
        $this->validateLocalEntityClass( $objEntityLocal );
        
        $strSql =
        ' DELETE
          FROM
                ' . $this->getAnnotationAttribute()->getManyToMany() . '
          WHERE ' . $this->getAnnotationAttribute()->getLocalId() . ' = ?
        ';
        $this->runSql( $strSql , array( $objEntityLocal->getId() ) );

        foreach( $arrEntities as $objEntityExternal )
        {
            /**
             * @var $objEntityExternal Entity
             */
            $this->add( $objEntityLocal , $objEntityExternal );
        }

        return $this;
    }

    /**
     * Atualiza todo o relacionamento da entidade para a colecao recebida
     * por parametro
     *
     * @param Entity $objEntityLocal
     * @param Entity[] $arrEntities
     * @return EntityRelationshipTable me
     * @throws \Exception
     */
    public function setOneManyToMany( Entity $objEntityLocal , array $arrEntities )
    {
        $this->validateLocalEntityClass( $objEntityLocal );

        $strSql =
        ' UPDATE
                ' . $this->getRow()->getTableName()  . '
          SET
                  ' . $this->getFkOne() . ' = NULL
          WHERE   ' . $this->getFkOne() . ' = ?
        ';
        $this->runSql( $strSql , array( $objEntityLocal->getId() ) );

        foreach( $arrEntities as $objEntityExternal )
        {
            /**
             * @var $objEntityExternal Entity
             */
            $this->add( $objEntityLocal , $objEntityExternal );
        }

        return $this;
    }

    /**
     * Adiciona uma nova tupla ao relacionamento
     *
     * @param Entity $objEntityLocal
     * @param Entity $objEntityExternal
     * @return EntityRelationshipTable me
     * @throws \Exception
     */
    public function addManyToMany( Entity $objEntityLocal , Entity $objEntityExternal )
    {
        $this->validateLocalEntityClass( $objEntityLocal );
        $this->validateExternalEntityClass( $objEntityExternal );

        if( $this->has( $objEntityLocal , $objEntityExternal ) )
        {
            /**
             * Relacionamento já existe
             */
            return $this;
        }
        
         $strSql =
        '
            INSERT INTO
                ' . $this->getAnnotationAttribute()->getManyToMany() . '
            (
                ' . $this->getAnnotationAttribute()->getLocalId() . ' ,
                ' . $this->getAnnotationAttribute()->getExternalId() . '
            )
            VALUES
            (
                ? , ?
            )
        ';

         $this->runSql(
            $strSql ,
            array
            (
                $objEntityLocal->getId() ,
                $objEntityExternal->getId()
            )
         );

         return $this;
    }

    /**
     * Adiciona uma nova tupla ao relacionamento
     *
     * @param Entity $objEntityLocal
     * @param Entity $objEntityExternal
     * @return EntityRelationshipTable me
     * @throws \Exception
     */
    public function addOneToMany( Entity $objEntityLocal , Entity $objEntityExternal )
    {
        $this->validateLocalEntityClass( $objEntityLocal );
        $this->validateExternalEntityClass( $objEntityExternal );

        if( $this->has( $objEntityLocal , $objEntityExternal ) )
        {
            /**
             * Relacionamento já existe
             */
            return $this;
        }

        $strSql =
        ' UPDATE
                ' . $this->getRow()->getTableName()  . '
          SET
                  ' . $this->getFkOne() . ' = ?
          WHERE   ' . $this->getRow()->getPrimaryName() . ' = ?
        ';

         $this->runSql(
            $strSql ,
            array
            (
                $objEntityLocal->getId() ,
                $objEntityExternal->getId()
            )
         );

         return $this;
    }

    public function  hasManyToMany( Entity $objEntity , Entity $objEntityExternal )
    {
        $this->validateLocalEntityClass( $objEntity );
        $this->validateExternalEntityClass( $objEntityExternal );
        
        $strSql =
        ' SELECT
                count( * ) as total
          FROM
                ' . $this->getAnnotationAttribute()->getManyToMany() . ' relacional
          WHERE
                relacional.' . $this->getAnnotationAttribute()->getLocalId() . '
                =
                ?
          AND
                relacional.' . $this->getAnnotationAttribute()->getExternalId() . '
                =
                ?
        ';

        $arrResult = $this->runSql
        (
            $strSql
            ,
            array(
                $objEntity->getId() ,
                $objEntityExternal->getId() ,
            )
        );

        return $arrResult[0][ 'total' ] > 0;

    }

    public function  hasOneToMany( Entity $objEntity , Entity $objEntityExternal )
    {
        $this->validateLocalEntityClass( $objEntity );
        $this->validateExternalEntityClass( $objEntityExternal );

        $strSql =
        ' SELECT
                count( * ) as total
          FROM
                ' . $this->getRow()->getTableName() . ' relacional
          WHERE
                relacional.' . $this->getRow()->getPrimaryName() . '
                =
                ?
          AND
                relacional.' . $this->getFkOne() . '
                =
                ?
        ';

        $arrResult = $this->runSql
        (
            $strSql
            ,
            array(
                $objEntity->getId() ,
                $objEntityExternal->getId() ,
            )
        );

        return $arrResult[0][ 'total' ] > 0;

    }

    public function removeManyToMany( Entity $objEntity , Entity $objEntityExternal )
    {
        $this->validateLocalEntityClass( $objEntity );
        $this->validateExternalEntityClass( $objEntityExternal );

        if( !$this->has( $objEntity , $objEntityExternal ) )
        {
            /**
             * Relacionamento não existe
             */
            return $this;
        }

        $strSql =
        ' DELETE FROM
                ' . $this->getAnnotationAttribute()->getManyToMany() . '
          WHERE
                ' . $this->getAnnotationAttribute()->getLocalId() . '
                =
                ?
          AND
                ' . $this->getAnnotationAttribute()->getExternalId() . '
                =
                ?
        ';

        $this->runSql
        (
            $strSql
            ,
            array(
                $objEntity->getId() ,
                $objEntityExternal->getId() ,
            )
        );

        return $this;
    }

    /**
     * Atualiza todo o relacionamento da entidade para a colecao recebida
     * por parametro
     *
     * @param Entity $objEntityLocal
     * @param Entity[] $arrEntities
     * @return EntityRelationshipTable me
     * @throws \Exception
     */
    public function removeOneToMany( Entity $objEntity , Entity $objEntityExternal )
    {
        $this->validateLocalEntityClass( $objEntityLocal );

        $strSql =
        ' UPDATE
                ' . $this->getRow()->getTableName()  . '
          SET
                  ' . $this->getFkOne() . ' = NULL
          WHERE
                    ' . $this->getFkOne() . ' = ?
            AND
                    ' . $this->getRow()->getPrimaryName() . ' = ?
        ';
        $this->runSql( $strSql , array( $objEntity->getId() , $objEntityExternal->getId() ) );

        return $this;
    }
}

