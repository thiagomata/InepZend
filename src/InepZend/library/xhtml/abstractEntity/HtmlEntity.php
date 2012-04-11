<?php
namespace xhtml\abstractEntity;

/**
 * Common attributes can be used in most HTML tags.
 *
 * They comprise of Core attributes, I18n attributes and Events attributes.
 *
 * @link http://htmldog.com/reference/htmltags/commonattributes/
 */
abstract class HtmlEntity extends \Coruja\Template\CorujaXmlEntity
{
    /**
     * XML Tag Name
     * 
     * @var string
     */
    protected $strTag;

    /**
     * Space separated list of classes
     *
     * @xmlProperty class
     * @xmlMultivalues String[]
     * @xmlValueseparated " "
     * @var String
     */
    protected $arrClass;

    /**
     * Associated style info
     *
     * @xmlProperty style
     * @xmlMultivalues String[]
     * @xmlValueSeparated ";"
     * @var String
     */
    protected $arrStyle;

    /**
     * Specifies the language of an element.
     *
     * Values can be abbreviations
     * such as en (English), fr (French) or de (German).
     *
     * @xmlproperty lang
     * @var String
     */
    protected $strLanguage;

    /**
     * Specifies a keyboard navigation accelerator for the element.
     *
     * Pressing ALT or a similar key in association with the specified character
     * selects the form control correlated with that key sequence.
     *
     * Page designers are forewarned to avoid key sequences already bound to
     * browsers. This attribute is global since [HTML5].
     *
     * @xmlproperty acesskey
     * @var String
     */
    protected $strAcessKey;

    /**
     * A numeric value specifying the position of the defined area in the
     * browser tabbing order.
     *
     * This attribute is global in [HTML5].
     *
     * @xmlunique
     * @xmlproperty tabindex
     * @var String
     */
    protected $intTabIndex;

    /**
     * Specifies the direction of content.
     * Values can be ltr (left to right) or rtl (right to left).
     *
     * @xmlproperty dir
     * @xmlvalue [ "ltr" , "rtl" ]
     * @var String
     */
    protected $strDir;

    /**
     * Media type
     * comma-separated list of
     * media types, as per [RFC2045]
     *
     * @xmlProperty media
     * @xmlMultiValues [ "printer" , "screen"  , "text"      , "video"       ,
     *                    "model"   , "audio"   , "multipart" , "application" ,
     *                    "image"   , "example" ]
     * @xmlSeparated ","
     * @var String[]
     */
    protected $strMedia;

    /**
     * Adds a title to an element. Many browsers will display the
     * value of this attribute when the element is hovered-over is
     * in focus
     *
     * @xmlproperty language
     * @var String
     */
    protected $strTitle;

    /**
     * a pointer button was clicked
     *
     * @xmlproperty onclick
     * @var String
     */
    protected $strOnClick;

    /**
     * a pointer button was double clicked
     *
     * @xmlproperty ondblclick
     * @var String
     */
    protected $strOnDblClick;

    /**
     * a pointer button was pressed down
     *
     * @xmlproperty onmousedown
     * @var String
     */
    protected $strOnMouseDown;

    /**
     * a pointer button was released
     *
     * @xmlproperty onmouseup
     * @var String
     */
    protected $strOnMouseUp;

    /**
     * a pointer was moved onto the element
     *
     * @xmlproperty onmousemove
     * @var String
     */
    protected $strOnMouseMove;

    /**
     * a pointer was moved away from the element
     *
     * @xmlproperty onmouseout
     * @var String
     */
    protected $strOnMouseOut;

    /**
     * a key was pressed and released
     *
     * @xmlproperty onkeypress
     * @var String
     */
    protected $strOnKeyPress;

    /**
     * a key was pressed down
     *
     * @xmlproperty onkeydown
     * @var String
     */
    protected $strOnKeyDown;

    /**
     * a key was releas ed
     *
     * @xmlproperty onkeyup
     * @var String
     */
    protected $strOnKeyUp;

