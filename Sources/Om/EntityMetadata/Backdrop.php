<?php

return array (
  'entityClass' => 'ColibriLabs\\Database\\Om\\Backdrop',
  'entityRepositoryClass' => 'ColibriLabs\\Database\\Om\\BackdropRepository',
  'tableName' => 'backdrops',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'backdrops.id',
    'picture_id' => 'backdrops.picture_id',
    'movie_id' => 'backdrops.movie_id',
  ),
  'names' => 
  array (
    'id' => 'id',
    'picture_id' => 'picture_id',
    'movie_id' => 'movie_id',
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
    'picture_id' => 'picture_id',
    'movie_id' => 'movie_id',
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
    'picture_id' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'picture_id',
       'name' => 'picture_id',
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
  ),
);