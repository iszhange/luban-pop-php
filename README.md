# luban-pop-php
拼多多开放平台SDK

- 项目结构
~~~
luban-pop-php
    |-src
        |-Exceptions
        |-Interfaces
        |-Libs
        |-Requests
    |-tests
    |-composer.json
~~~
遵循`psr-4`规范

- 使用示例
~~~php
use LuBan\Pop\Client;
use LuBan\Pop\Requests\PddDdkGoodsSearchRequest;

$c = new Client();
$c->appKey = $this->appKey;
$c->appSecret = $this->appSecret;
$req = new PddDdkGoodsSearchRequest();
$req->setKeyword("上衣");
$req->setPid('1744096_18978587');
$req->setCustomParameters("{\"uid\":\"237034-1744096_18978587\"}");
$response = $c->execute($req);
print_r($response);
~~~