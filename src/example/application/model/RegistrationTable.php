<?php
namespace Example\Model;

/**
 * Registration Table Class
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 07/06/2011
 */
class RegistrationTable extends \Local\Model\EntityTable
{
    /**
     * Get Registration By Id
     *
     * @param integer $intId
     * @return Registration
     */
    public function getById( $intId , $booCreateIfNotExists = false )
    {
        return parent::getById( $intId , $booCreateIfNotExists );
    }

}