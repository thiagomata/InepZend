<?php
/**
 * ExampleClassWithoutError - Example of Annotation use print the notation
 * values
 *
 * @package coruja.components.annotation.example
 *
 */
require_once( "_start.php" );

/**
 * Example of Annotation use print the notation values
 *
 * @author Thiago Henrique Ramos da Mata
 */
class ExampleClassWithoutError extends ExampleParentClass
{
    /**
     *
     * @noproblems this will be ignored
     * @var string
     */
    protected $test;

    /**
     * @see ExampleClassWithoutError::$test
     * @link http://www.thiagomata.com
     */
    public function getTest()
    {
        return $this->test;
    }

    public function thisIsCool()
    {
        print $this->getAnnotation()->getAnnotationClass()->getAuthor();
        print "<br/>\n";
        print $this->getAnnotation()->getAnnotationAttribute( "test" )->getVar();
        print "<br/>\n";
        print $this->getAnnotation()->getAnnotationMethod( "getTest" )->getLink();
    }
}

$objExample = new ExampleClassWithoutError();
$objExample->thisIsCool();
?>