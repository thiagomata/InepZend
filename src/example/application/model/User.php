<?php
namespace Example\Model;

/**
 * User Entity Class
 *
 * @author thiago.mata <thiago.mata@inep.gov.br>
 * @date 06/07/2011
 * @table tb_user
 */
class User extends \Local\Model\Entity
{
    /**
     * Entity Id
     *
     * @column id_user
     * @setter setId
     * @getter getId
     * @var integer
     */
    protected $intId;

    /**
     * User Name
     *
     * @setter setName
     * @getter getName
     * @column na_user
     * @maxlength 300
     * @var string
     */
    protected $strName;

    /**
     * User E-mail
     *
     * @column txt_email
     * @setter setEmail
     * @getter getEmail
     * @maxlength 255
     * @var string
     */
    protected $strEmail;

    /**
     * User Login 
     *
     * @column txt_login
     * @setter setLogin
     * @getter getLogin
     * @maxlength 45
     * @var string
     */
    protected $strLogin;

    /**
     * User Password
     *
     * @column txt_password
     * @setter setPassword
     * @getter getPassword
     * @maxlength 45
     * @var string
     */
    protected $strPassword;

    /**
     * User Social Security Number
     *
     * @column txt_ssn
     * @setter setSsn
     * @getter getSsn
     * @maxlength 11
     * @var string
     */
    protected $strSsn;

    /**
     * User Address Id
     *
     * @column id_address
     * @setter setIdAddress
     * @getter getIdAddress
     * @entity objAddress
     * @var integer
     */
    protected $intIdAddress;

    /**
     * User Address
     *
     * @setter setAddress
     * @getter getAddress
     * @id intIdAddress
     * @throws NotFound
     * @var Address
     */
    protected $objAddress;

    /**
     * User Level Id
     *
     * @column id_level
     * @setter setIdLevel
     * @getter getIdLevel
     * @entity objLevel
     * @var integer
     */
    protected $intIdLevel;

    /**
     * User Level Object
     *
     * @setter setLevel
     * @getter getLevel
     * @id intIdLevel
     * @throws NotFound
     * @var Level
     */
    protected $objLevel;

    /**
     * Teacher
     *
     * @relationship Teacher
     * @OneToOne Teacher::intIdUser
     * @var Teacher
     */
    protected $objTeacher;

    /**
     * User Registrations
     *
     * @relationship Registrations
     * @OneToMany intIdUser
     * @var Registration[]
     */
    protected $arrRegistrations;

    /**
     * Set User Name
     *
     * @param string $strName
     * @return User
     */
    public function setName( $strName )
    {
        $this->strName = $strName;
        return $this;
    }

    /**
     * Get User Name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->strName;
    }

    /**
     * Set User E-mail
     *
     * @param string $strEmail
     * @return User
     */
    public function setEmail( $strEmail )
    {
        $this->strEmail = $strEmail;
        return $this;
    }

    /**
     * Get User E-mail
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->strEmail;
    }

    /**
     * Set User Login
     *
     * @param string $strLogin
     * @return User
     */
    public function setLogin( $strLogin )
    {
        $this->strLogin = $strLogin;
        return $this;
    }

    /**
     * Get User Login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->strLogin;
    }

    /**
     * Set User Password
     *
     * @param string $strPassword
     * @return User
     */
    public function setPassword( $strPassword )
    {
        $this->strPassword = $strPassword;
        return $this;
    }

    /**
     * Get User Password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->strPassword;
    }

    /**
     * Set User Social Security Number
     *
     * @param string $strSsn
     * @return User
     */
    public function setSsn( $strSsn )
    {
        $this->strSsn = $strSsn;
        return $this;
    }

    /**
     * Get User Social Security Number
     *
     * @return string
     */
    public function getSsn()
    {
        return $this->strSsn;
    }

    /**
     * Set User Address Id
     *
     * @param integer $intIdAddress
     * @return User
     */
    public function setIdAddress( $intIdAddress )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdAddress );
    }

    /**
     * Get User Address Id
     *
     * @return integer
     */
    public function getIdAddress()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Set User Address Object
     *
     * @param Address $objAddress
     * @return User
     */
    public function setAddress( Address $objAddress )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objAddress );
    }

    /**
     * Get User Address Object
     *
     * @return Address
     */
    public function getAddress()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }

    /**
     * Set User Level Id
     *
     * @param integer $intIdLevel
     * @return User
     */
    public function setIdLevel( $intIdLevel )
    {
        return $this->lazyLoadSetId( __METHOD__ , $intIdLevel );
    }

    /**
     * Get User Level Id
     *
     * @return integer
     */
    public function getIdLevel()
    {
        return $this->lazyLoadGetId( __METHOD__ );
    }

    /**
     * Set User Level Object
     *
     * @param Level $objLevel
     * @return User
     */
    public function setLevel( Level $objLevel )
    {
        return $this->lazyLoadSetEntity( __METHOD__ , $objLevel );
    }

    /**
     * Get User Level Object
     *
     * @return Level
     */
    public function getLevel()
    {
        return $this->lazyLoadGetEntity( __METHOD__ );
    }

    /**
     * Set User Teacher Id
     *
     * @param integer $intIdTeacher
     * @return User
     */
    public function setIdTeacher( $intIdTeacher )
    {
        return $this->reverseLoadSetId( 'Teacher' , $intIdTeacher );
    }

    /**
     * Get User Teacher Id
     *
     * @return integer
     */
    public function getIdTeacher()
    {
        return $this->reverseLoadGetId( 'Teacher' );
    }

    /**
     * Set User Teacher Object
     *
     * @param Teacher $objTeacher
     * @return User
     */
    public function setTeacher( Teacher $objTeacher )
    {
        return $this->reverseLoadSetEntity( 'Teacher' , $objTeacher );
    }

    /**
     * Get User Teacher Object
     *
     * @return Teacher
     */
    public function getTeacher()
    {
        return $this->reverseLoadGetEntity( 'Teacher' );
    }

    /**
     * Returns whether the user is a teacher
     *
     * @return boolean
     */
    public function isTeacher()
    {
        return $this->reverseIsEntity( 'Teacher' );
    }

    /**
     * Get User Registrations 
     *
     * @return Registration[]
     */
    public function getRegistrations( $booUseCache = true )
    {
        return $this->getAllRelationalEntity( __METHOD__ , $booUseCache , 'Registrations' );
    }

    /**
     * Get quantity of User Registrations
     *
     * @return integer
     */
    public function getQtdRegistrations( $booUseCache = true )
    {
        return $this->getQtdRelationalEntity( __METHOD__ , $booUseCache , 'Registrations' );
    }

    /**
     * Set User Registrations
     *
     * @param Registration[] $arrRegistrations
     * @return User
     */
    public function setRegistrations( array $arrRegistrations )
    {
        return $this->setAllRelationalEntity( __METHOD__ , $arrRegistrations , 'Registrations' );
    }

    /**
     * Add Registration to the User Registrations
     *
     * @param Registration $objRegistration
     * @return User
     */
    public function addRegistration( Registration $objRegistration , $booUseCache = true)
    {
        return $this->addRelationalEntity( __METHOD__ , $objRegistration , $booUseCache , 'Registrations' );
    }

    /**
     * Remove Registration from the User Registrations
     *
     * @param Registration $objRegistration
     * @return User
     */
    public function removeRegistration( Registration $objRegistration )
    {
        return $this->removeRelationalEntity( __METHOD__ , $objRegistration , $booUseCache , 'Registrations' );
    }
}
?>