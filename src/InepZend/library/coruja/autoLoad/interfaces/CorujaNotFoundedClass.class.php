<?php
//namespace global;

/**
 * CorujaNotFoundedClass - Is part of one solution to make possible
 * the not found some class into autoload process throws one exception.
 *
 * @package CorujaDefaultComponents
 */

/**
 * Class to be extended to the classes not founded by the autoload
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 * @since 22-11-2008
 */
class CorujaNotFoundedClass
{
    /**
     * Name of the parent class
     * @var string
     */
    protected static $strClassName;

    /**
     * If any method be called a error will be throw
     *
     * @param string $strMethod
     * @param array $arrParameter
     * @throws FatalException
     */
    public function __call( $strMethod, $arrParameter )
    {
        self::error();
    }

    /**
     * If any method be called a error will be throw
     *
     * @param string $strParameter
     * @throws FatalException
     */
    public function __get( $strParameter )
    {
        self::error();
    }

    /**
     * If any method be called a error will be throw
     *
     * @param string $strParameter
     * @param mixed $mixValue
     * @throws FatalException
     */
    public function __set( $strParameter , $mixValue )
    {
        self::error();
    }

    /**
     * If any method be called a error will be throw
     * @throws FatalException
     */
    public function __construct()
    {
        self::error();
    }

    /**
     * If any method be called a error will be throw
     *
     * @param string $strMethod
     * @param array $arrParams
     * @throws FatalException
     */
    public static function __callStatic( $strMethod, $arrParams)
    {
        self::error();
    }

    /**
     * If any method be called a error will be throw
     *
     * @param string $strName
     * @throws FatalException
     */
    public function  __isset($strName)
    {
        self::error();
    }

    /**
     * If any method be called a error will be throw
     * @param string $arrParam
     * @throws FatalException
     */
    public function  __set_state($arrParam)
    {
        self::error();
    }

    /**
     * If any method be called a error will be throw
     * @throws FatalException
     */
    public function  __clone()
    {
        self::error();
    }

    /**
     * If any method be called a error will be throw
     * @throws FatalException
     */
    public static function error()
    {
        throw new FatalException( " Unabled to find the file of this class " . self::$strClassName );
    }
}

?>