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

		//		$o = "";
		//$c = Certification::find($certificationId);
	    
	    //$d = $this->buildtree($c->requiredCertifications);

		$data['requirements'] = $this->requirementsToHtml($c->id);

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




	private function requirementsToHtml($id)
	{
		$out = $this->reqHtml($this->requirementsToArray($id));
		return substr($out, 8, -12); //Work around to remove the outer <ul><li>
	}

	private function requirementsToArray($id)
	{
		$groups = Group::where('certification_id', $id)->get();
		return $this->reqArray($groups);
	}

	private function reqArray($src_arr, $parent_id = 0, $tree = array())
	{
	    foreach($src_arr as $idx => $row)
	    {
	        if($row['parent_id'] == $parent_id)
	        {
	        	$array = array();
	            $certs = DB::table('certification_certification_requirement')->where('group_id', $row->id)->get();
	            $exams = DB::table('certification_exam')->where('group_id', $row->id)->get();
	            $array['policy'] = $row->policy;
	            foreach($certs as $cert)
	            {
	            	$element = array();
	                $element['type'] = 'certification';
	                $element['id'] = $cert->required_id;
	                $array[] = $element;
	            }
	            foreach($exams as $exam)
	            {
	            	$element = array();
	                $element['type'] = 'exam';
	                $element['id'] = $exam->exam_id;
	                $array[] = $element;
	            }
	            unset($src_arr[$idx]);
	            $tree[] = array_merge($array, $this->reqArray($src_arr, $row['id']));
	        }
	    }
	    return $tree;
	}

	private function reqHtml($array, $indent = NULL) {
	    $out = "<ul>";
	    foreach($array as $elem){
	    	if (is_array($elem))
	        	if (array_key_exists('0', $elem))
	        	{
	       			$out.= "<li>";
	        		if ($indent)
	        			if ($elem['policy'] == 0)
	        				$out.= "All the following:";
	        			else
	        				$out.= "At least " . $elem['policy'] . " of the following:";
	        		$out.= $this->reqHtml($elem, $indent + 1);
        			$out.= "</li>\n";
	        	}
		        else
		        {
		        	//print_r($e);
		        	$out.= "<li>";
		        	switch ($elem['type']) {
		        		case 'certification':
		        			$e = Certification::find($elem['id']);
			        		$out.= "Have the <a href=/" . $e->provider->slug . "/c/" . $e->slug . ">" . $e->name . "</a> certification";
		        			break;
		        		case 'exam':
		        			$e = Exam::find($elem['id']);
		        			$out.= "Pass the <a href=/" . $e->provider->slug . "/e/" . $e->slug . ">" . $e->name . "</a> exam";
		        			break;
		        		case 'experience':
		        			# code...
		        			break;    		
		        		default:
		        			App::abort(500, "Something went very wrong");
		        			break;
		        	}
		        	$out.= "</li>\n";
		        }
	        	
	    }
	    $out.= "</ul>\n";
	    return $out; 
	}

	private function array2ul($array) {
	    $out = "<ul>";
	    foreach($array as $key => $elem){
	        if(!is_array($elem)){
	                $out.= "<li><span>$key:[$elem]</span></li>";
	        }
	        else $out.= "<li><span>$key</span>" . $this->array2ul($elem) . "</li>";
	    }
	    $out.= "</ul>";
	    return $out; 
	}
}