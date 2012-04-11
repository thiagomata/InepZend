<?php
namespace Example\Model;

/**
 * Registration Entity Class
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 07/06/2011
 * @table tb_registration
 */
class Registration extends \Local\Model\Entity
{
    /**
     * Entity Id
     *
     * @column id_registration
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * Registration User Id
     *
     * @column id_user
     * @setter setIdUser
     * @getter getIdUser
     * @entity objUser
     * @var integer
     */
    protected $intIdUser;

    /**
     * Registration User Object
     *
     * @setter setUser
     * @getter getUser
     * @id intIdUser
     * @throws NotFound
     * @var User
     */
    protected $objUser;

    /**
     * Registration Group Id
     *
     * @column id_group
     * @setter setIdGroup
     * @getter getIdGroup
     * @entity objGroup
     * @var integer
     */
    protected $intIdGroup;

    /**
     * Registration Group Object
     *
     * @setter setGroup
     * @getter getGroup
     * @id intIdGroup
     * @throws NotFound
     * @var Group
     */
    protected $objGroup;

    /**
     * Set Registration Name
     *
     * @param string $strName
     * @return Registration
     */
    public function setName( $strName )
    {
        $this->getUser()->setName( $strName );
        return $this;
    }

    /**
     * Get Registration Name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->getUser()->getName();
    }

    /**
     * Set Registration Group Id
     *
     * @param integer $intIdGroup
     * @return Registration
     */
    public function setIdGroup( $intIdGroup )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdGroup );
    }

    /**
     * Get Registration Group Id
     *
     * @return integer
     */
    public function getIdGroup()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Set Registration Group Object
     *
     * @param Group $objGroup
     * @return Registration
     */
    public function setGroup( Group $objGroup )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objGroup );
    }

    /**
     * Get Registration Group Object
     *
     * @return Group
     */
    public function getGroup()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }

    /**
     * Set User Id
     *
     * @param integer $intIdUser
     * @return Registration
     */
    public function setIdUser( $intIdUser )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdUser );
    }

    /**
     * Get User Id
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Set User Object
     *
     * @param User $objUser
     * @return Registration
     */
    public function setUser( User $objUser )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objUser );
    }

    /**
     * Get User Object
     *
     * @return User
     */
    public function getUser()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }
}
?>