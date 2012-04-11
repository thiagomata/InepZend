<?php
namespace Projeto\Model;

/**
 * Classe Table da Entidade Cidade
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 09/12/2010
 */
class CidadeTable extends \Local\Model\EntityTable
{
    /**
     * @return CidadeTable
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    /**
     * Retorna todas as cidades de um estado
     *
     * @param Estado $objEstado
     * @return Cidade[]
     */
    public function getByEstado( Estado $objEstado ) {

        $rowset = $this->fetchAll($this->select()->where( 'id_estado = ?', $objEstado->getId() ) );
        return $rowset;
    }

    /**
     * Obtem a Cidade pelo Id
     *
     * @param integer $intId
     * @return Cidade
     */
    public function getById( $intId , $booCriaSeNaoTiver = false )
    {
        return parent::getById( $intId , $booCriaSeNaoTiver );
    }

}