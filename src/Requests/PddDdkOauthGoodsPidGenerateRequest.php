<?php
/**
 * 多多进宝推广位创建接口
 *
 * @link https://open.pinduoduo.com/#/apidocument/port?portId=pdd.ddk.oauth.goods.pid.generate
 * @author Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Interfaces\Request;

class PddDdkOauthGoodsPidGenerateRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = 'pdd.ddk.oauth.goods.pid.generate';

    /**
     * 请求方式
     *
     * @var string
     */
    public $requestType = 'post';

    private $number; // 要生成的推广位数量，默认为10，范围为：1~100

    private $p_id_name_list; // 推广位名称，例如["1","2"]

    private $apiParams = [];



    public function setNumber($val)
    {
        $this->number = (int)$val;
        $this->apiParams['number'] = (int)$val;
    }

    public function setPidNameList(string $val)
    {
        $this->p_id_name_list = $val;
        $this->apiParams['p_id_name_list'] = $val;
    }

    /**
     * 获取参数
     */
    public function getParams()
    {
        return $this->apiParams;
    }

}