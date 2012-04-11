<?php
namespace Projeto\Model;

/**
 * Classe Table do Estado
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 09/12/2010
 */
class EstadoTable extends \Local\Model\EntityTable
{
    /**
     * Retorna todas as Estados de uma uf pela sigla
     *
     * @param string $strSiglaUf
     * @return Estado[]
     */
    public function getByUf( $strSiglaUf ) {

        $rowset = $this->fetchAll($this->select()->where( 'txt_sigla_estado = ?', $strSiglaUf ) );
        return $rowset;
    }

    /**
     * Obtem o Estado pelo Id
     *
     * @param integer $intId
     * @return Estado
     */
    public function getById( $intId , $booCriaSeNaoTiver = false )
    {
        return parent::getById( $intId , $booCriaSeNaoTiver );
    }

}