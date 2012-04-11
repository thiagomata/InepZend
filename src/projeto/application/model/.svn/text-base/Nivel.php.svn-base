<?php
namespace Projeto\Model;

/**
 * Classe da Entidade Nivel
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 08/12/2010
 * @table tb_nivel
 */
class Nivel extends \Local\Model\Entity
{
    /**
     * Nome do Nivel
     *
     * @setter setNome
     * @getter getNome
     * @column no_nivel
     * @maxlength 45
     * @var string
     */
    protected $strNome;

    /**
     *
     * Id da Entidade
     *
     * @column id_nivel
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Professores do Nivel
     *
     * @relationship Professores
     * @OneToMany Professor::intIdNivel
     * @var Professor[]
     */
    protected $arrProfessores;

    /**
     * Turmas do Nivel
     *
     * @relationship Turmas
     * @OneToMany Turma::intIdNivel
     * @var Turma[]
     */
    protected $arrTurmas;

    /**
     * Informa o nome do Nivel
     *
     * @param string $strNome
     * @return Nivel
     */
    public function setNome( $strNome )
    {
        $this->strNome = $strNome;
        return $this;
    }

    /**
     * Obtem o nome do Nivel
     * 
     * @return string
     */
    public function getNome()
    {
        return $this->strNome;
    }

    /**
     * Obtem os Turmas do Nivel
     *
     * @return Turma[]
     */
    public function getTurmas( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Turmas' );
    }

    /**
     * Obtem a quantidade de Turmas do Nivel
     *
     * @return integer
     */
    public function getQtdTurmas( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Turmas' );
    }

    /**
     *  Informa quais são os Turmas do Nivel
     *
     * @param Turma[] $arrTurmas
     * @return Nivel
     */
    public function setTurmas( array $arrTurmas )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrTurmas , 'Turmas' );
    }

    /**
     * Adiciona um novo Turma ao Nivel
     *
     * @param Turma $objTurma
     * @return Nivel
     */
    public function addTurma( Turma $objTurma , $booUseCache = true )
    {
        return $this->addRelationalEntity( __METHOD__ , $objTurma , $booUseCache , 'Turmas' );
    }

    /**
     * Remove um Turma do Nivel
     * @param Turma $objTurma
     * @return Nivel
     */
    public function removeTurma( Turma $objTurma , $booUseCache = true )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objTurma , $booUseCache , 'Turmas' );
    }
    
    /**
     * Obtem os Professores do Nivel
     *
     * @return Professor[]
     */
    public function getProfessores( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Professores' );
    }

    /**
     * Obtem a quantidade de Professores do Nivel
     *
     * @return integer
     */
    public function getQtdProfessores( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Professores' );
    }

    /**
     *  Informa quais são os Professores do Nivel
     *
     * @param Professor[] $arrProfessores
     * @return Nivel
     */
    public function setProfessores( array $arrProfessores )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrProfessores , 'Professores' );
    }

    /**
     * Adiciona um novo Professor ao Nivel
     *
     * @param Professor $objProfessor
     * @return Nivel
     */
    public function addProfessor( Professor $objProfessor , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objProfessor , $booUseCache , 'Professores' );
    }

    /**
     * Remove um Professor do Nivel
     * @param Professor $objProfessor
     * @return Nivel
     */
    public function removeProfessor( Professor $objProfessor )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objProfessor , $booUseCache , 'Professores' );
    }
}
?>