<?php
/**
 * 刷新Access Token
 *
 * @link: https://open.pinduoduo.com/application/document/api?id=pdd.pop.auth.token.refresh
 *
 * User: zhange <kenphp@yeah.net>
 * Date: 2020/12/30
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class PddPopAuthTokenRefreshRequest implements Request
{
    private $grantType = 'refresh_token';

    private $refreshToken;   // refresh_token

    private $apiParams = [];


    public function setRefreshToken($val)
    {
        $this->refreshToken = (string)$val;
        $this->apiParams['refresh_token'] = (string)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.pop.auth.token.refresh';
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
        RequestParamCheckUtil::checkNotNull($this->refreshToken, 'refresh_token');
    }
}