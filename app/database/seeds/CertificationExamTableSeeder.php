<?php

class CertificationExamTableSeeder extends Seeder {

	public function run()
	{
		DB::table('certification_exam')->delete();
		DB::table('certification_exam')->insert($this->getData());
	}

	private function getData()
	{
		$result = array();
		$list = DatabaseSeeder::scandir(base_path() . "/data/certifications");
		foreach ($list as $element) {
			if (preg_match("/.*\.php/", $element))
				$result = array_merge($result, $this->importData($element));
		}
		return $result;
	}

	private function importData($file)
	{
		require $file;
		$results = array();
		$certId = DB::table('certifications')->where('slug', $data['slug'])->pluck('id');
		$providerId = DB::table('certifications')->where('slug', $data['slug'])->pluck('provider_id');
		if (array_key_exists('exams', $data))
			$exams = DB::table('exams')
					     ->whereIn('slug', $data['exams'])
					     ->where('provider_id', $providerId)
						 ->lists('id');
		else
			$exams = array();
		foreach ($exams as $exam) {
			array_push($results, array('certification_id' => $certId, 'exam_id' => $exam));
		}
		return $results;
	}

}