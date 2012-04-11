<?php
require_once( "./../../../../../_start.php" );

$objComponentDescriptor = new ComponentDescriptor( "tutorial.xml" , __FILE__ );
$objComponentDescriptor->perform( $_REQUEST );

?>