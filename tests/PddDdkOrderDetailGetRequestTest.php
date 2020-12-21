<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Pop\Client;
use LuBan\Pop\Requests\PddDdkOrderDetailGetRequest;

class PddDdkOrderDetailGetRequestTest extends TestCase
{

    private $appKey;

    private $appSecret;

    public function __construct()
    {
        parent::__construct();

        $configs = require __DIR__ . '/configs.php';
        $this->appKey = $configs['app_key'];
        $this->appSecret = $configs['app_secret'];
    }

    public function testRequest()
    {
        $c = new Client();
        $c->appKey = $this->appKey;
        $c->appSecret = $this->appSecret;
        $req = new PddDdkOrderDetailGetRequest();
        $req->setOrderSn('201217-665555109041775');
        $response = $c->execute($req);
        print_r($response);
        $this->assertArrayHasKey('order_detail_response', $response);
    }

}