<?php

class ExamTableSeeder extends Seeder {

	public function run()
	{
		DB::table('exams')->delete();
		DB::table('exams')->insert($this->getData());
	}

	private function getData()
	{
		$result = array();
		$list = DatabaseSeeder::scandir(base_path() . "/data/exams");
		foreach ($list as $element) {
			if (preg_match("/.*\.php/", $element))
				array_push($result, $this->importData($element));
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
		if (array_key_exists('last_version', $data))
			$result['last_version'] = $data['last_version'];
		else
			$result['last_version'] = '';
		if (array_key_exists('introduction', $data))
			$result['introduction'] = $data['introduction'];
		else
			$result['introduction'] = '';
		if (array_key_exists('retired', $data))
			$result['retired'] = $data['retired'];
		else
			$result['retired'] = '';
/*	'certification_requirements' => array(),*/
		return $result;
	}

}