<?php
namespace Local\Template;

class InepTemplate
{
    const TEMPLATE_FILE_TYPE = ".pxml";

    protected static $arrInstance = array();

    protected static $strApplicationDefaultTemplateFolder;
    
    protected static $strApplicationInepTemplateFolder;

    protected static $strApplicationCodeFolder;

    protected static $strApplicationCacheFolder;

    protected $strDefaultTemplateFolder;

    protected $strInepTemplateFolder;

    protected $strRelativePath;
    
    protected $strPhpFolder;

    protected $strCacheFolder;

    protected $objCache;

    public static function getApplicationDefaultTemplateFolder()
    {
        if( self::$strApplicationDefaultTemplateFolder == null )
        {
            self::initApplicationData();
        }
        return self::$strApplicationDefaultTemplateFolder;
    }
    
    public static function getApplicationInepTemplateFolder()
    {
        if( self::$strApplicationInepTemplateFolder == null )
        {
            self::initApplicationData();
        }
        return self::$strApplicationInepTemplateFolder;
    }
    
    public static function getApplicationCodeFolder()
    {
        if( self::$strApplicationCodeFolder == null )
        {
            self::initApplicationData();
        }
        return self::$strApplicationCodeFolder;
    }
    
    public static function getApplicationCacheFolder()
    {
        if( self::$strApplicationCacheFolder == null )
        {
            self::initApplicationData();
        }
        return self::$strApplicationCacheFolder;
    }
    
    public static function loadApplicationData()
    {
        $arrDefault =
        array(
            "default" => \APPLICATION_PATH . "/template" ,
            "inep" => \INEP_APPLICATION_PATH . "/template" ,
            "php" => \APPLICATION_PATH . "/code" ,
            "cache" => \APPLICATION_PATH . "/cache" ,
        );
        
        $arrGroupTemplatePaths =
            \CorujaArrayManipulation::getArrayField( 
                \Local\Bootstrap::getInstance()->getOption( 'template' ) ,
                'path',
                $arrDefault
            );
        
        return $arrGroupTemplatePaths;
    }
    
    public static function initApplicationData()
    {
        $arrGroupTemplatesPaths = self::loadApplicationData();
        
        self::$strApplicationDefaultTemplateFolder = 
             \CorujaArrayManipulation::getArrayField(
                 $arrGroupTemplatesPaths ,
                 "default"
             );
        self::$strApplicationInepTemplateFolder = 
             \CorujaArrayManipulation::getArrayField(
                 $arrGroupTemplatesPaths ,
                 "inep"
             );
        self::$strApplicationCodeFolder = 
             \CorujaArrayManipulation::getArrayField(
                 $arrGroupTemplatesPaths ,
                 "php"
             );
        self::$strApplicationCacheFolder = 
             \CorujaArrayManipulation::getArrayField(
                 $arrGroupTemplatesPaths ,
                 "cache"
             );
    }
    
    public function __construct()
    {
        $this->setDefaultTemplateFolder( self::getApplicationDefaultTemplateFolder() );
        $this->setInepTemplateFolder( self::getApplicationInepTemplateFolder() );
        $this->setPhpFolder( self::getApplicationCodeFolder() );
        $this->setCacheFolder( self::getApplicationCacheFolder() );
    }
    
    public function setDefaultTemplateFolder( $strDefaultTemplateFolder )
    {
        $this->strDefaultTemplateFolder = $strDefaultTemplateFolder;
        return $this;
    }

    public function getDefaultTemplateFolder()
    {
        return $this->strDefaultTemplateFolder;
    }
    
    public function setInepTemplateFolder( $strInepTemplateFolder )
    {
        $this->strInepTemplateFolder = $strInepTemplateFolder;
        return $this;
    }

    public function getInepTemplateFolder()
    {
        return $this->strInepTemplateFolder;
    }

    public function setRelativePath( $strRelativePath )
    {
        $this->strRelativePath = $strRelativePath;
    }
    
    public function getRelativePath()
    {
        return $this->strRelativePath;
    }
    
    public function setPhpFolder( $strPhpFolder )
    {
        $this->strPhpFolder = $strPhpFolder;
        return $this;
    }

    public function getPhpFolder()
    {
        return $this->strPhpFolder;
    }

    public function setCacheFolder( $strCacheFolder )
    {
        $this->strCacheFolder = $strCacheFolder;
        return $this;
    }

    public function getCacheFolder()
    {
        return $this->strCacheFolder;
    }

    public function setName( $strName )
    {
        $this->strName = $strName;
        return $this;
    }

    public function getName()
    {
        return $this->strName;
    }

    public function getDefaultTemplateFile()
    {
        if( $this->getDefaultTemplateFolder() !== null )
        {
            return  $this->getDefaultTemplateFolder() . $this->getRelativePath() . 
                        '/' . $this->getName() . self::TEMPLATE_FILE_TYPE;        
        }
        else
        {
            return $this->getName() . self::TEMPLATE_FILE_TYPE;
        }
    }


    public function getInepTemplateFile()
    {
        if( $this->getInepTemplateFolder() != null )
        {
            return  $this->getInepTemplateFolder() . $this->getRelativePath() . 
                        '/' . $this->getName() . self::TEMPLATE_FILE_TYPE;        
        }
        else
        {
            return $this->getName() . self::TEMPLATE_FILE_TYPE;
        }
    }

    public function getTemplateFile()
    {
        $strDefaultFile = $this->getDefaultTemplateFile();
        if(\file_exists( $strDefaultFile ) )
        {
            return $strDefaultFile;
        }
        $strInepFile = $this->getInepTemplateFile();
        if(\file_exists( $strInepFile ) )
        {
            return $strInepFile;
        }
        throw new \Exception( "Error. Template " . $this->getName() . self::TEMPLATE_FILE_TYPE . " not founded." );
    }
    
    public function getPhpFile()
    {
        return $this->getPhpFolder() . '/' . $this->getName() . "_" .
                md5( $this->getTemplateFile() ) . ".php";
    }

    /**
     *
     * @return \Coruja\Cache\CorujaCache
     */
    public function getCache()
    {
        if( $this->objCache == null )
        {
            $this->objCache = new \Coruja\Cache\CorujaCache();
            $this->objCache->setCachePath( $this->getCacheFolder() );
        }
        return $this->objCache;
    }

    public function isSync()
    {
        return ! $this->getCache()->isChanged( $this->getDefaultTemplateFile() );
    }

    public function sync()
    {
        $objXml2Php = new InepXml2Php();
        $strCode = $objXml2Php->createScriptFromFile( $this->getTemplateFile() );
        file_put_contents( $this->getPhpFile() , $strCode );
        $this->getCache()->update( $this->getTemplateFile() );
    }

    public function getPhpCodeFile()
    {
        if( ! $this->isSync() )
        {
            $this->sync();
        }

        return $this->getPhpFile();
    }

    /**
     *
     * @param string $strDefaultTemplateName
     * @param string [$strDefaultTemplateRelativePath]
     * @return InepDefaultTemplate
     */
    public static function getInepTemplate( $strName , $strRelativePath = null )
    {
        $strKey = $strName . "_" . $strRelativePath;
        if( !\array_key_exists(  $strKey , self::$arrInstance ) )
        {
            $objTemplate = new InepTemplate();
            $objTemplate->setName( $strName );
            $objTemplate->setRelativePath( $strRelativePath );
            $objTemplate->sync();
            self::$arrInstance[ $strKey ] = $objTemplate;
        }
        return self::$arrInstance[ $strKey ];
    }
}
?>