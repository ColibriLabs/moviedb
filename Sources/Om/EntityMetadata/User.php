<?php

return array (
  'entityClass' => 'ColibriLabs\\Database\\Om\\User',
  'entityRepositoryClass' => 'ColibriLabs\\Database\\Om\\UserRepository',
  'tableName' => 'admin_users',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'admin_users.id',
    'email' => 'admin_users.email',
    'settings' => 'admin_users.settings',
    'login' => 'admin_users.login',
    'password' => 'admin_users.password',
  ),
  'names' => 
  array (
    'id' => 'id',
    'email' => 'email',
    'settings' => 'settings',
    'login' => 'login',
    'password' => 'password',
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
    'email' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'email',
       'name' => 'email',
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
    'settings' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'settings',
       'name' => 'settings',
       'type' => 
      Colibri\Schema\Types\JsonType::__set_state(array(
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
    'login' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'login',
       'name' => 'login',
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
    'password' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'password',
       'name' => 'password',
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
  ),
);