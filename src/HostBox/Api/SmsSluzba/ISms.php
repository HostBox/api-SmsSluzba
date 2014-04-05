<?php

namespace HostBox\Api\SmsSluzba;


interface ISms {

    /**
     * @param string $recipient
     * @return void
     */
    public function setRecipient($recipient);

    /**
     * @return string
     */
    public function getRecipient();

    /**
     * @param string $text
     * @return void
     */
    public function setText($text);

    /**
     * @return string
     */
    public function getText();

}
