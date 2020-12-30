<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Pop\Client;
use LuBan\Pop\Requests\PddDdkOauthPidMediaidBindRequest;

class PddDdkOauthPidMediaidBindRequestTest extends TestCase
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
        $req = new PddDdkOauthPidMediaidBindRequest();
        $req->setMediaId('9012545190');
        $req->setPidList(['1744096_185227333']);
        $response = $c->execute($req, 'ef2dc509622244c5a5eab3b7432c0d7a90fe760c');
        print_r($response);
        $this->assertArrayHasKey('p_id_bind_response', $response);
    }

}