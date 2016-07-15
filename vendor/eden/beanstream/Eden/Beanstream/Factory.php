<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Beanstream;

use Eden\Core\Base as CoreBase;
use Eden\Beanstream\Get as Get;

class Factory extends CoreBase
{
	/**
     * Integration Method 
     *
     *
     * @param *string
     * @return Get
     */
    public function get($merchantId)
    {
        //Argument test
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        return Get::i($merchantId);
    }

    /**
	 * Integration Method
	 * Legato with Javascript Library 
	 * see http://developer.beanstream.com/documentation/legato/
	 * 
	 * @param string
	 * @param string
	 * @param string
	 * return Legato class
	 */
    public function legato($merchantId, $username, $password)
    {
    	Argument::i()
    		->test(1, 'string')
    		->test(2, 'string')
    		->test(3, 'string');

    	return Legato::i($merchantId, $username, $password);
    }
}