<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Pop\Client;
use LuBan\Pop\Requests\PddDdkGoodsSearchRequest;

class PddDdkGoodsSearchRequestTest extends TestCase
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
        $req = new PddDdkGoodsSearchRequest();
        $req->setKeyword("上衣");
        $req->setPid('1744096_18978587');
        $req->setCustomParameters("{\"uid\":\"237034-1744096_18978587\"}");
        $response = $c->execute($req);
        print_r($response);
        $this->assertArrayHasKey('goods_search_response', $response);
    }

}