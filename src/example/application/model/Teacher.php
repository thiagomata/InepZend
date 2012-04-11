<?php
namespace Example\Model;

/**
 * Teacher Entity Class
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 07/06/2011
 * @table tb_teacher
 */
class Teacher extends \Local\Model\Entity
{
    /**
     * Entity Id
     *
     * @column id_teacher
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Teacher Name
     *
     * @setter setName
     * @getter getName
     * @column na_teacher
     * @maxlength 100
     * @var string
     */
    protected $strName;

    /**
     * Teacher User Id
     *
     * @column id_user
     * @setter setIdUser
     * @getter getIdUser
     * @entity objUser
     * @var integer
     */
    protected $intIdUser;

    /**
     * Teacher User Object
     *
     * @setter setUser
     * @getter getUser
     * @id intIdUser
     * @throws NotFound
     * @var User
     */
    protected $objUser;

    /**
     * Teacher Knowledge Areas
     *
     * @relationship KnowledgeAreas
     * @ManyToMany tb_teacher_has_knowledge_area
     * @localId id_teacher
     * @externalId id_knowledge_area
     * @var KnowledgeArea[]
     */
    protected $arrKnowledgeAreas;

    /**
     * Teacher Groups
     *
     * @relationship TeacherGroups
     * @ManyToMany tb_group_has_teacher
     * @localId id_teacher
     * @externalId id_group
     * @var Group[]
     */
    protected $arrGroups;

    /**
     * Levels do Teacher
     *
     * @relationship TeacherLevels
     * @ManyToMany tb_teacher_has_level
     * @localId id_teacher
     * @externalId id_level
     * @var Level[]
     */
    protected $arrLevels;

    /**
     * Set Teacher Name
     *
     * @param string $strName
     * @return Teacher
     */
    public function setName( $strName )
    {
        $this->getUser()->setName( $strName );
        return $this;
    }

    /**
     * Get Teacher Name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->getUser()->getName();
    }
    
    /**
     * Get Teacher Knowledge Areas
     *
     * @return KnowledgeArea[]
     */
    public function getKnowledgeAreas( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'KnowledgeAreas' );
    }

    /**
     *  Get quantity of Teacher Knowledge Areas
     *
     * @return integer
     */
    public function getQtdKnowledgeAreas( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'KnowledgeAreas' );
    }

    /**
     * Set Teacher Knowledge Areas 
     *
     * @param KnowledgeArea[] $arrKnowledgeAreas
     * @return Teacher
     */
    public function setKnowledgeAreas( array $arrKnowledgeAreas )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrKnowledgeAreas , 'KnowledgeAreas' );
    }

    /**
     * Add some Knowledge Area to the Teacher Knowledge Areas 
     *
     * @param KnowledgeArea $objKnowledgeArea
     * @return Teacher
     */
    public function addKnowledgeArea( KnowledgeArea $objKnowledgeArea , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objKnowledgeArea , $booUseCache , 'KnowledgeAreas' );
    }

    /**
     * Remove some Knowledge Area from the Teacher Knowledge Areas
     *
     * @param KnowledgeArea $objKnowledgeArea
     * @return Teacher
     */
    public function removeKnowledgeArea( KnowledgeArea $objKnowledgeArea )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objKnowledgeArea , $booUseCache , 'KnowledgeAreas' );
    }

    /**
     * Get Teacher Groups
     *
     * @return Group[]
     */
    public function getGroups( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'TeacherGroups' );
    }

    /**
     * Get quantity of Teacher Groups
     *
     * @return integer
     */
    public function getQtdGroups( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'TeacherGroups' );
    }

    /**
     * Set Teacher Groups
     *
     * @param Group[] $arrGroups
     * @return Teacher
     */
    public function setGroups( array $arrGroups )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrGroups , 'TeacherGroups' );
    }

    /**
     * Add a Group to the Teacher Groups
     *
     * @param Group $objGroup
     * @return Teacher
     */
    public function addGroup( Group $objGroup , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objGroup , $booUseCache , 'TeacherGroups' );
    }

    /**
     * Remove a Group from the Teacher Groups
     * 
     * @param Group $objGroup
     * @return Teacher
     */
    public function removeGroup( Group $objGroup )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objGroup , $booUseCache , 'TeacherGroups' );
    }

    /**
     * Get Teacher Levels
     *
     * @return Level[]
     */
    public function getLevels( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'TeacherLevels' );
    }

    /**
     * Get Quantity of Teacher Levels
     *
     * @return integer
     */
    public function getQtdLevels( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'TeacherLevels' );
    }

    /**
     * Set Teacher Levels
     *
     * @param Level[] $arrLevels
     * @return Teacher
     */
    public function setLevels( array $arrLevels )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrLevels , 'TeacherLevels' );
    }

    /**
     * Add a Level to the Teacher Levels
     *
     * @param Level $objLevel
     * @return Teacher
     */
    public function addLevel( Level $objLevel , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objLevel , $booUseCache , 'TeacherLevels' );
    }

    /**
     * Remove a Level from the Teacher Levels
     *
     * @param Level $objLevel
     * @return Teacher
     */
    public function removeLevel( Level $objLevel )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objLevel , $booUseCache , 'TeacherLevels' );
    }

    /**
     * Set Teacher User Id
     *
     * @param integer $intIdUser
     * @return Teacher
     */
    public function setIdUser( $intIdUser )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdUser );
    }

    /**
     * Get Teacher User Id
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Set Teacher User Object
     *
     * @param User $objUser
     * @return Teacher
     */
    public function setUser( User $objUser )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objUser );
    }

    /**
     * Get Teacher User Object
     *
     * @return User
     */
    public function getUser()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }
}
?>