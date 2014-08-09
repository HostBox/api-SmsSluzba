<?php

namespace HostBox\Api\SmsSluzba;


use HostBox\Api\SmsSluzba\Exceptions\RuntimeException;

class SmsSluzbaXml implements ISmsSluzba {

    /** @var Config */
    private $config;


    public function __construct(Config $config) {
        $this->config = $config;
    }

    /** @inheritdoc */
    public function sendSms(ISms $sms) {
        throw new RuntimeException('Function ' . __FUNCTION__ . ' is not implemented');
    }

}
