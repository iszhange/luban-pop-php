<?php
/**
 * 多多客已生成推广位信息查询
 *
 * @link https://open.pinduoduo.com/#/apidocument/port?portId=pdd.ddk.oauth.goods.pid.query
 * @author Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Interfaces\Request;

class PddDdkOauthGoodsPidQueryRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = 'pdd.ddk.oauth.goods.pid.query';

    /**
     * 请求方式
     *
     * @var string
     */
    public $requestType = 'post';

    private $page; // 返回的页数

    private $page_size; // 返回的每页推广位数量

    private $pid_list; // 推广位id列表

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

    public function setPidList(string $val)
    {
        $this->pid_list = $val;
        $this->apiParams['pid_list'] = $val;
    }

    /**
     * 获取参数
     */
    public function getParams()
    {
        return $this->apiParams;
    }

}