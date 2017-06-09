<?php

return array (
  'entityClass' => 'ColibriLabs\\Database\\Om\\Profile',
  'entityRepositoryClass' => 'ColibriLabs\\Database\\Om\\ProfileRepository',
  'tableName' => 'profiles',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'profiles.id',
    'tmdb_id' => 'profiles.tmdb_id',
    'imdb_id' => 'profiles.imdb_id',
    'name' => 'profiles.name',
    'biography' => 'profiles.biography',
    'adult' => 'profiles.adult',
    'sex' => 'profiles.sex',
    'birthday' => 'profiles.birthday',
    'deathday' => 'profiles.deathday',
    'version' => 'profiles.version',
    'created' => 'profiles.created',
    'updated' => 'profiles.updated',
  ),
  'names' => 
  array (
    'id' => 'id',
    'tmdb_id' => 'tmdb_id',
    'imdb_id' => 'imdb_id',
    'name' => 'name',
    'biography' => 'biography',
    'adult' => 'adult',
    'sex' => 'sex',
    'birthday' => 'birthday',
    'deathday' => 'deathday',
    'version' => 'version',
    'created' => 'created',
    'updated' => 'updated',
  ),
  'relations' => 
  array (
  ),
  'enumerations' => 
  array (
    'sex' => 
    array (
      0 => 'F',
      1 => 'M',
    ),
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
    'imdb_id' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'imdb_id',
       'name' => 'imdb_id',
       'type' => 
      Colibri\Schema\Types\StringType::__set_state(array(
         'length' => 9,
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
    'name' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'name',
       'name' => 'name',
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
    'biography' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'biography',
       'name' => 'biography',
       'type' => 
      Colibri\Schema\Types\StringType::__set_state(array(
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
    'adult' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'adult',
       'name' => 'adult',
       'type' => 
      Colibri\Schema\Types\BooleanType::__set_state(array(
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
    'sex' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'sex',
       'name' => 'sex',
       'type' => 
      Colibri\Schema\Types\EnumType::__set_state(array(
         'length' => 0,
         'precision' => 0,
         'extra' => 
        array (
          0 => 'F',
          1 => 'M',
        ),
      )),
       'default' => NULL,
       'unsigned' => false,
       'nullable' => false,
       'autoIncrement' => false,
       'primaryKey' => false,
       'identity' => false,
    )),
    'birthday' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'birthday',
       'name' => 'birthday',
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
    'deathday' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'deathday',
       'name' => 'deathday',
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