<?php
namespace Example\Model;

/**
 * School Entity Class
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 06/07/2011
 * @table tb_school
 */
class School extends \Local\Model\Entity
{
    /**
     *
     * School Id
     *
     * @column id_school
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * School Name
     *
     * @setter setName
     * @getter getName
     * @column na_school
     * @maxlength 100
     * @var string
     */
    protected $strName;

    /**
     * School Address Id
     *
     * @column id_address
     * @setter setIdAddress
     * @getter getIdAddress
     * @entity objAddress
     * @var integer
     */
    protected $intIdAddress;

    /**
     * School Address
     *
     * @setter setAddress
     * @getter getAddress
     * @id intIdAddress
     * @throws NotFound
     * @var Address
     */
    protected $objAddress;

    /**
     * School Classrooms
     *
     * @relationship Classrooms
     * @OneToMany Classroom::intIdSchool
     * @var Classroom[]
     */
    protected $arrClassrooms;

    /**
     * Set School Name 
     *
     * @param string $strName
     * @return School
     */
    public function setName( $strName )
    {
        $this->strName = $strName;
        return $this;
    }

    /**
     * Get School Name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->strName;
    }

    /**
     * Get School Classrooms
     *
     * @return Classroom[]
     */
    public function getClassrooms( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Classrooms' );
    }

    /**
     * Get Count of School Classrooms
     *
     * @return integer
     */
    public function getQtdClassrooms( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Classrooms' );
    }

    /**
     *  Set the School Classrooms
     *
     * @param Classroom[] $arrClassroomsClassroomas
     * @return School
     */
    public function setClassrooms( array $arrClassrooms )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrClassrooms , 'Classrooms' );
    }

    /**
     * Add a School Classroom in the School
     *
     * @param Classroom $objClassroom
     * @return School
     */
    public function addClassroom( Classroom $objClassroom , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objClassroom , $booUseCache , 'Classrooms' );
    }

    /**
     * Remove a School Classroom from the School
     * 
     * @param Classroom $objClassroom
     * @return School
     */
    public function removeClassroom( Classroom $objClassroom )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objClassroom , $booUseCache , 'Classrooms' );
    }

    /**
     * Set the Address School Id
     *
     * @param integer $intIdAddress
     * @return School
     */
    public function setIdAddress( $intIdAddress )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdAddress );
    }

    /**
     * Get the Adress School Id
     *
     * @return integer
     */
    public function getIdAddress()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Set the Address School Object
     *
     * @param Address $objAddress
     * @return School
     */
    public function setAddress( Address $objAddress )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objAddress );
    }

    /**
     * Get the Address School Object
     *
     * @return Classroom
     */
    public function getAddress()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }
}
?>