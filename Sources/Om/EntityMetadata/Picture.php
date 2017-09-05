<?php

return array (
  'entityClass' => 'ColibriLabs\\Database\\Om\\Picture',
  'entityRepositoryClass' => 'ColibriLabs\\Database\\Om\\PictureRepository',
  'tableName' => 'pictures',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'pictures.id',
    'height' => 'pictures.height',
    'width' => 'pictures.width',
    'file_path' => 'pictures.file_path',
    'file_size' => 'pictures.file_size',
    'tmdb_file_path' => 'pictures.tmdb_file_path',
    'iso_639_1' => 'pictures.iso_639_1',
    'version' => 'pictures.version',
    'created' => 'pictures.created',
    'updated' => 'pictures.updated',
  ),
  'names' => 
  array (
    'id' => 'id',
    'height' => 'height',
    'width' => 'width',
    'file_path' => 'file_path',
    'file_size' => 'file_size',
    'tmdb_file_path' => 'tmdb_file_path',
    'iso_639_1' => 'iso_639_1',
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
    'height' => 'height',
    'width' => 'width',
    'file_size' => 'file_size',
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
    'height' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'height',
       'name' => 'height',
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
    'width' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'width',
       'name' => 'width',
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
    'file_path' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'file_path',
       'name' => 'file_path',
       'type' => 
      Colibri\Schema\Types\StringType::__set_state(array(
         'length' => 128,
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
    'file_size' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'file_size',
       'name' => 'file_size',
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
    'tmdb_file_path' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'tmdb_file_path',
       'name' => 'tmdb_file_path',
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
    'iso_639_1' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'iso_639_1',
       'name' => 'iso_639_1',
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