<?php
/**
 * 多多客获取爆款排行商品接口
 *
 * @link: https://open.pinduoduo.com/application/document/api?id=pdd.ddk.top.goods.list.query
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/21
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;

class PddDdkTopGoodsListQueryRequest implements Request
{

    private $p_id; // 推广位ID

    private $offset; // 从多少位置开始请求；默认值 ： 0

    private $sort_type; // 1-实时热销榜；2-实时收益榜

    private $limit; // 请求数量；默认值 ： 400

    private $list_id; // 翻页时建议填写前页返回的list_id值

    private $custom_parameters; // 自定义参数，为链接打上自定义标签；自定义参数最长限制64个字节；
                                // 格式为： {"uid":"11111","sid":"22222"} ，其中 uid 用户唯一标识，可自行加密后传入，每个用户仅且对应一个标识，必填；
                                // sid 上下文信息标识，例如sessionId等，非必填。该json字符串中也可以加入其他自定义的key

    private $apiParams = [];


    public function setPid($val)
    {
        $this->p_id = (string)$val;
        $this->apiParams['p_id'] = (string)$val;
    }

    public function setOffset($val)
    {
        $this->offset = (int)$val;
        $this->apiParams['offset'] = (int)$val;
    }

    public function setSortType($val)
    {
        $this->sort_type = (int)$val;
        $this->apiParams['sort_type'] = (int)$val;
    }

    public function setLimit($val)
    {
        $this->limit = (int)$val;
        $this->apiParams['limit'] = (int)$val;
    }

    public function setListId(string $val)
    {
        $this->list_id = $val;
        $this->apiParams['list_id'] = $val;
    }

    public function setCustomParameters(string $val)
    {
        $this->custom_parameters = $val;
        $this->apiParams['custom_parameters'] = $val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.top.goods.list.query';
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