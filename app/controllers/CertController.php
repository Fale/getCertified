<?php

class CertController extends BaseController {

	public function showProvider($p)
	{
		return TextController::fileToHtml( base_path() . "/data/" . $p . ".md");
	}

	public function showCertification($p, $c)
	{
		return TextController::fileToHtml( base_path() . "/data/" . $p . "/" . $c . ".md");
	}

	public function getCertificationList($provider)
	{
		
	}
}