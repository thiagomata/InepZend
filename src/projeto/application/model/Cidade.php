<?php
namespace Projeto\Model;

/**
 * Classe da Entidade Cidade
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 08/12/2010
 * @table tb_cidade
 */
class Cidade extends \Local\Model\Entity
{
    /**
     * Nome da Cidade
     *
     * @setter setNome
     * @getter getNome
     * @column no_cidade
     * @maxlength 100
     * @var string
     */
    protected $strNome;

    /**
     *
     * Id da Entidade
     *
     * @column id_cidade
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Id do Estado da Cidade
     *
     * @column id_estado
     * @setter setIdEstado
     * @getter getIdEstado
     * @entity objEstado
     * @var integer
     */
    protected $intIdEstado;

    /**
     * Estado da Cidade
     *
     * @setter setEstado
     * @getter getEstado
     * @id intIdEstado
     * @throws NotFound
     * @var \Projeto\Model\Estado
     */
    protected $objEstado;

    /**
     * Informa o nome da cidade
     *
     * @param string $strNome
     * @return Cidade
     */
    public function setNome( $strNome )
    {
        $this->strNome = $strNome . "!";
        return $this;
    }

    /**
     * Obtem o nome da cidade
     * 
     * @return string
     */
    public function getNome()
    {
        return $this->strNome;
    }

    /**
     * informa o id do Estado
     *
     * @return integer
     */
    public function setIdEstado( $intIdEstado )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdEstado );
    }

    /**
     * Obtem o id do Estado
     *
     * @return integer
     */
    public function getIdEstado()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Informa a entidade Estado
     *
     * @param Estado $objEstado
     * @return Cidade
     */
    public function setEstado( Estado $objEstado )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objEstado );
    }

    /**
     * Obtem a entidade Estado
     *
     * @return Estado
     */
    public function getEstado()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }



}
?>