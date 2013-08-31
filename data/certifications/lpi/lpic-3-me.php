<?php

$data = array(
	'slug' => "lpic-3-me",
	'name' => "LPIC-3: Mixed Environment",
	'provider' => "lpi",
	'level' => "",
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
					'slug' => '300',
				],
				[ #Old option (301 and 302)
					[
						'type' => 'exam',
						'slug' => '301',
					],
					[
						'type' => 'exam',
						'slug' => '302',
					],
				],
			],
		],
	'languages' => array("en"),
	'last_version' => '2012',
	'validity' => '',
	'description' => '',
	'kind' => array('multiplechoices', 'performance')
);
