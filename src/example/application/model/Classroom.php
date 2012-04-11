<?php
namespace Example\Model;

/**
 * Classroom Entity Class
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 07/06/2011
 * @table tb_classroom
 */
class Classroom extends \Local\Model\Entity
{
    /**
     *
     * Id da Entidade
     *
     * @column id_classroom
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Classroom Name
     *
     * @setter setName
     * @getter getName
     * @column na_classroom
     * @maxlength 100
     * @var string
     */
    protected $strName;

    /**
     * Number of Seats
     *
     * @column int_qtd_seats
     * @setter setQtdSeats
     * @getter getQtdSeats
     * @var integer
     */
    protected $intQtdSeats;

    /**
     * Classroom School Id
     *
     * @column id_school
     * @setter setIdSchool
     * @getter getIdSchool
     * @entity objSchool
     * @var integer
     */
    protected $intIdSchool;

    /**
     * Classroom School Object
     *
     * @setter setSchool
     * @getter getSchool
     * @id intIdSchool
     * @throws NotFound
     * @var School
     */
    protected $objSchool;

    /**
     * Classroom Groups
     *
     * @relationship Groups
     * @OneToMany intIdClassroom
     * @var Group[]
     */
    protected $arrGroups;

    /**
     * Set Classroom Name
     *
     * @param string $strName
     * @return Classroom
     */
    public function setName( $strName )
    {
        $this->strName = $strName;
        return $this;
    }

    /**
     * Get Classroom Name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->strName;
    }

    /**
     * Set the Number of seats in the classroom
     *
     * @param string $intQtdSeats
     * @return Classroom
     */
    public function setQtdSeats( $intQtdSeats )
    {
        $this->intQtdSeats = $intQtdSeats;
        return $this;
    }

    /**
     * Get the Number of seats in the classroom
     *
     * @return string
     */
    public function getQtdClassrooms()
    {
        return $this->intQtdSeats;
    }
    
    /**
     * Get Classroom Groups
     *
     * @return Group[]
     */
    public function getGroups( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Groups' );
    }

    /**
     * Get the number of groups in the classroom
     *
     * @return integer
     */
    public function getQtdGroups( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Groups' );
    }

    /**
     * Set the Classroom Groups
     *
     * @param Group[] $arrGroupsGroupas
     * @return Classroom
     */
    public function setGroups( array $arrGroupsGroupas )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrGroupsGroupas , 'Groups' );
    }

    /**
     * Add a Group to the Classroom
     *
     * @param Group $objGroup
     * @return Classroom
     */
    public function addGroup( Group $objGroup , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objGroup , $booUseCache , 'Groups' );
    }

    /**
     * Remove a Group from the Classroom
     * @param Group $objGroup
     * @return Classroom
     */
    public function removeGroup( Group $objGroup )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objGroup , $booUseCache , 'Groups' );
    }

    /**
     * Set Classroom School Id
     *
     * @param integer $intIdSchool
     * @return Classroom
     */
    public function setIdSchool( $intIdSchool )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdSchool );
    }

    /**
     * Get Classroom School Id
     *
     * @return integer
     */
    public function getIdSchool()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Set Classroom School Object
     *
     * @param School $objSchool
     * @return Classroom
     */
    public function setSchool( School $objSchool )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objSchool );
    }

    /**
     * Get Classroom School Object
     *
     * @return School
     */
    public function getSchool()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }
}
?>