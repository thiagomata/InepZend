<?php
namespace Coruja\AutoLoad;

/**
 * CorujaAutoLoad é o componente padrão responsável por administrar a carga
 * automatica dos arquivos das classes
 *
 * @see CorujaAutoLoad
 * @link http://www.assembla.com/code/corujaphpframework/subversion/nodes/coruja/coruja/components/default/autoLoad/CorujaAutoLoad.class.php?rev=388
 * @link http://www.thiagomata.com/coruja/svn/guide/public/?/tutorial/component/name/autoLoad
 */

/**
 * CorujaAutoLoad deal with the autoload requisitions using the AutoLoadGroups
 * and the preLoad elements to find the files of the classes
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 *
 */
class CorujaAutoLoad implements CorujaAutoLoadInterface
{
    /**
     * Singleton Instance of the CorujaAutoLoad
     *
     * @var CorujaAutoLoad
     */
    protected static $objCorujaAutoLoad;

    /**
     * Array with the class => file classes know
     *
     * @var string[]
     */
    protected $arrAutoLoadClassFile = array();

    /**
     * Array with the CorujaAutoLoadGroups
     *
     * @var CorujaAutoLoadGroupInterface[]
     */
    protected $arrAutoLoadGroups = array();

    /**
     * Pattern of the name of the auto load folder
     *
     * @var string
     */
    protected $strAutoloadFolderPattern;

    /**
     * Get the singleton instance
     *
     * @return CorujaAutoLoad
     */
    public static function getInstance()
    {
        if( self::$objCorujaAutoLoad == null )
        {
            self::$objCorujaAutoLoad = new CorujaAutoLoad();
        }
        return self::$objCorujaAutoLoad;
    }

    /**
     * Get the file name by the class name
     *
     * @param string $strClassName
     * @return string
     */
    public static function getFileNameByClass( $strClassName )
    {
        CorujaAutoLoad::getInstance()->loadClass( $strClassName );
        $strFileName = CorujaAutoLoad::getInstance()->getFilefromClass( $strClassName );
        if( $strFileName == null )
        {
            if( !class_exists( $strClassName ) )
            {
                throw new CorujaAutoLoadException( "Unable to find the file of the class $strClassName " );
            }
            $objReflection = new ReflectionClass( $strClassName );
            $strFileName = $objReflection->getFileName();
        }
        return $strFileName;
    }

    public function __construct()
    {
        spl_autoload_register( __CLASS__ . '::loadClass' );
    }

    /**
     * Add a autoload group folder
     *
     * @param string $strFolder
     */
    public function addAutoLoadGroupFolder( $strFolder )
    {
        $strDirName = $strFolder . "/" . $this->getAutoLoadFolderPattern() ;
        $oDirExceptions = dir( $strDirName );
        while( false !== ( $strFile = $oDirExceptions->read() ) )
        {
            if( substr( $strFile, -4) == ".php" )
            {
                require_once( $strDirName . "/" . $strFile );
                $strClassName = substr( $strFile , 0 , strpos( $strFile , "." ) );
                $objElement = new $strClassName();
                if( $objElement instanceof CorujaAutoLoadGroupInterface )
                {
                    $this->addAutoLoadGroup( $objElement ) ;
                }
                else
                {
                    throw new CorujaAutoLoadException( "The Class " . $strClassName . " it is not a Coruja Autoload Group Interface" );
                }
            }
        }
    }

    /**
     * Add one autoload group into the autoload
     *
     * @param CorujaAutoLoadGroupInterface $objAutoLoadGroup
     */
    public function addAutoLoadGroup( CorujaAutoLoadGroupInterface $objAutoLoadGroup )
    {
        $this->arrAutoLoadGroups[] = $objAutoLoadGroup;
    }

    public function removeAutoLoadGroup( CorujaAutoLoadGroupInterface $objAutoLoadGroup )
    {
        foreach( $this->arrAutoLoadGroups as $intKey => $objAutoLoadGroupElement )
        {
            if( $objAutoLoadGroupElement == $objAutoLoadGroup )
            {
                array_splice( $this->arrAutoLoadGroups , $intKey , 1 );
            }
        }
    }

    /**
     * Try to load the received class from the received file
     *
     * @throws CorujaAutoLoadException
     * @param string $strFileName
     * @param string $strClassName
     * @return boolean
     */
    protected function tryLoadClass( $strFileName, $strClassName )
    {
        if( is_file( $strFileName ) )
        {
            require_once( $strFileName );
            if( !class_exists( $strClassName ) && !interface_exists( $strClassName ) )
            {
                throw new CorujaAutoLoadException( "The file [" . $strFileName . "] should have the class [" . $strClassName . "] but the class was not founded" );
            }
            $this->preLoadClassFile( $strClassName , $strFileName );
            return true;
        }
        return false;
    }

    /**
     * Get the file name of some loaded class, return false if the class is
     * unknowed
     *
     * @param string $strClassName
     * @return string
     */
    public function getFilefromClass( $strClassName )
    {
        return CorujaArrayManipulation::getArrayField( $this->arrAutoLoadClassFile , $strClassName );
    }

