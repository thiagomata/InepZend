<?php
/**
 * CorujaStringManipulation - Library of String Manipulation
 * @package CorujaDefaultComponents
 */

/**
 * Class with methods for string manipulation
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
class CorujaStringManipulation
{

    /**
     * Special string casting for boolean
     *
     * @param string $strText String to be turned into boolean
     * @return boolean Input casting
     * @throws InvalidArgumentException If $strText is not string
     * @example strToBool("false") // returns false
     *
     * @assert ("") == false
     * @assert ("false") == false
     * @assert ("FaLsE") == false
     * @assert ("0") == false
     *
     * @assert ("a0a") == true
     * @assert ("true") == true
     * @assert ("1") == true
     *
     * @assert (null) throws InvalidArgumentException
     * @assert (123) throws InvalidArgumentException
     * @assert (array()) throws InvalidArgumentException
     * @assert (new stdClass()) throws InvalidArgumentException
     * @assert (false) throws InvalidArgumentException
     *
     */
    public static function strToBool( $strText )
    {
        if(!is_string($strText))
        {
            throw new InvalidArgumentException("Invalid argument [ ". var_export($strText) ." ]. It should be string");
        }

        $strText = strtolower( $strText );
        if ( $strText === "false" || $strText === "" || $strText === "0" )
        {
            return( false );
        }
        return( true );
    }

    /**
     * Get number chars inside a string
     *
     * @param string $strText Text with numbers
     * @return int Numbers in the string
     * @throws InvalidArgumentException If $strText is not string
     * @example forceInt("a1b2c3d4") // returns 1234
     *
     * @assert ("a1b2c3d4") == 1234
     * @assert ("") == 0
     * @assert ("a0a") == 0
     * @assert ("001") == 1
     * @assert ("abc") == 0
     * @assert ("a-10") == 10
     *
     * @assert ("-10") == -10
     * @assert ("--10") == -10
     * @assert ("-a-b-1-0-") == -10
     *
     * @assert (null) throws InvalidArgumentException
     * @assert (123) throws InvalidArgumentException
     * @assert (array()) throws InvalidArgumentException
     * @assert (new stdClass()) throws InvalidArgumentException
     * @assert (false) throws InvalidArgumentException
     *
     */
    public static function forceInt( $strText )
    {
        if(!is_string($strText))
        {
            throw new InvalidArgumentException("Invalid argument [ ". var_export($strText) ." ]. It should be string");
        }

        $arrNum = Array( "0","1","2","3","4","5","6","7","8","9");
        $strResult = "";
        for( $i = 0; $i < strlen( $strText ); ++$i )
        {
            $charLetra = $strText[$i];
            if( $i == 0 && $charLetra == "-" )
            {
                $strResult .= $charLetra;
            }
            if( in_array($charLetra,$arrNum))
            {
                $strResult .= $charLetra;
            }
        }
        return $strResult += 0;
    }

    /**
     * Change string case standard
     *
     * @param string $strFieldName Name in camel case
     * @return string Name in underline separated case
     * @throws InvalidArgumentException If $strText is not string
     * @example
     * CorujaStringManipulation::caseTabUnderlineTab("nameOfTheParameter")
     * // returns "NAME_OF_THE_PARAMETER"
     *
     * @assert ("test") == "TEST"
     * @assert ("Test") == "TEST"
     * @assert ("somethingCool") == "SOMETHING_COOL"
     * @assert ("") == ""
     * @assert ("1something2Cool3") == "1SOMETHING2_COOL3"
     * @assert ("111something2222Cool333") == "111SOMETHING2222_COOL333"
     *
     * @assert (null) throws InvalidArgumentException
     * @assert (123) throws InvalidArgumentException
     * @assert (array()) throws InvalidArgumentException
     * @assert (new stdClass()) throws InvalidArgumentException
     * @assert (false) throws InvalidArgumentException
     */
    public static function camelCaseToUnderlineCase( $strText , $strSeparator = "_" )
    {
        $strText = lcfirst( $strText );
        if(!is_string($strText))
        {
            throw new InvalidArgumentException("Invalid argument [ ". var_export($strText) ." ]. It should be string");
        }

        $arrFind = Array( "A" , "B" , "C" , "D" , "E" , "F" , "G" , "H" , "I" , "J" , "K" , "L" , "M" , "N" , "O" ,
					  "P" , "Q" , "R" , "S" , "T" , "U" , "V" , "X" , "Z" , "W" , "Y"	);

        $arrReplace = Array( "{$strSeparator}A" , "{$strSeparator}B" , "{$strSeparator}C" , "{$strSeparator}D" , "{$strSeparator}E" , "{$strSeparator}F" , "{$strSeparator}G" , "{$strSeparator}H" , "{$strSeparator}I" , "{$strSeparator}J" , "{$strSeparator}K" , "{$strSeparator}L" , "{$strSeparator}M" ,
					  "{$strSeparator}N" , "{$strSeparator}O" , "{$strSeparator}P" , "{$strSeparator}Q" , "{$strSeparator}R" , "{$strSeparator}S" , "{$strSeparator}T" , "{$strSeparator}U" , "{$strSeparator}V" , "{$strSeparator}X" , "{$strSeparator}Z" , "{$strSeparator}W" , "{$strSeparator}Y"	);

        if( strlen( $strText ) > 0 )
        {
            $strText[0] = strtolower($strText[0]);
        }

        return strtoupper( str_replace( $arrFind , $arrReplace , $strText ) );
    }

    /**
     * Change string case standard
     *
     * @param string $strFieldName Name in underline case
     * @return string Name in camel separated case
     * @throws InvalidArgumentException If $strText is not string
     * @example
     * CorujaStringManipulation::underlineTocamelCase("NAME_OF_PARAMETER")
     * // returns "nameOfTheParameter"
     *
     * @assert ("ONE_TWO") == "oneTwo"
     * @assert ("one_two") == "oneTwo"
     * @assert ("One_Two") == "oneTow"
     * @assert ("SOMETHING_COOL") == "somethingCool"
     * @assert ("") == ""
     * @assert ("1SOMETHING2_COOL3") == "1something2Cool3"
     * @assert ("111SOMETHING2222_COOL333") == "111something2222Cool333"
     *
     * @assert (null) throws InvalidArgumentException
     * @assert (123) throws InvalidArgumentException
     * @assert (array()) throws InvalidArgumentException
     * @assert (new stdClass()) throws InvalidArgumentException
     * @assert (false) throws InvalidArgumentException
     */
    public static function underlineTocamelCase( $strText , $strSeparator = "_" )
    {
        if(!is_string($strText))
        {
            throw new InvalidArgumentException("Invalid argument [ ". var_export($strText) ." ]. It should be string");
        }

        $arrUnderLine = explode( $strSeparator , $strText );
        foreach( $arrUnderLine as &$strLine )
        {
            $strLine = ucfirst( strtolower( $strLine ) );
        }
        return implode( "" , $arrUnderLine );
    }

    public static function retab( $strText , $intDeeper )
    {
        $arrText = explode( "\n" , $strText );
        foreach( $arrText as $intKey => $strTextElement)
        {
            $arrText [ $intKey ] = trim( $strTextElement );
        }
        $strTab = "\n" .str_repeat( "\t" , $intDeeper );
        $strText = $strTab . implode( $strTab , $arrText ) . $strTab;
        return $strText;
    }

    public static function XMLEntities($string)
    {
        $string = preg_replace('/[^\x09\x0A\x0D\x20-\x7F]/e', 'CorujaStringManipulation::privateXMLEntities("$0")', $string);
        return $string;
    }

    private static function privateXMLEntities($num)
    {
    $chars = array(
        128 => '&#8364;',
        130 => '&#8218;',
        131 => '&#402;',
        132 => '&#8222;',
        133 => '&#8230;',
        134 => '&#8224;',
        135 => '&#8225;',
        136 => '&#710;',
        137 => '&#8240;',
        138 => '&#352;',
        139 => '&#8249;',
        140 => '&#338;',
        142 => '&#381;',
        145 => '&#8216;',
        146 => '&#8217;',
        147 => '&#8220;',
        148 => '&#8221;',
        149 => '&#8226;',
        150 => '&#8211;',
        151 => '&#8212;',
        152 => '&#732;',
        153 => '&#8482;',
        154 => '&#353;',
        155 => '&#8250;',
        156 => '&#339;',
        158 => '&#382;',
        159 => '&#376;');
        $num = ord($num);
        return (($num > 127 && $num < 160) ? $chars[$num] : "&#".$num.";" );
    }

}
?>