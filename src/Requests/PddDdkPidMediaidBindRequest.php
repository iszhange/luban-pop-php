<?php
/**
 * 批量绑定推广位的媒体id
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.pid.mediaid.bind
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/21
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class PddDdkPidMediaidBindRequest implements Request
{

    private $media_id; // 媒体id

    private $pid_list; // pid列表

    private $apiParams = [];


    public function setMediaId($val)
    {
        $this->media_id = (int)$val;
        $this->apiParams['media_id'] = (int)$val;
    }

    public function setPidList(array $val)
    {
        $this->pid_list = json_encode($val);
        $this->apiParams['pid_list'] = json_encode($val);
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.pid.mediaid.bind';
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
        RequestParamCheckUtil::checkNotNull($this->media_id, 'media_id');
        RequestParamCheckUtil::checkNotNull($this->pid_list, 'pid_list');
    }
}