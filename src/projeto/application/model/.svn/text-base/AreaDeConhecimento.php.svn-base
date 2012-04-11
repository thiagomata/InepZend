<?php
namespace Projeto\Model;

/**
 * Classe da Entidade Area de Conhecimento
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 09/12/2010
 * @table tb_area_conhecimento
 */
class AreaDeConhecimento extends \Local\Model\Entity
{
    /**
     *
     * Id da Entidade
     *
     * @column id_area_conhecimento
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Nome da Area de Conhecimento
     *
     * @setter setNome
     * @getter getNome
     * @column no_area_conhecimento
     * @maxlength 100
     * @var string
     */
    protected $strNome;

    /**
     * Professores da Area de Conhecimento
     *
     * @relationship professores
     * @ManyToMany tb_professor_tem_area_conhecimento
     * @localId id_area_conhecimento
     * @externalId id_professor
     * @var Professor[]
     */
    protected $arrProfessores;

    /**
     * Informa o nome da Area de Conhecimento
     *
     * @param string $strNome
     * @return AreaDeConhecimento
     */
    public function setNome( $strNome )
    {
        $this->strNome = $strNome;
        return $this;
    }

    /**
     * Obtem o nome da Area de Conhecimento
     * 
     * @return string
     */
    public function getNome()
    {
        return $this->strNome;
    }
    /**
     * Obtem os Professores da Area de Conhecimento
     *
     * @return Professor[]
     */
    public function getProfessores( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'professores' );
    }

    /**
     * Obtem a quantidade de Professores da Area de Conhecimento
     *
     * @return integer
     */
    public function getQtdProfessores( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'professores' );
    }

    /**
     *  Informa quais são os Professores da Area de Conhecimento
     *
     * @param Professor[] $arrProfessores
     * @return AreaDeConhecimento
     */
    public function setProfessores( array $arrProfessores )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrProfessores , 'professores' );
    }

    /**
     * Adiciona um novo Professor a Area de Conhecimento
     *
     * @param Professor $objProfessor
     * @return AreaDeConhecimento
     */
    public function addProfessor( Professor $objProfessor , $booUseCache = true )
    {
        return $this->addRelationalEntity( __METHOD__ , $objProfessor , $booUseCache , 'professores' );
    }

    /**
     * Remove um Professor da Area de Conhecimento
     * 
     * @param Professor $objProfessor
     * @return AreaDeConhecimento
     */
    public function removeProfessor( Professor $objProfessor , $booUseCache = true )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objProfessor , $booUseCache , 'professores' );
    }
    

}
?>