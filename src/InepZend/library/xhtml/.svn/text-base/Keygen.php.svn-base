<?php
namespace xhtml;
/**
 * The HTML keygen element exists to facilitate generation of key material,
 * and submission of the public key as part of an HTML form.
 *
 * This mechanism is designed for use with Web-based certificate management
 * systems. It is expected that the keygen element will be used in an HTML form
 * along with other information needed to construct a certificate request,
 * and that the result of the process will be a signed certificate.
 * 
 * The keygen element is only valid within an HTML form. It will cause some
 * sort of selection to be presented to the user for selecting key size.
 *
 * The UI for the selection may be a menu, radio buttons, or possibly something
 * else. The browser presents several possible key strengths.
 *
 * Currently, two strengths are offered, high and medium. If the user's browser
 * is configured to support cryptographic hardware (e.g. "smart cards") the user
 * may also be given a choice of where to generate the key, i.e., in a smart
 * card or in software and stored on disk.
 * 
 * When the submit button is pressed, a key pair of the selected size is
 * generated.
 *
 * The private key is encrypted and stored in the local key database.
 *
 * @example {
 *  <?php
 *      $arrRequest = ( $_REQUEST );
 *      if( array_key_exists( "login" , $arrRequest ) )
 *      {
 *          print "<h2>Login</h2> " . $arrRequest[ "login" ] . "<br/>";
 *      }
 *      if( array_key_exists( "mykey" , $arrRequest ) )
 *      {
 *          print "<h2>Public Key</h2> " . $arrRequest[ "mykey" ] . "<br/>";
 *      }
 *  ?>
 * <form action="" method="post" >
 *      <label for="login">
 *          <span> Login: </span>
 *          <input type="text" name="login" />
 *      </label>
 *      <label for="key">
 *          <span> Key: </span>
 *          <keygen name="mykey" />
 *      </label>
 *      <input type="submit" />
 *  </form>
 * }
 *
 * @link http://blog.whatwg.org/this-week-in-html5-episode-35
 * @link http://dev.w3.org/html5/markup/keygen.html
 * @link http://developer.mozilla.org/en/HTML/Element/keygen
 */
class Keygen extends abstractEntity\ChildForm
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'keygen';

    /**
     * The type of key generated. The default value is RSA.
     *
     * @xmlValues [ "" , "RSA" , "DSA" , "EC" ]
     * @xmlProperty keytype
     * @var String
     */
    protected $strKeyType;

    /**
     * he keyparams attribute is required for DSA and EC key generation and
     * ignored for RSA key generation.
     *
     * PQG is a synonym for keyparams. That is, you may specify
     * keyparams="pqg-params" or pqg="pqg-params".
     *
     * For RSA keys, the keyparams parameter is not used (ignored if present).
     *
     * The user may be given a choice of RSA key strengths. Currently, the user
     * is given a choice between "high" strength (2048 bits) and "medium"
     * strength (1024 bits).
     *
     * For DSA keys, the keyparams parameter specifies the DSA PQG parameters
     * which are to be used in the keygen process. The value of the pqg parameter
     * is the the BASE64 encoded, DER encoded Dss-Parms as specified in
     * IETF RFC 3279. The user may be given a choice of DSA key sizes, allowing
     * the user to choose one of the sizes defined in the DSA standard.
     *
     * For EC keys, the keyparams parameter specifies the name of the elliptic
     * curve on which the key will be generated. It is normally a string from the
     * table in nsKeygenHandler.cpp. (Note that only a subset of the curves
     * named there may actually be supported in any particular browser.)
     *
     * If the keyparams parameter string is not a recognized curve name string,
     * then a curve is chosen according to the user's chosen key strength
     * (low, medium, high), using the curve named "secp384r1" for high, and the
     * curve named "secp256r1" for medium keys.
     *
     * @note {
     *      Choice of the number of key strengths, default values for each
     *      strength, and the UI by which the user is offered a choice, are
     *      outside of the scope of this specification.
     * }
     *
     * @xmlProperty keyparams
     * @var String
     */
    protected $strKeyParams;

    /**
     * A challenge string that is submitted along with the public key.
     *
     * Defaults to an empty string if not specified.
     * 
     * @var String
     */
    protected $strChallenge;

    /**
     * PQG is a synonym for keyparams. That is, you may specify keyparams="pqg-params" or pqg="pqg-params".
     */
    public function setPqg( $strPqg )
    {
        $this->setKeyparams( $strPqg );
    }

    /**
     * PQG is a synonym for keyparams. That is, you may specify keyparams="pqg-params" or pqg="pqg-params".
     */
    public function getPqg()
    {
        return $this->getKeyparams();
    }
}
?>