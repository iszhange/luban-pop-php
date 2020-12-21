<?php
/**
 * 查询订单详情
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.order.detail.get
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/21
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class PddDdkOrderDetailGetRequest implements Request
{

    private $order_sn; // 订单号

    private $query_order_type; // 订单类型：1-推广订单；2-直播间订单

    private $apiParams = [];


    public function setOrderSn($val)
    {
        $this->order_sn = (string)$val;
        $this->apiParams['order_sn'] = (string)$val;
    }

    public function setQueryOrderType($val)
    {
        $this->query_order_type = (int)$val;
        $this->apiParams['query_order_type'] = (int)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.order.detail.get';
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
        RequestParamCheckUtil::checkNotNull($this->order_sn, 'order_sn');
    }
}