<?php
namespace Coruja\Cache;

/**
 * CorujaCache it is the default implementation of the cahce component
 *
 * @package CorujaDefaultComponents
 */

/**
 * CorujaCache has a xml with some cache data about each file and validate it.
 * It is the default implementation of the cache component.
 *
 * Should validate the elements and it's caches to detected changes into files
 *
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 * @see CorujaCacheInterface
 */
class CorujaCache // implements CorujaCacheInterface
{
    protected $strPath;

    /**
     * Get the Cache Path
     *
     * @return string
     */
    public function getCachePath()
    {
        return $this->strPath;
    }

    /**
     * Set the Cache Path
     *
     * @param string $strNewPath
     */
    public function setCachePath( $strNewPath )
    {
        if( $strNewPath[strlen($strNewPath) - 1 ] !== "/" )
        {
            $strNewPath .= "/";
        }
        $this->strPath = $strNewPath;
    }
    
    /**
     * Basic files validation like if it exists and if it't writable
     *
     * @param string $strFileName File name
     *
     * @todo complete implementation. Other validations are necessary.
     */
    protected function validateFile( $strFileName , $booTrowIfNotFounded = true )
    {
        if( !is_file( $strFileName) )
        {
            if( $booTrowIfNotFounded )
            {
                throw new WarningException( "Unabled to find the file " . $strFileName );
            }
            return false;
        }
        return true;
    }

    /**
     * Update the hash file after validate it
     *
     * @param string $strFileName
     */
    public function update( $strFileName )
    {
        $this->validateFile( $strFileName );
        $this->updateHashFile( $strFileName );
    }

    /**
     * Check if the received file it is sync with the actual hash of it
     *
     * @param string $strFileName
     * @return boolean
     */
    public function isChanged( $strFileName )
    {
        if( !$this->validateFile( $strFileName , false ) )
        {
            return true;
        }
        $oHash = $this->getHashFile( $strFileName );
        if( $oHash == null )
        {
            return true;
        }
        return ! $this->validateHashFile( $strFileName , $oHash );
    }

    /**
     * Get the hash file name of some file name
     *
     * @param string $strFileName
     * @return string
     */
    protected function getHashFileName( $strFileName )
    {
        $strFileHash = $this->getCachePath() . basename( $strFileName ) . md5( $strFileName  ) . ".hash";
        return $strFileHash;
    }

    /**
     * Get the simple xml element of the hash file, if exists, null otherwise
     *
     * @param string $strFileName
     * @return SimpleXmlElement | null
     */
    public function getHashFile( $strFileName )
    {
        $strFileHash = $this->getHashFileName( $strFileName );
        if( !file_exists( $strFileHash ) )
        {
            return null;
        }
        else
        {
            return simplexml_load_file( $strFileHash );
        }
    }

    /**
     * Validate the sync between the file and the xml hash of it
     *
     * @param string $strFileName
     * @param SimpleXmlElement $oXmlHash
     * @return boolean
     */
    protected function validateHashFile( $strFileName , $oXmlHash )
    {
        if( md5_file( $strFileName) != (string)$oXmlHash->md5file )
        {
            return false;
        }
        if( filectime( $strFileName) != (integer)$oXmlHash->lasttime )
        {
            return false;
        }
        if( filesize( $strFileName ) != (integer)$oXmlHash->filesize )
        {
            return false;
        }
        return true;
    }

    /**
     * Create or Replace the xml of hash based on informations of the file
     *
     * @param string $strFileName
     */
    protected function updateHashFile( $strFileName )
    {
        $strXml = "";
        $strXml .= "<hash>" . "\n";
        $strXml .= "	<md5file>" . md5_file( $strFileName ). "</md5file>" . "\n";
        $strXml .= "	<lasttime>" . filectime( $strFileName ). "</lasttime>" . "\n";
        $strXml .= "	<filesize>" . filesize( $strFileName ). "</filesize>". "\n";
        $strXml .= "</hash>". "\n";

        $strFileHash = $this->getHashFileName( $strFileName );

        file_put_contents( $strFileHash , $strXml );
    }
}

?>