<?php
namespace xhtml;
/**
 * The audio element is used to embed sound content in an HTML or XHTML document.  
 * 
 * The audio element was added as part of [HTML5].
 *
 * @note {
 *  Currently, Gecko supports only Vorbis, in Ogg containers, as well as WAV format.
 *  Also, the server must serve the file using the correct MIME type in order for
 *  Gecko to play it correctly.
 * }
 * 
 * @example {
 *  <audio src="http://developer.mozilla.org/@api/deki/files/2926/=AudioTest_(1).ogg" autoplay>
 *      Your browser does not support the <code>audio</code> element.
 * </audio>
 * }
 *
 * @link http://htmldog.com/reference/htmltags/audio/
 * @link http://developer.mozilla.org/en/HTML/Element/audio/
 */
class Audio extends abstractEntity\FlowEntity
{
    /**
     * XML Tag Name
     *
     * @var string
     */
    protected $strTag = 'audio';

    /**
     * A Boolean attribute; if specified (even if the value is "false"!),
     * the audio will automatically begin to play back as soon as it can do so
     * without stopping to finish loading the data.
     *
     * @xmlProperty autoplay
     * @var boolean
     */
    protected $booAutoPlay = null;

    /**
     * An attribute you can read to determine which time ranges of the media 
     * have been buffered. 
     * 
     * This attribute contains a TimeRanges object.
     *
     * @xmlProperty buffered
     * @var integer
     */
    protected $strBuffered = 0;

    /**
     * If this attribute is present, the browser will offer controls to allow 
     * the user to control audio playback, including volume, 
     * seeking, and pause/resume playback.
     *
     * @xmlProperty controls
     * @var boolean
     */
    protected $booControls = null;

    /**
     * A Boolean attribute; if specified, we will, upon reaching the end of the 
     * audio, automatically seek back to the start.
     *
     * @xmlProperty loop
     * @var boolean
     */
    protected $booLoop;

    /**
     * This enumerated attribute is intended to provide a hint to the browser
     * about what the author thinks will lead to the best user experience.
     *
     * It may have one of the following values:
     *
     *  - none: hints that either the author thinks that the user won't need to
     * consult that video or that the server wants to minimize its traffic;
     * in others terms this hint indicates that the video should not be cached;
     *
     *  - metadata: hints that though the author thinks that the user won't need
     * to consult that video, fetching the metadata (e.g. length) is reasonable;
     *
     *   - auto: hints that the user needs have priority; in others terms this
     * hint indicated that, if needed, the whole video could be downloaded, even
     * if the user is not expected to use it;
     *
     *  - the empty string: which is a synonym of the auto value.
     *
     * If not set, its default value is browser-defined (i.e. each browser can
     * choose its own default value), though the spec advises it to be set to
     * metadata.
     *
     * @note {
     *  The autoplay attribute has precedence over this one as if one wants to
     *  automatically play a video, the browser will obviously need to download
     *  it.
     *
     *  Setting both the autoplay and the preload attributes is allowed by the
     *  specification.
     * }
     *
     * @note {
     *  The browser is not forced by the specification to follow the value of
     *  this attribute; it is a mere hint.
     * }
     *
     * @xmlProperty preload
     * @xmlValue [ '' , 'none' , 'metadata' , 'auto' ]
     * @var string
     */
    protected $booPreload;

    /**
     * The URL of the audio to embed. 
     * 
     * This is subject to HTTP access controls. This is optional; 
     * you may instead use the source element within the audio block 
     * to specify the audio to embed.
     *
     * @xmlProperty src
     * @var String
     */
    protected $strSrc;


    /**
     * In the HTML native, the autoplay attribute will considered as true
     * every time when specified, even if the value is "false". To fix this
     * strange behaivor, every time when the autoplay value been set as
     * false, the autoplay value will NOT be writed into the html tag.
     *
     * @test {
     *      \test\TestTemplate::loadTemplate( '
     *          <audio autoplay="false" src="http://example.com/music.ogg"/>
     *      ')->drawMe()
     *      '==',
     *      '<audio src="http://example.com/music.ogg" />'
     * }
     * 
     * @param string $strBooValue
     * @return Audio me
     */
    public function setAutoplay( $strBooValue )
    {
        $booValue = \CorujaStringManipulation::strToBool( $strBooValue );
        if( $booValue == false )
        {
            $this->booAutoPlay = null;
        }
        return $this;
    }
}
?>