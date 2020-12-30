<?php
/**
 * 获取Access Token
 *
 * @link: https://open.pinduoduo.com/application/document/api?id=pdd.pop.auth.token.create
 *
 * User: zhange <kenphp@yeah.net>
 * Date: 2020/12/30
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class PddPopAuthTokenCreateRequest implements Request
{

    private $grantType = 'authorization_code';

    private $code;   // 授权code

    private $apiParams = [];


    public function setCode($val)
    {
        $this->code = (string)$val;
        $this->apiParams['code'] = (string)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.pop.auth.token.create';
    }

    public function getApiParas()
    {
        $this->apiParams['grant_type'] = $this->grantType;
        return $this->apiParams;
    }

    /**
     * @inheritDoc
     * @throws \Exception
     */
    public function check()
    {
        RequestParamCheckUtil::checkNotNull($this->code, 'code');
    }
}