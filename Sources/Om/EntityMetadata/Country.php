<?php

return array (
  'entityClass' => 'ColibriLabs\\Database\\Om\\Country',
  'entityRepositoryClass' => 'ColibriLabs\\Database\\Om\\CountryRepository',
  'tableName' => 'countries',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'countries.id',
    'iso_3166_1' => 'countries.iso_3166_1',
    'name' => 'countries.name',
    'version' => 'countries.version',
    'created' => 'countries.created',
    'updated' => 'countries.updated',
  ),
  'names' => 
  array (
    'id' => 'id',
    'iso_3166_1' => 'iso_3166_1',
    'name' => 'name',
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
    'iso_3166_1' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'iso_3166_1',
       'name' => 'iso_3166_1',
       'type' => 
      Colibri\Schema\Types\StringType::__set_state(array(
         'length' => 2,
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
         'length' => 255,
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