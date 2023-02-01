<?php

namespace Monri\Tests;

use Monri\Client;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Client
     */
    protected $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new Client();
        $this->client->setMerchantKey('qwert1234');
        $this->client->setAuthenticityToken('7db11ea5d4a1af32421b564c79b946d1ead3daf0');
        $this->client->setEnvironment('test');
    }
}
