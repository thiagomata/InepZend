<?php
namespace Coruja\Annotation;

/**
 * CorujaAnnotation - Class of annotation manipulation
 * @package coruja.components.annotation
 */
/**
 * Class with deal with the annotations service creating a OO
 * access and rules to them
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
class CorujaAnnotation implements Interfaces\CorujaAnnotationInterface
{
    /**
     * Element what will have the annotations marks
     *
     * @var stdClass
     */
    private $objElement;

    /**
     * Name of the Class responsable to the Annotations of the Class of the Element
     *
     * @var string 
     */
    private $strAnnotationClass = "";

    /**
     * Name of the Class responsable to the Annotations of the Methods of the
     * Class of the Element
     *
     * @var string
     */
    private $strAnnotationMethod = "";

    /**
     * Name of the Class responsable to the Annotations of the Attributes of the
     * Class of the Element
     *
     * @var string
     */
    private $strAnnotationAttribute = "";

    /**
     * Annotation Class Instance
     *
     * @var CorujaAnnotationClassInterface
     */
    private $objAnnotationClass;

    /**
     * Array of Annotation Objects Instances
     *
     * @var CorujaAnnotationMethodInterface[]
     */
    private $arrAnnotationMethods = array();

    /**
     * Array of Annotation Attributes Instances
     *
     * @var CorujaAnnotationAttributeInterface[]
     */
    private $arrAnnotationAttributes = array();

    /**
     * Collection of CorujaAnnotation to each class.
     *
     *
     * @var CorujaAnnotation[]
     */
    private static $arrInstances = array();

    /**
     *
     * If the class of the received element already has a annotation class this
     * annotation class will be returned, otherwise a new annotation class will
     * be created and returned.
     *
     * @param stdClass $objElement
     * @return CorujaAnnotation
     */
    public function getInstance( $objElement )
    {
        $strClassName = get_class( $objElement );
        if( isset( self::$arrInstances[ $strClassName ] ) )
        {
            return self::$arrInstances[ $strClassName ];
        }
        else
        {
            $objInstance = new CorujaAnnotation( $objElement );
            self::$arrInstances[ $strClassName ] = $objInstance;
            return $objInstance;
        }
    }

    /**
     * Get the Tag Value of a Doc Comment
     *
     * @assert( "* @something cool" , "something" ) == "cool"
     * @assert( "* @something cool" , "else" ) == null
     * @assert( "* @something " , "something" ) == ""
     * @param String $strDocComment
     * @param String $strTag
     * @return String
     */
    public static function getDocCommentTagValue($strDocComment, $strTag)
    {
        $strTag = strtolower( $strTag );
        $booString = true;
        $strTag = str_replace( "@" , "" , $strTag );
        $arrLines = explode( "@" , $strDocComment );
        $arrIgnore = Array( "*/" , "*/" , "/**", "*" , "	" );
        foreach( $arrLines as $strLine )
        {
            $strLine = trim( str_replace( $arrIgnore , " " , $strLine ) );
            $intSpacePos = strpos( $strLine , " " );
            $intParentesesPos = strpos( $strLine , "[" );

            if(  $intSpacePos !== false && ( $intParentesesPos == false || $intParentesesPos > $intSpacePos ) )
            {
                $strActualTag = substr( $strLine , 0 , $intSpacePos );
            }
            else
            {
                $intSpacePos = strpos( $strLine , "[" );
                if(  $intSpacePos !== false )
                {
                    $strActualTag = substr( $strLine , 0 , $intSpacePos );
                    $intSpacePos--;
                    $booString = false;
                }
                else
                {
                    $strActualTag = $strLine;
                }
            }

            if( strtolower( $strActualTag ) == $strTag )
            {
                if( $intSpacePos == false )
                {
                    return "";
                }
                $strValue = substr( $strLine , $intSpacePos + 1 );
                $strValue = trim( $strValue );
                $arrSplit = str_split( $strValue );
                if( $strValue[0] == "[" && \end( $arrSplit ) == "]" )
                {
                    $booString = false;
                }
                
                if( $booString )
                {
                    return $strValue;
                }
                else
                {
                    $strValue[0] = '(';
                    $strValue[strlen( $strValue ) - 1 ] = ')';
                    $strValue = 'return array' . $strValue . ';';
                    return eval( $strValue );
                }

            }
        }
        return null;
    }

    /**
     * Init the Annotation Component
     *
     * @param stdClass $objElement
     */
    public function __construct( /*stdClass*/ $objElement = null )
    {
        if( $objElement != null )
        {
            $this->objElement = $objElement;
            $this->initAnnotations();
        }
    }

    /**
     * Init the Annotation Responsables
     *
     * Get the last version of the Annotation Tags
     * - Annotation Class
     * - Annotation Method
     * - Annotation Attribute
     *
     * @plan{
     *  <ol>
     *      <li> For Each of All the Class Parentes of the Element </li>
     *      <li> Get the Last Version of the Annotation Class Annotation Tag </li>
     *      <li> Get the Last Version of the Annotation Class Method Tag </li>
     *      <li> Get the Last Version of the Annotation Class Attribute Tag </li>
     *  </ol>
     * }
     */
    protected function initAnnotationResponsables()
    {
        /**
         * Get all the Class Parents of the Class of the Element
         */
        $arrClass = class_parents( $this->objElement ) ;

        /**
         * Append the Class of the Element itself
         */
        array_unshift( $arrClass , get_class( $this->objElement ) );

        /**
         * Search in all of then ( newest to oldest )
         * the annotation tags
         */
        foreach( $arrClass as $strClass )
        {
            /**
             * Get the Doc Comment of the Class
             */
            $objReflection = new \ReflectionClass( $strClass );
            $objReflection->getDocComment();

            /**
             * Search for the Annotation of the AnnotationClass
             */
            $strNewValue = self::getDocCommentTagValue( $objReflection->getDocComment(), "@AnnotationClass" );
            	
            if( $strNewValue != "" and $this->strAnnotationClass == "" )
            {
                $this->strAnnotationClass = $strNewValue;
            }

            /**
             * Search for the Annotation of the AnnotationMethod
             */
            $strNewValue = self::getDocCommentTagValue( $objReflection->getDocComment(), "@AnnotationMethod" );
            if( $strNewValue != "" and $this->strAnnotationMethod == "" )
            {
                $this->strAnnotationMethod = $strNewValue;
            }
            	
            /**
             * Search for the Annotation of the AnnotationAttribute
             */
            $strNewValue = self::getDocCommentTagValue( $objReflection->getDocComment(), "@AnnotationAttribute" );
            if( $strNewValue != "" and $this->strAnnotationAttribute == "" )
            {
                $this->strAnnotationAttribute = $strNewValue;
            }

            /**
             * If All the Elements already are filled, into the most recent
             * version. The search already can be stopped.
             */
            if( $this->strAnnotationAttribute != "" and $this->strAnnotationClass != "" and $this->strAnnotationMethod != "" )
            {
                break;
            }
        }
    }

    /**
     * Init the Annotations
     *
     * @plan{
     * <ol>
     *  <li> Init the Annotation Responsables </li>
     *  <li> Init the Annotation Class </li>
     *  <li> Init the Annotation Methods </li>
     *  <li> Init the Annotation Attributes </li>
     * </ol>
     * }
     *
     * @see initAnnotationResponsables
     * @see initAnnotationClass
     * @see initAnnotationMethods
     * @see initAnnotationAttributes
     */
    protected function initAnnotations()
    {
        $this->initAnnotationResponsables();
        $this->initAnnotationClass();
        $this->initAnnotationMethods();
        $this->initAnnotationAttributes();
    }

    /**
     * Init the Annotation Class
     *
     * @plan{
     * <ol>
     *  <li> Check if the Annotation Class Is Set </li>
     *  <li> Check if the Annotation Exists </li>
     *  <li> Create a Instance of the Annotation Class </li>
     *  <li> Init the Annotation Class </li>
     *  <li> For Each Method in the Annotation Class
     *      <ol>
     *          <li>
     *              If is not a interface method
     *          </li>
     *          <li>
     *              And if is a setter method
     *          </li>
     *          <li>
     *              Get the value of the doc tag comment
     *          </li>
     *          <li>
     *              Send it to the Annotation Class responsable
     *          </li>
     *      </ol>
     *  </li>
     * </ol>
     * }
     *
     * @throws CorujaAnnotationException
     * @return void
     */
    protected function initAnnotationClass()
    {
        /**
         *  Check if the Annotation Class Is Set
         */
        if( $this->strAnnotationClass == "" )
        {
            return;
        }

        /**
         *  Check if the Annotation Class exists
         */
        if( !class_exists( $this->strAnnotationClass ) )
        {
            throw new CorujaAnnotationException( "Reflection Annotation Class " . $this->strAnnotationClass . " don't exist " );
        }

        /**
         * All the Annotations setter Methods should be filled by the
         * information inside the annotation tags, except a group of
         * methods what are of internal controll, what is defined
         * into this $arrInterfaceMethods array.
         */
        $arrAnnotationsClass = get_class_methods( $this->strAnnotationClass );
        $arrInterfaceMethods = array( "setEntityName" );

        /**
         * Create the Instance of the Annotation Class
         */
        $this->objAnnotationClass = new $this->strAnnotationClass();

        /**
         * @var $this->objAnnotationClass CorujaAnnotationClassInterface
         */

         /**
          * If the Annotation Class not implement the Annotation Class Interface,
          * the Informed Annotation Class is a invalid class.
          */
        if( ! $this->objAnnotationClass instanceof Interfaces\CorujaAnnotationClassInterface )
        {
            throw new CorujaAnnotationException( $this->strAnnotationClass . " is not a Annotation Class Interface " );
        }

        /**
         * Set into the Annotation Class the Container Name
         */
        $this->objAnnotationClass->setClassContainerName( get_class( $this->objElement ) );

        /**
         * Foreach Method of the Annotation Class
         */
        foreach( $arrAnnotationsClass as $strAnnotationMethod )
        {
            if
            (
                /**
                 * is not a interface method
                 */
                ( !in_array( $strAnnotationMethod , $arrInterfaceMethods ) )
            and
                /**
                 * if is a set method
                 */
                ( substr( $strAnnotationMethod , 0 , 3 ) === "set" )
            )
            {
                	
                $objMethod = new \ReflectionClass( get_class( $this->objElement ) );

                /**
                 * removing the "set" of the method and lowercasing the first char
                 */
                $strAnnotationName = strtolower($strAnnotationMethod[3]) . substr( $strAnnotationMethod , 4 );

                /**
                 * get the value of the doc tag comment
                 */
                $mixValue = self::getDocCommentTagValue( $objMethod->getDocComment(), $strAnnotationName );

                if( $mixValue != "" )
                {
                    /**
                     * send it to the annotation class responsable
                     */
                    $this->objAnnotationClass->{$strAnnotationMethod}( $mixValue );
                }
            }
        }

        /**
         * Validate the Annotation Class
         */
        $this->objAnnotationClass->validate();

    }

    /**
     * Init the Annotation Method
     *
     * @plan{
     * <ol>
     *  <li> Check if the Annotation Method Is Set </li>
     *  <li> Check if the Annotation Method Exists </li>
     *  <li>
     *       For Each Method in the Reflected Class
     *       <ol>
     *           <li> Create a Instance of the Annotation Method </li>
     *           <li> Init the Annotation Method </li>
     *           <li> For Each Method in the Annotation Method
     *               <ol>
     *                   <li>
     *                       If is not a interface method
     *                   </li>
     *                   <li>
     *                       And if is a setter method
     *                   </li>
     *                   <li>
     *                       Get the value of the doc tag comment
     *                   </li>
     *                   <li>
     *                       Send it to the Annotation Method responsable
     *                   </li>
     *               </ol>
     *           </li>
     *       </ol>
     * </ol>
     * }
     *
     * @throws CorujaAnnotationException
     * @return void
     */
    protected function initAnnotationMethods()
    {
        /**
         *  Check if The Annotation Method is set
         */
        if( $this->strAnnotationMethod == "" )
        {
            return;
        }

        /**
         *  Check if the Annotation Method Class Exists
         */
        if( !class_exists( $this->strAnnotationMethod ) )
        {
            throw new CorujaAnnotationException( "Reflection Annotation Class " . $this->strAnnotationMethod . " Don't exist " );
        }

        /**
         * Get the Methods os the Reflected Class
         */
        $oReflectionClass = new \ReflectionClass( get_class( $this->objElement )  );
        $arrMethods = $oReflectionClass->getMethods();

        /**
         * Get the Methods of the Annotation Class
         */
        $arrAnnotationsMethods = get_class_methods( $this->strAnnotationMethod );

        /**
         * All the Annotations setter Methods should be filled by the
         * information inside the annotation tags, except a group of
         * methods what are of internal controll, what is defined
         * into this $arrInterfaceMethods array.
         */
        $arrInterfaceMethods = array( "setAttributeName" , "setClassContainerName" );

        /**
         * Foreach Method of the Reflected Class
         */
        foreach( $arrMethods as $objReflectionProperty)
        {
            /*@var $objReflectionProperty \ReflectionMethod*/

            /**
             * Create an Instance of the Annotation Method
             */
            $strAnnotationMethodClass = $this->strAnnotationMethod;
            $objAnnotationMethodElement = new $strAnnotationMethodClass( $objReflectionProperty->getDeclaringClass() , $objReflectionProperty->getName() );
            	
            /**
             * @var $objAnnotationMethodElement CorujaAnnotationMethodInterface
             */

             /**
              * If the Annotation Method not implement the Annotation Method Interface,
              * the Informed Annotation Method is a invalid class.
              */
            if( ! $objAnnotationMethodElement instanceof Interfaces\CorujaAnnotationMethodInterface )
            {
                throw new CorujaAnnotationException( $this->strAnnotationMethod . " is not a Annotation Method Interface " );
            }

            /**
             * Init  the Annotation Method
             */
            $objAnnotationMethodElement->setMethodName( $objReflectionProperty->getName() );
            $objAnnotationMethodElement->setClassContainerName( $objReflectionProperty->getDeclaringClass()->name );

            /**
             * Foreach Method into the Annotation Method Class
             */
            foreach( $arrAnnotationsMethods as $strAnnotationMethod )
            {
                if
                (
                    /**
                     * is not a interface method
                     */
                    ( !in_array( $strAnnotationMethod , $arrInterfaceMethods ) )
                and
                    /**
                     * if is a set method
                     */
                    ( substr( $strAnnotationMethod , 0 , 3 ) === "set" )
                )
                {

                    /**
                     * removing the "set" of the method and
                     * lowercasing the first char
                     */
                    $strAnnotationName = strtolower($strAnnotationMethod[3]) . substr( $strAnnotationMethod , 4 );
                    	
                    /**
                     * get the value of the doc tag comment, if exists
                     */
                    $mixValue = self::getDocCommentTagValue( $objReflectionProperty->getDocComment(), $strAnnotationName );

                    /**
                     * send it to the annotation class responsable
                     */
                    $objAnnotationMethodElement->{$strAnnotationMethod}( $mixValue );
                }
            }

            /**
             * Validate the Annotation Method Element
             */
            $objAnnotationMethodElement->validate();

            /**
             * append this annotation method to the array
             */
            $this->arrAnnotationMethods[ strtolower( $objReflectionProperty->getName() ) ] = $objAnnotationMethodElement;
        }
    }

    /**
     * Init the Annotation Attributes
     *
     * @plan{
     * <ol>
     *  <li> Check if the Annotation Attribute Is Set </li>
     *  <li> Check if the Annotation Attribute Exists </li>
     *  <li>
     *       For Each Attribute in the Reflected Class
     *       <ol>
     *           <li> Create a Instance of the Annotation Attribute </li>
     *           <li> Init the Annotation Attribute </li>
     *           <li> For Each Method in the Annotation Attribute
     *               <ol>
     *                   <li>
     *                       If is not a interface method
     *                   </li>
     *                   <li>
     *                       And if is a setter method
     *                   </li>
     *                   <li>
     *                       Get the value of the doc tag comment
     *                   </li>
     *                   <li>
     *                       Send it to the Annotation Attribute responsable
     *                   </li>
     *               </ol>
     *           </li>
     *       </ol>
     * </ol>
     * }
     *
     * @throws CorujaAnnotationException
     * @return void
     */
    protected function initAnnotationAttributes()
    {
        /**
         * Check if the Annotation Attribute is Set
         */
        if( $this->strAnnotationAttribute == "" )
        {
            return;
        }

        /**
         * Check if The Annotation Attribute Exists
         */
        if( !class_exists( $this->strAnnotationAttribute ) )
        {
            throw new CorujaAnnotationException( "Reflection Annotation Class " . $this->strAnnotationAttribute . " Don't exist " );
        }

        /**
         * Get the Attributes of The Reflected Class
         */
        $oReflectionClass = new \ReflectionClass( get_class( $this->objElement )  );
        $arrAttributes = $oReflectionClass->getProperties();

        /**
         * Get the Methods of the Annotation Attribute Class
         */
        $arrAnnotationsAttributes = get_class_methods( $this->strAnnotationAttribute );

        /**
         * All the Annotations setter Methods should be filled by the
         * information inside the annotation tags, except a group of
         * methods what are of internal controll, what is defined
         * into this $arrInterfaceMethods array.
         */
        $arrInterfaceMethods = array( "setAttributeName" , "setClassContainerName" );

        /**
         * For each Attribute of the Reflected Class
         */
        foreach( $arrAttributes as $objReflectionProperty)
        {
            /**
             * @var $objReflectionProperty \ReflectionProperty
             */

            /**
             * Create the Annotation Attribute Class
             */
            $strAnnotationAttributeClass = $this->strAnnotationAttribute;
            $objAnnotationAttributeElement = new $strAnnotationAttributeClass( $objReflectionProperty->getDeclaringClass()->name , $objReflectionProperty->getName() );

             /**
              * If the Annotation Attribute Class not implement the Annotation Attribute Interface,
              * the Informed Annotation Attribute is a invalid class.
              */
            if( ! $objAnnotationAttributeElement instanceof Interfaces\CorujaAnnotationAttributeInterface )
            {
                throw new CorujaAnnotationException( $this->strAnnotationAttribute . " is not a Annotation Attribute Interface " );
            }


            /**
             * @var $objAnnotationAttributeElement CorujaAnnotationAttributeInterface
             */

            $objAnnotationAttributeElement->setAttributeName( $objReflectionProperty->getName() );
            $objAnnotationAttributeElement->setClassContainerName( $objReflectionProperty->getDeclaringClass()->name );
            	
            foreach( $arrAnnotationsAttributes as $strAnnotationMethod )
            {
                if
                (
                    /**
                     * is not a interface method
                     */
                    ( !in_array( $strAnnotationMethod , $arrInterfaceMethods ) )
                and
                    /**
                     * if is a set method
                     */
                    ( substr( $strAnnotationMethod , 0 , 3 ) === "set" )
                )
                {

                    /**
                     * removing the "set" of the method and lowercasing the first char
                     */
                    $strAnnotationName = strtolower($strAnnotationMethod[3]) . substr( $strAnnotationMethod , 4 );
                    	
                    /**
                     * get the value of the doc tag comment, if exists
                     */
                    $mixValue = self::getDocCommentTagValue( $objReflectionProperty->getDocComment(), $strAnnotationName );

                    /**
                     * send it to the annotation class responsable
                     */
                    if( $mixValue !== null )
                    {
                        if( $mixValue == '' )
                        {
                            $objAnnotationAttributeElement->{$strAnnotationMethod}();
                        }
                        else
                        {
                            $objAnnotationAttributeElement->{$strAnnotationMethod}( $mixValue );
                        }
                    }

                }
            }

            /**
             * Validate the Annotation Attribute Element
             */
            $objAnnotationAttributeElement->validate();

            /**
             * append this annotation attribute to the array
             */
            $this->arrAnnotationAttributes[ strtolower( $objReflectionProperty->getName() ) ] = $objAnnotationAttributeElement;
        }
    }

    /**
     * Get the annotation class
     *
     * @return InterfaceAnnotationClass
     */
    public function getAnnotationClass()
    {
        return $this->objAnnotationClass;
    }

    /**
     * Get some Annotation Attribute of the Reflected Class
     *
     * @param string $strAttributeName
     * @return CorujaAnnotationAttributeInterface
     * @throws CorujaAnnotationException
     */
    public function getAnnotationAttribute( $strAttributeName )
    {
        $strAttributeName = strtolower( $strAttributeName );
        if( array_key_exists( $strAttributeName , $this->arrAnnotationAttributes ) )
        {
            return $this->arrAnnotationAttributes[ $strAttributeName ];
        }
        else
        {
            throw new CorujaAnnotationException( "The annotation of the attribute " . $strAttributeName . " was not founded" );
        }
    }

    /**
     * Get the Annotations Attributes of the Reflected Class
     *
     * @return CorujaAnnotationAttributeInterface[]
     */
    public function getAnnotationAttributes()
    {
        return $this->arrAnnotationAttributes;
    }

    /**
     * Get some Annotation Method of the Reflected Class
     *
     * @param string $strMethodName
     * @return CorujaAnnotationMethodInterface
     */
    public function getAnnotationMethod( $strMethodName )
    {
        $strMethodName = strtolower( $strMethodName );
        if( array_key_exists( $strMethodName , $this->arrAnnotationMethods ) )
        {
            return $this->arrAnnotationMethods[ $strMethodName ];
        }
        else
        {
            throw new CorujaAnnotationException( "The annotation of the method " . $strMethodName . " was not founded" );
        }
    }

    /**
     * Get the Annotation Methods of the Reflected Class
     *
     * @return CorujaAnnotationMethodInterface[]
     */
    public function getAnnotationMethods()
    {
        return $this->arrAnnotationMethods;
    }
}
?>
