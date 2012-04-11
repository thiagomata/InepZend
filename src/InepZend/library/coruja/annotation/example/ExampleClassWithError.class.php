<?php
/**
 * ExampleClassWithError - Example of Annotation Error caused by some validate
 * Annotation method
 * 
 * @package coruja.components.annotation.example
 */

require_once( "_start.php" );

/**
 * Example of Annotation Error caused by some validate Annotation method
 *
 * The author notation will not be found what will rise a exception
 *
 * @authorx Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
class ExampleClassWithError extends ExampleParentClass
{
    
}

$objExample = new ExampleClassWithError();
?>