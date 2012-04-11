<?php
namespace Example\Model;

/**
 * Teacher Table Class
 * 
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 07/06/2011
 */
class TeacherTable extends \Local\Model\EntityTable
{
    /**
     * Get Teacher By Id
     *
     * @param integer $intId
     * @return Teacher
     */
    public function getById( $intId , $booCreateIfNotExists = false )
    {
        return parent::getById( $intId , $booCreateIfNotExists );
    }
}
?>