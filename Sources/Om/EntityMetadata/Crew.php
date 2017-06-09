<?php

return array (
  'entityClass' => 'ColibriLabs\\Database\\Om\\Crew',
  'entityRepositoryClass' => 'ColibriLabs\\Database\\Om\\CrewRepository',
  'tableName' => 'crews',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'crews.id',
    'profile_id' => 'crews.profile_id',
    'movie_id' => 'crews.movie_id',
    'department' => 'crews.department',
    'job' => 'crews.job',
    'version' => 'crews.version',
    'created' => 'crews.created',
    'updated' => 'crews.updated',
  ),
  'names' => 
  array (
    'id' => 'id',
    'profile_id' => 'profile_id',
    'movie_id' => 'movie_id',
    'department' => 'department',
    'job' => 'job',
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
    'profile_id' => 'profile_id',
    'movie_id' => 'movie_id',
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
    'department' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'department',
       'name' => 'department',
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
    'job' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'job',
       'name' => 'job',
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