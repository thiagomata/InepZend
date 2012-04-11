<?php
function ExampleCacheOfImage()
{
    $arrMessages = array();

    if( file_exists( "text.txt" ) )
    {
        $strText = file_get_contents( "text.txt" );
    }
    else
    {
        $strText = "";
    }
    
    if( isset( $_REQUEST[ "text" ] ) )
    {
       if( $strText != $_REQUEST[ "text" ] )
       {
            file_put_contents( "text.txt", $_REQUEST[ "text" ] );
            $strText = $_REQUEST[ "text" ];
       }
       $arrMessages[] = "File Changed!";
    }
    $objCache = new CorujaCache();
    if( !$objCache->isChanged( "text.txt" ) )
    {
        $arrMessages[] = "Cache not need to be updated!!";
    }
    else
    {
        $arrMessages[] = "Cache will be updated now!!";
        $objCache->update( "text.txt" );
    }
?>
<?php foreach( $arrMessages as $strMessage ): ?>
    <?php print $strMessage ?> <br/>
<?php endforeach ?>
<div>
    Submit here the new value of the cached file.
</div>
<form method="post">
    <textarea name="text"><?php print $strText ?></textarea>
    <input type="submit" value="Ok">
</form>
<?php
    print CorujaDebug::highlightXml( $objCache->getHashFile( "text.txt" )->asXml() );
}
?>
