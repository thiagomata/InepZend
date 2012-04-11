<?php
namespace Coruja\Template;

/**
 * @AnnotationClass Coruja\Template\XmlTemplateAnnotationClass
 * @AnnotationAttribute Coruja\Template\XmlTemplateAnnotationAttribute
 * @AnnotationMethod Coruja\Template\XmlTemplateAnnotationMethod
 */
class CorujaXmlEntity
{
    /**
     * Special Char to Open Dinamic Content
     *
     * @var string
     */
    protected $strOpenControlerCall = "{#";

    /**
     * Special Char to Close Dinamic Content
     *
     * @var string
     */
    protected $strCloseControlerCall = "#}";

    /**
     * Xml Tag name
     *
     * @var String
     */
    protected $strTag;

    /**
     * Context what the project will run into
     *
     * @var \Local\Context\Action
     */
    protected $objContext;

    /**
     * Coruja Annotation Object the read the Annotation Values of
     * the class, attributes and methods.
     *
     * @var CorujaAnnotation
     */
    protected $objAnnotation;

    /**
     * Parent Node
     *
     * @var CorujaXmlEntity
     */
    protected $objParent;
    
    /**
     * Child Nodes Rules
     *
     * @var String[]
     */
    protected $arrChildNodesRule = array(
            'text' => 'n'
    );

    /**
     * Childs of the Node
     *
     * @var HtmlEntity[]
     */
    protected $arrChildTags = array();

    /**
     * Document-wide unique id
     *
     * @xmlproperty id
     * @xmlunique
     * @var Integer
     */
    protected $strId;

    /**
     * Parents what should have this element 
     * 
     * @var string[]
     */
    protected $arrParentNodesRule = null;
    
    /**
     * Constructor of the Xml Entity
     */
    public final function __construct()
    {
        $this->objAnnotation = new \Coruja\Annotation\CorujaAnnotation( $this );
        $this->init();
    }

    /**
     * To be overwrited
     */
    protected function init()
    {

    }

    /**
     * Inform or Replace the Id value
     *
     * @param string $strId
     * @return CorujaXmlEntity
     */
    public function setId( $strId )
    {
        $this->strId = $strId;
        return $this;
    }

    /**
     * Get the Id value
     *
     * @return String
     */
    public function getId()
    {
        return $this->strId;
    }

    /**
     * Search, into all child elements if someone has the received id and
     * return it;
     *
     * If not founded return null.
     * 
     * @param string $strId
     * @return CorujaXmlEntity
     */
    public function getElementById( $strId )
    {
        if( $this->getId() == $strId )
        {
            return $this;
        }
        foreach( $this->getChildTags() as $objChildTag )
        {
            if( $objChildTag->getId() == $strId )
            {
                return $objChildTag;
            }
        }
        foreach( $this->getChildTags() as $objChildTag )
        {
            $objResult = $objChildTag->getElementById( $strId );
            if( $objResult )
            {
                return $objResult;
            }
        }
        return null;
    }

    /**
     * Get the Annotation Component
     *
     * @return CorujaAnnotation
     */
    public function getAnnotation()
    {
        return $this->objAnnotation;
    }

    /**
     * Return the child tags of this tag
     *
     * @return CorujaXmlEntity[]
     */
    public function getChildTags()
    {
        if( $this->arrChildTags == null )
        {
            $this->arrChildTags = array();
        }
        return $this->arrChildTags;
    }

    /**
     * A array that contains all children of this node.
     *
     * If there are no children, this is a array containing no nodes.
     *
     * @see self::getChildTags()
     * @return CorujaXmlEntity[]
     */
    public function getChildNodes()
    {
        return $this->getChildTags();
    }

    /**
     * Return the array of rules
     *
     * @return array
     */
    public function getChildTagRules()
    {
        return $this->arrChildNodesRule;
    }
    
