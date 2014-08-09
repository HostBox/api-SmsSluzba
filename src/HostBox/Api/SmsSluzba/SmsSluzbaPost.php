<?php

namespace HostBox\Api\SmsSluzba;


class SmsSluzbaPost implements ISmsSluzba {

    const AUTH_MSG_LENGTH = 31;

    /** @var Config */
    private $config;


    public function __construct(Config $config) {
        $this->config = $config;
    }

    /** @inheritdoc */
    public function sendSms(ISms $sms) {
        if (!($handle = @fopen(self::API_URL_POST, 'rb', FALSE, $this->getStreamContext($sms))))
            return FALSE;

        $contents = '';
        while (!feof($handle)) {
            $contents .= fread($handle, $this->config->getBlockSize());
        }
        fclose($handle);

        return $contents;
    }

    /**
     * @param ISms $sms
     * @return resource
     */
    private function getStreamContext(ISms $sms) {
        return stream_context_create(array('http' => array(
            'method' => 'POST',
            'content' => http_build_query(
                array(
                    'login' => $this->config->getLogin(),
                    'act' => 'send',
                    'msisdn' => $sms->getRecipient(),
                    'msg' => $sms->getText(),
                    'auth' => $this->getAuthenticationToken($sms->getText())
                )
            )
        )));
    }

    /**
     * @param string $text
     * @return string
     */
    private function getAuthenticationToken($text) {
        return md5(md5($this->config->getPassword()) . $this->config->getLogin() . 'send' . substr($text, 0, self::AUTH_MSG_LENGTH));
    }

}
