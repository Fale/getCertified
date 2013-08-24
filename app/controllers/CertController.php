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

	public function showCertification($provider, $certification)
	{
		$p = Provider::where('slug', $provider)->firstOrFail();
		$c = Certification::where('slug', $certification)->where('provider_id', $p->id)->firstOrFail();
		$page = "#" . $c->name . "#\n";
		$page.= $c->description . "\n";
		$page.= "## Exams list ##\n";
		foreach ($c->exams as $exam) {
			$page.= "* [" . $exam->name . "](/" . $p->slug . "/e/" . $exam->slug . ")\n";
		}
		return TextController::stringToHtml($page);
	}

	public function showExam($provider, $exam)
	{
		$p = Provider::where('slug', $provider)->firstOrFail();
		$e = Exam::where('slug', $exam)->where('provider_id', $p->id)->firstOrFail();
		$page = "#" . $e->name . "#\n";
		$page.= $e->description . "\n";
		$page.= "## Certification list ##\n";
		foreach ($e->certifications as $certification) {
			$page.= "* [" . $certification->name . "](/" . $p->slug . "/c/" . $certification->slug . ")\n";
		}
		return TextController::stringToHtml($page);
	}

}