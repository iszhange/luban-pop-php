<?php
/**
 * 多多进宝商品查询
 *
 * @link https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.search
 * @author Zhange <kenphp@yeah.net>
 * Date: 2020/12/21
 * Time: 21:01
 */
namespace LuBan\Pop\Requests;

use LuBan\Pop\Exceptions\ParameterException;
use LuBan\Pop\Interfaces\Request;

class PddDdkGoodsSearchRequest implements Request
{

    private $activity_tags; // 活动商品标记数组，例：[4,7]，4-秒杀，7-百亿补贴，31-品牌黑标，10564-精选爆品-官方直推爆款，
                            // 10584-精选爆品-团长推荐，24-品牌高佣，20-行业精选，21-金牌商家，10044-潜力爆品，10475-爆品上新，其他的值请忽略

    private $block_cats; // 自定义屏蔽一级/二级/三级类目ID，自定义数量不超过20个;使用pdd.goods.cats.get接口获取cat_id

    private $block_cat_packages; // 屏蔽商品类目包：1-拼多多小程序屏蔽的类目&关键词;2-虚拟类目;3-医疗器械;4-处方药;5-非处方药

    private $cat_id;    // 商品类目ID，使用pdd.goods.cats.get接口获取

    private $custom_parameters;// 自定义参数

    private $goods_id_list;// 商品ID列表。例如：[123456,123]，当入参带有goods_id_list字段，将不会以opt_id、 cat_id、keyword维度筛选商品

    private $goods_sign_list; // goodsSign列表，支持通过goodsSign查询商品

    private $is_brand_goods; // 是否为品牌商品

    private $keyword;   // 商品关键词，与opt_id字段选填一个或全部填写

    private $list_id; // 翻页时建议填写前页返回的list_id值

    private $merchant_type; // 店铺类型，1-个人，2-企业，3-旗舰店，4-专卖店，5-专营店，6-普通店（未传为全部）

    private $merchant_type_list; // 店铺类型数组

    private $opt_id; // 商品标签类目ID，使用pdd.goods.opt.get获取

    private $page; // 默认值1，商品分页数

    private $page_size; // 默认100，每页商品数量

    private $pid; // 推广位id

    private $range_list; // 筛选范围列表 样例：[{"range_id":0,"range_from":1,"range_to":1500},{"range_id":1,"range_from":1,"range_to":1500}]
                         // range_id枚举及描述： 0，最小成团价 1，券后价 2，佣金比例 3，优惠券价格 4，广告创建时间 5，销量 6，佣金金额
                         // 7，店铺描述分 8，店铺物流分 9，店铺服务分 10， 店铺描述分击败同行业百分比 11， 店铺物流分击败同行业百分比
                         // 12，店铺服务分击败同行业百分比 13，商品分 17 ，优惠券/最小团购价 18，过去两小时pv 19，过去两小时销量

    private $sort_type; // 排序方式:0-综合排序;1-按佣金比率升序;2-按佣金比例降序;3-按价格升序;4-按价格降序;5-按销量升序;
                        // 6-按销量降序;7-优惠券金额排序升序;8-优惠券金额排序降序;9-券后价升序排序;10-券后价降序排序;
                        // 11-按照加入多多进宝时间升序;12-按照加入多多进宝时间降序;13-按佣金金额升序排序;14-按佣金金额降序排序;
                        // 15-店铺描述评分升序;16-店铺描述评分降序;17-店铺物流评分升序;18-店铺物流评分降序;19-店铺服务评分升序;
                        // 20-店铺服务评分降序;27-描述评分击败同类店铺百分比升序，28-描述评分击败同类店铺百分比降序，
                        // 29-物流评分击败同类店铺百分比升序，30-物流评分击败同类店铺百分比降序，31-服务评分击败同类店铺百分比升序，
                        // 32-服务评分击败同类店铺百分比降序

    private $with_coupon; // 是否只返回优惠券的商品，false返回所有商品，true只返回有优惠券的商品

    private $apiParams = [];


    public function setActivityTags(array $val)
    {
        $this->activity_tags = json_encode($val);
        $this->apiParams['activity_tags'] = json_encode($val);
    }

    public function setBlockCats(array $val)
    {
        $this->block_cats = json_encode($val);
        $this->apiParams['block_cats'] = json_encode($val);
    }

    public function setBlockCatPackages(array $val)
    {
        $this->block_cat_packages = json_encode($val);
        $this->apiParams['block_cat_packages'] = json_encode($val);
    }

    public function setCatId($val)
    {
        $this->cat_id = (int)$val;
        $this->apiParams['cat_id'] = (int)$val;
    }

    public function setCustomParameters($val)
    {
        $this->custom_parameters = (string)$val;
        $this->apiParams['custom_parameters'] = (string)$val;
    }

    public function setGoodsIdList(array $val)
    {
        $this->goods_id_list = json_encode($val);
        $this->apiParams['goods_id_list'] = json_encode($val);
    }

    public function setGoodsSignList(array $val)
    {
        $this->goods_sign_list = json_encode($val);
        $this->apiParams['goods_sign_list'] = json_encode($val);
    }

    public function setIsBrandGoods($val)
    {
        $this->is_brand_goods = (bool)$val;
        $this->apiParams['is_brand_goods'] = (bool)$val;
    }

    public function setKeyword($val)
    {
        $this->keyword = (string)$val;
        $this->apiParams['keyword'] = (string)$val;
    }

    public function setListId($val)
    {
        $this->list_id = (string)$val;
        $this->apiParams['list_id'] = (string)$val;
    }

    public function setMerchantType($val)
    {
        $this->merchant_type = (int)$val;
        $this->apiParams['merchant_type'] = (int)$val;
    }

    public function setMerchantTypeList(array $val)
    {
        $this->merchant_type_list = json_encode($val);
        $this->apiParams['merchant_type_list'] = json_encode($val);
    }

    public function setOptId($val)
    {
        $this->opt_id = (int)$val;
        $this->apiParams['opt_id'] = (int)$val;
    }

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

    public function setPid($val)
    {
        $this->pid = (string)$val;
        $this->apiParams['pid'] = (string)$val;
    }

    public function setRangeList(array $val)
    {
        $this->range_list = json_encode($val);
        $this->apiParams['range_list'] = json_encode($val);
    }

    public function setSortType($val)
    {
        $this->sort_type = (int)$val;
        $this->apiParams['sort_type'] = (int)$val;
    }

    public function setWithCoupon($val)
    {
        $this->with_coupon = (bool)$val;
        $this->apiParams['with_coupon'] = (bool)$val;
    }

    public function getApiMethodName()
    {
        return 'pdd.ddk.goods.search';
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