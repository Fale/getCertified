<?php

class CertificationLanguageTableSeeder extends Seeder {

	public function run()
	{
		DB::table('certification_language')->delete();
		DB::table('certification_language')->insert($this->getData());
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
		if (array_key_exists('languages', $data))
			$langs = DB::table('languages')
					     ->whereIn('iso_639-1', $data['languages'])
						 ->lists('id');
		else
			$langs = array();
		foreach ($langs as $lang) {
			array_push($results, array('certification_id' => $certId, 'language_id' => $lang));
		}
		return $results;
	}

}