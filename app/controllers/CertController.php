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
		$this->provider($p);
	}

	public function showProviderById($id)
	{
		$p = Provider::find($id);
		$this->provider($p);
	}

	public function provider($p)
	{
		$data['name'] = $p->name;
		$data['description'] = TextController::stringToHtml($p->description);
		$data['certifications'] = $p->certifications->sortBy(function($e){return $e->name;});
		$data['slug'] = $p->slug;
		$data['exams'] = $p->exams->sortBy(function($e){return $e->name;});
		$this->layout->content = View::make('certifications.provider', $data);
	}

	public function showCertifications()
	{
		$c = Certification::get()->sortBy(function($e){return $e->fullname;});
		$this->layout->content = View::make('certifications', array('certifications' => $c));
	}

	public function showCertification($provider, $certification)
	{
		$p = Provider::where('slug', $provider)->firstOrFail();
		$c = Certification::where('slug', $certification)->where('provider_id', $p->id)->firstOrFail();
		$this->Certification($c);
	}

	public function showCertificationById($id)
	{
		$c = Certification::find($id);
		$this->Certification($c);
	}

	public function certification($c)
	{
		$data['name'] = $c->name;
		$data['description'] = TextController::stringToHtml($c->description);
		$data['slug'] = $c->provider->slug;
		$data['exams'] = $c->exams;
		$data['languages'] = $c->languages;
		$data['requiredCertifications'] = TextController::stringToHtml($this->dependencyToMd($c->id));
		$data['requiredByCertifications'] = TextController::stringToHtml($this->requiredByToMd($c->id));
		$this->layout->content = View::make('certifications.certification', $data);
	}

	public function showExams()
	{
		$e = Exam::get()->sortBy(function($e){return $e->fullname;});
		$this->layout->content = View::make('exams', array('exams' => $e));
	}

	public function showExam($provider, $exam)
	{
		$p = Provider::where('slug', $provider)->firstOrFail();
		$e = Exam::where('slug', $exam)->where('provider_id', $p->id)->firstOrFail();
		$this->exam($e);
	}

	public function showExamById($id)
	{
		$e = Exam::find($id);
		$this->exam($e);
	}

	public function exam($e)
	{
		$data['name'] = $e->name;
		$data['description'] = TextController::stringToHtml($e->description);
		$data['slug'] = $e->provider->slug;
		$data['certifications'] = $e->certifications->sortBy(function($e){return $e->name;});
		$data['languages'] = $e->languages;
		$data['introduction'] = $e->introduction;
		$data['retired'] = $e->retired;
		$this->layout->content = View::make('certifications.exam', $data);
	}

	private function dependencyToMd($certificationId, $i = 0, $urls = 1)
	{
		$o = "";
		$c = Certification::find($certificationId);
		foreach ($c->requiredCertifications as $rc) {
			if ($urls)
				$o .= str_repeat(" ", 4 * $i) . "* [" . $rc->name . "](/" . $rc->provider->slug ."/c/" .  $rc->slug . ")\n";
			else
				$o .= str_repeat(" ", 4 * $i) . "* " . $rc->name . "\n";
			if (count($rc->requiredCertifications))
				$o .= $this->dependencyToMd($rc->id, $i + 1, $urls);
		}
		return $o;
	}

	private function requiredByToMd($certificationId, $i = 0, $urls = 1)
	{
		$o = "";
		$c = Certification::find($certificationId);
		foreach ($c->requiredByCertifications as $rc) {
			if ($urls)
				$o .= str_repeat(" ", 4 * $i) . "* [" . $rc->name . "](/" . $rc->provider->slug ."/c/" .  $rc->slug . ")\n";
			else
				$o .= str_repeat(" ", 4 * $i) . "* " . $rc->name . "\n";
			if (count($rc->requiredByCertifications))
				$o .= $this->requiredByToMd($rc->id, $i + 1, $urls);
		}
		return $o;
	}
}