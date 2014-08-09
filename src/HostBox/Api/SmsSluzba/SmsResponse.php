<?php

namespace HostBox\Api\SmsSluzba;

use HostBox\Api\SmsSluzba\Exceptions\LogicException;
use LibXMLError;


class SmsResponse {

    /** @var string */
    private $id;

    /** @var string */
    private $message;


    /** @param string $response */
    public function __construct($response) {
        $this->process($response);
    }

    /**
     * @param string $result
     * @throws Exceptions\LogicException
     */
    public function process($result) {
        if (!($xml = @simplexml_load_string($result)) && libxml_get_last_error() instanceof LibXMLError) {
            throw new LogicException('SMS Response is not valid XML');
        }

        if (!isset($xml->id) || !isset($xml->message)) {
            throw new LogicException('SMS Response is not valid. Some parts are missing.');
        }

        $this->id = (string) $xml->id;
        $this->message = (string) $xml->message;
    }

    /** @return string */
    public function getId() {
        return $this->id;
    }

    /** @return string */
    public function getMessage() {
        return $this->message;
    }

}