    public function getClassFromFile( $strFileName )
    {
        return \array_search( $strFileName , $this->arrAutoLoadClassFile );
    }
    
    /**
     *
     * Load a Class File by the Class
     *
     * @throws CorujaAutoLoadException
     * @param string $strClassName
     * @return boolean
     */
    public function loadClass( $strClassName , $booTrowIfError = true )
    {
        $strClassName = (string)$strClassName;
        $arrFilesNames = array();

        if( array_key_exists( $strClassName, $this->arrAutoLoadClassFile ) )
        {
            $strFileName = $this->arrAutoLoadClassFile[ $strClassName ];
            $arrFilesNames[] = $strFileName;
            if( $this->tryLoadClass( $strFileName, $strClassName ) )
            {
                return true;
            }
        }
        foreach( $this->arrAutoLoadGroups as $objAutoLoadGroup )
        {
            /**
             * @var $objAutoLoadGroup CorujaAutoLoadGroupInterface
             */
            if( $objAutoLoadGroup->classBelongsToTheGroup( $strClassName ) )
            {
                $strFileName = $objAutoLoadGroup->getTheFileNameOfTheClass( $strClassName );
                $arrFilesNames[] = $strFileName;

                if( is_file( $strFileName ) )
                {
                    $this->preLoadClassFile( $strClassName , $strFileName );
                    $objAutoLoadGroup->onLoadClass( $strClassName );
                }

                if( $this->tryLoadClass( $strFileName, $strClassName ) )
                {
                    return true;
                }
            }
        }
        if( !class_exists( $strClassName , false ) && !interface_exists( $strClassName , false ) )
        {
            if( strlen( $strClassName ) == 0 )
            {
                if( $booTrowIfError )
                {
                    throw new \Exception( "Invalid Autoload Request, Empty class Name");
                }
                else
                {
                    return false;
                }
            }

            $strLowerClass = strtolower( $strClassName );
            if( 
                ! in_array(
                    $strLowerClass[0] ,
                    array( 'a' , 'b' , 'c' , 'd' , 'e' , 'f' , 'g' , 'h' , 'i' ,
                           'j' , 'k' , 'l' , 'm' , 'n' , 'o' , 'p' , 'q' , 'r' ,
                           's' , 't' , 'v' , 'v' , 'x' , 'y' , 'w' , 'z' , '\\'
                    )
                )
            )
            {
                if( $booTrowIfError )
                {
                    throw new \Exception( "Invalid Class Name $strClassName!");
                }
                else
                {
                    return false;
                }
            }

            return false;
            
            try
            {
                $strHeader = "";
                $strFooter = "";
                $strClassCode = $strClassName;
                if( strpos( $strClassName , "\\" ) !== false )
                {
                    $arrItens = explode( "\\" , $strClassName );
                    $strClassCode  = array_pop( $arrItens );
                    while( $arrItens[0] == null )
                    {
                        array_shift( $arrItens );
                    }
                    $strHeader = " namespace " . implode ( "\\" , $arrItens ) . "; \n\n\n";
                }
                $strClassNotFounded = $strHeader .
                'class ' . $strClassCode  . ' extends \CorujaNotFoundedClass
                    {
                        protected static $strClassName = "' . $strClassName . '";
                    }
                ' . $strFooter;

                eval( $strClassNotFounded );
            }
            catch( \Exception $objError )
            {
                if( $booTrowIfError )
                {
                    throw $objError;
                }
                else
                {
                    return false;
                }

            }
            if( $booTrowIfError )
            {
                throw new \Exception( 
                    " Unabled to find the file of the class "   .
                    $strClassName .
                    ". File exists into: " . implode( "\n" , $arrFilesNames ) . " ? "
                );
            }
            else
            {
                return false;
            }
        }
        return true;
    }

    /**
     * PreLoad a Class File for, when the class be required the position of the
     * File be already know
     *
     * @param string $strClassName
     * @param string $strFileName
     */
    public function preLoadClassFile( $strClassName, $strFileName )
    {
        $this->arrAutoLoadClassFile[ $strClassName ] = $strFileName;
    }

    /**
     * PreLoad all the files inside of the received folder
     *
     * @param string $strClassFolder
     */
    public function preLoadClassFolder( $strClassFolder )
    {
        $oDirExceptions = dir( $strClassFolder );
        while( false !== ( $strFileName = $oDirExceptions->read() ) )
        {
            if( substr( $strFileName, -4) == ".php" )
            {
                $strClassName = substr( $strFileName , 0 , strpos( $strFileName , "." ) );
                $this->preLoadClassFile( $strClassName , $strClassFolder . "/" . $strFileName);
            }
        }
    }

    public function classExists( $strClassName )
    {
    
        if( in_array( $strClassName , array( "integer" , "string" , "number" , "float" ) ) )
        {
            return false;
        }
        
        try
        {
            $this->loadClass( $strClassName , false );
        }
        catch( \Exception $objException )
        {
            return false;
        }
        if( get_parent_class( $strClassName ) == 'CorujaNotFoundedClass' )
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}
?>