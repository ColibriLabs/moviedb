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
    'sluggable' => [],
    'timestampable' => [
      \ColibriLabs\Database\Om\Movie::class => [
        'created' => ['on' => ['create']],
        'updated' => ['on' => ['update', 'create']]
      ]
    ],
    'versionable' => [
      \ColibriLabs\Database\Om\Movie::class => [
        'properties' => ['version']
      ]
    ]
  ]
  
];
