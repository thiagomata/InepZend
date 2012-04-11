<?php
function stringManipulationExample()
{
        echo "(bool)false = " . serialize((bool)"false");
        echo "<br />";
        echo "strToBool(null) = " . serialize(CorujaStringManipulation::strToBool(null));        
}
?>