<?php
namespace Example\Model;

/**
 * Level Entity Class
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 06/07/2011
 * @table tb_level
 */
class Level extends \Local\Model\Entity
{
    /**
     * Level Name
     *
     * @setter setName
     * @getter getName
     * @column na_level
     * @maxlength 45
     * @var string
     */
    protected $strName;

    /**
     * Entity Id
     *
     * @column id_level
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Level Teachers
     *
     * @relationship Teachers
     * @OneToMany Teacher::intIdLevel
     * @var Teacher[]
     */
    protected $arrTeachers;

    /**
     * Level Groups
     *
     * @relationship Groups
     * @OneToMany Group::intIdLevel
     * @var Group[]
     */
    protected $arrGroups;

    /**
     * Set Level Name
     *
     * @param string $strName
     * @return Level
     */
    public function setName( $strName )
    {
        $this->strName = $strName;
        return $this;
    }

    /**
     * Get Level Name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->strName;
    }

    /**
     * Get Level Groups
     *
     * @return Group[]
     */
    public function getGroups( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Groups' );
    }

    /**
     * Get Level Groups Size
     *
     * @return integer
     */
    public function getQtdGroups( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Groups' );
    }

    /**
     *  Set Level Groups
     *
     * @param Group[] $arrGroups
     * @return Level
     */
    public function setGroups( array $arrGroups )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrGroups , 'Groups' );
    }

    /**
     * add Group to Level Groups
     *
     * @param Group $objGroup
     * @return Level
     */
    public function addGroup( Group $objGroup , $booUseCache = true )
    {
        return $this->addRelationalEntity( __METHOD__ , $objGroup , $booUseCache , 'Groups' );
    }

    /**
     * remove Group from the Level Groups
     *
     * @param Group $objGroup
     * @return Level
     */
    public function removeGroup( Group $objGroup , $booUseCache = true )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objGroup , $booUseCache , 'Groups' );
    }
    
    /**
     * Get Level Teachers
     *
     * @return Teacher[]
     */
    public function getTeachers( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Teachers' );
    }

    /**
     * Get Level Teachers Size
     *
     * @return integer
     */
    public function getQtdTeachers( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Teachers' );
    }

    /**
     *  Get Level Teachers
     *
     * @param Teacher[] $arrTeachers
     * @return Level
     */
    public function setTeachers( array $arrTeachers )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrTeachers , 'Teachers' );
    }

    /**
     * Add Teacher to the Level Teachers
     *
     * @param Teacher $objTeacher
     * @return Level
     */
    public function addTeacher( Teacher $objTeacher , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objTeacher , $booUseCache , 'Teachers' );
    }

    /**
     * Remove Teacher from the Level Teachers
     * 
     * @param Teacher $objTeacher
     * @return Level
     */
    public function removeTeacher( Teacher $objTeacher )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objTeacher , $booUseCache , 'Teachers' );
    }
}
?>