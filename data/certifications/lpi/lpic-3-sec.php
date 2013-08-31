<?php

$data = array(
	'slug' => "lpic-3-sec",
	'name' => "LPIC-3: Security",
	'provider' => "lpi",
	'level' => '3',
	'requirements' =>
		[
			[
				'type' => 'certification',
				'slug' => 'lpic-2',
			],
			[
				'type' => 'exam',
				'slug' => '303',
			],
		],
	'languages' => array("en"),
	'last_version' => '2012',
	'validity' => '',
	'description' => '',
	'kind' => array('multiplechoices', 'performance')
);
