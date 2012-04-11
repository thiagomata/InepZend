<?php
/**
 * CorujaClassManipulation - Library of Class Manipulation
 * @package CorujaDefaultComponents
 */

/**
 * Class with methods of classes manipulation
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
class CorujaClassManipulation
{

    CONST NAMESPACE_SEPARATOR = '\\';
    /**
     * Return classe name from class definition
     *
     * @param String $strClassDefinition Class definition
     * @return String Class name
     * @example getClassNameFromClassDefinition( "myNamespace\\myClass" ); // returns "myClass"
     *
     * @assert ( "myNamespace\\myClass" ) = "myClass"
     * @assert ( "myClass" ) = "myClass"
     * @assert ( "" ) = ""
     *
     * @assert (null) throws InvalidArgumentException
     * @assert (123) throws InvalidArgumentException
     * @assert (array()) throws InvalidArgumentException
     * @assert (new stdClass()) throws InvalidArgumentException
     * @assert (false) throws InvalidArgumentException
     */
    public static function getClassNameFromClassDefinition( $strClassDefinition )
    {
        if( !is_string( $strClassDefinition ) || is_null( $strClassDefinition ) )
        {
            throw new InvalidArgumentException("Invalid argument [ ". var_export( $strClassDefinition ) ." ]. It should be string");
        }

        $arrElements = explode( self::NAMESPACE_SEPARATOR , $strClassDefinition );
        return array_pop( $arrElements );
    }

    /**
     * Return namespace from class definition
     *
     * @param String $strClassDefinition Class definition
     * @param Boolean $booJustTheFirst Namespace deeper definition
     * @return String Namespace
     * @example getClassNameFromClassDefinition( "myNamespace\\myClass" ); // returns "myNamespace"
     *
     * @assert ( "myNamespace\\myClass" ) = "myNamespace"
     * @assert ( "myNamespace\\sub\\myClass" ) = "myNamespace"
     * @assert ( "myNamespace\\sub\\myClass" , true ) = "myNamespace"
     * @assert ( "myNamespace\\sub\\myClass" , false ) = "myNamespace\\sub"
     * @assert ( "myClass" ) = ""
     * @assert ( "" ) = ""
     *
     * @assert (null) throws InvalidArgumentException
     * @assert (123) throws InvalidArgumentException
     * @assert (array()) throws InvalidArgumentException
     * @assert (new stdClass()) throws InvalidArgumentException
     * @assert (false) throws InvalidArgumentException
     *
     */
    public static function getNamespaceFromClassDefinition( $strClassDefiniton , $booJustTheFirst = true )
    {
        if(!is_string($strClassDefiniton))
        {
            throw new InvalidArgumentException("Invalid argument [ ". var_export($strClassDefiniton) ." ]. It should be string");
        }

        $arrElements = explode( self::NAMESPACE_SEPARATOR , $strClassDefiniton );
        if( sizeof( $arrElements ) == 1 )
        {
            return null;
        }
        array_pop( $arrElements);
        if( $booJustTheFirst )
        {
            return array_shift( $arrElements );
        }
        return implode( self::NAMESPACE_SEPARATOR , $arrElements );
    }

    public static function callMethodWithParametersIntoArray( $objElement , $strMethod , $arrParameters )
    {
        $objReflectMethod = new ReflectionMethod( get_class( $objElement ) , $strMethod );
        $arrReflectParameters = $objReflectMethod->getParameters();
        $arrParams = array();
        foreach( $arrReflectParameters as $objReflectParameter )
        {
            /**
             * @var $objReflectParameter ReflectionParameter
             */
            $strParameter = $objReflectParameter->getName();
            if( $objReflectParameter->isDefaultValueAvailable() )
            {
                $mixParameterValue = $objReflectParameter->getDefaultValue();
            }
            else
            {
                $mixParameterValue = null;
            }
            $mixParameterFinalValue = CorujaArrayManipulation::getArrayField( $_REQUEST , $strParameter , $mixParameterValue );
            $arrParams[ $strParameter ] = $mixParameterFinalValue;
        }
        call_user_method_array( $strMethod , $objElement , $arrParams );
    }
}

?>