<?php
/**
 * 多多进宝商品推荐API
 *
 * @link: https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.recommend.get
 * @author Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;

class PddDdkGoodsRecommendGetRequest implements Request
{

    private $cat_id; // 猜你喜欢场景的商品类目，20100-百货，20200-母婴，20300-食品，20400-女装，20500-电器，20600-鞋包，
                     // 20700-内衣，20800-美妆，20900-男装，21000-水果，21100-家纺，21200-文具,21300-运动,21400-虚拟,
                     // 21500-汽车,21600-家装,21700-家具,21800-医药;

    private $channel_type;  // 频道类型；0, "1.9包邮", 1, "今日爆款", 2, "品牌清仓", 非必填 ,默认是1

    private $custom_parameters; // 自定义参数

    private $goods_ids; // 相似商品推荐场景时必传。商品Id，请求相似商品时，仅取数组的第一位

    private $goods_sign_list; // 相似商品推荐场景时必传。goodsSign，请求相似商品时，仅取数组的第一位

    private $limit; // 请求数量；默认值 ： 400

    private $list_id; // 翻页时建议填写前页返回的list_id值

    private $offset; // 从多少位置开始请求；默认值 ： 0

    private $pid; // 推广位id

    private $apiParams = [];


    public function setCatId($val)
    {
        $this->cat_id = (int)$val;
        $this->apiParams['cat_id'] = (int)$val;
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

    public function setGoodsIds($val)
    {
        $this->goods_ids = (string)$val;
        $this->apiParams['goods_ids'] = (string)$val;
    }

    public function setGoodsSignList(array $val)
    {
        $this->goods_sign_list = json_encode($val);
        $this->apiParams['goods_sign_list'] = json_encode($val);
    }

    public function setLimit($val)
    {
        $this->limit = (int)$val;
        $this->apiParams['limit'] = (int)$val;
    }

    public function setListId($val)
    {
        $this->list_id = (string)$val;
        $this->apiParams['list_id'] = (string)$val;
    }

    public function setOffset($val)
    {
        $this->offset = (int)$val;
        $this->apiParams['offset'] = (int)$val;
    }

    public function setPid($val)
    {
        $this->pid = (string)$val;
        $this->apiParams['pid'] = (string)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.goods.recommend.get';
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