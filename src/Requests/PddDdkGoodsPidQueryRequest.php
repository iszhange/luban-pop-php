<?php
/**
 * 查询已经生成的推广位信息
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.pid.query
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/21
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;

class PddDdkGoodsPidQueryRequest implements Request
{

    private $page;      // 返回的页数

    private $page_size; // 返回的每页推广位数量

    private $pid_list;  // 推广位id列表

    private $status; // 推广位状态：0-正常，1-封禁

    private $apiParams = [];


    public function setPage($val)
    {
        $this->page = (int)$val;
        $this->apiParams['page'] = (int)$val;
    }

    public function setPageSize($val)
    {
        $this->page_size = (int)$val;
        $this->apiParams['page_size'] = (int)$val;
    }

    public function setPidList(array $val)
    {
        $this->pid_list = json_encode($val);
        $this->apiParams['pid_list'] = json_encode($val);
    }

    public function setStatus($val)
    {
        $this->status = (int)$val;
        $this->apiParams['status'] = (int)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.goods.pid.query';
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