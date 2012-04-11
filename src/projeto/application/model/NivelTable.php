<?php
namespace Projeto\Model;

/**
 * Classe Table da Entidade Nivel
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 08/12/2010
 */
class NivelTable extends \Local\Model\EntityTable
{
    /**
     * Obtem a Nivel pelo Id
     *
     * @param integer $intId
     * @return Nivel
     */
    public function getById( $intId , $booCriaSeNaoTiver = false )
    {
        return parent::getById( $intId , $booCriaSeNaoTiver );
    }

}