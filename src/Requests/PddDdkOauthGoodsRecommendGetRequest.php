<?php
/**
 * 运营频道商品查询API
 *
 * @link: https://open.pinduoduo.com/#/apidocument/port?portId=pdd.ddk.oauth.goods.recommend.get
 * @author Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Interfaces\Request;

class PddDdkOauthGoodsRecommendGetRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = 'pdd.ddk.oauth.goods.recommend.get';

    /**
     * 请求方式
     *
     * @var string
     */
    public $requestType = 'post';

    private $offset;    // 从多少位置开始请求；默认值 ： 0

    private $limit;     // 请求数量；默认值 ： 400

    private $channel_type;  // 频道类型；0, "1.9包邮", 1, "今日爆款", 2, "品牌清仓", 非必填 ,默认是1

    private $pid;       // 推广位id

    private $custom_parameters; // 自定义参数

    private $list_id; // 翻页时建议填写前页返回的list_id值

    private $apiParams = [];


    public function setOffset($val)
    {
        $this->offset = (int)$val;
        $this->apiParams['offset'] = (int)$val;
    }

    public function setLimit($val)
    {
        $this->limit = (int)$val;
        $this->apiParams['limit'] = (int)$val;
    }

    public function setChannelType($val)
    {
        $this->channel_type = (int)$val;
        $this->apiParams['channel_type'] = (int)$val;
    }

    public function setPid($val)
    {
        $this->pid = (string)$val;
        $this->apiParams['pid'] = (string)$val;
    }

    public function setCustomParameters($val)
    {
        $this->custom_parameters = (string)$val;
        $this->apiParams['custom_parameters'] = (string)$val;
    }

    public function setListId(string $val)
    {
        $this->list_id = $val;
        $this->apiParams['list_id'] = $val;
    }

    /**
     * 获取参数
     */
    public function getParams()
    {
        return $this->apiParams;
    }

}