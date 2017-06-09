<?php

return array (
  'entityClass' => 'ColibriLabs\\Database\\Om\\MovieCountry',
  'entityRepositoryClass' => 'ColibriLabs\\Database\\Om\\MovieCountryRepository',
  'tableName' => 'movie_country',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'movie_country.id',
    'movie_id' => 'movie_country.movie_id',
    'country_id' => 'movie_country.country_id',
  ),
  'names' => 
  array (
    'id' => 'id',
    'movie_id' => 'movie_id',
    'country_id' => 'country_id',
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
    'country_id' => 'country_id',
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
    'country_id' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'country_id',
       'name' => 'country_id',
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