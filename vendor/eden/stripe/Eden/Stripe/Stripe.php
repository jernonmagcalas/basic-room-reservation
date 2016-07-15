<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Stripe;

/**
 * Twitter friends and followers
 *
 * @vendor Eden
 * @package 
 * @author 
 */
class Stripe extends Base
{
	/**
     * Construct - store merchant ID
     *
     * @param string
     * @param string
     * @return void
     */
    public function __construct()
    {
    	
		// Tested on PHP 5.2, 5.3

		// This snippet (and some of the curl code) due to the Facebook SDK.
		if (!function_exists('curl_init')) {
		  throw new Exception('Stripe needs the CURL PHP extension.');
		}
		if (!function_exists('json_decode')) {
		  throw new Exception('Stripe needs the JSON PHP extension.');
		}
		if (!function_exists('mb_detect_encoding')) {
		  throw new Exception('Stripe needs the Multibyte String PHP extension.');
		}

		// Stripe singleton
		require(dirname(__FILE__) . '/Library/Stripe.php');

		// Utilities
		require(dirname(__FILE__) . '/Library/Util.php');
		require(dirname(__FILE__) . '/Library/Util/Set.php');

		// Errors
		require(dirname(__FILE__) . '/Library/Error.php');
		require(dirname(__FILE__) . '/Library/ApiError.php');
		require(dirname(__FILE__) . '/Library/ApiConnectionError.php');
		require(dirname(__FILE__) . '/Library/AuthenticationError.php');
		require(dirname(__FILE__) . '/Library/CardError.php');
		require(dirname(__FILE__) . '/Library/InvalidRequestError.php');
		require(dirname(__FILE__) . '/Library/RateLimitError.php');

		// Plumbing
		require(dirname(__FILE__) . '/Library/Object.php');
		require(dirname(__FILE__) . '/Library/ApiRequestor.php');
		require(dirname(__FILE__) . '/Library/ApiResource.php');
		require(dirname(__FILE__) . '/Library/SingletonApiResource.php');
		require(dirname(__FILE__) . '/Library/AttachedObject.php');
		require(dirname(__FILE__) . '/Library/List.php');

		// Stripe API Resources
		require(dirname(__FILE__) . '/Library/Account.php');
		require(dirname(__FILE__) . '/Library/Card.php');
		require(dirname(__FILE__) . '/Library/Balance.php');
		require(dirname(__FILE__) . '/Library/BalanceTransaction.php');
		require(dirname(__FILE__) . '/Library/Charge.php');
		require(dirname(__FILE__) . '/Library/Customer.php');
		require(dirname(__FILE__) . '/Library/Invoice.php');
		require(dirname(__FILE__) . '/Library/InvoiceItem.php');
		require(dirname(__FILE__) . '/Library/Plan.php');
		require(dirname(__FILE__) . '/Library/Subscription.php');
		require(dirname(__FILE__) . '/Library/Token.php');
		require(dirname(__FILE__) . '/Library/Coupon.php');
		require(dirname(__FILE__) . '/Library/Event.php');
		require(dirname(__FILE__) . '/Library/Transfer.php');
		require(dirname(__FILE__) . '/Library/Recipient.php');
		require(dirname(__FILE__) . '/Library/Refund.php');
		require(dirname(__FILE__) . '/Library/ApplicationFee.php');
    }
}

