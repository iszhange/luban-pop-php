<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Pop\Client;
use LuBan\Pop\Requests\PddDdkGoodsPromotionUrlGenerateRequest;

class PddDdkGoodsPromotionUrlGenerateRequestTest extends TestCase
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
        $req = new PddDdkGoodsPromotionUrlGenerateRequest();
        $req->setPid('1744096_181109855');
        $req->setGoodsIdList([98466593642]);
        $response = $c->execute($req);
        print_r($response);
        $this->assertArrayHasKey('goods_promotion_url_generate_response', $response);
    }

}