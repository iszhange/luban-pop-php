<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Pop\Client;
use LuBan\Pop\Requests\PddDdkTopGoodsListQueryRequest;

class PddDdkTopGoodsListQueryRequestTest extends TestCase
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
        $req = new PddDdkTopGoodsListQueryRequest();
        $req->setSortType(1);
        $req->setPid('1744096_181109855');
        $response = $c->execute($req);
        print_r($response);
        $this->assertArrayHasKey('top_goods_list_get_response', $response);
    }

}