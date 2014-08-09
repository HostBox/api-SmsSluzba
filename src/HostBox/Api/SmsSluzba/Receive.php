<?php

namespace HostBox\Api\SmsSluzba;


class Receive {

    /** @var int */
    private $smsid;

    /** @var string */
    private $sender;

    /** @var string */
    private $recipient;

    /** @var string */
    private $keyword;

    /** @var string */
    private $identifier;

    /** @var string */
    private $text;

    /** @var string (time format: ISO8601) */
    private $time;


    /**
     * @param string $smsid
     * @param string $sender
     * @param string $recipient
     * @param string $keyword
     * @param string $identifier
     * @param string $text
     * @param string $time
     */
    public function __construct($smsid, $sender, $recipient, $keyword, $identifier, $text, $time) {
        $this->smsid = $smsid;
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->keyword = $keyword;
        $this->identifier = $identifier;
        $this->text = $text;
        $this->time = $time;
    }

    /** @return string */
    public function getIdentifier() {
        return $this->identifier;
    }

    /** @return string */
    public function getKeyword() {
        return $this->keyword;
    }

    /** @return string */
    public function getRecipient() {
        return $this->recipient;
    }

    /** @return string */
    public function getSender() {
        return $this->sender;
    }

    /** @return int */
    public function getSmsid() {
        return $this->smsid;
    }

    /** @return string */
    public function getText() {
        return $this->text;
    }

    /** @return string */
    public function getTime() {
        return $this->time;
    }

}
