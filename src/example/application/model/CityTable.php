<?php
namespace Example\Model;

/**
 * City Table Class
 * 
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 06/07/2011
 */
class CityTable extends \Local\Model\EntityTable
{
    /**
     * Get Singleton Class Instance
     *
     * Ovewrited to specify the return class
     *
     * @return CityTable
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    /**
     * Return all the Cities by the State
     *
     * @param State $objState
     * @return City[]
     */
    public function getByState( State $objState ) {

        $rowset = $this->fetchAll($this->select()->where( 'id_state = ?', $objState->getId() ) );
        return $rowset;
    }

    /**
     * Get City by Id
     *
     * @param integer $intId
     * @return City
     */
    public function getById( $intId , $booCreateIfNotExists = false )
    {
        return parent::getById( $intId , $booCreateIfNotExists );
    }

}