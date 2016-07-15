<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Beanstream;

/**
 * Twitter friends and followers
 *
 * @vendor Eden
 * @package 
 * @author 
 */
class Get extends Base
{

    const BASE_URL = 'https://www.beanstream.com/scripts/payment/payment.asp';

    protected $paymentData = array();

    /**
     * Construct - Stores tokens
     *
     * @param string
     * @param string
     * @return void
     */
    public function __construct($merchantId)
    {
        //argument test
        //Argument 1 must be a Int
        Argument::i()->test(1, 'string');

        $this->paymentData['merchant_id'] = $merchantId;
    }

    /**
     * Generate the Url For Payment Form. 
     * Recquired is valid merchant it
     *
     * return string
     */
    public function getPaymentFormUrl()
    {
        $request = http_build_query($this->paymentData);

        $url = self::BASE_URL.'?'.$request;

        return $url;
    }

    /**
     * 
     *
     * return array()
     */
    public function getResponse()
    {
        
    }

    /**
     * Generate the Url For Payment Form. 
     * Recquired is valid merchant it
     *
     * return string
     */
    public function sendFormData()
    {
        $request = http_build_query($this->paymentData);

        return '';
    }

    /**
     * Billing address.
     *
     * @param int
     * return Base class
     */
    public function setAddress1($address1)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['ordAddress1'] = $address1;

