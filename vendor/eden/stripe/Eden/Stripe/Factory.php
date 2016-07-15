<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Stripe;

use Eden\Core\Base as CoreBase;

class Factory extends CoreBase
{
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
    public function instantiate()
    {
    	Argument::i()
    		->test(1, 'string')
    		->test(2, 'string')
    		->test(3, 'string');

    	return Stripe::i();
    }
}