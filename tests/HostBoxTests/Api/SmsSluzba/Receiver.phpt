<?php

namespace HostBoxTests\Api\SmsSluzba;

use HostBox\Api\SmsSluzba\Receive;
use HostBox\Api\SmsSluzba\Receiver;
use Tester\Assert;
use Tester;

require_once __DIR__ . '/../../bootstrap.php';


class ReceiverTest extends Tester\TestCase {

    public function testException() {
        Assert::exception(function () {
            $r = new Receiver(array());
            $r->getReceive();
        }, 'HostBox\Api\SmsSluzba\Exceptions\LogicException');

        Assert::exception(function () {
            $r = new Receiver(array(
                'smsid' => '1234',
                'sender' => '56789',
                'recipient' => '+420000000',
                'keyword' => NULL,
                'identifier' => "",
                'text' => 'HELLO',
                'time' => '2011-06-13T11%3A38%3A07%2B02%3A00'
            ));
            $r->getReceive();
        }, 'HostBox\Api\SmsSluzba\Exceptions\LogicException');
    }

    public function testGetReceive() {
        $r = new Receiver(array(
            'smsid' => '1234',
            'sender' => '56789',
            'recipient' => '+420000000',
            'keyword' => 'TEST',
            'identifier' => '1234',
            'text' => 'HELLO',
            'time' => '2011-06-13T11%3A38%3A07%2B02%3A00'
        ));

        Assert::equal(
            new Receive('1234', '56789', '+420000000', 'TEST', '1234', 'HELLO', '2011-06-13T11%3A38%3A07%2B02%3A00')
            , $r->getReceive()
        );
    }

}

\run(new ReceiverTest());