    /**
     * Validate if the Xml Entity should receive the new child.
     * Make all validation what is possible to do on insert.
     *
     * @throws CorujaTemplateException
     * @param CorujaXmlEntity $objChild
     * @return boolean
     */
    public function validateOnInsertChild( CorujaXmlEntity $objChild )
    {
        $strClassChild = $objChild->getTagName();

        $arrChildTagRules = $this->getChildTagRules();

        /**
         * If the child is a Xml Node Without Validation Rule
         * any parent can accept it. Even if it not inform that
         * into the Child Tag Rules
         */
        if( $objChild instanceof \Coruja\Template\XmlNodeOutsideValidationRule )
        {
            return true;
        }
        /**
         * Search new child tag into the allowed child tags
         */
        if( !\array_key_exists( $strClassChild , $arrChildTagRules ) )
        {
            $strMessage =   'Document type does not allow element "' . 
                                $objChild->getTagName() . 
                            '" into the element ' . $this->getTagName() . '.';
            $strMessage .= "\n";
            $strMessage .= 'Missing one ( ' . 
                implode( " , " , \array_keys( $this->arrChildNodesRule )  ) . " ).";
            throw new CorujaTemplateException( $strMessage );
            return false;
        }
        
        $strOcurrence = $arrChildTagRules[ $strClassChild ];
        $intQtdTagsFounded = 0;
        
        /**
         * Count the total of childs with the same tag of the new child
         */
        foreach( $this->getChildTags() as $objChildTag )
        {
            if( get_class( $objChildTag ) == get_class( $objChild ) )
            {
                ++$intQtdTagsFounded;
            }
        }
        /**
         * Get the Max and the Min from the string "max..min"
         *
         * Case the string has just one value it will be the max and the min
         */
        $arrOcurrence = explode( ".." , $strOcurrence );
        $strMin = $arrOcurrence[0];
        $strMax = end( $arrOcurrence );
        if( $strMax == 'n' || $strMax == '*' || ( $strMax > $intQtdTagsFounded  ) )
        {
            /**
             * Everthing is fine!
             */
            return true;
        }

        /**
         * Creating the error message of maximum amout overflow
         */
        $strMessage = 'Unable to insert ' . get_class( $objChild ) . ' into ' . get_class( $this ) . '.';
        $strMessage .= "<br/>\n" . 'The maximum amount is ' . $strMax . ' ' .  get_class( $objChild ) . ' per ' . get_class( $this )  . '.';
        if( $this->getAnnotation()->getAnnotationClass()->getLink() )
        {
            $strMessage .= "<br/>\n" . ' Please visit the '. \strtoupper( $this->getTagName() ). ' <a href="' . $this->getAnnotation()->getAnnotationClass()->getLink() . '">reference</a> for more information.';
        }
        throw new CorujaTemplateException( $strMessage );
        return false;
    }

    /**
     * Try to add a new child into the Xml node
     *
     * @param CorujaXmlEntity $objChild
     */
    public function addChild( CorujaXmlEntity $objChild , $booPushIntoEnd = true )
    {
        $objChild->setParent( $this );
        $this->validateOnInsertChild( $objChild );
        if( $booPushIntoEnd )
        {
            $this->arrChildTags[] = $objChild;
        }
        else
        {
            \array_unshift( $this->arrChildTags , $objChild );
        }
    }

    /**
     * Reverse reference of who is the parent of the node
     *
     * @param CorujaXmlEntity $objParent
     */
    protected function setParent( CorujaXmlEntity $objParent )
    {
        if( $this->objParent !== null )
        {
            $this->objParent->removeChild( $this );
        }
        $this->objParent = $objParent;
    }

    /**
     * Return the Parent of The Node or null if it doesnt exists
     *
     * @return CorujaxmlEntity
     */
    public function getParent()
    {
        return $this->objParent;
    }

    /**
     * The parent of this node.
     * @see self::getParent
     */
    public function getParentNode()
    {
        return $this->getParent();
    }

    /**
     * Return the root parent node of this element
     * 
     * @return CorujaXmlEntity 
     */
    public function getRootParent()
    {
        if( $this->getParent() == null )
        {
            return $this;
        }
        else
        {
            return $this->getParent()->getRootParent();
        }
    }
    
