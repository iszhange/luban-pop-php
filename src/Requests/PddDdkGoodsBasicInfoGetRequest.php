<?php
/**
 * 获取商品基本信息接口
 *
 * @link https://open.pinduoduo.com/#/apidocument/port?portId=pdd.ddk.goods.basic.info.get
 * @author Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Interfaces\Request;

class PddDdkGoodsBasicInfoGetRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = 'pdd.ddk.goods.basic.info.get';

    /**
     * 请求方式
     *
     * @var string
     */
    public $requestType = 'post';

    private $goods_id_list; // 商品id [34563598420]

    private $apiParams = [];



    public function setGoodsIdList($val)
    {
        $this->goods_id_list = $val;
        $this->apiParams['goods_id_list'] = $val;
    }

    /**
     * 获取参数
     */
    public function getParams()
    {
        return $this->apiParams;
    }

}