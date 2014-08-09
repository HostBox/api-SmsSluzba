<?php

namespace HostBox\Api\SmsSluzba;

use HostBox\Api\SmsSluzba\Exceptions\LogicException;


class Receiver {

    private $keys = array(
        'smsid',
        'sender',
        'recipient',
        'keyword',
        'identifier',
        'text',
        'time'
    );

    /** @var array */
    private $data;


    /** @param array $data */
    public function __construct($data = array()) {
        $this->data = $data;
    }

    /**
     * @throws Exceptions\LogicException
     * @return Receive
     */
    public function getReceive() {
        $missing = array();
        foreach ($this->keys as $key) {
            if (!isset($this->data[$key])) {
                $missing[] = $key;
            }
        }

        if (count($missing) > 0) {
            throw new LogicException('Missing data: ' . implode(', ', $missing));
        }

        return new Receive(
            $this->data['smsid'], $this->data['sender'], $this->data['recipient'], $this->data['keyword'],
            $this->data['identifier'], $this->data['text'], $this->data['time']
        );
    }

}
