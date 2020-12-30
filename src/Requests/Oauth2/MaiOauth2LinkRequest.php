<?php
/**
 * 拼多多店铺-H5移动端网页授权
 *
 * @link https://open.pinduoduo.com/application/document/browse?idStr=BD3A776A4D41D5F5
 *
 * User: zhange <kenphp@yeah.net>
 * Date: 2020/12/30
 * Time: 21:01
 */
namespace LuBan\Pop\Requests\Oauth2;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Oauth2Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class MaiOauth2LinkRequest implements Oauth2Request
{

    private $gateway = 'https://mai.pinduoduo.com/h5-login.html';

    private $responseType = 'code';  // 授权类型，值为 code

    private $redirectUri; // 回调地址

    private $state; // 自定义参数

    private $view; // web或h5, 默认web

    private $apiParams = [];


    public function setResponseType($val)
    {
        $this->responseType = (string)$val;
        $this->apiParams['response_type'] = (string)$val;
    }

    public function setRedirectUri($val)
    {
        $this->redirectUri = (string)$val;
        $this->apiParams['redirect_uri'] = (string)$val;
    }

    public function setState($state)
    {
        $this->state = (string)$state;
        $this->apiParams['state'] = (string)$state;
    }

    public function setView($val)
    {
        $this->view = (string)$val;
        $this->apiParams['view'] = (string)$val;
    }

    /**
     * 获取授权地址
     *
     * @return string
     */
    public function getGateway()
    {
        return $this->gateway;
    }

    public function getApiParas()
    {
        $this->apiParams['response_type'] = $this->responseType;
        return $this->apiParams;
    }

    /**
     * @inheritDoc
     * @throws \Exception
     */
    public function check()
    {
        RequestParamCheckUtil::checkNotNull($this->responseType, 'response_type');
        RequestParamCheckUtil::checkNotNull($this->redirectUri, 'redirect_uri');
    }
}