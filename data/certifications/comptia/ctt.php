<?php

$data = array(
	'slug' => "ctt",
	'name' => "CTT+",
	'fullname' => "CompTIA CompTIA CTT+",
	'provider' => "comptia",
	'level' => '2',
	'requirements' =>
		[
			[
				'type' => 'exam',
				'slug' => 'TK0-201',
			],
			[
				[
					'type' => 'exam',
					'slug' => 'TK0-202',
				],
				[
					'type' => 'exam',
					'slug' => 'TK0-203',
				],
				'policy' => '1',
			]
		],
	'languages' => array("en", "jp", "de", "pt", "es"),
	'last_version' => '',
	'validity' => '',
	'description' => "CompTIA Certified Technical Trainer (CTT+) certification identifies excellent and dedicated industry instructors.

	Two exams are necessary to be certified: CompTIA CTT+ Essentials, and at least one of the two designations: Classroom Trainer or Virtual Classroom Trainer. Candidates will need to supply a video or recording of their classroom or virtual classroom sessions.",
	'kind' => array('')
);
