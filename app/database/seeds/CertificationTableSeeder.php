<?php

class CertificationTableSeeder extends Seeder {

	public function run()
	{
		DB::table('certifications')->delete();
		$list = DatabaseSeeder::scandir(base_path() . "/data/certifications");
		foreach ($list as $element)
			if (preg_match("/.*\.php/", $element))
				DB::table('certifications')->insertGetId($this->importData($element));
	}

	private function importData($file)
	{
		require $file;
		$result = array();
		if (array_key_exists('name', $data))
			$result['name'] = $data['name'];
		else
			$result['name'] = '';
		if (array_key_exists('fullname', $data))
			$result['fullname'] = $data['fullname'];
		elseif (array_key_exists('name', $data))
				$result['fullname'] = $data['name'];
			else
				$result['fullname'] = '';
		if (array_key_exists('slug', $data))
			$result['slug'] = $data['slug'];
		else
			$result['slug'] = '';
		if (array_key_exists('description', $data))
			$result['description'] = $data['description'];
		else
			$result['description'] = '';
		if (array_key_exists('provider', $data))
			$result['provider_id'] = DB::table('providers')->where('slug', $data['provider'])->pluck('id');
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
	'kind' => array('multiplechoices', 'performance')
*/
		return $result;
	}
}