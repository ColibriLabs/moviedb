<?php

return array (
  'entityClass' => 'ColibriLabs\\Database\\Om\\MovieLanguage',
  'entityRepositoryClass' => 'ColibriLabs\\Database\\Om\\MovieLanguageRepository',
  'tableName' => 'movie_language',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'movie_language.id',
    'movie_id' => 'movie_language.movie_id',
    'language_id' => 'movie_language.language_id',
  ),
  'names' => 
  array (
    'id' => 'id',
    'movie_id' => 'movie_id',
    'language_id' => 'language_id',
  ),
  'relations' => 
  array (
  ),
  'enumerations' => 
  array (
  ),
  'default' => 
  array (
  ),
  'nullables' => 
  array (
  ),
  'unsigned' => 
  array (
    'id' => 'id',
    'movie_id' => 'movie_id',
    'language_id' => 'language_id',
  ),
  'primary' => 
  array (
    'id' => 'id',
  ),
  'instances' => 
  array (
    'id' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'id',
       'name' => 'id',
       'type' => 
      Colibri\Schema\Types\IntegerType::__set_state(array(
         'length' => 11,
         'precision' => 0,
         'extra' => NULL,
      )),
       'default' => NULL,
       'unsigned' => true,
       'nullable' => false,
       'autoIncrement' => true,
       'primaryKey' => true,
       'identity' => false,
    )),
    'movie_id' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'movie_id',
       'name' => 'movie_id',
       'type' => 
      Colibri\Schema\Types\IntegerType::__set_state(array(
         'length' => 11,
         'precision' => 0,
         'extra' => NULL,
      )),
       'default' => NULL,
       'unsigned' => true,
       'nullable' => false,
       'autoIncrement' => false,
       'primaryKey' => false,
       'identity' => false,
    )),
    'language_id' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'language_id',
       'name' => 'language_id',
       'type' => 
      Colibri\Schema\Types\IntegerType::__set_state(array(
         'length' => 11,
         'precision' => 0,
         'extra' => NULL,
      )),
       'default' => NULL,
       'unsigned' => true,
       'nullable' => false,
       'autoIncrement' => false,
       'primaryKey' => false,
       'identity' => false,
    )),
  ),
);