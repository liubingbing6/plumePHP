<?php
/**
 * 利用phpqrcode生成二维码的工具类
 */

namespace Cms\Utils;

class QrCodeUtils
{
	private $basePath;

	/**
	 * QrCodeUtils constructor.
	 * @param $basePath
	 */
	public function __construct($basePath)
	{
		$this->basePath = $basePath;
	}

	/**
	 * 创建二维码
	 * @param $content
	 * @param $qrCodeLocalPath
	 * @param $qrCodeName
	 * @param string $logo
	 * @return bool|string
	 */
    public function createQrCode($content, $qrCodeLocalPath, $qrCodeName, $logo="") {
        $qrInfo = self::getQr($content, $qrCodeLocalPath, $qrCodeName, $logo);
        return $qrInfo;
    }


    /**
     * 生成二维码
     * @param string $value 需要生成二维码的字符串
     * @param string $qrCodeLocalPath 二维码存放的路径
     * @param string $qrCodeName 唯一标识，如果该标识已经使用生成过二维码，则不会重新生成，直接返回
     * @param bool|string $log 二维码log 非必须
     * @return bool|string
     * @throws \Exception
     */
    public function getQr($value, $qrCodeLocalPath, $qrCodeName, $log = false) {
        if (!isset($value) || trim($value) == "" ||
            !isset($qrCodeName) || trim($qrCodeName) == "")
        {
            return false;
        }
        $qrCodeLocalPath = rtrim($qrCodeLocalPath, "/");
        $reqImg = $qrCodeLocalPath . "/" . trim($qrCodeName) . ".png";
        if(file_exists($reqImg)) {
            return $reqImg;
        }
        if (!file_exists($qrCodeLocalPath)){
            mkdir($qrCodeLocalPath, 0777, true);
        }
        $errorCorrectionLevel = "H";
        $matrixPointSize = "6";
        $logo = trim($log) ? trim($log) : false;
        $value = trim($value);
        try {
	        include($this->basePath . "/vendor/phpqrcode/phpqrcode.php");
            \QRcode::png($value, $reqImg, $errorCorrectionLevel, $matrixPointSize);//生成二维码图片
            if ($logo !== false)
            {
                $QR_stream = imagecreatefromstring(file_get_contents($reqImg));
                if (self::isUrl($logo)) {
                    $logo = imagecreatefromstring(self::http($logo));
                } else {
                    $logo = imagecreatefromstring(file_get_contents($logo));
                }
                $QR_width = imagesx($QR_stream);
                $QR_height = imagesy($QR_stream);
                $logo_width = imagesx($logo);
                $logo_height = imagesy($logo);
                $logo_qr_width = $QR_width / 5;
                $scale = $logo_width / $logo_qr_width;
                $logo_qr_height = $logo_height / $scale;
                $from_width = ($QR_width - $logo_qr_width) / 2;
                imagecopyresampled($QR_stream, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
                ImagePng($QR_stream, $reqImg);
            }
            return $reqImg;
        } catch (\Exception $e){
            throw $e;
        }
    }

    /**
     * curl请求
     * @param $url
     * @return mixed
     */
    private static function http($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    /**
     * 判断是否是url
     * @param $url
     * @return bool
     */
    private static function isUrl($url) {
        $allow = array('http', 'https');
        if (preg_match('!^(([^:/?#]+):)?(//([^/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?!', $url, $matches)){
            $scheme = $matches[2];
            if (in_array($scheme, $allow)){
                return true;
            }
        }
        return false;
    }
}