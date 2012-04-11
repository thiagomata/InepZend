<?php
namespace Projeto\Model;

/**
 * Classe da Entidade Professor
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 09/12/2010
 * @table tb_Professor
 */
class Professor extends \Local\Model\Entity
{
    /**
     *
     * Id da Entidade
     *
     * @column id_Professor
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Nome do Professor
     *
     * @setter setNome
     * @getter getNome
     * @column no_professor
     * @maxlength 100
     * @var string
     */
    protected $strNome;

    /**
     * Id do Usuario do Professor
     *
     * @column id_Usuario
     * @setter setIdUsuario
     * @getter getIdUsuario
     * @entity objUsuario
     * @var integer
     */
    protected $intIdUsuario;

    /**
     * Usuario do Professor
     *
     * @setter setUsuario
     * @getter getUsuario
     * @id intIdUsuario
     * @throws NotFound
     * @var Usuario
     */
    protected $objUsuario;

    /**
     * Areas De Conhecimento do Professor
     *
     * @relationship AreasDeConhecimento
     * @ManyToMany tb_professor_tem_area_conhecimento
     * @localId id_professor
     * @externalId id_area_conhecimento
     * @var AreaConhecimento[]
     */
    protected $arrAreasDeConhecimento;

    /**
     * Turmas do Professor
     *
     * @relationship TurmasDoProfessor
     * @ManyToMany tb_turma_tem_professor
     * @localId id_professor
     * @externalId id_turma
     * @var Turma[]
     */
    protected $arrTurmas;

    /**
     * Niveis do Professor
     *
     * @relationship NiveisDoProfessor
     * @ManyToMany tb_professor_tem_nivel
     * @localId id_professor
     * @externalId id_nivel
     * @var Nivel[]
     */
    protected $arrNiveis;

    /**
     * Informa o nome do Professor
     *
     * @param string $strNome
     * @return Professor
     */
    public function setNome( $strNome )
    {
        $this->getUsuario()->setNome( $strNome );
        return $this;
    }

    /**
     * Obtem o nome do Professor
     * 
     * @return string
     */
    public function getNome()
    {
        return $this->getUsuario()->getNome();
    }
    
    /**
     * Obtem as Areas de Conhecimento do Professor
     *
     * @return AreaDeConhecimento[]
     */
    public function getAreasDeConhecimento( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'AreasDeConhecimento' );
    }

    /**
     * Obtem a quantidade de Areas De Conhecimento do Professor
     *
     * @return integer
     */
    public function getQtdAreasDeConhecimento( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'AreasDeConhecimento' );
    }

    /**
     *  Informa quais são as Areas de Conhecimento do Professor
     *
     * @param AreaDeConhecimento[] $arrAreasDeConhecimento
     * @return Professor
     */
    public function setAreasDeConhecimento( array $arrAreasDeConhecimento )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrAreasDeConhecimento , 'AreasDeConhecimento' );
    }

    /**
     * Adiciona uma nova Area De Conhecimento ao Professor
     *
     * @param AreaDeConhecimento $objAreaDeConhecimento
     * @return Professor
     */
    public function addAreaDeConhecimento( AreaDeConhecimento $objAreaDeConhecimento , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objAreaDeConhecimento , $booUseCache , 'AreasDeConhecimento' );
    }

    /**
     * Remove uma Areas De Conhecimento do Professor
     * @param AreaDeConhecimento $objAreaDeConhecimento
     * @return Professor
     */
    public function removeAreaDeConhecimento( AreaDeConhecimento $objAreaDeConhecimento )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objAreaDeConhecimento , $booUseCache , 'AreasDeConhecimento' );
    }

    /**
     * Obtem as Turmas do Professor
     *
     * @return Turma[]
     */
    public function getTurmas( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'TurmasDoProfessor' );
    }

    /**
     * Obtem a quantidade de Turmas do Professor
     *
     * @return integer
     */
    public function getQtdTurmas( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'TurmasDoProfessor' );
    }

    /**
     *  Informa quais são as Turmas do Professor
     *
     * @param Turma[] $arrTurmas
     * @return Professor
     */
    public function setTurmas( array $arrTurmas )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrTurmas , 'TurmasDoProfessor' );
    }

    /**
     * Adiciona uma nova Turma ao Professor
     *
     * @param Turma $objTurma
     * @return Professor
     */
    public function addTurma( Turma $objTurma , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objTurma , $booUseCache , 'TurmasDoProfessor' );
    }

    /**
     * Remove uma Turma do Professor
     * @param Turma $objTurma
     * @return Professor
     */
    public function removeTurma( Turma $objTurma )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objTurma , $booUseCache , 'TurmasDoProfessor' );
    }


    /**
     * Obtem os Niveis do Professor
     *
     * @return Nivel[]
     */
    public function getNiveis( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'NiveisDoProfessor' );
    }

    /**
     * Obtem a quantidade de Niveis do Professor
     *
     * @return integer
     */
    public function getQtdNiveis( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'NiveisDoProfessor' );
    }

    /**
     *  Informa quais são os Niveis do Professor
     *
     * @param Nivel[] $arrNiveis
     * @return Professor
     */
    public function setNiveis( array $arrNiveis )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrNiveis , 'NiveisDoProfessor' );
    }

    /**
     * Adiciona um novo Nivel ao Professor
     *
     * @param Nivel $objNivel
     * @return Professor
     */
    public function addNivel( Nivel $objNivel , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objNivel , $booUseCache , 'NiveisDoProfessor' );
    }

    /**
     * Remove um Nivel do Professor
     * @param Nivel $objNivel
     * @return Professor
     */
    public function removeNivel( Nivel $objNivel )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objNivel , $booUseCache , 'NiveisDoProfessor' );
    }

    /**
     * Informa o id do Usuario
     *
     * @param integer $intIdUsuario
     * @return Professor
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
     * @return Professor
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