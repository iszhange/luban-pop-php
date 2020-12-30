<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Pop\Oauth2Client;
use LuBan\Pop\Requests\Oauth2\JinBaoOauth2LinkRequest;

class Oauth2ClientTest extends TestCase
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
        $c = new Oauth2Client();
        $c->appKey = $this->appKey;
        $c->appSecret = $this->appSecret;
        $req = new JinBaoOauth2LinkRequest();
        $req->setRedirectUri("https://www.baidu.com");
        $response = $c->execute($req);
        print_r($response);
        $this->assertStringContainsString('baidu', $response);
    }

}