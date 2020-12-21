<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Pop\Client;
use LuBan\Pop\Requests\PddDdkGoodsDetailRequest;

class PddDdkGoodsDetailRequestTest extends TestCase
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
        $req = new PddDdkGoodsDetailRequest();
        $req->setGoodsIdList([98466593642]);
//        $req->setGoodsSign('c9D2tIdeBf5GJaDhwvfY9oN4vLxq_JKT0hr5Sx');
        $response = $c->execute($req);
        print_r($response);
        $this->assertArrayHasKey('goods_detail_response', $response);
    }

}