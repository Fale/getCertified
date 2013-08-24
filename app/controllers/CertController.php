<?php

class CertController extends BaseController {

	public function showProvider($provider)
	{
		$p = Provider::where('slug', $provider)->firstOrFail();
		$page = "#" . $p->name . "#\n";
		$page.= $p->description . "\n";
		$page.= "## Certification list ##\n";
		foreach ($p->certifications as $certification) {
			$page.= "* [" . $certification->name . "](" . $p->slug . "/c/" . $certification->slug . ")\n";
		}
		$page.= "## Exams list ##\n";
		foreach ($p->exams as $exam) {
			$page.= "* [" . $exam->name . "](" . $p->slug . "/e/" . $exam->slug . ")\n";
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