<?php

class CertController extends BaseController {

	public function showProvider($provider)
	{
		$p = Provider::where('slug', $provider)->firstOrFail();
		$page = "#" . $p->name . "#\n";
		$page.= $p->description . "\n";
		$page.= "## Certification list ##\n";
		foreach ($p->certifications as $certification) {
			$page.= "* [" . $certification->name . "](" . $p->slug . "/" . $certification->slug . ")\n";
		}
		return TextController::stringToHtml($page);
	}

	public function showCertification($p, $c)
	{
		return TextController::fileToHtml( base_path() . "/data/" . $p . "/" . $c . ".md");
	}

	public function getCertificationList($provider)
	{
		
	}
}