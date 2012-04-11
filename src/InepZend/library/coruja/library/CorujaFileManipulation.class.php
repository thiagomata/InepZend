<?php
/**
 * CorujaFileManipulation - Library of File Manipulation
 * @package CorujaDefaultComponents
 */

/**
 * Class with methods for file manipulation
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
class CorujaFileManipulation
{
    /**
     * Returns a path to a folder relative from another folder. Both parameters
     * must be absolute.
     *
     * - check for valid parameters
     * - in case paths are equal return './'
     * - explode parameters using '/'
     * - remove similar base folders
     * - make final address
     *
     * @param String $strFolderFrom Base from the path. This must be an absolute path.
     * @param String $strFolderTo Destination of the path. This must be an absolute path.
     * @param Boolean $booValidPath Use false if you don't want to check for valid folders.
     * @throws InvalidArgumentException In case of invalid values
     *
     * @example $path = CorujaStringManipulation::getRelativePath( "/www/folder/", "/www/another/big/" ); // "../another/big/"
     *
     * @assert ( "/www/folder/", "/www/another/big/", false ) == "../another/big/"
     * @assert ( "", "" ) throws InvalidArgumentException
     * @assert ( "hello", "" ) throws InvalidArgumentException
     * @assert ( "", "hello" ) throws InvalidArgumentException
     * @assert ( "cool", "hello" ) throws InvalidArgumentException
     * @assert ( "/cool/", "hello" ) throws InvalidArgumentException
     * @assert ( "cool", "/hello/" ) throws InvalidArgumentException
     * @assert ( "/cool/", "/hello/", false ) == "../hello/"
     * @assert ( "/cool/", "/hello/", false ) == "../hello/"
     * @assert ( "/cool/", "/cool/", false ) == "./"
     * @assert ( "/cool/more/", "/other/", false ) == "../../other/"
     * @assert ( "/cool/", "/other/more/", false ) == "../other/more/"
     */
    public static function getRelativePath( $strFolderFrom, $strFolderTo, $booValidPath = true )
    {
        // check for valid parameters

        $strFolderFrom = str_replace( "\\" , "/" , $strFolderFrom );
        $strFolderTo = str_replace( "\\" , "/" , $strFolderTo );

        if( $booValidPath
        && ( ! is_dir( $strFolderFrom ) || ! is_dir( $strFolderTo ) )
        )
        {
            throw new InvalidArgumentException("Invalid parameter: strFolderFrom: ".$strFolderFrom." strFolderTo: ".$strFolderTo);
        }

        // special case: equal paths
        if( $strFolderFrom == $strFolderTo )
        {
            $strReturnPath = './';
        }
        else
        {
            // explode parameters using '/'
            $arrFileFrom = explode( '/', $strFolderFrom );
            $arrFileTo   = explode( '/', $strFolderTo );

            // remove similar base folders
            while(
            current( $arrFileFrom ) == current( $arrFileTo )
            && count( $arrFileFrom ) > 0
            )
            {
                array_shift( $arrFileFrom );
                array_shift( $arrFileTo );
            }

            $arrReturnPath = array();

            // make final address
            foreach( $arrFileFrom as $strFolder )
            {
                if( $strFolder != "" ) {
                    $arrReturnPath[] = "..";
                }
            }

            foreach( $arrFileTo as $strFolder )
            {
                $arrReturnPath[] = $strFolder;
            }

            $strReturnPath = implode( '/', $arrReturnPath );
        }
        return $strReturnPath;
    }

    /**
     * Check if a address is relative
     *
     * @assert( "c:\www\temp.php" ) == false
     * @assert( "d:/www/temp.php" ) == false
     * @assert( "temp.php" ) == true
     * @assert( "./temp.php" ) == true
     * @assert( "/www/something.php" ) == false
     * @assert( "./www/something.php" ) == true
     * @assert( ".\www\something.php" ) == true
     * @assert( "..\www\something.php" ) == true
     * @assert( "..\www\something.php" ) == true
     *
     */
    public static function isRelativePath( $strFile )
    {
        $strFile = str_replace( "\\", "/", $strFile);
        if
        (
            ( strpos( $strFile, "./") === 0 )
        or
            ( strpos( $strFile, "../") === 0 )
        or
            ( strpos( $strFile, "/../") !== false )
        or
            ( strpos( $strFile, "/./") !== false )
        )
        {
            return true;
        }
        elseif( strpos( $strFile, "/") === false )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
     
    /**
     * Get the path of the file
     *
     * @assert( "/something/cool/file.php" ) == "/something/cool/"
     * @param string $strFile
     * @return string
     */
    public static function getPathOfFile( $strFile )
    {
        return str_replace( "\\" , "/" , str_replace( basename( $strFile ) , "" , $strFile ) );
    }

    /**
     * Remove relative slices of file
     *
     * @assert( "/something/else/../new/" ) == "/something/new/"
     * @assert( "/another/./case/" ) == "/another/case/"
     */
    public static function removeRelativeSlicesOfFile( $strFile )
    {
        $strFile = str_replace( "\\", "/", $strFile);
        $arrPath = explode( "/" , $strFile );
        $arrResult = array();
        foreach( $arrPath as $strPath )
        {
            switch( $strPath )
            {
                case ".":
                {
                    break;
                }
                case "..":
                {
                    array_pop( $arrResult );
                    break;
                }
                default:
                {
                    $arrResult[] = $strPath;
                }
            }
        }
        return implode( "/" , $arrResult );
    }

    public static function dir( $strFolder )
    {
        $arrElements = array();
        $objDir = dir( $strFolder );
        while( false !== ( $strElement = $objDir->read() ) )
        {
            $arrElements[] = $strElement;
        }
        sort( $arrElements );
        return $arrElements;
    }

    public static function getFilePath( $strFileFrom , $strRelativePath )
    {
        $strPath = CorujaFileManipulation::getPathOfFile( $strFileFrom );
        $strRelativeFullPath = $strPath . $strRelativePath;
        return self::removeRelativeSlicesOfFile( $strRelativeFullPath );
    }

    public static function requireDir( $strFolder )
    {
        $arrFilesOfDir = self::dir( $strFolder );
        foreach( $arrFilesOfDir as $strFileOfDir )
        {
            if( substr( $strFileOfDir , -4 ) == ".php" )
            {
                require_once( $strFolder . "/" . $strFileOfDir );
            }
        }
    }
}
?>