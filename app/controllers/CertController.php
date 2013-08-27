<?php

class CertController extends BaseController {

	protected $layout = 'layouts.master';

	public function showProviders()
	{
		$p = Provider::get()->sortBy(function($e){return $e->name;});
		$this->layout->content = View::make('providers', array('providers' => $p));
	}

	public function showProvider($provider)
	{
		$p = Provider::where('slug', $provider)->firstOrFail();
		$data['name'] = $p->name;
		$data['description'] = TextController::stringToHtml($p->description);
		$data['certifications'] = $p->certifications->sortBy(function($e){return $e->name;});
		$data['slug'] = $p->slug;
		$data['exams'] = $p->exams->sortBy(function($e){return $e->name;});
		$this->layout->content = View::make('certifications.provider', $data);
	}

	public function showCertifications()
	{
		$c = Certification::get()->sortBy(function($e){return $e->name;});
		$this->layout->content = View::make('certifications', array('certifications' => $c));
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
		$data['requiredCertifications'] = $c->requiredCertifications;
		$this->layout->content = View::make('certifications.certification', $data);
	}

	public function showExams()
	{
		$e = Exam::get()->sortBy(function($e){return $e->name;});
		$this->layout->content = View::make('exams', array('exams' => $e));
	}

	public function showExam($provider, $exam)
	{
		$p = Provider::where('slug', $provider)->firstOrFail();
		$e = Exam::where('slug', $exam)->where('provider_id', $p->id)->firstOrFail();
		$data['name'] = $e->name;
		$data['description'] = TextController::stringToHtml($e->description);
		$data['slug'] = $p->slug;
		$data['certifications'] = $e->certifications->sortBy(function($e){return $e->name;});
		$data['languages'] = $e->languages;
		$this->layout->content = View::make('certifications.exam', $data);
	}

}