        return $this;
    }

    /**
     * Additional billing address field for long addresses.
     *
     * @param int
     * return Base class
     */
    public function setAddress2($address2)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['ordAddress2'] = $address2;

        return $this;
    }
 
    /**
     * This item is optional. Enter a URL for the “transaction approved” page. 
     * We will send a customer here if their transaction request is processed without problems.
     * If no value is passed, we will use the URL in the order settings area.
     *
     * @param int
     * return Base class
     */
    public function setApprovePage($page)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['approvedPage'] = $page;

        return $this;
    }

    /**
     * This item is optional. Enter a URL for the “transaction declined” page.
     * We will send a customer here if their transaction request is denied. If no value is passed,
     * we will use the URL in the order settings area.
     *
     * @param int
     * return Base class
     */
    public function setDeclinedPage($page)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['declinedPage'] = $page;

        return $this;
    }
    /**
     * Total of the amount in decimal format 
     *
     * @param numeric ,
     * return Base class
     */
    public function setAmount($amount)
    {
        Argument::i()->test(1, 'numeric');

        $this->paymentData['trnAmount'] = $amount;

        return $this;
    }


    /**
     * Billing address city.
     *
     * @param int
     * return Base class
     */
    public function setBillingCity($city)
    {
        Argument::i()->test(1, 'int');

        $this->paymentData['ordCity'] = $city;

        return $this;
    }

    /**
     * Billing contact’s name.
     *
     * @param int
     * return Base class
     */
    
    public function setBillingName($name)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['ordName'] = $name;

        return $this;
    }

    /**
     * Billing Province/State ID.
     *
     * @param int
     * return Base class
     */
    public function setBillingProvince($province)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['ordProvince'] = $province;

        return $this;
    }

    /**
     * Billing address postal/zip code.
     *
     * @param int
     * return Base class
     */
    public function setBillingPostal($postal)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['ordPostalCode'] = $postal;

        return $this;
    }

    /**
     * Billing address country ID.
     *
     * @param int
     * return Base class
     */
    public function setBillingCountry($country)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['ordCountry'] = $country;

        return $this;
    }

    /**
     * Billing contact’s email address.
     *
     * @param int
     * return Base class
     */
    public function setBillingEmail($email)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['ordEmailAddress'] = $email;

        return $this;
    }

    /**
     * Billing contact’s phone number.
     *
     * @param int
     * return Base class
     */
    
    public function setBillingPhone($phone)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['ordPhoneNumber'] = $phone;

        return $this;
    }
    
    /**
     * Credit card CVD. This will be the last 3 digits (4 for Amex) 
     * on the back of the customer’s credit card. 
     * This is for security purposes and is optional.
     *
     * @param int
     * return Base class
     */
    public function setCvdCard($cvd)
    {
        Argument::i()->test(1, 'int');

        $this->paymentData['trnCardCvd'] = $cvd;

        return $this;
    }

    /**
     * Name of the card owner as it appears on their credit card.
     *
     * @param string
     * return Base class
     */
    public function setCardOwnerName($name)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['trnCardOwner'] = $name;

        return $this;
    }

    /**
     * Credit card number.
     *
     * @param int
     * return Base class
     */
    public function setCardNumber($cardNumber)
    {
        Argument::i()->test(1, 'int');

        $this->paymentData['trnCardNumber'] = $cardNumber;

        return $this;
    }

    /**
     * Credit card expiration month (e.g. 09 for September).
     *
     * @param int
     * return Base class
     */
    public function setExpirationMonth($month)
    {
        Argument::i()->test(1, 'int');

        $this->paymentData['trnExpMonth'] = $month;

        return $this;
    }

    /**
     * Credit card expiration year (e.g. 02 for 2002).
     *
     * @param int
     * return Base class
     */
    public function setExpirationYear($year)
    {
        Argument::i()->test(1, 'int');

        $this->paymentData['trnExpYear'] = $year;

        return $this;
    }

    /**
     * The order number of the shoppers purchase. 
     *
     * @param 
     */
    public function setOrderNumber($order)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['trnOrderNumber'] = $order;

        return $this;
    }

    /**
     * Flag if payment is recurring payment
     * this is false by default
     *
     */
    public function setRecurring()
    {
        $this->paymentData['trnRecurring'] = 1;

        return $this;
    }

    /**
     * Set period and increment since they need each other
     * setRecurring() to flag its recurring payment
     *
     * @param string recurring period D, W, M, Y
     * @param int recurring increment
     */
    public function setRBilling($period, $increment)
    {   
        Argument::i()->test(1, 'string')
            ->test(2, 'int');

        $this->paymentData['rbBillingPeriod'] = strtoupper($period);
        $this->paymentData['rbBillingIncrement'] = $increment;

        return $this;
    }

    /**
     * Recurring billing options
     *
     */
    public function setRBillingEndMonth()
    {
        $this->paymentData['rbEndMonth'] = 1;

        return $this;
    }

    /**
     * Recurring billing options
     *
     */
    public function setRBillingCharge()
    {
        $this->paymentData['rbCharge'] = 1;

        return $this;
    }

    /**
     * Recurring billing options
     *
     */
    public function setRFirstBilling()
    {
        $this->paymentData['rbFirstBilling'] = 1;

        return $this;
    }

    /**
     * Recurring billing options
     *
     */
    public function setRSecondBilling()
    {   
        $this->paymentData['rbSecondBilling'] = 1;

        return $this;
    }

    /**
     * Recurring billing options
     *
     * @param string date formatted MMDDYYYY
     */
    public function setRBillingExpiry($date)
    {   
        Argument::i()->test(1, 'string');

        $this->paymentData['rbExpiry'] = $date;

        return $this;
    }

    /**
     * TShipping contact’s name. 
     * (This field can only be sent if ‘Include Shipping Address’ is set to YES ).
     *
     * @param 
     */
    public function setShippingName($name)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['shipName'] = $name;

        return $this;
    }

    /**
     * Shipping contact’s email address. 
     * (This field can only be sent if ‘Include Shipping Address’ is set to YES).
     *
     * @param 
     */
    public function setShippingEmail($email)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['shipEmailAddress'] = $email;

        return $this;
    }

    /**
     * Shipping address. 
     * (This field can only be sent if ‘Include Shipping Address’ is set to YES).
     * @param 
     */
    public function setShippingAddress1($address1)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['shipAddress1'] = $address1;

        return $this;
    }

    /**
     * Shipping address. 
     * (This field can only be sent if ‘Include Shipping Address’ is set to YES).
     *
     * @param 
     */
    public function setShippingAddress2($address2)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['shipAddress2'] = $address2;

        return $this;
    }

    /**
     * Shipping address city. 
     * (This field can only be sent if ‘Include Shipping Address’ is set to YES).
     *
     * @param 
     */
    public function setShippingCity($city)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['shipCity'] = $city;

        return $this;
    }

    /**
     * Shipping Province/State ID. 
     * (This field can only be sent if ‘Include Shipping Address’ is set to YES).
     *
     * @param 
     */
    public function setShippingProvince($province)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['shipProvince'] = $province;

        return $this;
    }

    /**
     * Shipping address country ID. 
     * (This field can only be sent if ‘Include Shipping Address’ is set to YES).
     *
     * @param 
     */
    public function setShippingCountry($country)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['shipCountry'] = $country;

        return $this;
    }

    /**
     * Shipping address postal/zip code. 
     * (This field can only be sent if ‘Include Shipping Address’ is set to YES).
     *
     * @param 
     */
    public function setShippingPostalCode($postal)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['shipPostalCode'] = $postal;

        return $this;
    }

    /**
     * Shipping address country ID. 
     * (This field can only be sent if ‘Include Shipping Address’ is set to YES).
     *
     * @param 
     */
    public function setShippingPhone($phone)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['shipPhoneNumber'] = $phone;

        return $this;
    }

    /**
     * Field indicating the type of transaction to perform. 
     * (P = Purchase, or PA = Pre-Auth.) If not supplied, 
     * the default is the transaction type set on the Payment 
     * Settings screen (under Configuration à Payment Form in your membership area menu).
     *
     * @param string
     * return Base class
     */
    public function setTransactionType($type)
    {
        Argument::i()->test(1, 'string');

        $this->paymentData['trnType'] = $type;

        return $this;
    }
}