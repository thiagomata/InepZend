<?php
namespace xhtml;
/**
 * A form element that can be represented as a text box, password text box,
 * check box, radio button, submit button, reset button, hidden input field,
 * image (which acts as a submit button), file selection box or general button.
 *
 * The input (\<input>) element is used to create interactive controls for
 * web-based forms.
 * 
 * @link http://htmldog.com/reference/htmltags/input/
 * @link http://developer.mozilla.org/en/HTML/Element/input
 */
class Input extends abstractEntity\ChildFieldForm
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'input';

    /**
     * Type can be used to specify the type of input. Values can be 
     * text (default), password, checkbox, radio, submit, reset, 
     * hidden, image, file or button in HTML4.
     *
     * The HTML5 has many others values as can be see below.
     * 
     * @xmlProperty type
     * @xmlValues [ "text"   , "password" , "checkbox" ,
     *              "radio"  , "submit"   , "reset"    ,
     *              "hidden" , "image"    , "file"     , 
     *              "button" , "color"    , "datetime" ,
     *              "date"   , "email"    , "datetime-local" ,
     *              "month"  , "number"   , "range"    ,
     *              "tel"    , "time"     , "url"      ,
     *              "week"   , "search"   ]
     * @var String
     */
    protected $strType = "text";

    /**
     * If the value of the type attribute is file, this attribute indicates the 
     * types of files that the server accepts; otherwise it is ignored. 
     * 
     * The value must be a comma-separated list of unique 
     * content type specifiers:
     *      - A valid MIME type with no extensions
     *      - audio/* representing sound files [HTML5] 
     *      - video/* representing video files [HTML5]
     *      - image/* representing image files [HTML5]
     * 
     * @xmlProperty accept
     * @xmlMultivalues [ "audio/*"   , "video/*" , "imagem/*" ]
     * @var String
     */
    protected $strAccept;
    
    /**
     * This attribute indicates whether the value of the control can 
     * be automatically completed by the browser. 
     * 
     * This attribute is ignored if the value of the type attribute is hidden, 
     * checkbox, radio, file, or a button type (button, submit, reset, image). 
     * 
     * Possible values are:
     * 
     *  - off: The user must explicitly enter a value into this field for every 
     * use, or the document provides its own auto-completion method; 
     * the browser does not automatically complete the entry.
     * 
     * - on: The browser can automatically complete the value based on 
     * values that the user has entered during previous uses.
     * 
     * If the autocomplete attribute is not specified on an input element, 
     * then the browser uses the autocomplete attribute value of the <input> 
     * element's form owner. The form owner is either the <form> element that 
     * this <input> element is a descendant of or the form element whose id is 
     * specified by the form attribute of the input element.
     * 
     * @xmlProperty autocomplete
     * @xmlmultivalues [ "audio/*"   , "video/*" , "imagem/*" ]
     * @var String
     */
    protected $booAutoComplete;
    
    /**
     * When the value of the type attribute is radio or checkbox, 
     * the presence of this Boolean attribute indicates that the control 
     * is selected by default; otherwise it is ignored.
     * 
     * @xmlProperty checked
     * @xmlValueSelf
     * @var Boolean
     */
    protected $booChecked;
    
    /**
     * The initial value of the control.
     *
     * This attribute is optional except when the value of the type attribute
     * is radio or checkbox.
     *
     * @xmlProperty value
     * @var String
     */
    protected $strValue;

    /**
     * If the value of the type attribute is image, this attribute defines the
     * height of the image displayed for the button.
     * 
     * @xmlProperty height
     * @var Integer
     */
    protected $intHeight;

    /**
     * Identifies a list of pre-defined options to suggest to the user. 
     * 
     * The value must be the id of a <datalist> element in the same document. 
     * The browser displays only options that are valid values for this input 
     * element. 
     * 
     * This attribute is ignored when the type attribute's value is hidden, 
     * checkbox, radio, file, or a button type.
     * 
     * @xmlProperty list
     * @var String
     */
    protected $strListId;

    /**
     * The maximum (numeric or date-time) value for this item, which must not be 
     * less than its minimum (min attribute) value.
     *
     * @xmlProperty max
     * @var String
     */
    protected $strMax;

    /**
     * The minimum (numeric or date-time) value for this item, which must not be 
     * greater than its maximum (max attribute) value.
     *
     * @xmlProperty min
     * @var String
     */
    protected $strMin;

    /**
     * This Boolean attribute indicates whether the user can enter more than 
     * one value. 
     * 
     * This attribute applies when the type attribute is set to email or file; 
     * otherwise it is ignored.
     *
     * @xmlProperty multiple
     * @var Boolean
     */
    protected $booMultiple;

    /**
     * A regular expression that the control's value is checked against. 
     * The pattern must match the entire value, not just some subset.
     *
     * Use the title attribute to describe the pattern to help the user. 
     * This attribute applies when the value of the type attribute is text, 
     * search, tel, url or email; otherwise it is ignored.
     *
     * @xmlProperty pattern
     * @var String
     */
    protected $strPattern;

    /**
     * The initial size of the control.
     *
     * This value is in pixels unless the value of the type attribute is text
     * or password, in which case, it is an integer number of characters.
     *
     * Starting in [HTML5], this attribute applies only when the type attribute
     * is set to text, search, tel, url, email, or password; otherwise it is
     * ignored.
     *
     * In addition, the size must be greater than zero. If you don't specify a
     * size, a default value of 20 is used.
     * 
     * @xmlProperty size
     * @var Integer
     */
    protected $intSize;

    /**
     * If the value of the type attribute is image, this attribute specifies a 
     * URI for the location of an image to display on the graphical submit
     * button; otherwise it is ignored.
     *
     * @xmlProperty src
     * @var String
     */
    protected $strSrc;

    /**
     * Works with the min and max attributes to limit the increments at which 
     * a numeric or date-time value can be set. 
     * 
     * It can be the string any or a positive floating point number. 
     * If this attribute is not set to any, the control accepts only values at 
     * multiples of the step value greater than the minimum.
     * 
     * @xmlProperty step
     * @var Double
     */
    protected $dblStep;

    /**
     *  If the value of the type attribute is image, this attribute defines the 
     * width of the image displayed for the button.
     *
     * @xmlProperty width
     * @var Integer
     */
    protected $intWidth;

    /**
     * This is a proposal for adding speech recognition support to [HTML5].
     *
     * @see https://docs.google.com/View?id=dcfg79pz_5dhnp23f5
     * @see http://www.w3.org/2005/Incubator/htmlspeech/2010/10/google-api-draft.html
     * @experimental google
     * @xmlProperty x-webkit-speech
     * @var Boolean
     */
    protected $booSpeech;

    /**
     * URI for an external application-specific speech grammar
     *
     * The Elements that can contain "speech" can also contain the speech-specific
     * attribute grammar, what is a URI for an external application-specific
     * grammar, e.g. "http://example.com/grammars/pizza-order.grxml".
     *
     * This is a speech-specific attribute, should not be used without it.
     * 
     * @see Input::$booSpeech
     * @see https://docs.google.com/View?id=dcfg79pz_5dhnp23f5
     * @see http://www.w3.org/2005/Incubator/htmlspeech/2010/10/google-api-draft.html
     * @experimental googel
     * @xmlProperty x-webkit-grammar
     * @var String
     */
    protected $strSpeechGrammar;

    /**
     * The maximum number of speech results to return in "results" property
     * 
     * This is a speech-specific attribute, should not be used without it.
     * 
     * @xmlProperty x-webkit-maxresults
     * @var Integer
     */
    protected $intSpeechMaxResults;

    /**
     * The amount of time before the start-of-speech detection times out.
     *
     * This is a speech-specific attribute, should not be used without it.
     *
     * @xmlProperty x-webkit-nospeechtimeout
     * @var Integer
     */
    protected $intNoSpeechTimeout;

    /**
     * The amount of time before the end-of-speech detection times out.
     *
     * This is a speech-specific attribute, should not be used without it.
     *
     * @xmlProperty x-webkit-maxspeechtimeout
     * @var Integer
     */
    protected $intMaxSpeechTimeout;

    /**
     * If not set, recording stops automatically when the endpointer detects end 
     * of speech/silence. 
     * 
     * If set, recording goes on until the user deactivates the speech input UI 
     * to stop recording.
     *
     * This is a speech-specific attribute, should not be used without it.
     *
     * @xmlProperty x-webkit-continue
     * @var Boolean
     */
    protected $booSpeechContinue;
    
    /**
     * Defines if the input tags will use the speech recognition support.
     *
     * @param string $strSpeech
     */
    public function setSpeech( $strBooSpeech = "true" )
    {
        $this->booSpeech = \CorujaStringManipulation::strToBool( $strBooSpeech );
    }

    /**
     * Get if the input pretend to use the speech recognition support.
     *
     * @return boolean
     */
    public function getSpeech()
    {
        return $this->booSpeech;
    }

    /**
     * Defines the grammar URI to the speech recognition support
     *
     * @param String $strSpeechGrammar
     */
    public function setSpeechGrammar( $strSpeechGrammar )
    {
        $this->strSpeechGrammar = (string)$strSpeechGrammar;
    }

    /**
     * Get the grammar URI to the speech recognition support
     *
     * @return String
     */
    public function getSpeechGrammar()
    {
        return $this->strSpeechGrammar;
    }

    /**
     * Defines the Maximum number of results to return in speech results.
     *
     * @param Integer $intSpeechMaxResults
     */
    public function setSpeechMaxResults( $intSpeechMaxResults )
    {
        $this->intSpeechMaxResults = (integer)$intSpeechMaxResults;
    }

    /**
     * Get the Maximum number of results to return in speech results.
     *
     * @return Integer
     */
    public function getSpeechMaxResults()
    {
        return $this->intSpeechMaxResults;
    }

    /**
     * Defines the amount of time before the start-of-speech detection times out
     *
     * @param Integer $intNoSpeechTimeout
     */
    public function setNoSpeechTimeout( $intNoSpeechTimeout )
    {
        $this->intNoSpeechTimeout = (integer)$intNoSpeechTimeout;
    }

    /**
     * Get the amount of time before the start-of-speech detection times out.
     *
     * @return Integer
     */
    public function getNoSpeechTimeout()
    {
        return $this->intNoSpeechTimeout;
    }

    /**
     * Defines the amount of time before the end-of-speech detection times out
     *
     * @param Integer $intMaxSpeechTimeout
     */
    public function setMaxSpeechTimeout( $intMaxSpeechTimeout )
    {
        $this->intMaxSpeechTimeout = (integer)$intMaxSpeechTimeout;
    }

    /**
     * Get the amount of time before the end-of-speech detection times out.
     *
     * @return Integer
     */
    public function getMaxSpeechTimeout()
    {
        return $this->intMaxSpeechTimeout;
    }

    /**
     * Defines the speech continue property.
     *
     * If set, recording goes on until the user deactivates the speech input UI
     * to stop recording.
     *
     * @param string $strSpeechContinue
     */
    public function setSpeechContinue( $strSpeechContinue )
    {
        $this->booSpeechContinue = \CorujaStringManipulation::strToBool( $strSpeechContinue );
    }

    /**
     * Get the speech continue property.
     *
     * @return boolean
     */
    public function getSpeechContinue()
    {
        return $this->booSpeechContinue;
    }

    /**
     * Get the type of the input
     *
     * @return string
     */
    public function getType()
    {
        return $this->strType;
    }

    /**
     * Validate restrict speech tags
     * @throws \Coruja\Template\CorujaTemplateException
     */
    protected function validateSpeech()
    {
        if( $this->getSpeech() !== true )
        {
            if( $this->getSpeechGrammar() !== null )
            {
                throw new \Coruja\Template\CorujaTemplateException( 'Grammar is a speech-specific attribute, should not be used without it.' );
            }
            if( $this->getMaxSpeechTimeout() !== null )
            {
                throw new \Coruja\Template\CorujaTemplateException( 'MaxSpeechTimeout is a speech-specific attribute, should not be used without it.' );
            }
            if( $this->getNoSpeechTimeout() !== null )
            {
                throw new \Coruja\Template\CorujaTemplateException( 'NoSpeechTimeout is a speech-specific attribute, should not be used without it.' );
            }
            if( $this->getSpeechMaxResults() !== null )
            {
                throw new \Coruja\Template\CorujaTemplateException( 'SpeechMaxResults is a speech-specific attribute, should not be used without it.' );
            }
            if( $this->getSpeechContinue() !== null )
            {
                throw new \Coruja\Template\CorujaTemplateException( 'SpeechContinue is a speech-specific attribute, should not be used without it.' );
            }
        }
    }

    /**
     * Validate type attribute
     *
     * @throws \Coruja\Template\CorujaTemplateException
     */
    protected function validateType()
    {
        if( $this->getType() !== "image" )
        {
            if( $this->intWidth !== null )
            {
                throw new \Coruja\Template\CorujaTemplateException( 'Width is specific attribute for image type , should not be used with another input type' );
            }
            if( $this->intHeight !== null )
            {
                throw new \Coruja\Template\CorujaTemplateException( 'Height is specific attribute for image type , should not be used with another input type' );
            }
            if( $this->strSrc !== null )
            {
                throw new \Coruja\Template\CorujaTemplateException( 'Src is specific attribute for image type , should not be used with another input type' );
            }
        }
    }

    /**
     * Return true if the received string is a valid data or a valid float,
     * false otherwise.
     * 
     * @param string $strValue
     * @return boolean
     */
    private function validateDateOrDouble( $strValue )
    {
        if( (string)$strValue == (string)(float)$strValue  )
        {
            // valid float number //
            return true;
        }
        $arrDate = explode( "-" , $strValue ); // Year-Month-Day
        if( sizeof( $arrDate ) == 3 && \checkdate( $arrDate[1], $arrDate[2], $arrDate[0] ) )
        {
            // valid date //
            return true;
        }
        return false;
    }

    /**
     * Validate the min attribute
     *
     * @throws \Coruja\Template\CorujaTemplateException
     */
    protected function validateMin()
    {
        if( $this->strMin !== null && !$this->validateDateOrDouble( $this->strMin ) )
        {
            throw new \Coruja\Template\CorujaTemplateException( 'Min Value is not a valid format' );
        }
    }

    /**
     * Validate the max attribute
     *
     * @throws \Coruja\Template\CorujaTemplateException
     */
    protected function validateMax()
    {
        if( $this->strMax !== null && !$this->validateDateOrDouble( $this->strMax ) )
        {
            throw new \Coruja\Template\CorujaTemplateException( 'Max Value is not a valid format' );
        }
    }

    /**
     * Validate List Attribute
     *
     * @throws \Coruja\Template\CorujaTemplateException
     */
    protected function validateList()
    {
        if( $this->strListId !== null )
        {
            $objRoot = $this->getRootParent();
            $objList = $objRoot->getElementById( $this->strListId );
            if( $objList === null )
            {
                throw new \Coruja\Template\CorujaTemplateException( 'DataList id valued [' . $this->strListId . '] into list attribute of input is invalid' );
            }
            if( !$objList instanceof DataList )
            {
                throw new \Coruja\Template\CorujaTemplateException( 'Input list value [' . $this->strListId . '] should be an id from DataList, receveid an id of one ' . $objList->getTagName() .  ' instead. ');
            }
        }
    }

    /**
     * Validate the input tag
     *
     * @return void
     */
    public function validate()
    {
        $this->validateSpeech();
        $this->ValidateType();
        $this->validateMin();
        $this->validateMax();
        $this->validateList();
        return parent::validate();
    }
}
?>