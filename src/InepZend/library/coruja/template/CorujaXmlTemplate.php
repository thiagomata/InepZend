<?php
namespace Coruja\Template;

class CorujaXmlTemplate
{
    protected static $objInstance;

    /**
     * Get singleton instance
     *
     * @return CorujaXmlTemplate
     */
    public static function getInstance()
    {
        if( self::$objInstance == null )
        {
            self::$objInstance = new CorujaXmlTemplate();
        }
        return self::$objInstance;
    }

    public function __construct()
    {
        $objAutoLoad = new xmlTemplateAutoloadGroup();
        $objAutoLoad->setLayersFolder( __DIR__ );
        CorujaAutoLoad::getInstance()->addAutoLoadGroup( $objAutoLoad );
    }

    public function perform()
    {
    }

    public function __set( $strAttribute , CorujaXmlTemplateTag $mixValue )
    {
        $this->arrTemplateAttributes[ $strAttribute ] = $mixValue;
    }

    public function __get( $strAttribute )
    {
        return CorujaArrayManipulation::getArrayField( $this->arrTemplateAttributes , $strAttribute, $this->objActualTemplateCaller->$strAttribute );
    }

    public function __call( $strMethod, $arrArguments )
    {
        return call_user_func_array( Array( $this->objAction , $strMethod ) , $arrArguments );
    }

}
?>
