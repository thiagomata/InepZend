<?php
namespace Example\Model;

/**
 * Level Table Class
 * 
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 07/06/2011
 */
class LevelTable extends \Local\Model\EntityTable
{
    /**
     * Get Level By Id
     *
     * @param integer $intId
     * @return Level
     */
    public function getById( $intId , $booCreateIfNotExists = false )
    {
        return parent::getById( $intId , $booCreateIfNotExists );
    }
}
?>