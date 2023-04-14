<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "dse_hubspot2csv".
 *
 * Auto generated 20-01-2010 12:57
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/


$EM_CONF[$_EXTKEY] = [
	'title' => 'Scoby Analytics',
	'description' => 'Scoby Analytics PHP Client',
	'category' => 'plugin',
	'version' => '10.1.1',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearcacheonload' => 0,
	'author' => 'Panchenko Yurii',
	'author_email' => 'pr.typo3.com@gmail.com',
	'author_company' => 'datenschutzexperte.de',
	'constraints' => [
		'depends' => [
			'typo3' => '10.4.0-11.5.99',
		],
		'conflicts' => [
		],
		'suggests' => [
		],
	],
    // this overrides the whole "autoload" from composer.json, it doesn't merge! keep in sync or remove from here
    'autoload' => [
        'psr-4' => [
            'Dse\\Scoby\\' => 'Classes/'
        ]
    ],
];

