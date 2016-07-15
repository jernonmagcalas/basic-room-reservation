<?php //-->
/*
 * This file is part of the Utility package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Facebook;

use Eden\Core\Base as CoreBase;
use Eden\Curl\Base as Curl;

/**
 * The base class for all classes wishing to integrate with Eden.
 * Extending this class will allow your methods to seemlessly be
 * overloaded and overrided as well as provide some basic class
 * loading patterns.
 *
 * @vendor Eden
 * @package Facebook
 * @author Ian Mark Muninio <ianmuninio@openovate.com>
 */
class Base extends CoreBase
{
    const INSTANCE = 0; // sets to multiton
    const DEBUG_URL = 'https://graph.facebook.com/debug_token';

    /**
     * Inspect the token if it belongs to the token that generated by the
     * application.
     *
     * @param string $inputToken token to be inspect
     * @param string $appToken   application token or admin token of application
     * @return array
     */
    public function debugToken($inputToken, $appToken)
    {
        Argument::i()
                ->test(1, 'string')
                ->test(2, 'string');

        $query = array(
            'input_token' => $inputToken,
            'access_token' => $appToken
        );

        // get the url
        $url = self::DEBUG_URL . '?' . http_build_query($query);

        // set curl
        $curl = Curl::i()
                ->setUrl($url)
                ->verifyHost(false)
                ->verifyPeer(false);

        $response = $curl->getJsonResponse();

        return $response;
    }
}
