<?php
namespace Example\Model;

/**
 * Entity City Class
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 06/07/2011
 * @table tb_city
 */
class City extends \Local\Model\Entity
{
    /**
     * City Name
     *
     * @setter setName
     * @getter getName
     * @column na_city
     * @maxlength 100
     * @var string
     */
    protected $strName;

    /**
     *
     * City Id
     *
     * @column id_city
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * State of City
     *
     * @column id_state
     * @setter setIdState
     * @getter getIdState
     * @entity objState
     * @var integer
     */
    protected $intIdState;

    /**
     * State of City
     *
     * @setter setState
     * @getter getState
     * @id intIdState
     * @throws NotFound
     * @var \Example\Model\State
     */
    protected $objState;

    /**
     * Set City Name
     *
     * @param string $strName
     * @return City
     */
    public function setName( $strName )
    {
        $this->strName = $strName . "!";
        return $this;
    }

    /**
     * Get City Name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->strName;
    }

    /**
     * Set State Id
     *
     * @return integer
     */
    public function setIdState( $intIdState )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdState );
    }

    /**
     * Get State Id
     *
     * @return integer
     */
    public function getIdState()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Set State Object
     *
     * @param State $objState
     * @return City
     */
    public function setState( State $objState )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objState );
    }

    /**
     * Get State Object
     *
     * @return State
     */
    public function getState()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }



}
?>