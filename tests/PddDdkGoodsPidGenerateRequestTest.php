<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Pop\Client;
use LuBan\Pop\Requests\PddDdkGoodsPidGenerateRequest;

class PddDdkGoodsPidGenerateRequestTest extends TestCase
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
        $req = new PddDdkGoodsPidGenerateRequest();
        $req->setNumber(1);
        $req->setMediaId(9012545190);
        $response = $c->execute($req);
        print_r($response);
        $this->assertArrayHasKey('p_id_generate_response', $response);
    }

}