    /**
     * Array of restrictions of childs what this tag can accepts as child.
     *
     * Should be filled using the "tag" as key and the restriction of ocurrence
     * as value.
     *
     * The restriction of ocurrence can be "n" or "*" to accept any number of
     * elements or should be filled with the minimal ocurrence value concatenated
     * with ".." and concatenated with the maximum ocurrence value.
     * Some acceptable values for example:
     *
     * <code>
     * $arrChildNodesRule = array
     * (
     *      "foo" => "0..10",  // can have 0 to 10 "foo" tags. More than that will throw error
     *      "bar" => "2..5",   // must have at least 2 "bar" and in the most 5 elements
     *      "xxx" => "*..2",   // can have any number less then 2 of elements of "xxx"
     *      "yyy" => "2..*",   // must have at least 2 "yyy" childs, no maximum ocurrence.
     *      "zzz" => "*",      // Can have any number of elements of "zzz"
     *      "www" => "10",     // Must have precisely 10 elements of "www"
     * );
     * </code>
     *
     * @note {
     *  If value is a empty array, no child it is accpetable. If the value is null
     *  so any child is accpetable.
     * }
     * 
     * @var String[]
     */
    protected $arrChildNodesRule = array();

    /**
     * Add a text content into the html tag
     *
     * @param string $strTextContent
     * @return HtmlEntity
     */
    public function addText( $strTextContent )
    {
        $objText = new \xhtml\Text();
        $objText->setTextContent( $strTextContent );
        $this->addChild( $objText );
        return $this;
    }

    public function setTextContent( $strTextContent )
    {
        return $this->addText( $strTextContent );
    }
    
    /**
     * Return the tag name
     *
     * @return string
     */
    public function getTagName()
    {
        if( $this->strTag == null )
        {
            $this->strTag = parent::getTagName();
        }
        return $this->strTag;
    }

    /**
     * Set the tag name
     *
     * @param string $strTagName
     * @return HtmlEntity
     */
    public function setTagName( $strTagName )
    {
        $this->strTag = $strTagName;
        return $this;
    }

    /**
     * Check if the method is a setter
     *
     * @param string $strMethod Method Name
     * @return boolean
     */
    protected function isSetter( $strMethod )
    {
        return ( \substr( $strMethod , 0 , 3 ) == "set" );
    }

    /**
     * Check if the method is a getter
     *
     * @param string $strMethod
     * @return boolean
     */
    protected function isGetter( $strMethod )
    {
        return ( \substr( $strMethod , 0 , 3 ) == "get" );
    }

    /**
     * Check if the method is on method of append value
     *
     * @param string $strMethod
     * @return boolean
     */
    protected function isAdd( $strMethod )
    {
        return ( \substr( $strMethod , 0 , 3 ) == "add" );
    }

    /**
     * Get the property name based on method name
     *
     * @param string $strMethod
     * @return string
     */
    public function getPropertyByMethod( $strMethod )
    {
        return \strtolower( \substr( $strMethod , 3 ) );
    }
    
    /**
     * Get attribute by property
     * 
     * @param string $strProperty
     * @return \Coruja\Template\XmlTemplateAnnotationAttribute
     */
    protected function getAnnotationByProperty( $strProperty , $booThrowNotFound = true )
    {
        $arrAnnotationAttributes = $this->getAnnotation()->getAnnotationAttributes();
        foreach( $arrAnnotationAttributes as $objAnnotationAttribute )
        {
            if( $objAnnotationAttribute->getXmlProperty() == $strProperty )
            {
                return $objAnnotationAttribute;
            }
        }
        if( $booThrowNotFound )
        {
            $strMessage = "Property $strProperty not founded into " .get_class( $this ) . ".";
            throw new \Coruja\Template\CorujaTemplateException( $strMessage );
        }
        return null;
    }

