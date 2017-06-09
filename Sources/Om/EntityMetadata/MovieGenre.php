<?php

return array (
  'entityClass' => 'ColibriLabs\\Database\\Om\\MovieGenre',
  'entityRepositoryClass' => 'ColibriLabs\\Database\\Om\\MovieGenreRepository',
  'tableName' => 'movie_genre',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'movie_genre.id',
    'movie_id' => 'movie_genre.movie_id',
    'genre_id' => 'movie_genre.genre_id',
  ),
  'names' => 
  array (
    'id' => 'id',
    'movie_id' => 'movie_id',
    'genre_id' => 'genre_id',
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
    'genre_id' => 'genre_id',
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
    'genre_id' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'genre_id',
       'name' => 'genre_id',
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