<?php
namespace Projeto\Model;

/**
 * Classe da Entidade Estado
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 22/11/2010
 * @table tb_estado
 */
class Estado extends \Local\Model\Entity
{
    /**
     * Uf do Estado
     *
     * @label UF
     * @column txt_sigla_estado
     * @setter setUf
     * @getter getUf
     * @maxlength 2
     * @required
     * @var string
     */
    protected $strUf;

    /**
     * Nome do Estado
     *
     * @label nome
     * @setter setNome
     * @getter getNome
     * @column no_estado
     * @maxlength 100
     * @required
     * @var string
     */
    protected $strNome;

    /**
     *
     * Id da Entidade
     *
     * @column id_estado
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Cidades do Estado
     *
     * @relationship cidades
     * @OneToMany intIdEstado
     * @var Cidade[]
     */
    protected $arrCidades;

    /**
     * Informa o nome do Estado
     *
     * @param string $strNome
     * @return Estado
     */
    public function setNome( $strNome )
    {
        $this->strNome = $strNome;
        return $this;
    }

    /**
     * Obtem o nome do Estado
     * 
     * @return string
     */
    public function getNome()
    {
        return $this->strNome;
    }

    /**
     * Informa o nome da uf
     *
     * @param string $strUf
     * @return Estado
     */
    public function setUf( $strUf )
    {
        $this->strUf = $strUf;
        return $this;
    }

    /**
     * Obtem o nome da uf
     *
     * @return string
     */
    public function getUf()
    {
        return $this->strUf;
    }

    /**
     * Obtem os Cidades do Estado
     *
     * @return Cidade[]
     */
    public function getCidades( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'cidades' );
    }

    /**
     * Obtem a quantidade de Cidades do Estado
     *
     * @return integer
     */
    public function getQtdCidades( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'cidades' );
    }

    /**
     *  Informa quais são os Cidades do Estado
     *
     * @param Cidade[] $arrCidades
     * @return Estado
     */
    public function setCidades( array $arrCidades )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrCidades , 'cidades' );
    }

    /**
     * Adiciona um novo Cidade o Estado
     *
     * @param Cidade $objCidade
     * @return Estado
     */
    public function addCidade( Cidade $objCidade , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objCidade , $booUseCache , 'cidades' );
    }

    /**
     * Remove um Cidade do Estado
     * @param Cidade $objCidade
     * @return Estado
     */
    public function removeCidade( Cidade $objCidade )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objCidade , $booUseCache , 'cidades' );
    }
}
?>