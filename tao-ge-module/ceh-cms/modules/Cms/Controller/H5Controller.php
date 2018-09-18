<?php

namespace Cms\Controller;


class H5Controller extends BaseController
{
	public function indexAction() {
		return $this->result(array())->response();
		$this->api();
		$longUrl = $this->getParamValue('long');
		$shortUrl = $this->getShortUrl($longUrl);
		$qrcode = $this->getQrCode($shortUrl, $_SERVER['DOCUMENT_ROOT'] . '/qrcode', 'test');
		return $this->result(array('short'=>$shortUrl, 'qrcode'=>$qrcode))->json()->response();
	}

	public function mobileAction() {
		return $this->result(array())->response();
	}
}