<?php
namespace Example\Model;

/**
 * State Entity Class
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 06/07/2011
 * @table tb_state
 */
class State extends \Local\Model\Entity
{
    /**
     * State Acronym
     *
     * @label Acronym
     * @column txt_acronym
     * @setter setAcronym
     * @getter getAcronym
     * @maxlength 2
     * @required
     * @var string
     */
    protected $strAcronym;

    /**
     * State Name 
     *
     * @label Name
     * @setter setName
     * @getter getName
     * @column na_state
     * @maxlength 100
     * @required
     * @var string
     */
    protected $strName;

    /**
     * Entity Id
     *
     * @column id_state
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * State Cities
     *
     * @relationship Cities
     * @OneToMany intIdState
     * @var City[]
     */
    protected $arrCities;

    /**
     * Set State Name
     *
     * @param string $strName
     * @return State
     */
    public function setName( $strName )
    {
        $this->strName = $strName;
        return $this;
    }

    /**
     * Get State Name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->strName;
    }

    /**
     * Set State Acronym
     *
     * @param string $strAcronym
     * @return State
     */
    public function setAcronym( $strAcronym )
    {
        $this->strAcronym = $strAcronym;
        return $this;
    }

    /**
     * Get State Acronym
     *
     * @return string
     */
    public function getAcronym()
    {
        return $this->strAcronym;
    }

    /**
     * Get State Cities
     *
     * @return City[]
     */
    public function getCities( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Cities' );
    }

    /**
     * Get State Cities Count
     *
     * @return integer
     */
    public function getQtdCities( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Cities' );
    }

    /**
     * Set State Cities
     *
     * @param City[] $arrCities
     * @return State
     */
    public function setCities( array $arrCities )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrCities , 'Cities' );
    }

    /**
     * Add State City
     *
     * @param City $objCity
     * @return State
     */
    public function addCity( City $objCity , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objCity , $booUseCache , 'Cities' );
    }

    /**
     * Remove State City
     *
     * @param City $objCity
     * @return State
     */
    public function removeCity( City $objCity )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objCity , $booUseCache , 'Cities' );
    }
}
?>