    /**
     * Remove a child of the node
     *
     * return false if child not founded
     *
     * @param CorujaXmlEntity $objChild
     * @return boolean
     */
    public function removeChild( CorujaXmlEntity $objChild )
    {
        foreach( $this->arrChildTags as $intKey => $objChildTag )
        {
            if( $objChildTag == $objChild )
            {
                unset( $this->arrChildTags[ $intKey ] );
                return true;
            }
        }
        return false;
    }

    /**
     * Load the Xml Entity.
     * It can interact with the anothers elements, check if restriction
     * was met, validate values, etc.
     */
    protected function load()
    {
        $this->validateParent();
        $this->validateChildren();
    }

    /**
     * Some child make validation of they own parents
     *
     * This will check the arrParentNodeRule
     */
    protected function validateParent()
    {
        if( $this->arrParentNodesRule !== null )
        {
            if( !$this->hasParentInList( $this->arrParentNodesRule ) )
            {
                if( sizeof( $this->arrParentNodesRule ) > 1 )
                {
                    $strMessage = "The element " . $this->getTagName() . 
                            " must be inside of one of this elemens: " . 
                            implode( ", " , $this->arrParentNodesRule) . ".";
                }
                else
                {
                    $strMessage = "The element " . $this->getTagName() . 
                            " must be inside of one " . 
                            implode( ", " , $this->arrParentNodesRule) . ".";
                }
                throw new CorujaTemplateException( $strMessage );
            }
        }
    }
    
    /**
     * Validate all children of the tag by the rules
     * 
     */
    protected function validateChildren()
    {
        $arrChildTagRules = $this->getChildTagRules();
        $arrOccurrence = array();
        foreach( $this->getChildTags() as $objChildTag )
        {
            /**
             * If the child is a Xml Node Without Validation Rule
             * any parent can accept it. Even if it not inform that
             * into the Child Tag Rules
             */
            if( !$objChildTag instanceof \Coruja\Template\XmlNodeOutsideValidationRule )
            {
                $strTag = strtolower( $objChildTag->getTagName() );
                if( \array_key_exists( $strTag , $arrOccurrence ) )
                {
                    ++$arrOccurrence[ $strTag ];
                }
                else
                {
                    $arrOccurrence[ $strTag ] = 1;
                }
            }
            else
            {
                foreach( $objChildTag->getChildTags() as $objNodeChild )
                {
                    $strTag = strtolower( $objNodeChild->getTagName() );
                    if( \array_key_exists( $strTag , $arrOccurrence ) )
                    {
                        ++$arrOccurrence[ $strTag ];
                    }
                    else
                    {
                        $arrOccurrence[ $strTag ] = 1;
                    }
                }
            }
        }

        foreach( $arrChildTagRules as $strTag => $strOcurrence )
        {
            $arrOccurrenceLimits = explode( ".." , $strOcurrence );
            $strMin = $arrOccurrenceLimits[0];
            $strMax = end( $arrOccurrenceLimits );
            if( \array_key_exists( \strtolower( $strTag ) , $arrOccurrence ) )
            {
                $intOccurrence = $arrOccurrence[ $strTag ];
            }
            else
            {
                $intOccurrence = 0;
            }
            $strMessage = '';
            if( $strMax !== 'n'&& $strMax !== '*' && $intOccurrence < $strMin )
            {
                $strMessage  = ( 'Invalid ' . $strTag . ' occurrence (' .  $intOccurrence . ') into the ' . $this->getTagName() . '. The minimum occurence is ' . $strMin  . '.' );
            }
            if( $strMax !== 'n'&& $strMax !== '*' && $intOccurrence > $strMax )
            {
                $strMessage  = ( 'Invalid ' . $strTag . ' occurrence (' .  $intOccurrence . ') into the ' . $this->getTagName() . '. The maximum occurence is ' . $strMax . '.' );
            }
            if( $strMessage != '' )
            {
                if( $this->getAnnotation()->getAnnotationClass()->getLink() )
                {
                    $strMessage .= "<br/>\n" . ' Please visit the '. \strtoupper( $this->getTagName() ) . ' <a href="' . $this->getAnnotation()->getAnnotationClass()->getLink() . '">reference</a> for more information.';
                }
                throw new CorujaTemplateException( $strMessage );
                return false;
            }
        }        
        return true;
    }
    /**
     * Validate a Xml Entity
     */
    public function validate()
    {
        $this->validateParent();
        $this->validateChildren();
    }

