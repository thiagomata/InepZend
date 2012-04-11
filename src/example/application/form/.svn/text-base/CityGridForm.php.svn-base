<?php
namespace Example\Form;

/**
 * Grid of Cities of the State
 *
 * @entity Example\Model\City
 * 
 */
class CityGridForm extends \Local\Form\InepGridForm
{
    /**
     * Button Add City
     *
     * @label Add City
     * @var string
     * @tag submit
     */
    protected $addCity;

    /**
     * State Id
     *
     * @var integer
     * @tag hidden
     */
    protected $idState;

    /**
     * Object State
     *
     * @var \Example\Model\State
     */
    protected $objState;

    /**
     * Init the Form
     */
    public function init()
    {
        $this->setController( 'state' );
    }

    /**
     * Set the State Id
     *
     * Replace the default method to keep the state object sync with the id
     *
     * @param integer $intIdState
     */
    public function setIdState( $intIdState )
    {
        $intIdState = (integer)$intIdState;
        $objState = \Example\Model\StateTable::getInstance()->getById( $intIdState , true );
        $this->setState( $objState );
    }

    /**
     * Get the state Id
     *
     * @return integer
     */
    public function getIdState()
    {
        if( $this->objState )
        {
            return $this->objState->getId();
        }
        return $this->idState;
    }

    /**
     * Get the State Object
     *
     * @param \Example\Model\State $objState
     */
    public function setState(\Example\Model\State $objState )
    {
        $this->objState = $objState;
        $this->idState = $objState->getId();
    }

    /**
     * Get the State object
     *
     * @return \Example\Model\State
     */
    public function getState()
    {
        return $this->objState;
    }

    /**
     * Get the instance row
     *
     * @return City
     */
    protected function getInstanceRow()
    {
        return \Example\Model\CityTable::getInstance()->getRow();
    }

    /**
     * Get the count number of elements of the grid
     *
     * @return integer
     */
    public function getCount()
    {
        return \Example\Model\CityTable::getInstance()->getCount();
    }

    /**
     * Get the Entities of the Grid Page
     * 
     * @return \Example\Model\City[]
     */
    public function getEntities()
    {
        $strWhere =  $this->getInstanceRow()->getIdStateColumn() . ' = :idCityState ';
        $arrWhere = array( 'idCityState' => $this->getIdState() );

        return \Example\Model\CityTable::getInstance()->getPage(
            $this->getFirst() ,
            $this->getPageSize() ,
            $strWhere  ,
            $this->getHeaderOrder() ,
            $arrWhere
        );
    }

    /**
     * Init the Column header grid
     * 
     */
    public function initHeaders()
    {
        $objHeaderCity = new  \Local\Form\InepFormHeader( 'City');
        $objHeaderCity->setLabel( 'City' );
        $objHeaderCity->setWidth( 50 );
        $objHeaderCity->setColumn( \Example\Model\CityTable::getInstance()->getRow()->getNameColumn() );
        $this->addButtonToHeader( $objHeaderCity );
        $this->addHeader( $objHeaderCity );

        $objHeaderButtons = new \Local\Form\InepFormHeader( 'Buttons');
        $objHeaderButtons->setLabel( '' );
        $objHeaderButtons->setWidth( 100 );
        $this->addHeader( $objHeaderButtons );
    }

    /**
     * Add Row Loop
     *
     * @param \Example\Model\State $objEntity
     * @param \Local\Form\InepFormRow $objRow
     */
    public function addRow(
        \Local\Model\Entity $objEntity ,
        \Local\Form\InepFormRow $objRow
    )
    {
        $this->addCityRow( $objEntity , $objRow );
    }
    
    /**
     * Add City Row Loop
     *
     * @param \Example\Model\City $objEntity
     * @param \Local\Form\InepFormRow $objRow
     */
    public function addCityRow(
        \Example\Model\City $objEntity ,
        \Local\Form\InepFormRow $objRow
    )
    {
        $objRow->setColumnValue( $this->getHeaderById( 'City' )  , $objEntity->getName() );
        $objRow->setEvent( $this->getEventEdit( $objEntity ) );

        $objButtonsHeader = $this->getHeaderById( 'Buttons' );
        $objRow->addButton( $objButtonsHeader , $this->getButtonUpdate( $objEntity ) );
        $objRow->addButton( $objButtonsHeader , $this->getButtonDelete( $objEntity ) );
    }

    /**
     * Empty List Message
     *
     * @return String
     */
    public function getEmptyListMessage()
    {
        return "There are no cities in this state.";
    }

}