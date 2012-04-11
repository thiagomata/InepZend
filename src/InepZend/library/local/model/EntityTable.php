<?php
namespace Local\Model;

use Coruja\Debug;

class EntityTable extends \Zend_Db_Table_Abstract {

    protected $_row;

    protected $_rowClass;

    protected $_name = '';

    protected $_primary = '';

    protected static $arrInstances = array();

    /**
     * Get Singleton Instance of EntityTable
     *
     * @return EntityTable
     */
    public static function getInstance()
    {
        $strClass = get_called_class();
        if( !array_key_exists( $strClass , self::$arrInstances ) )
        {
            self::$arrInstances[ $strClass ] = new $strClass();
        }
        return self::$arrInstances[ $strClass ];
    }
    /**
     * Get a singleton of the row
     *
     * @return \Local\Model\Entity
     */
    public function getRow()
    {
        if( $this->_row == null )
        {
            $strRowClass = substr( get_class( $this ), 0 , -strlen( "Table" ) );
            $this->_rowClass = $strRowClass;
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
        Entity::addInstance( $this );
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
     * Insere uma entidade
     *
     * @param Application_Model_DbTable_Entity $objEntity
     */
    public function addEntity( Application_Model_DbTable_Entity $objEntity ) {
        $objEntity->save();
    }

    /**
     * Atualiza uma estado
     *
     * @param Application_Model_DbTable_Entity $objEntity
     */
    public function updateEntity( Application_Model_DbTable_Entity $objEntity ) {
        $data = $objEntity->getDataColumns();
        parent::update($data, $this->_primary . ' = ' . (int) $objEntity->getId() );
    }

    /**
     * Remove uma entidade
     *
     * @param integer $id
     */
    public function deleteById($id) {
        if( is_array( $this->_primary  ) )
        {
            if( sizeof( $this->_primary ) > 1 )
            {
                throw new \Exception ( "nao é possível usar esse metodo para  tabelas sem id " );
            }
            $strPrimary = implode( '' , $this->_primary );
        }
        else
        {
            $strPrimary = $this->_primary;
        }
        $this->delete( $strPrimary . ' =  ' . ( (int) $id ) );
    }

    /**
     * Remove uma entidade
     *
     * @param Application_Model_DbTable_Entity $objEntity
     */
    public function deleteEntity( Application_Model_DbTable_Entity $objEntity ) {
        $this->deleteById( $objEntity->getId() );
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

    protected function runSql( $strSql , $arrParams = null )
    {
        if($arrParams === null || count($arrParams) == 0) {
            return ( $this->_db->fetchAll( $strSql ) );
        } else {
            return ( $this->_db->fetchAll( $strSql , $arrParams ) );
        }
    }

    public function getAll($where = null, $order = null, $count = null, $offset = null)
    {
        $arrResult = array();
        $objRowSet = parent::fetchAll($where, $order, $count, $offset);
        for( $i = 0; $i < $objRowSet->count() ; $i++ )
        {
            $arrResult[] = $objRowSet->getRow( $i );
        }
        return $arrResult;
    }

    public function getCount($where = null)
    {
        if( $where )
        {
            $strSql = $this->select()->where( $where )->assemble();
        }
        else
        {
            $strSql = $this->select()->assemble();
        }

        $strSql = ' SELECT COUNT(*) AS total FROM ( ' . $strSql . ') sub ';
        $arrResult = $this->runSql( $strSql );
        $objResult = $arrResult[0];
        return $objResult[ 'total' ];
    }

    public function getPage( $intFirst , $intPageSize , $where = null , array $arrOrder = array() , array $arrBindParams = array() )
    {
        $objSql = $this->select()->limit( $intPageSize , $intFirst );
        
        if( $where !== null )
        {
            $objSql = $objSql->where( $where );
        }
        $arrSqlOrder = array();
        foreach( $arrOrder as $strKey => $strDirection )
        {
            $arrSqlOrder[] = $strKey . ' ' . $strDirection;
        }
        if( sizeof( $arrSqlOrder ) > 0 )
        {
            $objSql->order($arrSqlOrder);
        }
        $strSql = $objSql->assemble();
        return $this->emerge( $this->runSql( $strSql , $arrBindParams ) );

    }
    
    public function getByReference( Entity $objEntity , $strAttributeName )
    {
        $objAnnotationAttribute = $this->getRow()->getAnnotationAttribute( $strAttributeName );
        $strColumn = $objAnnotationAttribute->getColumn();
        $rowset = $this->fetchAll($this->select()->where( $strColumn . ' = ?', $objEntity->getId() ) );
        return $rowset;
    }
}

