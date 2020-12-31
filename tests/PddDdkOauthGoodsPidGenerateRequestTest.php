<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Pop\Client;
use LuBan\Pop\Requests\PddDdkOauthGoodsPidGenerateRequest;

class PddDdkOauthGoodsPidGenerateRequestTest extends TestCase
{

    private $appKey;

    private $appSecret;

    public function __construct()
    {
        parent::__construct();

        $configs = require __DIR__ . '/configs.php';
        $this->appKey = $configs['tool_app_key'];
        $this->appSecret = $configs['tool_app_secret'];
    }

    public function testRequest()
    {
        $c = new Client();
        $c->appKey = $this->appKey;
        $c->appSecret = $this->appSecret;
        $req = new PddDdkOauthGoodsPidGenerateRequest();
        $req->setNumber(1);
        $req->setPidNameList(['测试1']);
        $req->setMediaId(9012545190);
        $response = $c->execute($req, 'ef2dc509622244c5a5eab3b7432c0d7a90fe760c');
        print_r($response);
        $this->assertArrayHasKey('p_id_generate_response', $response);
    }

}