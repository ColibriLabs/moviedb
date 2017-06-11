<?php

return array (
  'entityClass' => 'ColibriLabs\\Database\\Om\\CollectionBackdrop',
  'entityRepositoryClass' => 'ColibriLabs\\Database\\Om\\CollectionBackdropRepository',
  'tableName' => 'collection_backdrops',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'collection_backdrops.id',
    'picture_id' => 'collection_backdrops.picture_id',
    'collection_id' => 'collection_backdrops.collection_id',
  ),
  'names' => 
  array (
    'id' => 'id',
    'picture_id' => 'picture_id',
    'collection_id' => 'collection_id',
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
    'collection_id' => 'collection_id',
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
    'collection_id' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'collection_id',
       'name' => 'collection_id',
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