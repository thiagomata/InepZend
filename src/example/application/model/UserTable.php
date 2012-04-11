<?php
namespace Example\Model;

/**
 * User Table Class
 * 
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 06/07/2011
 */
class UserTable extends \Local\Model\EntityTable
{
    /**
     * Get User By Id
     *
     * @param integer $intId
     * @return User
     */
    public function getById( $intId , $booCreateIfNotExists = false )
    {
        return parent::getById( $intId , $booCreateIfNotExists );
    }

}