    /**
     * Check if the type received is a list type
     *
     * @param string $strType
     * @return boolean
     */
    protected function isList( $strType )
    {
        return ( \strpos( $strType , "[]" ) !== FALSE );
    }

    /**
     * Receiving the value and the restriction, checks if the value is acceptable
     * into this restrictions.
     *
     * - If Restriction is an array, accepts only values into this array;
     * - If Restriction is "String[]" or "String" accepts only Strings
     * - If Restriction is "Integer[]" or "Integer" accepts only Integers
     * - If Restriction is "Number[]" or "Number" accepts only Numbers
     *
     * @param mixer $mixRestriction Can be array or string
     * @param mixer $mixValue
     * @return boolean
     */
    protected function inValues( $mixRestriction ,  $mixValue )
    {
        if( \is_array( $mixRestriction ) )
        {
            return \in_array( $mixValue , $mixRestriction );
        }
        $mixRestriction = \strtolower( $mixRestriction );

        if( $mixRestriction == "string[]" || $mixRestriction == "string")
        {
            if( is_string( $mixValue ) )
            {
                return true;
            }
        }
        if( $mixRestriction == "integer[]" || $mixRestriction == "integer" )
        {
            if( \is_numeric( $mixValue ) )
            {
                return $mixValue == (string)(integer)$mixValue;
            }
        }
        if(
            in_array(
                $mixRestriction ,
                array(  "float" , "float[]" , "number" , "number[]" ,
                        "numeric" , "numeric[]" , "double" , "double[]" )
            )
          )
        {
            if( \is_numeric( $mixValue ) )
            {
                return $mixValue == (string)(float)$mixValue;
            }
        }
        return false;
    }
    
