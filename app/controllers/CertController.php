<?php

class CertController extends BaseController {

	public function showProvider($name)
	{
		return $name;
	}

	private function stringToHtml($string)
	{
		$html = Markdown::defaultTransform($string);
		return SmartyPants::defaultTransform($html);
	}

}