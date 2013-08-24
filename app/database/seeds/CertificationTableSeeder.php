<?php

class CertificationTableSeeder extends Seeder {

	public function run()
	{
		DB::table('certifications')->delete();
		DB::table('certifications')->insert($this->getData());
	}

	private function getData()
	{
		$result = array();
		$list = scandir(base_path() . "/data/certifications");
		foreach ($list as $element) {
			if (preg_match("/.*\.php/", $element))
				array_push($result, $this->importData(base_path() . "/data/certifications/" . $element));
		}
		return $result;
	}

	private function importData($file)
	{
		require $file;
		$result = array();
		if (array_key_exists('name', $data))
			$result['name'] = $data['name'];
		else
			$result['name'] = '';
		if (array_key_exists('slug', $data))
			$result['slug'] = $data['slug'];
		else
			$result['slug'] = '';
		if (array_key_exists('description', $data))
			$result['description'] = $data['description'];
		else
			$result['description'] = '';
		if (array_key_exists('provider', $data))
			$result['provider'] = $data['provider'];
		else
			$result['provider'] = '';
		if (array_key_exists('level', $data))
			$result['level'] = $data['level'];
		else
			$result['level'] = '';
		if (array_key_exists('last_version', $data))
			$result['last_version'] = $data['last_version'];
		else
			$result['last_version'] = '';
		if (array_key_exists('validity', $data))
			$result['validity'] = $data['validity'];
		else
			$result['validity'] = '';
/*	'requirements' => array(),
	'certification_requirements' => array(),
	'exams' => array("220-801", "220-802"),
	'languages' => array("English"),
	'kind' => array('multiplechoices', 'performance')
*/
		return $result;
	}

}