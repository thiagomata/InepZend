<?php
namespace Example\Model;

/**
 * Group Table Class
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 07/06/2011
 */
class GroupTable extends \Local\Model\EntityTable
{
    /**
     * Get Group by Id
     *
     * @param integer $intId
     * @return Group
     */
    public function getById( $intId , $booCreateIfNotExists = false )
    {
        return parent::getById( $intId , $booCreateIfNotExists );
    }
}
?>