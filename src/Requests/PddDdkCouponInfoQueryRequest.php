<?php
/**
 * 查询优惠券信息
 *
 * 官方已放弃支持,请谨慎使用
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.coupon.info.query
 * @author Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;

class PddDdkCouponInfoQueryRequest implements Request
{

    private $coupon_ids; // 优惠券id

    private $mall_ids; // 店铺id

    private $apiParams = [];

    public function setCouponIds($val)
    {
        $this->coupon_ids = json_encode($val);
        $this->apiParams['coupon_ids'] = json_encode($val);
    }

    public function setMallIds($val)
    {
        $this->mall_ids = json_encode($val);
        $this->apiParams['mall_ids'] = json_encode($val);
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.coupon.info.query';
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