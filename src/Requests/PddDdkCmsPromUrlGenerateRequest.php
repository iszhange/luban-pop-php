<?php
/**
 * 生成商城-频道推广链接
 *
 * @link: https://open.pinduoduo.com/application/document/api?id=pdd.ddk.cms.prom.url.generate
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/18
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class PddDdkCmsPromUrlGenerateRequest implements Request
{

    private $channel_type; // 0, "1.9包邮"；1, "今日爆款"； 2, "品牌清仓"； 4,"PC端专属商城"；不传值为默认商城

    private $custom_parameters; // 自定义参数，为链接打上自定义标签；自定义参数最长限制64个字节；格式为： {"uid":"11111","sid":"22222"} ，
                                // 其中 uid 用户唯一标识，可自行加密后传入，每个用户仅且对应一个标识，必填； sid 上下文信息标识，
                                // 例如sessionId等，非必填。该json字符串中也可以加入其他自定义的key

    private $generate_mobile; // 是否生成手机跳转链接。true-是，false-否，默认false

    private $generate_schema_url; // 是否返回 schema URL

    private $generate_short_url; // 是否生成短链接，true-是，false-否

    private $generate_we_app; // 是否生成小程序推广

    private $keyword; // 搜索关键词

    private $multi_group; // 单人团多人团标志。true-多人团，false-单人团 默认false

    private $p_id_list; // 推广位列表，例如：["60005_612"]

    private $apiParams = [];


    public function setChannelType($val)
    {
        $this->channel_type = (int)$val;
        $this->apiParams['channel_type'] = (int)$val;
    }

    public function setCustomParameters($val)
    {
        $this->custom_parameters = (string)$val;
        $this->apiParams['custom_parameters'] = (string)$val;
    }

    public function setGenerateMobile($val)
    {
        $this->generate_mobile = (bool)$val;
        $this->apiParams['generate_mobile'] = (bool)$val;
    }

    public function setGenerateSchemaUrl($val)
    {
        $this->generate_schema_url = (bool)$val;
        $this->apiParams['generate_schema_url'] = (bool)$val;
    }

    public function setGenerateShortUrl($val)
    {
        $this->generate_short_url = (bool)$val;
        $this->apiParams['generate_short_url'] = (bool)$val;
    }

    public function setGenerateWeApp($val)
    {
        $this->generate_we_app = (bool)$val;
        $this->apiParams['generate_we_app'] = (bool)$val;
    }

    public function setKeyword($val)
    {
        $this->keyword = (string)$val;
        $this->apiParams['keyword'] = (string)$val;
    }

    public function setMultiGroup($val)
    {
        $this->multi_group = (bool)$val;
        $this->apiParams['multi_group'] = (bool)$val;
    }

    public function setPidList($val)
    {
        $this->p_id_list = json_encode($val);
        $this->apiParams['p_id_list'] = json_encode($val);
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.cms.prom.url.generate';
    }

    public function getApiParas()
    {
        return $this->apiParams;
    }

    /**
     * @inheritDoc
     * @throws ParameterException
     */
    public function check()
    {
        RequestParamCheckUtil::checkNotNull($this->p_id_list, 'p_id_list');
    }
}