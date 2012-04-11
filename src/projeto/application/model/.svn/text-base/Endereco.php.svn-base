<?php
namespace Projeto\Model;

/**
 * Classe da Entidade Endereco
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 08/12/2010
 * @table tb_endereco
 */
class Endereco extends \Local\Model\Entity
{
    /**
     *
     * Id da Entidade
     *
     * @column id_Endereco
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Cep do Endereco
     *
     * @column txt_cep
     * @setter setCep
     * @getter getCep
     * @maxlength 30
     * @var string
     */
    protected $strCep;

    /**
     * Numero do Endereco
     *
     * @setter setNumero
     * @getter getNumero
     * @column txt_numero
     * @maxlength 30
     * @var string
     */
    protected $strNumero;

    /**
     * Logradouro do Endereco
     *
     * @setter setLogradouro
     * @getter getLogradouro
     * @column txt_logradouro
     * @maxlength 100
     * @var string
     */
    protected $strLogradouro;

    /**
     * Id do Cidade do Endereco
     *
     * @column id_Cidade
     * @setter setIdCidade
     * @getter getIdCidade
     * @entity objCidade
     * @var integer
     */
    protected $intIdCidade;

    /**
     * Cidade do Endereco
     *
     * @setter setCidade
     * @getter getCidade
     * @id intIdCidade
     * @throws NotFound
     * @var Projeto\Model\Usuario
     */
    protected $objCidade;

    /**
     * Moradores do Endereco
     *
     * @relationship moradores
     * @OneToMany Usuario::intIdEndereco
     * @var Usuario[]
     */
    protected $arrUsuarios;

    /**
     * Informa o Numero do Endereco
     *
     * @param string $strNumero
     * @return Endereco
     */
    public function setNumero( $strNumero )
    {
        $this->strNumero = $strNumero;
        return $this;
    }

    /**
     * Obtem o Numero do Endereco
     * 
     * @return string
     */
    public function getNumero()
    {
        return $this->strNumero;
    }

    /**
     * Informa o Numero da Cep
     *
     * @param string $strCep
     * @return Endereco
     */
    public function setCep( $strCep )
    {
        $this->strCep = $strCep;
        return $this;
    }

    /**
     * Obtem o Numero da Cep
     *
     * @return string
     */
    public function getCep()
    {
        return $this->strCep;
    }

    /**
     * Obtem os Usuarios do Endereco
     *
     * @return Usuario[]
     */
    public function getUsuarios( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'administrar' );
    }

    /**
     * Obtem a quantidade de Usuarios do Endereco
     *
     * @return integer
     */
    public function getQtdUsuarios( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'administrar' );
    }

    /**
     *  Informa quais são os Usuarios do Endereco
     *
     * @param Usuario[] $arrUsuarios
     * @return Endereco
     */
    public function setUsuarios( array $arrUsuarios )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrUsuarios , 'administrar' );
    }

    /**
     * Adiciona um novo Usuario ao Endereco
     *
     * @param Usuario $objUsuario
     * @return Endereco
     */
    public function addUsuario( Usuario $objUsuario , $booUseCache = true )
    {
        return $this->addRelationalEntity( __METHOD__ , $objUsuario , $booUseCache , 'administrar' );
    }

    /**
     * Remove um Usuario do Endereco
     * @param Usuario $objUsuario
     * @return Endereco
     */
    public function removeUsuarios( Usuario $objUsuario , $booUseCache = true )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objUsuario , $booUseCache , 'administrar' );
    }
    
    /**
     * Informa o id do Cidade
     *
     * @param integer $intIdCidade
     * @return Endereco
     */
    public function setIdCidade( $intIdCidade )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdCidade );
    }

    /**
     * Obtem o id do Cidade
     *
     * @return integer
     */
    public function getIdCidade()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Informa a entidade Cidade
     *
     * @param Cidade $objCidade
     * @return Endereco
     */
    public function setCidade( Cidade $objCidade )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objCidade );
    }

    /**
     * Obtem a entidade Cidade
     *
     * @return Usuario
     */
    public function getCidade()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }



}
?>