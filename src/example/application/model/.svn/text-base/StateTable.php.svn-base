<?php
namespace Example\Model;

/**
 * State Table Class
 * 
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 06/07/2011
 */
class StateTable extends \Local\Model\EntityTable
{
    /**
     * Get All States By Acronym
     *
     * @param string $strAcronym
     * @return State[]
     */
    public function getByAcronym( $strAcronym ) {

        $rowset = $this->fetchAll($this->select()->where( 'txt_acronym = ?', $strAcronym ) );
        return $rowset;
    }

    /**
     * Get State By Id
     *
     * @param integer $intId
     * @return State
     */
    public function getById( $intId , $booCreateIfNotExists = false )
    {
        return parent::getById( $intId , $booCreateIfNotExists );
    }
}
?>