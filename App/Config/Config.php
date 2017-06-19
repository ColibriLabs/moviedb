<?php

return [
  
  'root' => realpath(__DIR__ . '/../..'),
  
  'tmdb_root' => '{application.resources}/tmdb',
  'root_images' => '{application.resources}/Pictures',
  'urn_images' => '//images.dezz.pro/',
  
  'application' => [
    
    'dev-config' => __DIR__ . '/ConfigDevelopment.php',
    
    'root' => '{root}/App',
    'sources' => '{root}/Sources',
    'resources' => '{root}/Resources',

    'static_path' => '/Resources/web/',
    'shared_path' => '/shared/',
    
    'base_path' => '/',
    'autoload' => [
      'ColibriLabs\\Controller' => '{application.root}/Controller',
      'ColibriLabs\\Database\\Om' => '{application.sources}/Om',
      'ColibriLabs\\Lib' => '{application.sources}/Lib',
    ],
    'controller' => [
      'root' => '{application.root}/Controller',
      'namespace' => 'ColibriLabs\\Controller',
    ],
    'view' => [
      'root_directory' => '{application.root}/View',
    ],
    'debug' => ['exceptions' => 1, 'php_errors' => 1,],
  ],
  'server' => [
    'timezone' => 'Europe/Kiev',
    'displayErrors' => 'Off',
    'errorLevel' => ~E_ALL,
  ],
];
