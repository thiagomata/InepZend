<?php
namespace Example\Model;

/**
 * Knowledge Area Entity Class
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 07/06/2011
 * @table tb_knoledge_area
 */
class KnowledgeArea extends \Local\Model\Entity
{
    /**
     *
     * Entity Id
     *
     * @column id_knowledge_area
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Knowledge Area Name
     *
     * @setter setName
     * @getter getName
     * @column na_knowledge_area
     * @maxlength 100
     * @var string
     */
    protected $strName;

    /**
     * Knowledge Area Teachers 
     *
     * @relationship Teachers
     * @ManyToMany tb_teacher_has_knowledge_area
     * @localId id_knowledge_area
     * @externalId id_teacher
     * @var Teacher[]
     */
    protected $arrTeachers;

    /**
     * Set Knowledge Area Name
     *
     * @param string $strName
     * @return KnowledgeArea
     */
    public function setName( $strName )
    {
        $this->strName = $strName;
        return $this;
    }

    /**
     * Get Knowledge Area Name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->strName;
    }
    
    /**
     * Get Knowledge Area Teachers
     *
     * @return Teacher[]
     */
    public function getTeachers( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Teachers' );
    }

    /**
     * Get Knowledge Area Teachers Size
     *
     * @return integer
     */
    public function getQtdTeachers( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Teachers' );
    }

    /**
     * Set the Teachers of this Knowledge Area
     *
     * @param Teacher[] $arrTeachers
     * @return KnowledgeArea
     */
    public function setTeachers( array $arrTeachers )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrTeachers , 'Teachers' );
    }

    /**
     * Add one Teacher into this Knowledge Area
     *
     * @param Teacher $objTeacher
     * @return KnowledgeArea
     */
    public function addTeacher( Teacher $objTeacher , $booUseCache = true )
    {
        return $this->addRelationalEntity( __METHOD__ , $objTeacher , $booUseCache , 'Teachers' );
    }

    /**
     * Remove one Teacher of this knowledge Area
     * 
     * @param Teacher $objTeacher
     * @return KnowledgeArea
     */
    public function removeTeacher( Teacher $objTeacher , $booUseCache = true )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objTeacher , $booUseCache , 'Teachers' );
    }
}
?>