<?php

namespace HostBox\Api\SmsSluzba;


class Sms implements ISms {

    /** @var string */
    private $recipient;

    /** @var string */
    private $text;


    /** @inheritdoc */
    public function setRecipient($recipient) {
        $this->recipient = $recipient;
    }

    /** @inheritdoc */
    public function getRecipient() {
        return $this->recipient;
    }

    /** @inheritdoc */
    public function setText($text) {
        $this->text = $text;
    }

    /** @inheritdoc */
    public function getText() {
        return $this->text;
    }

}
