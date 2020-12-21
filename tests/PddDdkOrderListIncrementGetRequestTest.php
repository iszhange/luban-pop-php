<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Pop\Client;
use LuBan\Pop\Requests\PddDdkOrderListIncrementGetRequest;

class PddDdkOrderListIncrementGetRequestTest extends TestCase
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
        $req = new PddDdkOrderListIncrementGetRequest();
        $req->setStartUpdateTime(strtotime('2020-12-17 12:00:00'));
        $req->setEndUpdateTime(strtotime('2020-12-17 13:00:00'));
        $response = $c->execute($req);
        print_r($response);
        $this->assertArrayHasKey('order_list_get_response', $response);
    }

}