<?php
namespace Projeto\Model;

/**
 * Classe da Entidade Turno
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 09/12/2010
 * @table tb_turno
 */
class Turno extends \Local\Model\Entity
{
    /**
     *
     * Id da Entidade
     *
     * @column id_Turno
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Nome do Turno
     *
     * @setter setNome
     * @getter getNome
     * @column no_Turnox
     * @maxlength 100
     * @var string
     */
    protected $strNome;

    /**
     * HoraInicio do Turno
     *
     * @column txt_HoraInicio
     * @setter setHoraInicio
     * @getter getHoraInicio
     * @var string
     */
    protected $strHoraInicio;

    /**
     * HoraFim do Turno
     *
     * @column txt_HoraFim
     * @setter setHoraFim
     * @getter getHoraFim
     * @var string
     */
    protected $strHoraFim;

    /**
     * Turmas do Turno
     *
     * @relationship Turmas
     * @OneToMany intIdTurno
     * @var Turma[]
     */
    protected $arrTurmas;

    /**
     * Informa o nome do Turno
     *
     * @param string $strNome
     * @return Turno
     */
    public function setNome( $strNome )
    {
        $this->strNome = $strNome;
        return $this;
    }

    /**
     * Obtem o nome do Turno
     * 
     * @return string
     */
    public function getNome()
    {
        return $this->strNome;
    }

    /**
     * Informa o nome da HoraInicio
     *
     * @param string $strHoraInicio
     * @return Turno
     */
    public function setHoraInicio( $strHoraInicio )
    {
        $this->strHoraInicio = $strHoraInicio;
        return $this;
    }

    /**
     * Obtem o nome da HoraInicio
     *
     * @return string
     */
    public function getHoraInicio()
    {
        return $this->strHoraInicio;
    }
    
    /**
     * Informa o nome da HoraFim
     *
     * @param string $strHoraFim
     * @return Turno
     */
    public function setHoraFim( $strHoraFim )
    {
        $this->strHoraFim = $strHoraFim;
        return $this;
    }

    /**
     * Obtem o nome da HoraFim
     *
     * @return string
     */
    public function getHoraFim()
    {
        return $this->strHoraFim;
    }

    /**
     * Obtem as Turmas do Turno
     *
     * @return Turma[]
     */
    public function getTurmas( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Turmas' );
    }

    /**
     * Obtem a quantidade de Turmas do Turno
     *
     * @return integer
     */
    public function getQtdTurmas( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Turmas' );
    }

    /**
     *  Informa quais são as Turmas do Turno
     *
     * @param Turma[] $arrTurmas
     * @return Turno
     */
    public function setTurmas( array $arrTurmas )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrTurmas , 'Turmas' );
    }

    /**
     * Adiciona um nova Turma ao Turno
     *
     * @param Turma $objTurma
     * @return Turno
     */
    public function addTurma( Turma $objTurma , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objTurma , $booUseCache , 'Turmas' );
    }

    /**
     * Remove um Turma do Turno
     * @param Turma $objTurma
     * @return Turno
     */
    public function removeTurma( Turma $objTurma )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objTurma , $booUseCache , 'Turmas' );
    }
}
?>