<?php
/**
 * 生成多多进宝频道推广
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.resource.url.gen
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/21
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class PddDdkResourceUrlGenRequest implements Request
{

    private $custom_parameters; // 自定义参数

    private $generate_qq_app; // 是否生成qq小程序

    private $generate_schema_url; // 是否返回 schema URL

    private $generate_we_app; // 是否生成小程序

    private $pid; // 推广位ID

    private $resource_type; // 频道来源：4-限时秒杀,39997-充值中心, 39998-转链type，39999-电器城，39996-百亿补贴，40000-领券中心

    private $url; // 招商多多客ID

    private $apiParams = [];


    public function setCustomParameters($val)
    {
        $this->custom_parameters = (string)$val;
        $this->apiParams['custom_parameters'] = (string)$val;
    }

    public function setGenerateQqApp($val)
    {
        $this->generate_qq_app = (bool)$val;
        $this->apiParams['generate_qq_app'] = (bool)$val;
    }

    public function setGenerateSchemaUrl($val)
    {
        $this->generate_schema_url = (bool)$val;
        $this->apiParams['generate_schema_url'] = (bool)$val;
    }

    public function setGenerateWeApp($val)
    {
        $this->generate_we_app = (bool)$val;
        $this->apiParams['generate_we_app'] = (bool)$val;
    }

    public function setPid($val)
    {
        $this->pid = (string)$val;
        $this->apiParams['pid'] = (string)$val;
    }

    public function setResourceType($val)
    {
        $this->resource_type = (int)$val;
        $this->apiParams['resource_type'] = (int)$val;
    }

    public function setUrl($val)
    {
        $this->url = (string)$val;
        $this->apiParams['url'] = (string)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.resource.url.gen';
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
    }
}