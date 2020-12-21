<?php
/**
 * 用时间段查询推广订单接口
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.order.list.range.get
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/21
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class PddDdkOrderListRangeGetRequest implements Request
{

    private $start_time; // 支付起始时间，如：2019-05-05 00:00:00

    private $end_time; // 支付结束时间，如：2019-05-05 00:00:00

    private $last_order_id; // 上一次的迭代器id(第一次不填)

    private $page_size; // 每次请求多少条，建议300

    private $query_order_type; // 订单类型：1-推广订单；2-直播间订单

    private $apiParams = [];


    public function setStartTime($val)
    {
        $this->start_time = (string)$val;
        $this->apiParams['start_time'] = (string)$val;
    }

    public function setEndTime($val)
    {
        $this->end_time = (string)$val;
        $this->apiParams['end_time'] = (string)$val;
    }

    public function setLastOrderId($val)
    {
        $this->last_order_id = (string)$val;
        $this->apiParams['last_order_id'] = (string)$val;
    }

    public function setPageSize($val)
    {
        $this->page_size = (int)$val;
        $this->apiParams['page_size'] = (int)$val;
    }

    public function setQueryOrderType($val)
    {
        $this->query_order_type = (int)$val;
        $this->apiParams['query_order_type'] = (int)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.order.list.range.get';
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
        RequestParamCheckUtil::checkNotNull($this->start_time, 'start_time');
        RequestParamCheckUtil::checkNotNull($this->end_time, 'end_time');
    }
}