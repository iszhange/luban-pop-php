<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Pop\Client;
use LuBan\Pop\Requests\PddDdkCmsPromUrlGenerateRequest;

class PddDdkCmsPromUrlGenerateRequestTest extends TestCase
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
        $req = new PddDdkCmsPromUrlGenerateRequest();
        $req->setPidList(["1744096_181109855"]);
        $response = $c->execute($req);

        $this->assertArrayHasKey('cms_promotion_url_generate_response', $response);
    }

}