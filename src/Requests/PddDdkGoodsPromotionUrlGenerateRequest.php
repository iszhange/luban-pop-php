<?php
/**
 * 多多进宝推广链接生成
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.promotion.url.generate
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/21
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\RequestParamCheckUtil;

class PddDdkGoodsPromotionUrlGenerateRequest implements Request
{

    private $crash_gift_id; // 多多礼金ID

    private $cash_gift_name; // 自定义礼金标题，用于向用户展示渠道专属福利，不超过12个字

    private $custom_parameters; // 自定义参数，为链接打上自定义标签。自定义参数最长限制64个字节

    private $generate_authority_url; // 是否生成带授权的单品链接。如果未授权，则会走授权流程

    private $generate_mall_collect_coupon;  // 是否生成店铺收藏券推广链接

    private $generate_qq_app; // 是否生成qq小程序

    private $generate_schema_url; // 是否返回 schema URL

    private $generate_short_url; // 是否生成短链接，true-是，false-否

    private $generate_we_app; // 是否生成小程序推广

    private $goods_sign_list; // 商品goodsSign列表，例如：["c9r2omogKFFAc7WBwvbZU1ikIb16_J3CTa8HNN"]，支持批量生链。
                              // goodsSign是加密后的goodsId, goodsId已下线，请使用goodsSign来替代。
                              // 使用说明：https://jinbao.pinduoduo.com/qa-system?questionId=252

    private $multi_group; // true--生成多人团推广链接 false--生成单人团推广链接（默认false）
                          // 1、单人团推广链接：用户访问单人团推广链接，可直接购买商品无需拼团。
                          // 2、多人团推广链接：用户访问双人团推广链接开团，若用户分享给他人参团，则开团者和参团者的佣金均结算给推手

    private $p_id; // 推广位ID

    private $search_id; // 搜索id，建议填写，提高收益。来自pdd.ddk.goods.recommend.get、pdd.ddk.goods.search、pdd.ddk.top.goods.list.query等接口

    private $zs_duo_id; // 招商多多客ID

    private $apiParams = [];


    public function setCrashGiftId($val)
    {
        $this->crash_gift_id = (int)$val;
        $this->apiParams['crash_gift_id'] = (int)$val;
    }

    public function setCashGiftName($val)
    {
        $this->cash_gift_name = (string)$val;
        $this->apiParams['cash_gift_name'] = (string)$val;
    }

    public function setCustomParameters($val)
    {
        $this->custom_parameters = (string)$val;
        $this->apiParams['custom_parameters'] = (string)$val;
    }

    public function setGenerateAuthorityUrl($val)
    {
        $this->generate_authority_url = (bool)$val;
        $this->apiParams['generate_authority_url'] = (bool)$val;
    }

    public function setGenerateMallCollectCoupon($val)
    {
        $this->generate_mall_collect_coupon = (bool)$val;
        $this->apiParams['generate_mall_collect_coupon'] = (bool)$val;
    }

    public function setGenerateQqApp($val)
    {
        $this->generate_qq_app = (bool)$val;
        $this->apiParams['generate_qq_app'] = (bool)$val;
    }

    public function setGenerateSchemaUrl($val)
    {
        $this->generate_schema_url = (bool)$val;
        $this->apiParams['generate_schema_url'] = (bool)$val;
    }

    public function setGenerateShortUrl($val)
    {
        $this->generate_short_url = (bool)$val;
        $this->apiParams['generate_short_url'] = (bool)$val;
    }

    public function setGenerateWeApp($val)
    {
        $this->generate_we_app = (bool)$val;
        $this->apiParams['generate_we_app'] = (bool)$val;
    }

    public function setGoodsSignList(array $val)
    {
        $this->goods_sign_list = json_encode($val);
        $this->apiParams['goods_sign_list'] = json_encode($val);
    }

    public function setMultiGroup($val)
    {
        $this->multi_group = (bool)$val;
        $this->apiParams['multi_group'] = (bool)$val;
    }

    public function setPid($val)
    {
        $this->p_id = (string)$val;
        $this->apiParams['p_id'] = (string)$val;
    }

    public function setSearchId($val)
    {
        $this->search_id = (string)$val;
        $this->apiParams['search_id'] = (string)$val;
    }

    public function setZsDuoId($val)
    {
        $this->zs_duo_id = (int)$val;
        $this->apiParams['zs_duo_id'] = (int)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.goods.promotion.url.generate';
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
        RequestParamCheckUtil::checkNotNull($this->p_id, 'p_id');
    }
}