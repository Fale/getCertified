<?php

class ProviderTableSeeder extends Seeder {

	public function run()
	{
		DB::table('providers')->delete();
		DB::table('providers')->insert($this->getData());
	}

	private function getData()
	{
		$result = array();
		$list = DatabaseSeeder::scandir(base_path() . "/data/providers");
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
		if (array_key_exists('slug', $data))
			$result['slug'] = $data['slug'];
		else
			$result['slug'] = '';
		if (array_key_exists('description', $data))
			$result['description'] = $data['description'];
		else
			$result['description'] = '';
		return $result;
	}

}