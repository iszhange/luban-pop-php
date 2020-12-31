<?php
/**
 * 多多进宝推广位创建接口
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.goods.pid.generate
 * @author Ken.Zhang <kenphp@yeah.net>
 * Date: 2020/12/31
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class PddDdkOauthGoodsPidGenerateRequest implements Request
{

    private $number; // 要生成的推广位数量，默认为10，范围为：1~100

    private $pidNameList; // 推广位名称，例如["1","2"]

    private $mediaId; // 媒体id

    private $apiParams = [];



    public function setNumber($val)
    {
        $this->number = (int)$val;
        $this->apiParams['number'] = (int)$val;
    }

    public function setPidNameList(array $val)
    {
        $this->pidNameList = json_encode($val);
        $this->apiParams['p_id_name_list'] = json_encode($val);
    }

    public function setMediaId($val)
    {
        $this->mediaId = (int)$val;
        $this->apiParams['media_id'] = (int)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.oauth.goods.pid.generate';
    }

    public function getApiParas()
    {
        return $this->apiParams;
    }

    /**
     * @inheritDoc
     * @throws \Exception
     */
    public function check()
    {
        RequestParamCheckUtil::checkMinValue($this->number, 1,'number');
        RequestParamCheckUtil::checkMaxValue($this->number, 100,'number');
    }
}