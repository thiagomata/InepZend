<?php
namespace Projeto\Model;

/**
 * Classe Table da Entidade Exemplo
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 09/12/2010
 */
class ExemploTable extends \Local\Model\EntityTable
{
    /**
     * Retorna todas as Exemplos de uma uf pela sigla
     *
     * @param string $strSiglaUf
     * @return \Projeto\Model\Exemplo[]
     */
    public function getByUf( $strSiglaUf ) {

        $rowset = $this->fetchAll($this->select()->where( 'sg_uf = ?', $strSiglaUf ) );
        return $rowset;
    }

    /**
     * Retorna todas as Exemplos do prefeito recebido
     *
     * @param string $strSiglaUf
     * @return \Projeto\Model\Exemplo[]
     */
    public function getByPrefeito( Pessoa $objPessoa ) {

        $rowset = $this->fetchAll($this->select()->where( 'sg_uf = ?', $strSiglaUf ) );
        return $rowset;
    }

    /**
     * Obtem a Exemplo pelo Id
     *
     * @param integer $intId
     * @return \Projeto\Model\Exemplo
     */
    public function getById( $intId , $booCriaSeNaoTiver = false )
    {
        return parent::getById( $intId , $booCriaSeNaoTiver );
    }

}