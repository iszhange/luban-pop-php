<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Pop\Client;
use LuBan\Pop\Requests\PddDdkPidMediaidBindRequest;

class PddDdkPidMediaidBindRequestTest extends TestCase
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
        $req = new PddDdkPidMediaidBindRequest();
        $req->setMediaId(9012545190);
        $req->setPidList(['1744096_181109855']);
        $response = $c->execute($req);
        print_r($response);
        $this->assertArrayHasKey('p_id_bind_response', $response);
    }

}