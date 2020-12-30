<?php
/**
 * 批量绑定推广位的媒体id
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.pid.mediaid.bind
 * @author zhange <kenphp@yeah.net>
 * Date: 2020/12/30
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class PddDdkOauthPidMediaidBindRequest implements Request
{

    private $mediaId; // 媒体id

    private $pidList; // pid列表

    private $apiParams = [];


    public function setMediaId($val)
    {
        $this->mediaId = (string)$val;
        $this->apiParams['media_id'] = (string)$val;
    }

    public function setPidList(array $val)
    {
        $this->pidList = json_encode($val);
        $this->apiParams['pid_list'] = json_encode($val);
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.oauth.pid.mediaid.bind';
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
        RequestParamCheckUtil::checkNotNull($this->mediaId, 'media_id');
        RequestParamCheckUtil::checkNotNull($this->pidList, 'pid_list');
    }
}