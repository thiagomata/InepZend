<?php
namespace Projeto\Model;

/**
 * Classe da Entidade Exemplo
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 09/12/2010
 * @table tb_exemplo
 */
class Exemplo extends \Local\Model\Entity
{
    /**
     *
     * Id da Entidade
     *
     * @column id_exemplo
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Nome da Exemplo
     *
     * @setter setNome
     * @getter getNome
     * @column no_exemplo
     * @maxlength 100
     * @var string
     */
    protected $strNome;

    /**
     * Uf da Exemplo
     *
     * @column txt_uf
     * @setter setUf
     * @getter getUf
     * @maxlength 2
     * @var string
     */
    protected $strUf;

    /**
     * Id do Prefeito da Exemplo
     *
     * @column id_prefeito
     * @setter setIdPrefeito
     * @getter getIdPrefeito
     * @entity objPrefeito
     * @var integer
     */
    protected $intIdPrefeito;

    /**
     * Prefeito da Exemplo
     *
     * @setter setPrefeito
     * @getter getPrefeito
     * @id intIdPrefeito
     * @throws NotFound
     * @var Projeto\Model\Pessoa
     */
    protected $objPrefeito;


    /**
     * Administradores da Exemplo
     *
     * @relationship administrar
     * @ManyToMany tb_pessoa_administra_exemplo
     * @localId id_exemplo
     * @externalId id_pessoa
     * @var Pessoa[]
     */
    protected $arrAdministradores;

    /**
     * Moradores da Exemplo
     *
     * @relationship moradores
     * @OneToMany intIdExemplo
     * @var Pessoa[]
     */
    protected $arrMoradores;

    /**
     * Informa o nome da Exemplo
     *
     * @param string $strNome
     * @return Exemplo
     */
    public function setNome( $strNome )
    {
        $this->strNome = $strNome;
        return $this;
    }

    /**
     * Obtem o nome da Exemplo
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
     * @return Exemplo
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
     * Obtem os Administradores da Exemplo
     *
     * @return Administrador[]
     */
    public function getAdministradores( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'administrar' );
    }

    /**
     * Obtem a quantidade de Administradores da Exemplo
     *
     * @return integer
     */
    public function getQtdAdministradores( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'administrar' );
    }

    /**
     *  Informa quais são os administradores da Exemplo
     *
     * @param Administrador[] $arrAdministradors
     * @return Exemplo
     */
    public function setAdministradores( array $arrAdministradors )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrAdministradors , 'administrar' );
    }

    /**
     * Adiciona novo administrador a Exemplo
     *
     * @param Administrador $objAdministrador
     * @return Exemplo
     */
    public function addAdministrador( Administrador $objAdministrador , $booUseCache = true )
    {
        return $this->addRelationalEntity( __METHOD__ , $objAdministrador , $booUseCache , 'administrar' );
    }

    /**
     * Remove um administrador da Exemplo
     * @param Administrador $objAdministrador
     * @return Exemplo
     */
    public function removeAdministradores( Administrador $objAdministrador , $booUseCache = true )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objAdministrador , $booUseCache , 'administrar' );
    }
    
    /**
     * Obtem os Moradores da Exemplo
     *
     * @return Morador[]
     */
    public function getMoradores( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'moradores' );
    }

    /**
     * Obtem a quantidade de Moradores da Exemplo
     *
     * @return integer
     */
    public function getQtdMoradores( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'moradores' );
    }

    /**
     *  Informa quais são os Moradores da Exemplo
     *
     * @param Morador[] $arrMoradorsMoradoras
     * @return Exemplo
     */
    public function setMoradores( array $arrMoradorsMoradoras )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrMoradorsMoradoras , 'moradores' );
    }

    /**
     * Adiciona um novo Morador a Exemplo
     *
     * @param Morador $objMorador
     * @return Exemplo
     */
    public function addMorador( Morador $objMorador , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objMorador , $booUseCache , 'moradores' );
    }

    /**
     * Remove um Morador da Exemplo
     * @param Morador $objMorador
     * @return Exemplo
     */
    public function removeMorador( Morador $objMorador )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objMorador , $booUseCache , 'moradores' );
    }

    /**
     * Informa o id do Prefeito
     *
     * @param integer $intIdPrefeito
     * @return Exemplo
     */
    public function setIdPrefeito( $intIdPrefeito )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdPrefeito );
    }

    /**
     * Obtem o id do Prefeito
     *
     * @return integer
     */
    public function getIdPrefeito()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Informa a entidade Prefeito
     *
     * @param Prefeito $objPrefeito
     * @return Exemplo
     */
    public function setPrefeito( Prefeito $objPrefeito )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objPrefeito );
    }

    /**
     * Obtem a entidade Prefeito
     *
     * @return Pessoa
     */
    public function getPrefeito()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }



}
?>