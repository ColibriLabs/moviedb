<?php

return array (
  'entityClass' => 'ColibriLabs\\Database\\Om\\MovieCompany',
  'entityRepositoryClass' => 'ColibriLabs\\Database\\Om\\MovieCompanyRepository',
  'tableName' => 'movie_company',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'movie_company.id',
    'movie_id' => 'movie_company.movie_id',
    'company_id' => 'movie_company.company_id',
  ),
  'names' => 
  array (
    'id' => 'id',
    'movie_id' => 'movie_id',
    'company_id' => 'company_id',
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
    'company_id' => 'company_id',
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
    'company_id' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'company_id',
       'name' => 'company_id',
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