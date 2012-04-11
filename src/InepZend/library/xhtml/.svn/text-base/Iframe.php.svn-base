<?php
namespace xhtml;
/**
 * The HTML inline frame element (<iframe>) represents a nested browsing context, 
 * effectively embedding another HTML page into the current page. 
 * 
 * Each browsing context has its own session history and active document. 
 * The browsing context that contains the embedded content is called the parent 
 * browsing context. 
 * 
 * The top-level browsing context (which has no parent) is typically the 
 * browser window.
 *
 * @example {
 *  <iframe src="http://www.google.com" width="300" height="300">
 *      <p>Your browser does not support iframes.</p>
 *  </iframe>
 * }
 *
 * @link http://developer.mozilla.org/en/DOM/HTMLIFrameElement
 * @link http://htmldog.com/reference/htmltags/iframe/
 * @link https://developer.mozilla.org/en/HTML/Element/iframe
 */
class Iframe extends abstractEntity\FlowEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'iframe';

    /**
     * Indicates the height of the frame [HTML5] in CSS pixels, or [HTML4] in
     * pixels or as a percentage.
     *
     * @xmlProperty height
     * @var String
     */
    protected $strHeight;

    /**
     * A name for the embedded browsing context (or frame).
     *
     * This can be used as the value of the target attribute of an \<a> or
     * \<form> element, or the formtarget attribute of an \<input> or \<button>
     * element.
     *
     * @xmlProperty name
     * @var String
     */
    protected $strName;

    /**
     * If specified as an empty string, this attribute enables extra restrictions 
     * on the content that can appear in the inline frame. 
     * 
     * The value of the attribute can be a space-separated list of tokens that 
     * lift particular restrictions. 
     * 
     * Valid tokens are:
     *  <li>
     *      <ul> 
     *          <code> allow-same-origin </code>: Allows the content to be treated
     *          as being from the same origin as the containing document. If this
     *          keyword is not used, the embedded content is treated as being
     *          from a unique origin.
     *      </ul>
     *      <ul>
     *          <code> allow-top-navigation </code>: Allows the embedded browsing
     *          context to navigate (load) content from the top-level browsing
     *          context. If this keyword is not used, this operation is not allowed.
     *      </ul>
     *      <ul>
     *          <code> allow-forms: </code> Allows the embedded browsing context
     *          to submit forms. If this keyword is not used, this operation is
     *          not allowed.
     *      </ul>
     *      <ul>
     *          <code> allow-scripts: </code> Allows the embedded browsing context
     *          to run scripts (but not create pop-up windows). If this keyword is
     *          not used, this operation is not allowed.
     *      </ul>
     * </li>
     *
     * @xmlValues [ "allow-same-origin" , "allow-top-navigation" ,
     *              "allow-forms"       , "allow-scripts"  , "" , null ]
     * @xmlProperty sandbox
     * @var String
     */
    protected $strSandBox;

    /**
     * This Boolean attribute indicates that the browser should render the inline 
     * frame in a way that makes it appear to be part of the containing document, 
     * for example by applying CSS styles that apply to the \<iframe> to the 
     * contained document before styles specified in that document, and by opening 
     * links in the contained documents in the parent browsing context 
     * (unless another setting prevents this).
     *
     * @xmlProperty seamless
     * @var Boolean
     */
    protected $booSeamless;
    
    /**
     * The URL of the page to embed.
     *
     * @xmlProperty src
     * @var String
     */
    protected $strSrc;

    /**
     * The content of the page that the embedded context is to contain.
     *
     * @xmlProperty srcdoc
     * @var String
     */
    protected $strSrcDoc;

    /**
     * ndicates the width of the frame [HTML5] in CSS pixels, or [HTML4]  in
     * pixels or as a percentage.
     *
     * @xmlProperty width
     * @var String
     */
    protected $strWidth;
}
?>