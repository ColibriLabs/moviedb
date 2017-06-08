<?php

return array (
  'entityClass' => 'ColibriLabs\\Database\\Om\\Movie',
  'entityRepositoryClass' => 'ColibriLabs\\Database\\Om\\MovieRepository',
  'tableName' => 'movies',
  'identifier' => 'id',
  'rawSQLNames' => 
  array (
    'id' => 'movies.id',
    'tmdb_id' => 'movies.tmdb_id',
    'imdb_id' => 'movies.imdb_id',
    'budget' => 'movies.budget',
    'revenue' => 'movies.revenue',
    'runtime' => 'movies.runtime',
    'release_date' => 'movies.release_date',
    'title' => 'movies.title',
    'soundex_title' => 'movies.soundex_title',
    'metaphone_title' => 'movies.metaphone_title',
    'original_title' => 'movies.original_title',
    'soundex_original_title' => 'movies.soundex_original_title',
    'metaphone_original_title' => 'movies.metaphone_original_title',
    'iso_language' => 'movies.iso_language',
    'overview' => 'movies.overview',
    'tagline' => 'movies.tagline',
    'tmdb_votes' => 'movies.tmdb_votes',
    'tmdb_rating' => 'movies.tmdb_rating',
    'imdb_votes' => 'movies.imdb_votes',
    'imdb_rating' => 'movies.imdb_rating',
    'mpaa_rating' => 'movies.mpaa_rating',
    'version' => 'movies.version',
    'created' => 'movies.created',
    'updated' => 'movies.updated',
  ),
  'names' => 
  array (
    'id' => 'id',
    'tmdb_id' => 'tmdb_id',
    'imdb_id' => 'imdb_id',
    'budget' => 'budget',
    'revenue' => 'revenue',
    'runtime' => 'runtime',
    'release_date' => 'release_date',
    'title' => 'title',
    'soundex_title' => 'soundex_title',
    'metaphone_title' => 'metaphone_title',
    'original_title' => 'original_title',
    'soundex_original_title' => 'soundex_original_title',
    'metaphone_original_title' => 'metaphone_original_title',
    'iso_language' => 'iso_language',
    'overview' => 'overview',
    'tagline' => 'tagline',
    'tmdb_votes' => 'tmdb_votes',
    'tmdb_rating' => 'tmdb_rating',
    'imdb_votes' => 'imdb_votes',
    'imdb_rating' => 'imdb_rating',
    'mpaa_rating' => 'mpaa_rating',
    'version' => 'version',
    'created' => 'created',
    'updated' => 'updated',
  ),
  'relations' => 
  array (
  ),
  'enumerations' => 
  array (
    'mpaa_rating' => 
    array (
      0 => 'G',
      1 => 'PG',
      2 => 'PG-13',
      3 => 'R',
      4 => 'NC-17',
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
    'imdb_id' => 'imdb_id',
    'budget' => 'budget',
    'revenue' => 'revenue',
    'runtime' => 'runtime',
    'tmdb_votes' => 'tmdb_votes',
    'imdb_votes' => 'imdb_votes',
    'version' => 'version',
  ),
  'primary' => 
  array (
    'id' => 'id',
    'tmdb_id' => 'tmdb_id',
    'imdb_id' => 'imdb_id',
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
       'autoIncrement' => true,
       'primaryKey' => true,
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
       'unsigned' => true,
       'nullable' => false,
       'autoIncrement' => true,
       'primaryKey' => true,
       'identity' => false,
    )),
    'budget' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'budget',
       'name' => 'budget',
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
    'revenue' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'revenue',
       'name' => 'revenue',
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
    'runtime' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'runtime',
       'name' => 'runtime',
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
    'release_date' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'release_date',
       'name' => 'release_date',
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
    'title' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'title',
       'name' => 'title',
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
    'soundex_title' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'soundex_title',
       'name' => 'soundex_title',
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
    'metaphone_title' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'metaphone_title',
       'name' => 'metaphone_title',
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
    'original_title' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'original_title',
       'name' => 'original_title',
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
    'soundex_original_title' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'soundex_original_title',
       'name' => 'soundex_original_title',
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
    'metaphone_original_title' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'metaphone_original_title',
       'name' => 'metaphone_original_title',
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
    'iso_language' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'iso_language',
       'name' => 'iso_language',
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
    'overview' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'overview',
       'name' => 'overview',
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
    'tagline' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'tagline',
       'name' => 'tagline',
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
    'tmdb_votes' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'tmdb_votes',
       'name' => 'tmdb_votes',
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
    'tmdb_rating' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'tmdb_rating',
       'name' => 'tmdb_rating',
       'type' => 
      Colibri\Schema\Types\FloatType::__set_state(array(
         'length' => 10,
         'precision' => 4,
         'extra' => NULL,
      )),
       'default' => NULL,
       'unsigned' => false,
       'nullable' => false,
       'autoIncrement' => false,
       'primaryKey' => false,
       'identity' => false,
    )),
    'imdb_votes' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'imdb_votes',
       'name' => 'imdb_votes',
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
    'imdb_rating' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'imdb_rating',
       'name' => 'imdb_rating',
       'type' => 
      Colibri\Schema\Types\FloatType::__set_state(array(
         'length' => 10,
         'precision' => 4,
         'extra' => NULL,
      )),
       'default' => NULL,
       'unsigned' => false,
       'nullable' => false,
       'autoIncrement' => false,
       'primaryKey' => false,
       'identity' => false,
    )),
    'mpaa_rating' => 
    Colibri\Schema\Field::__set_state(array(
       'column' => 'mpaa_rating',
       'name' => 'mpaa_rating',
       'type' => 
      Colibri\Schema\Types\EnumType::__set_state(array(
         'length' => 0,
         'precision' => 0,
         'extra' => 
        array (
          0 => 'G',
          1 => 'PG',
          2 => 'PG-13',
          3 => 'R',
          4 => 'NC-17',
        ),
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