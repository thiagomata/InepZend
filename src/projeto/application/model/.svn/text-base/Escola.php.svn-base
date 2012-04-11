<?php
namespace Projeto\Model;

/**
 * Classe da Entidade Escola
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 09/12/2010
 * @table tb_escola
 */
class Escola extends \Local\Model\Entity
{
    /**
     *
     * Id da Entidade
     *
     * @column id_escola
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Nome da Escola
     *
     * @setter setNome
     * @getter getNome
     * @column no_escola
     * @maxlength 100
     * @var string
     */
    protected $strNome;

    /**
     * Id do Endereco da Escola
     *
     * @column id_Endereco
     * @setter setIdEndereco
     * @getter getIdEndereco
     * @entity objEndereco
     * @var integer
     */
    protected $intIdEndereco;

    /**
     * Endereco da Escola
     *
     * @setter setEndereco
     * @getter getEndereco
     * @id intIdEndereco
     * @throws NotFound
     * @var Endereco
     */
    protected $objEndereco;

    /**
     * Salas da Escola
     *
     * @relationship Salas
     * @OneToMany Sala::intIdEscola
     * @var Sala[]
     */
    protected $arrSalas;

    /**
     * Informa o nome da Escola
     *
     * @param string $strNome
     * @return Escola
     */
    public function setNome( $strNome )
    {
        $this->strNome = $strNome;
        return $this;
    }

    /**
     * Obtem o nome da Escola
     * 
     * @return string
     */
    public function getNome()
    {
        return $this->strNome;
    }

    /**
     * Obtem as Salas da Escola
     *
     * @return Sala[]
     */
    public function getSalas( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Salas' );
    }

    /**
     * Obtem a quantidade de Salas da Escola
     *
     * @return integer
     */
    public function getQtdSalas( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Salas' );
    }

    /**
     *  Informa quais são as Salas da Escola
     *
     * @param Sala[] $arrSalasSalaas
     * @return Escola
     */
    public function setSalas( array $arrSalas )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrSalas , 'Salas' );
    }

    /**
     * Adiciona uma nova Sala a Escola
     *
     * @param Sala $objSala
     * @return Escola
     */
    public function addSala( Sala $objSala , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objSala , $booUseCache , 'Salas' );
    }

    /**
     * Remove uma Sala da Escola
     * @param Sala $objSala
     * @return Escola
     */
    public function removeSala( Sala $objSala )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objSala , $booUseCache , 'Salas' );
    }

    /**
     * Informa o id do Endereco
     *
     * @param integer $intIdEndereco
     * @return Escola
     */
    public function setIdEndereco( $intIdEndereco )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdEndereco );
    }

    /**
     * Obtem o id do Endereco
     *
     * @return integer
     */
    public function getIdEndereco()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Informa a entidade Endereco
     *
     * @param Endereco $objEndereco
     * @return Escola
     */
    public function setEndereco( Endereco $objEndereco )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objEndereco );
    }

    /**
     * Obtem a entidade Endereco
     *
     * @return Sala
     */
    public function getEndereco()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }

}
?>