    /**
     * Initialize the recursive load call and make global validations check
     * @throws CorujaTemplateException
     * return void
     */
    protected function initLoad()
    {
        $this->load();
        $this->validate();
        $arrIds = array();
        $this->loadRecursive( $arrIds );
        $arrUniqueIds = \array_unique( $arrIds );
        if( sizeof( $arrIds ) != sizeof( $arrUniqueIds ) )
        {
            $arrCount = \array_count_values( $arrIds );
            $arrIdErrors = array();

            foreach( $arrCount as $strId => $intQtd )
            {
                if( $intQtd > 1 )
                {
                    $arrIdErrors[] = $strId . ' (' . $intQtd . ')';
                }
            }
            $strMessage = "The identifiers " . implode( ", " , $arrIdErrors ) . " occur more than once in the " . $this->getTagName() . ". The identifier must be unique.";
            throw new CorujaTemplateException( $strMessage );
        }
    }

    /**
     * Recursive Load Function what return a array with the
     * Id of Elements
     *
     * @param String[] $arrIds
     */
    protected function loadRecursive( &$arrIds )
    {
        if( $this->getId() != null )
        {
            $arrIds[] = $this->getId();
        }

        foreach( $this->getChildTags() as $objChild )
        {
            $objChild->loadRecursive( $arrIds );
            $objChild->load();
            $objChild->validate();
        }
    }

    /**
     * Obtem a Anotacao da Classe
     *
     * @return XmlTemplateAnnotationClass
     */
    public function getClassAnotation()
    {
        return $this->getAnnotation()->getAnnotationClass();
    }

    /**
     * Get a Attribute of Annotation
     *
     * @param string $strAttribute
     * @return XmlTemplateAnnotationAttribute
     */
    public function getAttributeAnnotation( $strAttribute )
    {
        return $this->getAnnotation()->getAnnotationAttribute( $strAttribute );
    }

    /**
     * Get the node tag name
     *
     * @return string
     */
    public function getTagName()
    {
        if( $this->strTag == null )
        {
            $this->strTag = $this->getClassAnotation()->getTag();
        }
        return $this->strTag;
    }

    /**
     * Draw as xml the open tag.
     * If booNode == false, draw as leaf
     * 
     * @param boolean $booNode
     * @return string
     */
    protected function drawOpenTag( $booNode = true )
    {
        $strXml = "<" . $this->getTagName();
        foreach( $this->getAnnotation()->getAnnotationAttributes() as $objAnnotationAttribute )
        {
            if( $objAnnotationAttribute->getXmlProperty() )
            {
                $strAttribute = $objAnnotationAttribute->getAttributeName();
                if( $this->$strAttribute !== null &&  $this->$strAttribute !== false )
                {
                    if( ! \is_array( $this->{$strAttribute} ) )
                    {
                        $strAttribute = $this->{$strAttribute};
                    }
                    else
                    {
                        $strSeparated = $objAnnotationAttribute->getXmlValueSeparated();
                        if(\is_null( $strSeparated ) )
                        {
                            $strSeparated = " ";
                        }
                        $strAttribute = implode( $strSeparated , $this->{$strAttribute} );
                    }
                    if(
                            ( \strtolower( $objAnnotationAttribute->getVar() ) == \strtolower( "boolean" ) ) ||
                            ( \strtolower( $objAnnotationAttribute->getVar() ) == \strtolower( "bool" ) )
                       )
                    {
                        if( $strAttribute == true )
                        {
                            $strXml .= ' ' . $objAnnotationAttribute->getXmlProperty() . '="false"';
                        }
                        else
                        {
                            $strXml .= ' ' . $objAnnotationAttribute->getXmlProperty() . '="true"';
                        }
                    }
                    else
                    {
                        $strXml .= ' ' . $objAnnotationAttribute->getXmlProperty() . '="' . $strAttribute . '"';
                    }
                }
            }
        }

        $strXml .= $booNode ? '>' : '/>';
        return $strXml  . "\n";
    }

