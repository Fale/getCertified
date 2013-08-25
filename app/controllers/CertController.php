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
		$data['name'] = $c->name;
		$data['description'] = TextController::stringToHtml($c->description);
		$data['slug'] = $p->slug;
		$data['exams'] = $c->exams;
		$data['languages'] = $c->languages;
		$this->layout->content = View::make('certifications.certification', $data);
	}

	public function showExam($provider, $exam)
	{
		$p = Provider::where('slug', $provider)->firstOrFail();
		$e = Exam::where('slug', $exam)->where('provider_id', $p->id)->firstOrFail();
		$data['name'] = $e->name;
		$data['description'] = TextController::stringToHtml($e->description);
		$data['slug'] = $p->slug;
		$data['certifications'] = $e->certifications;
		$data['languages'] = $e->languages;
		$this->layout->content = View::make('certifications.exam', $data);
	}

}