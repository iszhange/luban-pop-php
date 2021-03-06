<?php
/**
 * 创建多多进宝推广位
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.pid.generate
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/21
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class PddDdkGoodsPidGenerateRequest implements Request
{

    private $number; // 要生成的推广位数量，默认为10，范围为：1~100

    private $p_id_name_list; // 推广位名称，例如["1","2"]

    private $media_id; // 媒体id

    private $apiParams = [];


    public function setNumber($val)
    {
        $this->number = (int)$val;
        $this->apiParams['number'] = (int)$val;
    }

    public function setPidNameList($val)
    {
        $this->p_id_name_list = $val;
        $this->apiParams['p_id_name_list'] = $val;
    }

    public function setMediaId($val)
    {
        $this->media_id = (int)$val;
        $this->apiParams['media_id'] = (int)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.goods.pid.generate';
    }

    public function getApiParas()
    {
        return $this->apiParams;
    }

    /**
     * @throws ParameterException
     */
    public function check()
    {
        RequestParamCheckUtil::checkMinValue($this->number, 1, 'number');
        RequestParamCheckUtil::checkMaxValue($this->number, 100, 'number');
    }
}