<?php
/**
 * 生成营销工具推广链接
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.rp.prom.url.generate
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/21
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class PddDdkRpPromUrlGenerateRequest implements Request
{

    private $amount; // 初始金额（单位分），有效金额枚举值：300、500、700、1100和1600，默认300

    private $channel_type; // CPA新人红包，0-默认红包，2 – 新人红包，默认0

    private $custom_parameters; // 自定义参数，为链接打上自定义标签；自定义参数最长限制64个字节；
                                // 格式为： {"uid":"11111","sid":"22222"} ，其中 uid 用户唯一标识，可自行加密后传入，
                                // 每个用户仅且对应一个标识，必填； sid 上下文信息标识，例如sessionId等，非必填。该json字符串中也可以加入其他自定义的key

    private $diy_lottery_param; // 转盘自定义参数

    private $diy_red_packet_param; // 红包自定义参数

    private $generate_qq_app; // 是否生成qq小程序

    private $generate_schema_url; // 是否返回 schema URL

    private $generate_short_url; // 是否生成短链接。true-是，false-否，默认false

    private $generate_we_app; // 是否生成小程序推广

    private $p_id_list; // 推广位列表，例如：["60005_612"]

    private $scratch_card_amount; // 刮刮卡指定金额（单位分），可指定2-100元间数值，即有效区间为：[200,10000]

    private $apiParams = [];


    public function setAmount($val)
    {
        $this->amount = (int)$val;
        $this->apiParams['amount'] = (int)$val;
    }

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

    public function setDiyLotteryParam(array $val)
    {
        $this->diy_lottery_param = json_encode($val);
        $this->apiParams['diy_lottery_param'] = json_encode($val);
    }

    public function setDiyRedPacketParam(array $val)
    {
        $this->diy_red_packet_param = json_encode($val);
        $this->apiParams['diy_red_packet_param'] = json_encode($val);
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

    public function setPidList(array $val)
    {
        $this->p_id_list = json_encode($val);
        $this->apiParams['p_id_list'] = json_encode($val);
    }

    public function setScratchCardAmount($val)
    {
        $this->scratch_card_amount = (int)$val;
        $this->apiParams['scratch_card_amount'] = (int)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.rp.prom.url.generate';
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
        RequestParamCheckUtil::checkNotNull($this->p_id_list, 'p_id_list');
    }
}