<?php
require_once( "_start.php" );

/**
 * Test class for CorujaArrayManipulation.
 * Generated by PHPUnit on 2008-10-24 at 21:41:40.
 */
class CorujaArrayManipulationTest extends PHPUnit_Framework_TestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @access protected
     */
    protected function setUp()
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     *
     * @access protected
     */
    protected function tearDown()
    {
    }

    /**
     * Search the element key what exists into the array
     */
    public function testGetArrayFieldWithExistingKey() {

        // set up
        $array = array("one");

        // exercise
        $fieldValue = CorujaArrayManipulation::getArrayField( $array, 0 );

        // assert
        $this->assertEquals( "one", $fieldValue );
    }

    /**
     * Search the element key what not exists into array
     */
    public function testGetArrayFieldWithNoneExistingKey() {

        // set up
        $array = array("one");

        // exercise
        $fieldValue = CorujaArrayManipulation::getArrayField( $array, 2 );

        // assert
        $this->assertNull( $fieldValue );
    }

    /**
     * Search the element key what not exists into array
     * sending not found value
     */
    public function testGetArrayFieldWithNoneExistingKeyAndThirdParameter() {

        // set up
        $array = array("one");

        // exercise
        $fieldValue = CorujaArrayManipulation::getArrayField( $array, 2, "anything" );

        // assert
        $this->assertEquals( "anything", $fieldValue );
    }

    /**
     * Test sending null key and sending not found value
     */
    public function testGetArrayFieldWithNullKey() {

        // set up
        $array = array("one");

        // exercise
        $fieldValue = CorujaArrayManipulation::getArrayField( $array, null, "anything" );

        // assert
        $this->assertEquals( "anything", $fieldValue );
    }


}
?>