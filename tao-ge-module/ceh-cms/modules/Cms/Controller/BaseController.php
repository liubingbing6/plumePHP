<?php

namespace Cms\Controller;

use Cms\Utils\QrCodeUtils;
use Plume\Core\Controller;
use Plume\Util\HttpUtils;

class BaseController extends Controller
{
	/**
	 * 获取端url
	 * @param string $longUrl 需要转短的长url
	 * @return bool|string
	 */
	protected function getShortUrl($longUrl) {
		$shortUrlApi = $this->getConfigValue('short_url_api');
		$shortUrlRet = HttpUtils::http_post($shortUrlApi, array('url' => $longUrl));
		if ($shortUrlRet['status'] && $shortUrlRet['code'] == 200) {
			$retContent = $shortUrlRet['content'];
			$retContentJson = json_decode($retContent);
			$shortUrl = $retContentJson->data->short_url;
			return $shortUrl;
		} else {
			return false;
		}
	}

	/**
	 * 获取二维码
	 * @param string $content 需要生成二维码的字符串
	 * @param string $qrCodeLocalPath 二维码存放的路径
	 * @param string $qrCodeName 唯一标识，如果该标识已经使用生成过二维码，则不会重新生成，直接返回
	 * @param string $logo 二维码log 非必须
	 * @return bool|string
	 */
	protected function getQrCode($content, $qrCodeLocalPath, $qrCodeName, $logo="") {
		$qr = new QrCodeUtils($this->plume('plume.root.path'));
		$qrCode = $qr->createQrCode($content, $qrCodeLocalPath, $qrCodeName, $logo);
		if ($qrCode) {
			$qrCode = '/qrcode/' . $qrCodeName . '.png';
			return $qrCode;
		} else {
			return false;
		}
	}
}