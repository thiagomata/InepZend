<?php
namespace Example\Model;

/**
 * School Table Class
 * 
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 06/07/2011
 */
class SchoolTable extends \Local\Model\EntityTable
{
    /**
     * Get School by Id
     *
     * @param integer $intId
     * @return School
     */
    public function getById( $intId , $booCreateIfNotExists = false )
    {
        return parent::getById( $intId , $booCreateIfNotExists );
    }
}
?>