    /**
     * Draw a leaf tag
     *
     * @return string
     */
    protected function leavesTag()
    {
        return $this->drawOpenTag( false );
    }

    /**
     * Draw a open tag
     *
     * @return string
     */
    protected function openTag()
    {
        return $this->drawOpenTag( true );
    }

    /**
     * Draw the Close a Xml tag
     *
     * @return string
     */
    protected function closeTag()
    {
        return "</" . $this->getClassAnotation()->getTag() . ">\n";
    }

    /**
     * Draw the Xml Entity to Xml String
     *
     * @param [integer $intDeeper]
     * @return string
     */
    public function drawMe( $intDeeper = 0 )
    {
        if( $intDeeper == 0 )
        {
            $this->initLoad();
        }
        $strResult = '';
        if( sizeof( $this->getChildTags() ) == 0 )
        {
            $strResult .= \str_repeat( "\t", $intDeeper ) . $this->leavesTag();
        }
        else
        {
            $strResult .= \str_repeat( "\t", $intDeeper ) . $this->openTag();
            foreach( $this->getChildTags() as $objChild )
            {
                $strResult .= $objChild->drawMe( $intDeeper + 1 );
            }
            $strResult .= \str_repeat( "\t", $intDeeper ) . $this->closeTag();
        }

        return $this->runTemplate( $strResult );
    }

    /**
     * Run some template content
     *
     * @param string $strText
     * @return CorujaXmlEntity
     */
    protected function runTemplate( $strText )
    {
        if( !is_string( $strText ) )
        {
            return $strText;
        }
        $strPattern = '/^' . $this->strOpenControlerCall . '(?P<value>[^'. $this->strCloseControlerCall .']+)' . $this->strCloseControlerCall . '$/';
        $arrResult = array();
        if( \preg_match( $strPattern , trim( $strText ), $arrResult ) )
        {
            $strValue = $arrResult[ 'value' ];
            return $this->run( $strValue );
        }
        $arrResult = array();
        $strPattern = '/' . $this->strOpenControlerCall . '(?P<value>[^'. $this->strCloseControlerCall .']+)' . $this->strCloseControlerCall . '/';
        $strText = preg_replace_callback( $strPattern , 'self::getContextValue' , $strText );
        return $strText;
    }

    /**
     * Get some attribute value from Context
     *
     * @param array $arrMatches
     * @return string
     */
    protected function getContextValue( $arrMatches )
    {
        $strValue = $arrMatches[ 'value' ];
        return $this->run( $strValue );
    }

    /**
     * Run a call to the Context and return the result of it.
     *
     * @param string $strValue
     * @return mixed
     */
    private function run( $strValue )
    {
        $strValue = str_replace( '$this->', '$this->getContext()->', $strValue );
        $strValue = 'return ' . $strValue . ";";
        return eval( $strValue );
    }

    /**
     * Show the CorujaXmlEntity as Xml String
     *
     * @return string
     */
    public function __toString()
    {
        return $this->drawMe();
        
    }

    /**
     * Search for the closer Parent Node of Element
     * what is of the informed Tag
     *
     * Return null if not founded
     *
     * @param string $strTag
     * @return CorujaXmlEntity
     */
    public function findParent( $strTag )
    {
        if( strtolower( $this->getTagName() ) == strtolower( $strTag ) )
        {
            return $this;
        }
        if( $this->getParent() !== null )
        {
            return $this->getParent()->findParent( $strTag );
        }
        return null;
    }

    /**
     * The first child of this node.
     *
     * @return CorujaXmlEntity
     */
    public function getFirstChild()
    {
        return \CorujaArrayManipulation::getArrayField( $this->arrChildTags , 0 );
    }

