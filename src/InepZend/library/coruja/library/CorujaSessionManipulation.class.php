<?php
/**
 * CorujaSessionManipulation - Library of Session Manipulation
 * @package CorujaDefaultComponents
 */

/**
 * Class with methods for Session manipulation
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
class CorujaSessionManipulation
{
    /**
     * @var CorujaSessionManipulation
     */
    protected static $objInstance;

    /**
     * Singleton of the Session
     *
     * @pattern singleton
     */
    public static function getInstance()
    {
        if( !isset( self::$objInstance ) )
        {
            self::$objInstance = new CorujaSessionManipulation();
        }
        return self::$objInstance;
    }

    /**
     * Start the session
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Commit the session
     */
    public function __destruct()
    {
        session_commit();
        session_write_close();
    }

    /**
     * Get value from the session, null is default
     *
     * @return Object | null
     */
    public function __get( $strParameter )
    {
        if( isset( $_SESSION[ $strParameter ] ) )
        {
            return unserialize( $_SESSION[ $strParameter ] );
        }
        return null;
    }

    /**
     * Set value to the session
     *
     * @param string $strParameter
     * @param Object $mixvalue
     */
    public function __set( $strParameter , $mixValue )
    {
        $_SESSION[ $strParameter ] =  serialize( $mixValue );
    }
}
?>