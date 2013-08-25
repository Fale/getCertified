<?php

class CertController extends BaseController {

	protected $layout = 'layouts.master';

	public function showProvider($provider)
	{
		$p = Provider::where('slug', $provider)->firstOrFail();
		$data['name'] = $p->name;
		$data['description'] = TextController::stringToHtml($p->description);
		$data['certifications'] = $p->certifications;
		$data['slug'] = $p->slug;
		$data['exams'] = $p->exams;
		$this->layout->content = View::make('certifications.provider', $data);
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
		$page.= "## Languages ##\n";
		foreach ($c->languages as $language) {
			$page.= "* " . $language->name . "\n";
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
		$page.= "## Languages ##\n";
		foreach ($e->languages as $language) {
			$page.= "* " . $language->name . "\n";
		}
		return TextController::stringToHtml($page);
	}

}