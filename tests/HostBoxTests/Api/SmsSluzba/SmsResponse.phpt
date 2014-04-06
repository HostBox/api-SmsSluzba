<?php

namespace HostBoxTests\Api\SmsSluzba;

use HostBox\Api\SmsSluzba\SmsResponse;
use Tester;
use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';


class SmsResponseTest extends Tester\TestCase {

    public function testException() {
        Assert::exception(function () {
            new SmsResponse('<status><err>200</id><message>TEST</message></status>');
        }, 'HostBox\Api\SmsSluzba\Exceptions\LogicException');

        Assert::exception(function () {
            new SmsResponse('<status><message>TEST</message></status>');
        }, 'HostBox\Api\SmsSluzba\Exceptions\LogicException');
    }

    public function testData() {
        $response = new SmsResponse('<status><id>200</id><message>TEST</message></status>');

        Assert::same('200', $response->getId());
        Assert::same('TEST', $response->getMessage());
    }

}

\run(new SmsResponseTest());
