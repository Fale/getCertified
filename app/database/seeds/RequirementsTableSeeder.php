<?php

class RequirementsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('requirements')->delete();
		DB::table('groups')->delete();
		$result = array();
		$list = DatabaseSeeder::scandir(base_path() . "/data/certifications");
		foreach ($list as $element) {
			if (preg_match("/.*\.php/", $element))
			{
				$this->importData($element);
			}
		}
	}

	private function importData($file)
	{
		require $file;
		$this->requirements($data['requirements'], $data['provider'], $data['slug']);
	}

	private function nextGroupId()
	{
		return DB::table('groups')->max('id') + 1;
	}

	private function requirements($array, $provider, $c, $group = NULL, $policy = NULL)
	{
		if (array_key_exists('type', $array))
		{
			# Object
			switch ($array['type']) {
				case 'exam':
					if(!array_key_exists('provider', $array))
						$array['provider'] = $provider;
					$providerId = DB::table('providers')->where('slug', $array['provider'])->pluck('id');
					$certificationId = DB::table('certifications')->where('slug', $c)->pluck('id');
					$e = DB::table('exams')
					         ->where('slug', $array['slug'])
					         ->where('provider_id', $providerId)
					         ->pluck('id');
					$data = array(
						'certification_id' => $certificationId,
						'requirement_type' => 'Exam',
						'requirement_id' => $e,
						'group_id' => $group,
						'policy' => $policy
					);
					DB::table('requirements')->insert($data);
					break;
				case 'certification':
					if(!array_key_exists('provider', $array))
						$array['provider'] = $provider;
					$providerId = DB::table('providers')->where('slug', $array['provider'])->pluck('id');
					$certificationId = DB::table('certifications')->where('slug', $c)->pluck('id');
					$r = DB::table('certifications')
					         ->where('slug', $array['slug'])
					         ->where('provider_id', $providerId)
					         ->pluck('id');
					$data = array(
						'certification_id' => $certificationId,
						'requirement_type' => 'Certification',
						'requirement_id' => $r,
						'group_id' => $group,
						'policy' => $policy
					);
					DB::table('requirements')->insert($data);
					break;
/**				case 'experience':              # Experience to have db
					$array['group'] = $group;
					print_r($array);
					break;	**/
				default:
					exit;
					break;
			}
		}
		else
		{
			# Array
			if (array_key_exists('policy', $array))
				$policy = $array['policy'];
			else
				$policy = 0;
			$group = $this->nextGroupId();
			DB::table('groups')->insert(array('id' => $group, 'policy' => $policy));
			foreach ($array as $a)
				if (is_array($a))
					$this->requirements($a, $provider, $c, $group, $policy);
		}
	}
}