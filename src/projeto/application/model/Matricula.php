<?php
namespace Projeto\Model;

/**
 * Classe da Entidade Matricula
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 09/12/2010
 * @table tb_matricula
 */
class Matricula extends \Local\Model\Entity
{
    /**
     *
     * Id da Entidade
     *
     * @column id_Matricula
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Id do Usuario da Matricula
     *
     * @column id_usuario
     * @setter setIdUsuario
     * @getter getIdUsuario
     * @entity objUsuario
     * @var integer
     */
    protected $intIdUsuario;

    /**
     * Usuario da Matricula
     *
     * @setter setUsuario
     * @getter getUsuario
     * @id intIdUsuario
     * @throws NotFound
     * @var Usuario
     */
    protected $objUsuario;

    /**
     * Id do Turma da Matricula
     *
     * @column id_turma
     * @setter setIdTurma
     * @getter getIdTurma
     * @entity objTurma
     * @var integer
     */
    protected $intIdTurma;

    /**
     * Turma da Matricula
     *
     * @setter setTurma
     * @getter getTurma
     * @id intIdTurma
     * @throws NotFound
     * @var Turma
     */
    protected $objTurma;

    /**
     * Informa o nome da Matricula
     *
     * @param string $strNome
     * @return Matricula
     */
    public function setNome( $strNome )
    {
        $this->getUsuario()->setNome( $strNome );
        return $this;
    }

    /**
     * Obtem o nome da Matricula
     * 
     * @return string
     */
    public function getNome()
    {
        return $this->getUsuario()->getNome();
    }

    /**
     * Informa o id do Turma
     *
     * @param integer $intIdTurma
     * @return Matricula
     */
    public function setIdTurma( $intIdTurma )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdTurma );
    }

    /**
     * Obtem o id do Turma
     *
     * @return integer
     */
    public function getIdTurma()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Informa a entidade Turma
     *
     * @param Turma $objTurma
     * @return Matricula
     */
    public function setTurma( Turma $objTurma )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objTurma );
    }

    /**
     * Obtem a entidade Turma
     *
     * @return Turma
     */
    public function getTurma()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }

    /**
     * Informa o id do Usuario
     *
     * @param integer $intIdUsuario
     * @return Matricula
     */
    public function setIdUsuario( $intIdUsuario )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdUsuario );
    }

    /**
     * Obtem o id do Usuario
     *
     * @return integer
     */
    public function getIdUsuario()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Informa a entidade Usuario
     *
     * @param Usuario $objUsuario
     * @return Matricula
     */
    public function setUsuario( Usuario $objUsuario )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objUsuario );
    }

    /**
     * Obtem a entidade Usuario
     *
     * @return Usuario
     */
    public function getUsuario()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }
}
?>