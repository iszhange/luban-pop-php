<?php
/**
 * 授权客户端
 *
 * User: Zhange <kenphp@yeah.net>
 * Date: 2020/12/30
 * Time: 20:54
 */
namespace LuBan\Pop;

use LuBan\Pop\Interfaces\Oauth2Request;

class Oauth2Client
{

    /**
     * AppKey
     *
     * @var string
     */
    public $appKey;

    /**
     * AppSecret
     *
     * @var string
     */
    public $appSecret;


    public function __construct($appKey='', $appSecret='')
    {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
    }

    /**
     * 执行
     *
     * @param Oauth2Request $request
     * @return mixed
     */
    public function execute(Oauth2Request $request)
    {
        $params = $request->getApiParas();
        $params['client_id'] = $this->appKey;

        return $request->getGateway() . '?' . http_build_query($params);
    }




}