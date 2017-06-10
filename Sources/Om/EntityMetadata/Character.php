<?php

return array (
  'entityClass' => 'ColibriLabs\\Database\\Om\\Character',
  'entityRepositoryClass' => 'ColibriLabs\\Database\\Om\\CharacterRepository',
  'tableName' => 'characters',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'characters.id',
    'tmdb_id' => 'characters.tmdb_id',
    'profile_id' => 'characters.profile_id',
    'movie_id' => 'characters.movie_id',
    'character' => 'characters.character',
    'order' => 'characters.order',
    'version' => 'characters.version',
    'created' => 'characters.created',
    'updated' => 'characters.updated',
  ),
  'names' => 
  array (
    'id' => 'id',
    'tmdb_id' => 'tmdb_id',
    'profile_id' => 'profile_id',
    'movie_id' => 'movie_id',
    'character' => 'character',
    'order' => 'order',
    'version' => 'version',
    'created' => 'created',
    'updated' => 'updated',
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
    'tmdb_id' => 'tmdb_id',
    'profile_id' => 'profile_id',
    'movie_id' => 'movie_id',
    'order' => 'order',
    'version' => 'version',
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
    'tmdb_id' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'tmdb_id',
       'name' => 'tmdb_id',
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
    'profile_id' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'profile_id',
       'name' => 'profile_id',
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
    'character' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'character',
       'name' => 'character',
       'type' => 
      Colibri\Schema\Types\StringType::__set_state(array(
         'length' => 64,
         'precision' => 0,
         'extra' => NULL,
      )),
       'default' => NULL,
       'unsigned' => false,
       'nullable' => false,
       'autoIncrement' => false,
       'primaryKey' => false,
       'identity' => false,
    )),
    'order' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'order',
       'name' => 'order',
       'type' => 
      Colibri\Schema\Types\IntegerType::__set_state(array(
         'length' => 3,
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
    'version' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'version',
       'name' => 'version',
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
    'created' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'created',
       'name' => 'created',
       'type' => 
      Colibri\Schema\Types\DatetimeType::__set_state(array(
         'length' => 0,
         'precision' => 0,
         'extra' => NULL,
      )),
       'default' => NULL,
       'unsigned' => false,
       'nullable' => false,
       'autoIncrement' => false,
       'primaryKey' => false,
       'identity' => false,
    )),
    'updated' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'updated',
       'name' => 'updated',
       'type' => 
      Colibri\Schema\Types\DatetimeType::__set_state(array(
         'length' => 0,
         'precision' => 0,
         'extra' => NULL,
      )),
       'default' => NULL,
       'unsigned' => false,
       'nullable' => false,
       'autoIncrement' => false,
       'primaryKey' => false,
       'identity' => false,
    )),
  ),
);