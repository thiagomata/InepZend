<?php
namespace Example\Model;

/**
 * Group Entity Class
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 07/06/2011
 * @table tb_group
 */
class Group extends \Local\Model\Entity
{
    /**
     *
     * Entity Id
     *
     * @column id_group
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Group Classroom Id
     *
     * @column id_classroom
     * @setter setIdClassroom
     * @getter getIdClassroom
     * @entity objClassroom
     * @var integer
     */
    protected $intIdClassroom;

    /**
     * Group Classroom
     *
     * @setter setClassroom
     * @getter getClassroom
     * @id intIdClassroom
     * @throws NotFound
     * @var Classroom
     */
    protected $objClassroom;

    /**
     * Group Level Id
     *
     * @column id_level
     * @setter setIdLevel
     * @getter getIdLevel
     * @entity objLevel
     * @var integer
     */
    protected $intIdLevel;

    /**
     * Group Level
     *
     * @setter setLevel
     * @getter getLevel
     * @id intIdLevel
     * @throws NotFound
     * @var Level
     */
    protected $objLevel;

    /**
     * Group Shift Id
     *
     * @column id_shift
     * @setter setIdShift
     * @getter getIdShift
     * @entity objShift
     * @var integer
     */
    protected $intIdShift;

    /**
     * Shift da Group
     *
     * @setter setShift
     * @getter getShift
     * @id intIdShift
     * @throws NotFound
     * @var Shift
     */
    protected $objShift;

    /**
     * Group Knowledge Area Id
     *
     * @column id_knowledge_area
     * @setter setIdKnowledgeArea
     * @getter getIdKnowledgeArea
     * @entity objKnowledgeArea
     * @var integer
     */
    protected $intIdKnowledgeArea;

    /**
     * Group Knowledge Area Object
     *
     * @setter setKnowledgeArea
     * @getter getKnowledgeArea
     * @id intIdKnowledgeArea
     * @throws NotFound
     * @var KnowledgeArea
     */
    protected $objKnowledgeArea;

    /**
     * Group Teachers
     *
     * @relationship Teachers
     * @ManyToMany tb_Group_has_teacher
     * @localId id_group
     * @externalId id_teacher
     * @var Teacher[]
     */
    protected $arrTeachers;

    /**
     * Group Registrations
     *
     * @relationship Registrations
     * @OneToMany Registration::intIdGroup
     * @var Registration[]
     */
    protected $arrRegistrations;


    /**
     * Get Group Teachers
     *
     * @return Teacher[]
     */
    public function getTeachers( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Teachers' );
    }

    /**
     * Get Group Teachers Size
     *
     * @return integer
     */
    public function getQtdTeachers( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Teachers' );
    }

    /**
     * Set Group Teachers
     *
     * @param Teacher[] $arrTeachers
     * @return Group
     */
    public function setTeachers( array $arrTeachers )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrTeachers , 'Teachers' );
    }

    /**
     * Add a new Teacher to the Group Teachers
     *
     * @param Teacher $objTeacher
     * @return Group
     */
    public function addTeacher( Teacher $objTeacher , $booUseCache = true )
    {
        return $this->addRelationalEntity( __METHOD__ , $objTeacher , $booUseCache , 'Teachers' );
    }

    /**
     * Remove a Teacher from the Group Teachers
     *
     * @param Teacher $objTeacher
     * @return Group
     */
    public function removeTeachers( Teacher $objTeacher , $booUseCache = true )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objTeacher , $booUseCache , 'Teachers' );
    }

    /**
     * Get Group Registrations
     *
     * @return Registration[]
     */
    public function getRegistrations( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Registrations' );
    }

    /**
     * Get Group Registrations Size
     *
     * @return integer
     */
    public function getQtdRegistrations( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Registrations' );
    }

    /**
     * Set Group Registrations
     *
     * @param Registration[] $arrRegistrationsRegistrationas
     * @return Group
     */
    public function setRegistrations( array $arrRegistrations )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrRegistrations , 'Registrations' );
    }

    /**
     * Add a new Registrations to the Group Registrations
     *
     * @param Registration $objRegistration
     * @return Group
     */
    public function addRegistration( Registration $objRegistration , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objRegistration , $booUseCache , 'Registrations' );
    }

    /**
     * Remove some Registration from the Group Registrations
     * 
     * @param Registration $objRegistration
     * @return Group
     */
    public function removeRegistration( Registration $objRegistration )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objRegistration , $booUseCache , 'Registrations' );
    }

    /**
     * Set Group Classroom Id
     *
     * @param integer $intIdClassroom
     * @return Group
     */
    public function setIdClassroom( $intIdClassroom )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdClassroom );
    }

    /**
     * Get Group Classroom Id
     *
     * @return integer
     */
    public function getIdClassroom()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Set Group Classroom Object
     *
     * @param Classroom $objClassroom
     * @return Group
     */
    public function setClassroom( Classroom $objClassroom )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objClassroom );
    }

    /**
     * Get Group Classroom Object
     *
     * @return Classroom
     */
    public function getClassroom()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }

    /**
     * Set Group Level Id
     *
     * @param integer $intIdLevel
     * @return Group
     */
    public function setIdLevel( $intIdLevel )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdLevel );
    }

    /**
     * Get Group Level Id
     *
     * @return integer
     */
    public function getIdLevel()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Set Group Level Object
     *
     * @param Level $objLevel
     * @return Group
     */
    public function setLevel( Level $objLevel )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objLevel );
    }

    /**
     * Get Group Level Object
     *
     * @return Level
     */
    public function getLevel()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }

    /**
     * Set Group Shift Id
     *
     * @param integer $intIdShift
     * @return Group
     */
    public function setIdShift( $intIdShift )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdShift );
    }

    /**
     * Get Group Shift Id
     *
     * @return integer
     */
    public function getIdShift()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Set Group Shift Object
     *
     * @param Shift $objShift
     * @return Group
     */
    public function setShift( Shift $objShift )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objShift );
    }

    /**
     * Get Group Shift Object
     *
     * @return Shift
     */
    public function getShift()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }

    /**
     * Set Group Knowledge Area Id
     *
     * @param integer $intIdKnowledgeArea
     * @return Group
     */
    public function setIdKnowledgeArea( $intIdKnowledgeArea )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdKnowledgeArea );
    }

    /**
     * Get Group Knowledge Area Id
     *
     * @return integer
     */
    public function getIdKnowledgeArea()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Set Group Knowledge Area Object
     *
     * @param KnowledgeArea $objKnowledgeArea
     * @return Group
     */
    public function setKnowledgeArea( KnowledgeArea $objKnowledgeArea )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objKnowledgeArea );
    }

    /**
     * Get Group Knowledge Area Object
     *
     * @return KnowledgeArea
     */
    public function getKnowledgeArea()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }
}
?>