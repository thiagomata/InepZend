<?php
namespace Projeto\Model;

/**
 * Classe da Entidade Turma
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 09/12/2010
 * @table tb_turma
 */
class Turma extends \Local\Model\Entity
{
    /**
     *
     * Id da Entidade
     *
     * @column id_turma
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Id da Sala da Turma
     *
     * @column id_sala
     * @setter setIdSala
     * @getter getIdSala
     * @entity objSala
     * @var integer
     */
    protected $intIdSala;

    /**
     * Sala da Turma
     *
     * @setter setSala
     * @getter getSala
     * @id intIdSala
     * @throws NotFound
     * @var Sala
     */
    protected $objSala;

    /**
     * Id do Nivel da Turma
     *
     * @column id_nivel
     * @setter setIdNivel
     * @getter getIdNivel
     * @entity objNivel
     * @var integer
     */
    protected $intIdNivel;

    /**
     * Nivel da Turma
     *
     * @setter setNivel
     * @getter getNivel
     * @id intIdNivel
     * @throws NotFound
     * @var Nivel
     */
    protected $objNivel;

    /**
     * Id do Turno da Turma
     *
     * @column id_turno
     * @setter setIdTurno
     * @getter getIdTurno
     * @entity objTurno
     * @var integer
     */
    protected $intIdTurno;

    /**
     * Turno da Turma
     *
     * @setter setTurno
     * @getter getTurno
     * @id intIdTurno
     * @throws NotFound
     * @var Turno
     */
    protected $objTurno;

    /**
     * Id da Area De Conhecimento da Turma
     *
     * @column id_area_conhecimento
     * @setter setIdAreaDeConhecimento
     * @getter getIdAreaDeConhecimento
     * @entity objAreaDeConhecimento
     * @var integer
     */
    protected $intIdAreaDeConhecimento;

    /**
     * Area De Conhecimento da Turma
     *
     * @setter setAreaDeConhecimento
     * @getter getAreaDeConhecimento
     * @id intIdAreaDeConhecimento
     * @throws NotFound
     * @var AreaDeConhecimento
     */
    protected $objAreaDeConhecimento;

    /**
     * Professores da Turma
     *
     * @relationship Professores
     * @ManyToMany tb_turma_tem_professor
     * @localId id_turma
     * @externalId id_professor
     * @var Professor[]
     */
    protected $arrProfessores;

    /**
     * Matriculas da Turma
     *
     * @relationship Matriculas
     * @OneToMany Matricula::intIdTurma
     * @var Matricula[]
     */
    protected $arrMatriculas;


    /**
     * Obtem os Professores da Turma
     *
     * @return Professor[]
     */
    public function getProfessores( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Professores' );
    }

    /**
     * Obtem a quantidade de Professores da Turma
     *
     * @return integer
     */
    public function getQtdProfessores( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Professores' );
    }

    /**
     *  Informa quais são os Professores da Turma
     *
     * @param Professor[] $arrProfessors
     * @return Turma
     */
    public function setProfessores( array $arrProfessors )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrProfessors , 'Professores' );
    }

    /**
     * Adiciona novo Professor a Turma
     *
     * @param Professor $objProfessor
     * @return Turma
     */
    public function addProfessor( Professor $objProfessor , $booUseCache = true )
    {
        return $this->addRelationalEntity( __METHOD__ , $objProfessor , $booUseCache , 'Professores' );
    }

    /**
     * Remove um Professor da Turma
     * @param Professor $objProfessor
     * @return Turma
     */
    public function removeProfessores( Professor $objProfessor , $booUseCache = true )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objProfessor , $booUseCache , 'Professores' );
    }

    /**
     * Obtem as Matriculas da Turma
     *
     * @return Matricula[]
     */
    public function getMatriculas( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Matriculas' );
    }

    /**
     * Obtem a quantidade de Matriculas da Turma
     *
     * @return integer
     */
    public function getQtdMatriculas( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Matriculas' );
    }

    /**
     *  Informa quais são as Matriculas da Turma
     *
     * @param Matricula[] $arrMatriculasMatriculaas
     * @return Turma
     */
    public function setMatriculas( array $arrMatriculas )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrMatriculas , 'Matriculas' );
    }

    /**
     * Adiciona uma nova Matricula a Turma
     *
     * @param Matricula $objMatricula
     * @return Turma
     */
    public function addMatricula( Matricula $objMatricula , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objMatricula , $booUseCache , 'Matriculas' );
    }

    /**
     * Remove um Matricula da Turma
     * @param Matricula $objMatricula
     * @return Turma
     */
    public function removeMatricula( Matricula $objMatricula )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objMatricula , $booUseCache , 'Matriculas' );
    }

    /**
     * Informa o id do Sala
     *
     * @param integer $intIdSala
     * @return Turma
     */
    public function setIdSala( $intIdSala )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdSala );
    }

    /**
     * Obtem o id do Sala
     *
     * @return integer
     */
    public function getIdSala()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Informa a entidade Sala
     *
     * @param Sala $objSala
     * @return Turma
     */
    public function setSala( Sala $objSala )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objSala );
    }

    /**
     * Obtem a entidade Sala
     *
     * @return Sala
     */
    public function getSala()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }

    /**
     * Informa o id do Nivel
     *
     * @param integer $intIdNivel
     * @return Turma
     */
    public function setIdNivel( $intIdNivel )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdNivel );
    }

    /**
     * Obtem o id do Nivel
     *
     * @return integer
     */
    public function getIdNivel()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Informa a entidade Nivel
     *
     * @param Nivel $objNivel
     * @return Turma
     */
    public function setNivel( Nivel $objNivel )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objNivel );
    }

    /**
     * Obtem a entidade Nivel
     *
     * @return Nivel
     */
    public function getNivel()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }

    /**
     * Informa o id do Turno
     *
     * @param integer $intIdTurno
     * @return Turma
     */
    public function setIdTurno( $intIdTurno )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdTurno );
    }

    /**
     * Obtem o id do Turno
     *
     * @return integer
     */
    public function getIdTurno()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Informa a entidade Turno
     *
     * @param Turno $objTurno
     * @return Turma
     */
    public function setTurno( Turno $objTurno )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objTurno );
    }

    /**
     * Obtem a entidade Turno
     *
     * @return Turno
     */
    public function getTurno()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }

    /**
     * Informa o id do AreaDeConhecimento
     *
     * @param integer $intIdAreaDeConhecimento
     * @return Turma
     */
    public function setIdAreaDeConhecimento( $intIdAreaDeConhecimento )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdAreaDeConhecimento );
    }

    /**
     * Obtem o id do AreaDeConhecimento
     *
     * @return integer
     */
    public function getIdAreaDeConhecimento()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Informa a entidade AreaDeConhecimento
     *
     * @param AreaDeConhecimento $objAreaDeConhecimento
     * @return Turma
     */
    public function setAreaDeConhecimento( AreaDeConhecimento $objAreaDeConhecimento )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objAreaDeConhecimento );
    }

    /**
     * Obtem a entidade AreaDeConhecimento
     *
     * @return AreaDeConhecimento
     */
    public function getAreaDeConhecimento()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }
}
?>