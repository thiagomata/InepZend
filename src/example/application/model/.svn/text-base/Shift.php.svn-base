<?php
namespace Example\Model;

/**
 * Shift Entity Class
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 07/06/2011
 * @table tb_shift
 */
class Shift extends \Local\Model\Entity
{
    /**
     * Entity Id
     *
     * @column id_shift
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Shift Name
     *
     * @setter setName
     * @getter getName
     * @column na_shift
     * @maxlength 100
     * @var string
     */
    protected $strName;

    /**
     * Shift Start Time
     *
     * @column time_start
     * @setter setStartTime
     * @getter getStartTime
     * @var string
     */
    protected $strStartTime;

    /**
     * End Time do Shift
     *
     * @column time_end
     * @setter setEndTime
     * @getter getEndTime
     * @var string
     */
    protected $strEndTime;

    /**
     * Shift Groups
     *
     * @relationship Groups
     * @OneToMany intIdShift
     * @var Group[]
     */
    protected $arrGroups;

    /**
     * Set Shift Name
     *
     * @param string $strName
     * @return Shift
     */
    public function setName( $strName )
    {
        $this->strName = $strName;
        return $this;
    }

    /**
     * Get Shift Name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->strName;
    }

    /**
     * Set Shift Start Time
     *
     * @param string $strStartTime
     * @return Shift
     */
    public function setStartTime( $strStartTime )
    {
        $this->strStartTime = $strStartTime;
        return $this;
    }

    /**
     * Get Shift Start Time
     *
     * @return string
     */
    public function getStartTime()
    {
        return $this->strStartTime;
    }
    
    /**
     * Set Shift End Time
     *
     * @param string $strEndTime
     * @return Shift
     */
    public function setEndTime( $strEndTime )
    {
        $this->strEndTime = $strEndTime;
        return $this;
    }

    /**
     * Get Shift End Time
     *
     * @return string
     */
    public function getEndTime()
    {
        return $this->strEndTime;
    }

    /**
     * Get Shift Groups
     *
     * @return Group[]
     */
    public function getGroups( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Groups' );
    }

    /**
     * Get Shift Groups Size
     *
     * @return integer
     */
    public function getQtdGroups( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Groups' );
    }

    /**
     * Set Shift Groups
     *
     * @param Group[] $arrGroups
     * @return Shift
     */
    public function setGroups( array $arrGroups )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrGroups , 'Groups' );
    }

    /**
     * Add Group to the Shift Groups
     *
     * @param Group $objGroup
     * @return Shift
     */
    public function addGroup( Group $objGroup , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objGroup , $booUseCache , 'Groups' );
    }

    /**
     * Remove Group from the Shift Groups
     * 
     * @param Group $objGroup
     * @return Shift
     */
    public function removeGroup( Group $objGroup )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objGroup , $booUseCache , 'Groups' );
    }
}
?>