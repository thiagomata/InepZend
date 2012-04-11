<?php
namespace Projeto\Model;

/**
 * Classe da Entidade Sala
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 09/12/2010
 * @table tb_sala
 */
class Sala extends \Local\Model\Entity
{
    /**
     *
     * Id da Entidade
     *
     * @column id_sala
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Nome da Sala
     *
     * @setter setNome
     * @getter getNome
     * @column no_sala
     * @maxlength 100
     * @var string
     */
    protected $strNome;

    /**
     * Quantidade de Cadeiras na Sala
     *
     * @column int_qtd_cadeiras
     * @setter setQtdCadeiras
     * @getter getQtdCadeiras
     * @var integer
     */
    protected $intQtdSalas;

    /**
     * Id do Escola da Sala
     *
     * @column id_Escola
     * @setter setIdEscola
     * @getter getIdEscola
     * @entity objEscola
     * @var integer
     */
    protected $intIdEscola;

    /**
     * Escola da Sala
     *
     * @setter setEscola
     * @getter getEscola
     * @id intIdEscola
     * @throws NotFound
     * @var Escola
     */
    protected $objEscola;

    /**
     * Turmas da Sala
     *
     * @relationship Turmas
     * @OneToMany intIdSala
     * @var Turma[]
     */
    protected $arrTurmas;

    /**
     * Informa o nome da Sala
     *
     * @param string $strNome
     * @return Sala
     */
    public function setNome( $strNome )
    {
        $this->strNome = $strNome;
        return $this;
    }

    /**
     * Obtem o nome da Sala
     * 
     * @return string
     */
    public function getNome()
    {
        return $this->strNome;
    }

    /**
     * Informa o nome da QtdSalas
     *
     * @param string $intQtdSalas
     * @return Sala
     */
    public function setQtdSalas( $intQtdSalas )
    {
        $this->intQtdSalas = $intQtdSalas;
        return $this;
    }

    /**
     * Obtem o nome da QtdSalas
     *
     * @return string
     */
    public function getQtdSalas()
    {
        return $this->intQtdSalas;
    }
    
    /**
     * Obtem as Turmas da Sala
     *
     * @return Turma[]
     */
    public function getTurmas( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Turmas' );
    }

    /**
     * Obtem a quantidade de Turmas da Sala
     *
     * @return integer
     */
    public function getQtdTurmas( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Turmas' );
    }

    /**
     *  Informa quais são as Turmas da Sala
     *
     * @param Turma[] $arrTurmasTurmaas
     * @return Sala
     */
    public function setTurmas( array $arrTurmasTurmaas )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrTurmasTurmaas , 'Turmas' );
    }

    /**
     * Adiciona uma nova Turma a Sala
     *
     * @param Turma $objTurma
     * @return Sala
     */
    public function addTurma( Turma $objTurma , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objTurma , $booUseCache , 'Turmas' );
    }

    /**
     * Remove uma Turma da Sala
     * @param Turma $objTurma
     * @return Sala
     */
    public function removeTurma( Turma $objTurma )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objTurma , $booUseCache , 'Turmas' );
    }

    /**
     * Informa o id do Escola
     *
     * @param integer $intIdEscola
     * @return Sala
     */
    public function setIdEscola( $intIdEscola )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdEscola );
    }

    /**
     * Obtem o id do Escola
     *
     * @return integer
     */
    public function getIdEscola()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Informa a entidade Escola
     *
     * @param Escola $objEscola
     * @return Sala
     */
    public function setEscola( Escola $objEscola )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objEscola );
    }

    /**
     * Obtem a entidade Escola
     *
     * @return Escola
     */
    public function getEscola()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }



}
?>