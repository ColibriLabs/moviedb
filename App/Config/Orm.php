<?php

return [
  'colibri_orm' => [
    
    'identity' => __FILE__,
    'dev_configuration' => __DIR__ . '/OrmDevelopment.php',
    'configuration_glob_pattern' => 'glob://%s/OrmExtension/*',
    
    'connection_name' => 'production',
    'connection' => [
      'production' => [
        'dsn' => 'mysql:host=localhost;dbname=moviesdb',
        'user' => 'user',
        'password' => 'password',
      ],
    ],
    
    'schema_file' => 'Schema.xml',
    'build' => [
      'build_path' => './../../Sources/Om',
      'autoload_file' => 'autoload.php',
      'metadata_file' => 'metadata.php',
    ],
  ],
  
  'extensions' => [
    
    \ColibriLabs\Lib\Orm\MovieCompleter::class => [],
    \ColibriLabs\Lib\Orm\PictureCompleter::class => [],
    
    'sluggable' => [],
    'timestampable' => [
      \ColibriLabs\Database\Om\Movie::class => [
        'created' => ['on' => ['create']],
        'updated' => ['on' => ['update', 'create']]
      ],
      \ColibriLabs\Database\Om\Character::class => [
        'created' => ['on' => ['create']],
        'updated' => ['on' => ['update', 'create']]
      ],
      \ColibriLabs\Database\Om\Profile::class => [
        'created' => ['on' => ['create']],
        'updated' => ['on' => ['update', 'create']]
      ],
      \ColibriLabs\Database\Om\Genre::class => [
        'created' => ['on' => ['create']],
        'updated' => ['on' => ['update', 'create']]
      ],
      \ColibriLabs\Database\Om\Language::class => [
        'created' => ['on' => ['create']],
        'updated' => ['on' => ['update', 'create']],
      ],
      \ColibriLabs\Database\Om\Collection::class => [
        'created' => ['on' => ['create']],
        'updated' => ['on' => ['update', 'create']],
      ],
      \ColibriLabs\Database\Om\Crew::class => [
        'created' => ['on' => ['create']],
        'updated' => ['on' => ['update', 'create']],
      ],
      \ColibriLabs\Database\Om\Country::class => [
        'created' => ['on' => ['create']],
        'updated' => ['on' => ['update', 'create']],
      ],
      \ColibriLabs\Database\Om\Company::class => [
        'created' => ['on' => ['create']],
        'updated' => ['on' => ['update', 'create']],
      ]
    ],
    'versionable' => [
      \ColibriLabs\Database\Om\Movie::class => [
        'properties' => ['version']
      ],
      \ColibriLabs\Database\Om\Character::class => [
        'properties' => ['version']
      ],
      \ColibriLabs\Database\Om\Profile::class => [
        'properties' => ['version']
      ],
      \ColibriLabs\Database\Om\Genre::class => [
        'properties' => ['version']
      ],
      \ColibriLabs\Database\Om\Language::class => [
        'properties' => ['version']
      ],
      \ColibriLabs\Database\Om\Collection::class => [
        'properties' => ['version']
      ],
      \ColibriLabs\Database\Om\Crew::class => [
        'properties' => ['version']
      ],
      \ColibriLabs\Database\Om\Country::class => [
        'properties' => ['version']
      ],
      \ColibriLabs\Database\Om\Company::class => [
        'properties' => ['version']
      ]
    ]
  ]
  
];
