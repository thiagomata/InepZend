<?php
namespace Example\Model;

/**
 * Address Entity Class
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 06/07/2011
 * @table tb_address
 */
class Address extends \Local\Model\Entity
{
    /**
     *
     * Entity Id
     *
     * @column id_address
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Zip Code
     *
     * @column txt_zip
     * @setter setZip
     * @getter getZip
     * @maxlength 30
     * @var string
     */
    protected $strZip;

    /**
     * Address Number 
     *
     * @setter setNumber
     * @getter getNumber
     * @column txt_number
     * @maxlength 30
     * @var string
     */
    protected $strNumber;

    /**
     * Address Description
     *
     * @setter setDescription
     * @getter getDescription
     * @column txt_description
     * @maxlength 100
     * @var string
     */
    protected $strDescription;

    /**
     * Address City Id
     *
     * @column id_City
     * @setter setIdCity
     * @getter getIdCity
     * @entity objCity
     * @var integer
     */
    protected $intIdCity;

    /**
     * Address City Object
     *
     * @setter setCity
     * @getter getCity
     * @id intIdCity
     * @throws NotFound
     * @var Example\Model\City
     */
    protected $objCity;

    /**
     * Address Residents
     *
     * @relationship Residents
     * @OneToMany User::intIdAddress
     * @var User[]
     */
    protected $arrUsers;

    /**
     * Set the Address Number
     *
     * @param string $strNumber
     * @return Address
     */
    public function setNumber( $strNumber )
    {
        $this->strNumber = $strNumber;
        return $this;
    }

    /**
     * Get the Address Number
     * 
     * @return string
     */
    public function getNumber()
    {
        return $this->strNumber;
    }

    /**
     * Set the Adrress Zip Number
     *
     * @param string $strZip
     * @return Address
     */
    public function setZip( $strZip )
    {
        $this->strZip = $strZip;
        return $this;
    }

    /**
     * Get the Address Zip Number
     *
     * @return string
     */
    public function getZip()
    {
        return $this->strZip;
    }

    /**
     * Get the Users of This Address
     *
     * @return User[]
     */
    public function getUsers( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'administrar' );
    }

    /**
     * Get the Count Number of Users of This Address
     *
     * @return integer
     */
    public function getQtdUsers( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'administrar' );
    }

    /**
     * Set what users are from this Address
     *
     * @param User[] $arrUsers
     * @return Address
     */
    public function setUsers( array $arrUsers )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrUsers , 'administrar' );
    }

    /**
     * Add a New User into this Address
     *
     * @param User $objUser
     * @return Address
     */
    public function addUser( User $objUser , $booUseCache = true )
    {
        return $this->addRelationalEntity( __METHOD__ , $objUser , $booUseCache , 'administrar' );
    }

    /**
     * Remove one User from this Address
     * 
     * @param User $objUser
     * @return Address
     */
    public function removeUsers( User $objUser , $booUseCache = true )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objUser , $booUseCache , 'administrar' );
    }
    
    /**
     * Set The City Adress Id
     *
     * @param integer $intIdCity
     * @return Address
     */
    public function setIdCity( $intIdCity )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdCity );
    }

    /**
     * Get The City Adress Id
     *
     * @return integer
     */
    public function getIdCity()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Set The City Address Object
     *
     * @param City $objCity
     * @return Address
     */
    public function setCity( City $objCity )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objCity );
    }

    /**
     * Get The City Address Object
     *
     * @return User
     */
    public function getCity()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }
}
?>