    /**
     * Replace the value of some element to the new value received.
     *
     * This method should be called by the __call method when the method name
     * fits as a setter method.
     *
     *  This method should be called whe some "set" method be called, as
     * "setName" or "setId".
     *
     * To works properly, the method name must be the "set" concatnate with
     * the property name.
     *
     * This method should return true if was able to find the parameter to be
     * setter and change it's value or false otherwise.
     *
     * This method validates:
     * - if the property exists
     * - if the value it is acceptable
     * - if the type is appropriate ( making cast when possible )
     *
     * @example {
     *      $objSpan = new xhtml\Span();
     *      $objSpan->setId( "place" );
     *      $objSpan->setClass( "validation" );
     *      $objSpan->setType( "text" );
     *      $objSpan->setValue( "This is my value" );
     *      return $objSpan->drawMe();
     * }
     *
     * @test {
     *      function () {
     *          $objSpan = new \xhtml\Span();
     *          $objSpan->setId( "place" );
     *          // set a value to the class
     *          $objSpan->setClass( "old" );
     *          // replace the value to this new one
     *          $objSpan->setClass( "new" );
     *          $objSpan->setType( "text" );
     *          $objSpan->setValue( "This is my value" );
     *          return $objSpan;
     *      } ,
     *      '==',
     *      '<span id="place" class="new" type="text" value="This is my value" />'
     * }
     *
     * @test {
     *      function() {
     *          $objDiv = \xhtml\Div();
     *          // sets a not existing property
     *          $objDiv->setFoo();
     *      } ,
     *      'throws',
     *      '\BadMethodCallException'
     * }
     *
     *
     * @see HtmlEntity::isSetter
     * @see HtmlEntity::__call
     * @see HtmlEntity::getPropertyByMethod
     * @see HtmlEntity::getAnnotationByProperty
     * @param string $strMethod Method Name
     * @param mixer $mixNewValue New Value of the Property
     * @param { boolean $booReplaceValue In collections properties, controls if the 
     * value should be append or replaced. }
     * @return boolean
     */
    protected function magicSetter( $strMethod , $mixNewValue , $booReplaceValue = false )
    {
        $strProperty = $this->getPropertyByMethod( $strMethod );
        $objAnnotation = $this->getAnnotationByProperty( $strProperty ,false );
        if  (
                $objAnnotation != null &&
                \array_key_exists( $objAnnotation->getAttributeName() , \get_object_vars( $this ) )
            )
        {
            /**
             * Is a collection element
             */
            if( $objAnnotation->getXmlMultivalues() !== null )
            {
                $strSeparated = $objAnnotation->getXmlValueSeparated();
                if(\is_null( $strSeparated ) )
                {
                    $strSeparated = " ";
                }
                $arrValues = explode( $strSeparated , $mixNewValue );
                foreach( $arrValues as $mixNewValue )
                {
                    $booReturn = false;
                    if( $this->inValues( $objAnnotation->getXmlMultivalues() , $mixNewValue ) )
                    {
                        $strAttribute = $objAnnotation->getAttributeName();
                        if( $this->{$strAttribute} === null || $booReplaceValue )
                        {
                            $this->{$strAttribute} = array();
                        }
                        $this->{$strAttribute}[] = $mixNewValue;
                        $booReturn = true;
                    }
                }
                return $booReturn ;
            }
            /**
             * Trying to use an add method into a not collection property.
             * Should return false
             */
            if( $this->isAdd( $strMethod ) )
            {
                return false;
            }
            if( $objAnnotation->getXmlValues() !== null )
            {
                $strAttribute = $objAnnotation->getAttributeName();
                if( $this->inValues( $objAnnotation->getXmlValues() , $mixNewValue ) )
                {
                    $this->{$strAttribute} = $mixNewValue;
                    return true;
                }
                return false;
            }
            /**
             * Var annotation validation
             */
            if( $objAnnotation->getVar() !== null )
            {
                $strAttribute = $objAnnotation->getAttributeName();
                switch( \strtolower( $objAnnotation->getVar() ) )
                {
                    case "string":
                    {
                        if( \is_string( $mixNewValue ) )
                        {
                            $this->{$strAttribute} = $mixNewValue;
                            return true;
                        }
                        break;
                    }
                    case "integer":
                    {
                        if( (string)(integer)$mixNewValue == $mixNewValue )
                        {
                            $this->{$strAttribute} = (integer)$mixNewValue;
                            return true;
                        }
                        break;
                    }
                    case "number":
                    case "float":
                    {
                        if( (string)(float)$mixNewValue == $mixNewValue )
                        {
                            $this->{$strAttribute} = (float)$mixNewValue;
                            return true;
                        }
                        break;
                    }
                    case "boolean":
                    {
                        if( is_string( $mixNewValue ) && \strtolower( $strProperty ) == \strtolower( $mixNewValue ) )
                        {
                            $this->{$strAttribute} = true;
                            return true;
                        }
                        if( is_string( $mixNewValue ) )
                        {
                            $booValue = \CorujaStringManipulation::strToBool( $mixNewValue );
                            $this->{$strAttribute} = $booValue;
                            return true;
                        }
                    }
                    default:
                    {
                        $strClass = $objAnnotation->getVar();
                        if( $mixNewValue instanceof $strClass )
                        {
                            $this->{$strAttribute} = $mixNewValue;
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }
    
    /**
     * Append an element into the group of values of some property
     *
     * Magic Method to be executed when some "add" method is called
     * can be used to add properties as "addClass".
     *
     * All the validations of the magicSetter will still be in use.
     *
     * If the method add be called into a string element will return false.
     *
     * @example {
     *      $objSpan = new \xhtml\Span();
     *
     *      // first value, starting with set
     *      $objSpan->setClass( "old" );
     *      // append value
     *      $objSpan->addClass( "new" );
     *
     *      // first value, starting with add
     *      $objSpan->addStyle( "color: blue" );
     *      $objSpan->addStyle( "size: 20px" );
     *
     *      return $objSpan->drawMe();
     * }
     *
     * @test {
     *      function () {
     *          $objSpan = new \xhtml\Span();
     *          $objSpan->setId( "place" );
     *
     *          // first value, starting with set
     *          $objSpan->setClass( "old" );
     *          // append value
     *          $objSpan->addClass( "new" );
     *
     *          // first value, starting with add
     *          $objSpan->addStyle( "color: blue" );
     *          $objSpan->addStyle( "size: 20px" );
     *          $objSpan->setType( "text" );
     *          $objSpan->setValue( "This is my value" );
     *          return $objSpan->drawMe();
     *      } ,
     *      '==',
     *      '<span id="place" class="old new" style="color: blue;size: 20px" type="text" value="This is my value" />'
     * }
     * 
     * @see HtmlEntity::__call
     * @see HtmlEntity::magicSetter
     * @param type $strMethod
     * @param type $mixNewValue
     * @return boolean
     */
    protected function magicAdd( $strMethod , $mixNewValue )
    {
        return $this->magicSetter( $strMethod, $mixNewValue , false );
    }

    /**
     * Return the value of some property using the magic method. This method
     * should be called by the __call method when some method looks like a
     * getter, as "getName" or "getId".
     *
     * @test {
     *  $objSpan = new \xhtml\Span();
     *  $objSpan->setId( "place" );
     *  $this->assertEqual( $objSpan->getId() , "place" );
     *}
     *
     * @see HtmlEntity::isGetter
     * @see HtmlEntity::__call
     * @param string $strMethod
     * @return mixed
     */
    protected function magicGetter( $strMethod )
    {
        $strProperty = $this->getPropertyByMethod( $strMethod );
        $objAnnotation = $this->getAnnotationByProperty( $strProperty );
        if( $objAnnotation !== null )
        {
            $strAttribute = $objAnnotation->getAttributeName();
            return $this->{$strAttribute};
        }
        $objChild = $this->getFirstChildByTagName( $strProperty );
        if( $objChild !== null )
        {
            return $objChild;
        }
        $strMessage = "Method $strMethod not founded into " .get_class( $this ) . ".";
        throw new \BadMethodCallException( $strMessage );
    }

    /**
     * Magic method of HtmlEntity. Called every time when some absend method
     * is called.
     * 
     * If the method name looks like a getter, the method magicGetter will
     * be called.
     * 
     * If the method name looks like a setter, the method magicSetter will
     * be called.
     * 
     * If the method name looks like a add, the method magicAdd will be called.
     *
     * If the method don't fits into any time of expected magic method treatment
     * the exception BadMethodCallException will throw
     *
     * @see HtmlEntity::isSetter
     * @see HtmlEntity::magicSetter
     * @see HtmlEntity::isGetter
     * @see HtmlEntity::magicGetter
     * @see HtmlEntity::isAdd
     * @see HtmlEntity::magicAdd
     * @throws BadMethodCallException7
     * @param string $strMethod
     * @param array $arrParam
     * @return HtmlEntity
     */
    public function __call( $strMethod, $arrParam )
    {
        if( $this->isSetter( $strMethod ) )
        {
            if( $this->magicSetter
                (
                   $strMethod ,
                    \CorujaArrayManipulation::getArrayField( $arrParam , 0 )
                )
              )
            {
                return $this;
            }
        }
        if( $this->isAdd( $strMethod ) )
        {
            if( $this->magicAdd
                (
                   $strMethod ,
                    \CorujaArrayManipulation::getArrayField( $arrParam , 0 )
                )
              )
            {
                return $this;
            }
        }
        if( $this->isGetter( $strMethod ) )
        {
            if( $this->magicGetter( $strMethod ) )
            {
                return $this;
            }
        }
        $strMessage = "Method $strMethod not founded into " .get_class( $this ) . ".";
        throw new \BadMethodCallException( $strMessage );
    }

    public function createAttribute( $strAttribute , $mixValue = null )
    {
        $this->{$strAttribute} = $mixValue;
        $this->getAnnotation()->getAnnotationAttribute( $strAttribute )->setXmlProperty( $strAttribute );
    }
}
?>