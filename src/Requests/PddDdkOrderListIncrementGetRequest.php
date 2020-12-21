<?php
/**
 * 最后更新时间段增量同步推广订单信息
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.order.list.increment.get
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/21
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class PddDdkOrderListIncrementGetRequest implements Request
{

    private $start_update_time; // 最近90天内多多进宝商品订单更新时间--查询时间开始。
                                // note：此时间为时间戳，指格林威治时间 1970 年01 月 01 日 00 时 00 分 00 秒(北京时间 1970 年 01 月 01 日 08 时 00 分 00 秒)起至现在的总秒数

    private $end_update_time; // 查询结束时间，和开始时间相差不能超过24小时。
                              // note：此时间为时间戳，指格林威治时间 1970 年01 月 01 日 00 时 00 分 00 秒(北京时间 1970 年 01 月 01 日 08 时 00 分 00 秒)起至现在的总秒数

    private $page_size; // 返回的每页结果订单数，默认为100，范围为10到100，建议使用40~50，可以提高成功率，减少超时数量。

    private $page; // 第几页，从1到10000，默认1，注：使用最后更新时间范围增量同步时，必须采用倒序的分页方式（从最后一页往回取）才能避免漏单问题。

    private $return_count; // 是否返回总数，默认为true，如果指定false, 则返回的结果中不包含总记录数，通过此种方式获取增量数据，效率在原有的基础上有80%的提升。

    private $query_order_type; // 订单类型：1-推广订单；2-直播间订单

    private $apiParams = [];


    public function setStartUpdateTime($val)
    {
        $this->start_update_time = (int)$val;
        $this->apiParams['start_update_time'] = (int)$val;
    }

    public function setEndUpdateTime($val)
    {
        $this->end_update_time = (int)$val;
        $this->apiParams['end_update_time'] = (int)$val;
    }

    public function setPageSize($val)
    {
        $this->page_size = (int)$val;
        $this->apiParams['page_size'] = (int)$val;
    }

    public function setPage($val)
    {
        $this->page = (int)$val;
        $this->apiParams['page'] = (int)$val;
    }

    public function setReturnCount($val)
    {
        $this->return_count = (bool)$val;
        $this->apiParams['return_count'] = (bool)$val;
    }

    public function setQueryOrderType($val)
    {
        $this->query_order_type = (int)$val;
        $this->apiParams['query_order_type'] = (int)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.order.list.increment.get';
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
        RequestParamCheckUtil::checkNotNull($this->start_update_time, 'start_update_time');
        RequestParamCheckUtil::checkNotNull($this->end_update_time, 'end_update_time');
    }
}