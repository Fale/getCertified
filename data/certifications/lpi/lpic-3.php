<?php

$data = array(
	'slug' => "lpic-3",
	'name' => "LPIC-3",
	'provider' => "lpi",
	'level' => '3',
	'requirements' =>
		[
			[
				'type' => 'certification',
				'slug' => 'lpic-2',
			],
			[
				'policy' => 1,
				[
					'type' => 'exam',
					'slug' => '301',
				],
				[
					'type' => 'certification',
					'slug' => 'lpic-3-me',
				],
				[
					'type' => 'certification',
					'slug' => 'lpic-3-sec',
				],
				[
					'type' => 'certification',
					'slug' => 'lpic-3-vha',
				],

			],
		],
	'languages' => array("en"),
	'last_version' => '2012',
	'validity' => '',
	'description' => '',
	'kind' => array('multiplechoices', 'performance')
);
