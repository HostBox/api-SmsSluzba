<?php

namespace HostBox\Api\SmsSluzba;


interface ISmsSluzba {

    const
        API_URL_POST = 'https://smsgateapi.sluzba.cz/apipost30/sms',
        API_URL_XML = 'https://smsgateapi.sluzba.cz/apixml30/';

    /**
     * @param ISms $sms
     * @return bool|string
     */
    public function sendSms(ISms $sms);

}
