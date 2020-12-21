<?php
/**
 * 多多进宝商品详情查询
 *
 * @link: https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.detail
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/21
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;

class PddDdkGoodsDetailRequest implements Request
{

    private $custom_parameters; // 自定义参数

    private $goods_id_list; // 商品ID，仅支持单个查询。例如：[123456]

    private $pid; // 推广位id

    private $plan_type; // 佣金优惠券对应推广类型，3：专属 4：招商

    private $search_id; // 搜索id，建议填写，提高收益。来自pdd.ddk.goods.recommend.get、pdd.ddk.goods.search、pdd.ddk.top.goods.list.query等接口

    private $zs_duo_id; // 招商多多客ID

    private $goods_sign; // 商品goodsSign，支持通过goods_sign查询商品。优先使用此字段进行查询

    private $apiParams = [];


    public function setCustomParameters($val)
    {
        $this->custom_parameters = (string)$val;
        $this->apiParams['custom_parameters'] = (string)$val;
    }

    public function setGoodsIdList(array $val)
    {
        $this->goods_id_list = json_encode($val);
        $this->apiParams['goods_id_list'] = json_encode($val);
    }

    public function setPid($val)
    {
        $this->pid = (string)$val;
        $this->apiParams['pid'] = (string)$val;
    }

    public function setPlanType($val)
    {
        $this->plan_type = (int)$val;
        $this->apiParams['plan_type'] = (int)$val;
    }

    public function setSearchId($val)
    {
        $this->search_id = (string)$val;
        $this->apiParams['search_id'] = (string)$val;
    }

    public function setZsDuoId($val)
    {
        $this->zs_duo_id = (int)$val;
        $this->apiParams['zs_duo_id'] = (int)$val;
    }

    public function setGoodsSign($val)
    {
        $this->goods_sign = (string)$val;
        $this->apiParams['goods_sign'] = (string)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.goods.detail';
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