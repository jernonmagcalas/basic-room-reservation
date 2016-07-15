<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Beanstream;

use Eden\Beanstream\Get;
/**
 * Twitter friends and followers
 *
 * @vendor Eden
 * @package 
 * @author 
 */
class Legato extends Get
{

	const BASE_URL = 'https://www.beanstream.com/scripts/process_transaction.asp';
	/**
     * Construct - store merchant ID
     *
     * @param string
     * @param string
     * @return void
     */
    public function __construct($merchantId , $username, $password)
    {
    	//argument test
    	//Argument 1 must be a String
        Argument::i()->test(1, 'string')
	        ->test(2, 'string')
	        ->test(3, 'string');

        $this->paymentData['merchant_id'] = $merchantId;
        $this->paymentData['username'] = $username;
        $this->paymentData['password'] = $password;
    }

    public function setRequestType($type)
    {
    	//argument test
    	//Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->paymentData['RequestType'] = $type;

        return $this;
    }

    public function setSingleToken($token)
    {
    	//argument test
    	//Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->paymentData['singleUseToken'] = $token;

        return $this;
    }

     public function setResponseFormat($format)
    {
    	//argument test
    	//Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->paymentData['responseFormat'] = $format;

        return $this;
    }

    /**
    * 
    *
    *
    * return array
    */
    public function getResponse()
    {
    	$data = http_build_query($this->paymentData);
		//open connection
		$ch = curl_init(self::BASE_URL);
		//set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, self::BASE_URL);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
		curl_setopt($ch, CURLOPT_HEADER      ,0);  // DO NOT RETURN HTTP HEADERS
		curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
		//execute post
		$result = curl_exec($ch);

		if(curl_exec($ch) === false) {
		    echo 'Curl error: ' . curl_error($ch);
		}

		//close connection
		curl_close($ch);
		//echo($result . "<br>");
		$t =  explode('&', $result);
		$response = array();
		foreach ($t as $value) {
			$arr = explode('=', $value);
			$response[$arr[0]] = urldecode($arr[1]);
		}

		return $response;
    }
}