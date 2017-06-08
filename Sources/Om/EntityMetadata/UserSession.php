<?php

return array (
  'entityClass' => 'ColibriLabs\\Database\\Om\\UserSession',
  'entityRepositoryClass' => 'ColibriLabs\\Database\\Om\\UserSessionRepository',
  'tableName' => 'admin_user_sessions',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'admin_user_sessions.id',
    'user_id' => 'admin_user_sessions.user_id',
    'session_id' => 'admin_user_sessions.session_id',
    'ip' => 'admin_user_sessions.ip',
    'user_agent' => 'admin_user_sessions.user_agent',
    'os' => 'admin_user_sessions.os',
    'browser' => 'admin_user_sessions.browser',
    'device_type' => 'admin_user_sessions.device_type',
    'is_mobile' => 'admin_user_sessions.is_mobile',
    'created' => 'admin_user_sessions.created',
  ),
  'names' => 
  array (
    'id' => 'id',
    'user_id' => 'user_id',
    'session_id' => 'session_id',
    'ip' => 'ip',
    'user_agent' => 'user_agent',
    'os' => 'os',
    'browser' => 'browser',
    'device_type' => 'device_type',
    'is_mobile' => 'is_mobile',
    'created' => 'created',
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
    'user_id' => 'user_id',
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
    'user_id' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'user_id',
       'name' => 'user_id',
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
    'session_id' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'session_id',
       'name' => 'session_id',
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
    'ip' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'ip',
       'name' => 'ip',
       'type' => 
      Colibri\Schema\Types\FloatType::__set_state(array(
         'length' => 11,
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
    'user_agent' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'user_agent',
       'name' => 'user_agent',
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
    'os' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'os',
       'name' => 'os',
       'type' => 
      Colibri\Schema\Types\StringType::__set_state(array(
         'length' => 32,
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
    'browser' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'browser',
       'name' => 'browser',
       'type' => 
      Colibri\Schema\Types\StringType::__set_state(array(
         'length' => 32,
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
    'device_type' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'device_type',
       'name' => 'device_type',
       'type' => 
      Colibri\Schema\Types\StringType::__set_state(array(
         'length' => 8,
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
    'is_mobile' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'is_mobile',
       'name' => 'is_mobile',
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
  ),
);