    /**
     * The last child of this node.
     *
     * @return CorujaXmlEntity
     */
    public function getLastChild()
    {
        if( sizeof( $this->arrChildTags ) == 0 )
        {
            return null;
        }
        return \end( $this->arrChildTags );
    }

    /**
     * The name of this node, depending on its type; 
     */
    public function getNodeName()
    {
       return $this->getTagName();
    }

    /**
     * The value of this node, depending on its type;
     *
     * @return String
     */
    public function getNodeValue()
    {
        if( $this instanceof \xhtml\Text )
        {
            return $this->getTextContent();
        }
        return null;
    }

    /**
     * The Document object associated with this node.
     *
     * @return CorujaXmlEntity
     */
    public function getOwnerDocument()
    {
        return $this->getRootParent();
    }

    /**
     * The node immediately following this node.
     * 
     * Given a document in a view, returns the document immediately following
     * the given document at the same level.
     * 
     * If you send the method a main document, the next main document in the
     * view is returned;
     *
     * if you send a response document, the next response document with the same
     * parent is returned.
     *
     * If the view is categorized, the next sibling must be in the same category as
     * the original document.
     *
     * @return CorujaXmlEntity
     */
    public function getNextSibling()
    {
        if( $this->getParent() == null )
        {
            return null;
        }

        $booFoundMe = false;

        foreach( $this->getParent()->getChildTags() as $objChild )
        {
            if( $booFoundMe )
            {
                return $objChild;
            }
            if( $objChild == $this )
            {
                $booFoundMe = true;
            }
        }
        return null;
    }

    /**
     * The namespace prefix of this node, or null if it is unspecified.
     */
    public function getPrefix()
    {
        return \CorujaClassManipulation::getNamespaceFromClassDefinition( get_class( $this ) );
    }

    /**
     * The node immediately preceding this node.
     */
    public function getPreviousSibling()
    {
        if( $this->getParent() == null )
        {
            return null;
        }

        $arrTags = $this->getParent()->getChildTags();
        $intPos = \array_search( $this ,  $arrTags );
        if( $intPos == 0 )
        {
            return null;
        }
        --$intPos;
        return $arrTags[ $intPos ];
    }

