<?php
namespace Example\Form;

/**
 * Grid of States
 * 
 * @entity Example\Model\State
 * 
 */
class StateGridForm extends \Local\Form\InepGridForm
{

    /**
     * Get the count number of elements of the grid
     *
     * @return Integer
     */
    public function getCount()
    {
        return \Example\Model\StateTable::getInstance()->getCount();
    }

    /**
     * Get the Entities of the Grid Page
     *
     * @return \Example\Model\State[]
     */
    public function getEntities()
    {
        
        return \Example\Model\StateTable::getInstance()->getPage(
            $this->getFirst() ,
            $this->getPageSize() ,
            null  ,
            $this->getHeaderOrder()
        );
    }

    /**
     * Init the Column header grid
     */
    public function initHeaders()
    {
        $objHeaderState = new  \Local\Form\InepFormHeader( 'State');
        $objHeaderState->setLabel( 'State' );
        $objHeaderState->setWidth( 50 );
        $objHeaderState->setColumn( \Example\Model\StateTable::getInstance()->getRow()->getNameColumn() );
        $this->addButtonToHeader( $objHeaderState );
        $this->addHeader( $objHeaderState );

        $objHeaderAcronym = new \Local\Form\InepFormHeader( 'Acronym');
        $objHeaderAcronym->setLabel( 'State Acronym' );
        $objHeaderAcronym->setWidth( 200 );
        $objHeaderAcronym->setColumn( \Example\Model\StateTable::getInstance()->getRow()->getAcronymColumn() );
        $this->addButtonToHeader( $objHeaderAcronym );
        $this->addHeader( $objHeaderAcronym );

        $objHeaderCities = new \Local\Form\InepFormHeader( 'Cities');
        $objHeaderCities->setLabel( 'Total Cities' );
        $objHeaderCities->setWidth( 100 );
        $this->addHeader( $objHeaderCities );

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
        $this->addSateRow( $objEntity , $objRow );
    }
    
    /**
     * Add State Loop
     *
     * @param \Example\Model\State $objEntity
     * @param \Local\Form\InepFormRow $objRow
     */
    public function addStateRow(
        \Example\Model\State $objEntity ,
        \Local\Form\InepFormRow $objRow
    )
    {
        $objRow->setColumnValue( $this->getHeaderById( 'State' )  , $objEntity->getName() );
        $objRow->setColumnValue( $this->getHeaderById( 'Acronym' )      , $objEntity->getAcronym() );
        $objRow->setColumnValue( $this->getHeaderById( 'Cities' ) , $objEntity->getQtdCities() );

        $objRow->setEvent( $this->getEventEdit( $objEntity ) );

        $objButtonsHeader = $this->getHeaderById( 'Buttons' );
        $objRow->addButton( $objButtonsHeader , $this->getButtonUpdate( $objEntity ) );
        if( $objEntity->getQtdCities() == 0 )
        {
            $objRow->addButton( $objButtonsHeader , $this->getButtonDelete( $objEntity ) );
        }
    }
    
    public function getEmptyListMessage()
    {
        return "There is no state storaged in the system.";
    }
}
 