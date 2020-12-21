<?php
/**
 * 多多进宝转链接口
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.zs.unit.url.gen
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/21
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class PddDdkGoodsZsUnitUrlGenRequest implements Request
{

    private $pid; // 渠道id

    private $source_url; // 需转链的链接

    private $custom_parameters; // 自定义参数，为链接打上自定义标签；自定义参数最长限制64个字节；
                                // 格式为： {"uid":"11111","sid":"22222"} ，其中 uid 用户唯一标识，可自行加密后传入，
                                // 每个用户仅且对应一个标识，必填； sid 上下文信息标识，例如sessionId等，非必填。
                                // 该json字符串中也可以加入其他自定义的key

    private $apiParams = [];


    public function setPid($val)
    {
        $this->pid = (string)$val;
        $this->apiParams['pid'] = (string)$val;
    }

    public function setSourceUrl($val)
    {
        $this->source_url = (string)$val;
        $this->apiParams['source_url'] = (string)$val;
    }

    public function setCustomParameters($val)
    {
        $this->custom_parameters = (string)$val;
        $this->apiParams['custom_parameters'] = (string)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.goods.zs.unit.url.gen';
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
        RequestParamCheckUtil::checkNotNull($this->pid, 'pid');
        RequestParamCheckUtil::checkNotNull($this->source_url, 'source_url');
    }
}