    /**
     *  Returns whether this node (if it is an element) has any attributes.
     *
     * @return boolean
     */
    public function hasAtttributes()
    {
        foreach( $this->getAnnotation()->getAnnotationAttributes() as $objAnnotationAttribute )
        {
            if( $objAnnotationAttribute->getXmlProperty() )
            {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Returns whether this node has any children.
     * 
     * @return boolean
     */
    public function hasChildNodes()
    {
        return ( sizeof( $this->arrChildTags ) > 0 );
    }

    /**
     * Inserts the node newChild before the existing child node refChild.
     * 
     * If the newChild is already in the tree, it is first removed.
     *
     * @param CorujaXmlEntity $objNewChild The node to insert.
     * @param CorujaXmlEntity $objRefChild The node before which the new node must be inserted.
     * @return CorujaXmlEntity The node being inserted.
     * @throws CorujaTemplateException Invalid Child received to Insert Before it.
     */
    public function insertBefore( CorujaXmlEntity $objNewChild , CorujaXmlEntity $objRefChild )
    {
        $intRefPos = \array_search( $objRefChild , $this->arrChildTags );
        $intNewPos = \array_search( $objNewChild , $this->arrChildTags );
        if( $intRefPos === false )
        {
            throw new CorujaTemplateException( 'Invalid Child received to Insert Before it.' );
        }
        if( $intRefPos !== false )
        {
            $this->removeChild( $objNewChild );
        }
        array_splice( $this->arrChildTags , $intRefPos , 1 , array( $objNewChild , $objRefChild ) );
        return $objNewChild;
    }

    /**
     * Replaces the child node oldChild with newChild in the list of children,
     * and returns the oldChild node.
     *
     * If the newChild is already in the tree, it is first removed.
     * 
     * @param CorujaXmlEntity $objNewChild The new node to put in the child list.
     * @param CorujaXmlEntity $objOldChild The node being replaced in the list.
     * @return CorujaXmlEntity The node replaced.
     */
    public function replaceChild( CorujaXmlEntity $objNewChild , CorujaXmlEntity $objOldChild )
    {
        $intRefPos = \array_search( $objOldChild , $this->arrChildTags );
        if( $intRefPos === false )
        {
            throw new CorujaTemplateException( 'Invalid Child received to be replaced.' );
        }
        array_splice( $this->arrChildTags , $intRefPos , 1 , array( $objNewChild ) );
        return $objNewChild;
    }

    /**
     * Search into the childs looking for the first occurrence of some tag
     * and return it.
     *
     * if booCreated == true, create the element case not founded.
     * 
     * Return null if not founded.
     *
     * @param string $strTag
     * @param boolean $booCreate
     * @return CorujaXmlEntity
     */
    public function getFirstChildByTagName( $strTag , $booCreate = false )
    {
        foreach( $this->getChildTags() as $objChildTag )
        {
            if( strtolower( $objChildTag->getTagName() ) == strtolower( $strTag ) )
            {
                return $objChildTag;
            }
        }
        if( $booCreate )
        {
            $objNewTag = new $strTag();
            $this->addChild( $objNewTag );
            return $objNewTag;
        }
        return null;
    }

    /**
     * Search into the childs ( NOT RECURSIVE ) looking for all occurrences of
     * some tag and return they.
     *
     * Return array[] if not founded.
     *
     * @param string $strTag
     * @return CorujaXmlEntity
     */
    public function getChildByTagName( $strTag )
    {
        $arrTags = array();
        foreach( $this->getChildTags() as $objChildTag )
        {
            if( strtolower( $objChildTag->getTagName() ) == strtolower( $strTag ) )
            {
                $arrTags[] = $objChildTag;
            }
        }
        return $arrTags;
    }

    /**
     * Search recursively into the child elements looking for the first
     * occurrence of some tag and return it.
     *
     * if booCreated == true, create the element as child case not founded.
     *
     * Return null if not founded.
     *
     * @param string $strTag
     * @param boolean $booCreate
     * @return CorujaXmlEntity
     */
    public function getFirstElementByTagName( $strTag )
    {
        foreach( $this->getChildTags() as $objChildTag )
        {
            if( strtolower( $objChildTag->getTagName() ) == strtolower( $strTag ) )
            {
                return $objChildTag;
            }
        }
        foreach( $this->getChildTags() as $objChildTag )
        {
            $objFounded = $objChildTag->getFirstElementByTagName( $strTag );
            if( $objFounded )
            {
                return $objFounded;
            }
        }
        return null;
    }

    /**
     * Recursive search of the first parent, or parent of parent(+) , what
     * is of the informed tag.
     *
     * @param string $strTag
     * @return CorujaXmlEntity or null if not founded
     */
    public function getFirstParentByTagName( $strTag )
    {
        if( strtolower( $this->getTagName() ) == strtolower( $strTag ) )
        {
            return $this;
        }
        if( $this->getParent() == null )
        {
            return null;
        }
        return $this->getParent()->getFirstParentByTagName( $strTag );
    }
    
    /**
     * Recursive search of the first parent, or parent of parent(+) , what
     * is of the informed tag.
     *
     * @param string $strTag
     * @return true if founded false if not
     */
    public function hasParentInList( $arrTagName )
    {
        if( \in_array( $this->getTagName() , $arrTagName ) )
        {
            return true;
        }
        if( $this->getParent() == null )
        {
            return false;
        }
        return $this->getParent()->hasParentInList( $arrTagName );
    }

    /**
     * The template operation use the Context as context
     *
     * @param StdClass $objContext
     */
    public function setContext( $objContext )
    {
        $this->objContext = $objContext;
        foreach( $this->getChildTags() as $objChild )
        {
            $objChild->setContext( $objContext );
        }
    }

    /**
     * Get the Context used in the template as context
     *
     * @return StdClass
     */
    public function getContext()
    {
        return $this->objContext;
    }

    public function replaceElement( CorujaXmlEntity $objNewElement )
    {
        return $this->getParent()->replaceChild( $objNewElement , $this );
    }
}
?>