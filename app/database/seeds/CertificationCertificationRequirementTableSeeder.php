<?php

class CertificationCertificationRequirementTableSeeder extends Seeder {

	public function run()
	{
		DB::table('certification_certification_requirement')->delete();
		DB::table('certification_certification_requirement')->insert($this->getData());
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
		if (array_key_exists('certification_requirements', $data))
			$requirements = DB::table('certifications')
					            ->whereIn('slug', $data['certification_requirements'])
					            ->where('provider_id', $providerId)
						        ->lists('id');
		else
			$requirements = array();
		foreach ($requirements as $requirement) {
			array_push($results, array('certification_id' => $certId, 'required_id' => $requirement));
		}
		return $results;
	}

}