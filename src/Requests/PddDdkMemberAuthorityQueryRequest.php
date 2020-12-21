<?php
/**
 * 查询是否绑定备案
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.member.authority.query
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/21
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;

class PddDdkMemberAuthorityQueryRequest implements Request
{

    private $pid; // 推广位id

    private $custom_parameters; // 自定义参数，为链接打上自定义标签；自定义参数最长限制64个字节；
                                // 格式为： {"uid":"11111","sid":"22222"} ，其中 uid 用户唯一标识，可自行加密后传入，每个用户仅且对应一个标识，必填；
                                // sid 上下文信息标识，例如sessionId等，非必填。该json字符串中也可以加入其他自定义的key

    private $apiParams = [];


    public function setPid(string $val)
    {
        $this->pid = $val;
        $this->apiParams['pid'] = $val;
    }

    public function setCustomParameters(string $val)
    {
        $this->custom_parameters = $val;
        $this->apiParams['custom_parameters'] = $val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.member.authority.query';
    }

    public function getApiParas()
    {
        return $this->apiParams;
    }

    /**
     * @inheritDoc
     */
    public function check()
    {
        // TODO: Implement check() method.
    }
}