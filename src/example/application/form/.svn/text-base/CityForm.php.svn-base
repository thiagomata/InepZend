<?php
namespace Example\Form;

/**
 * City Form
 * 
 * @entity Example\Model\City
 */
class CityForm extends \Local\Form\InepForm
{
    /**
     * City Name
     *
     * @order 1
     * @label Name
     * @tag input
     * @var string
     * @size 50
     */
    protected $name;

    /**
     * State of City
     *
     * @tag select
     * @label state
     * @order 2
     * @fill selectStateFill
     * @var integer
     */
    protected $state_id;

    /**
     * Submit Button
     *
     * @tag submit
     * @label Submit
     * @var string
     */
    protected $submit;

    /**
     * Cancel Button
     *
     * @tag submit
     * @label Cancel
     * @var string
     */
    protected $cancel;

    /**
     * Back Button
     *
     * @tag submit
     * @label Back
     * @var string
     */
    protected $back;

    /**
     * Fill the State Select with all the Name of States
     *
     * @param \Local\Form\Elements\InepFormElementSelect $objSelect
     */
    public function selectStateFill( \Local\Form\Elements\InepFormElementSelect $objSelect )
    {
        $objSelect->addMultiOption(
            null,
            null
        );

        $objSelect->setLabel( 'State:' );
        $objStateTable = \Example\Model\StateTable::getInstance();
        $arrStates = $objStateTable->getAll();
        foreach( $arrStates as $objState )
        {
            $objSelect->addMultiOption(
                $objState->getId(),
                $objState->getName()
            );
        }
    }
}
 