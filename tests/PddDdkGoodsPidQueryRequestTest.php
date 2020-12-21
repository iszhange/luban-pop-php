<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Pop\Client;
use LuBan\Pop\Requests\PddDdkGoodsPidQueryRequest;

class PddDdkGoodsPidQueryRequestTest extends TestCase
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
        $req = new PddDdkGoodsPidQueryRequest();
        $req->setPage(1);
        $req->setPageSize(10);
        $response = $c->execute($req);
        print_r($response);
        $this->assertArrayHasKey('p_id_query_response', $response);
    }

}