<?php
namespace LuBan\Pop;

use LuBan\Pop\Interfaces\Request;
use LuBan\Pop\Libs\Format;

class Client
{

    /**
     * 接口地址
     *
     * @var string
     */
    public $gateway = 'https://gw-api.pinduoduo.com/api/router';

    /**
     * AppKey
     *
     * @var string
     */
    public $appKey;

    /**
     * AppSecret
     *
     * @var string
     */
    public $appSecret;

    /**
     * API协议版本号，默认为V1，可不填
     */
    public $version = 'V1';

    /**
     * 数据类型
     *
     * @var string
     */
    public $format = 'JSON';

    /**
     * 超时时间
     *
     * @var int
     */
    public $timeout = 3;


    public function __construct($appKey='', $appSecret='')
    {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
    }

    /**
     * 执行
     *
     * @param Request $request
     * @param string $accessToken
     * @return mixed
     */
    public function execute(Request $request, $accessToken='')
    {
        $sysParams = [
            'type'      => $request->getApiMethodName(),
            'client_id' => $this->appKey,
            'timestamp' => (string)time(),
            'data_type' => $this->format,
            'version'   => $this->version,
        ];
        if ($accessToken)
            $sysParams['access_token'] = $accessToken;
        $params = array_merge($sysParams, $request->getApiParas());
        $params['sign'] = $this->signature($params);
        $result = $this->post($this->gateway, $params);

        return strtolower($this->format)=='json' ? Format::deJSON($result) : Format::deSimpleXML($result);
    }

    /**
     * Post 请求
     *
     * @param string $url // 请求地址
     * @param array $data // 数据
     * @param array $headers // 请求头
     * @param string $dataType // 数据格式
     * @return mixed
     */
    private function post($url, $data, $headers=[], $dataType='')
    {
        try{
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FAILONERROR, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            if ($headers)
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


            // 数据格式
            if ($dataType=='json') {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            } else {
                if (is_array($data) && 0 < count($data)) {
                    $postBodyString = '';
                    foreach ($data as $k => $v) {
                        $postBodyString .= $k.'=' . urlencode($v) . '&';
                    }
                    unset($k, $v);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString,0,-1));
                }
            }

            $resp = curl_exec($ch);

            if (curl_errno($ch))
                throw new \Exception(curl_error($ch),0);

            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode)
                throw new \Exception($resp, $httpStatusCode);
            curl_close($ch);

            return $resp;
        }catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Get请求
     *
     * @param string $url // 请求地址
     * @param array $query // 参数
     * @return mixed
     */
    private function get($url, $query)
    {
        try{
            if ($query)
                $url = $url . '?' . http_build_query($query);

            $ch = curl_init();
            //设置选项，包括URL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//绕过ssl验证
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            //执行并获取HTML文档内容
            $resp = curl_exec($ch);

            if (curl_errno($ch))
                throw new \Exception(curl_error($ch),0);

            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode)
                throw new \Exception($resp, $httpStatusCode);

            //释放curl句柄
            curl_close($ch);

            return $resp;
        }catch (\Exception $e) {
            return null;
        }
    }

    /**
     * 生成签名
     *
     * @param array $data // 数据
     * @return string
     */
    private function signature($data)
    {
        ksort($data);
        $stringToBeSigned = $this->appSecret;
        foreach ($data as $k => $v)
        {
            if ("@" != substr($v, 0, 1)) {
                $stringToBeSigned .= "$k$v";
            }
        }
        unset($k, $v);
        $stringToBeSigned .= $this->appSecret;

        return strtoupper(md5($stringToBeSigned));
    }

}
