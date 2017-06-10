<?php
/**
 * Generated By ColibriORM Generator
 * @author Ivan Gontarenko
*/

namespace ColibriLabs\Database\Om\Base;

use Colibri\Core\Repository;
use Colibri\Query\Statement\Comparison\Cmp;
use Colibri\Query\Statement\OrderBy;
use ColibriLabs\Database\Om\CharacterRepository;
use ColibriLabs\Database\Om\Character;
use Colibri\Core\ResultSet\ResultSetIterator;

/**
 * Magic methods for query-builder and access to the fields data
 *
 * @method Character findOneById($id);
 * @method ResultSetIterator findById($id);
 * @method CharacterRepository filterById($id, $cmp = Cmp::EQ);
 * @method CharacterRepository orderById($vector = OrderBy::ASC);
 * @method CharacterRepository groupById();
 * @method Character findOneByTmdbId($tmdb_id);
 * @method ResultSetIterator findByTmdbId($tmdb_id);
 * @method CharacterRepository filterByTmdbId($tmdb_id, $cmp = Cmp::EQ);
 * @method CharacterRepository orderByTmdbId($vector = OrderBy::ASC);
 * @method CharacterRepository groupByTmdbId();
 * @method Character findOneByProfileId($profile_id);
 * @method ResultSetIterator findByProfileId($profile_id);
 * @method CharacterRepository filterByProfileId($profile_id, $cmp = Cmp::EQ);
 * @method CharacterRepository orderByProfileId($vector = OrderBy::ASC);
 * @method CharacterRepository groupByProfileId();
 * @method Character findOneByMovieId($movie_id);
 * @method ResultSetIterator findByMovieId($movie_id);
 * @method CharacterRepository filterByMovieId($movie_id, $cmp = Cmp::EQ);
 * @method CharacterRepository orderByMovieId($vector = OrderBy::ASC);
 * @method CharacterRepository groupByMovieId();
 * @method Character findOneByCharacter($character);
 * @method ResultSetIterator findByCharacter($character);
 * @method CharacterRepository filterByCharacter($character, $cmp = Cmp::EQ);
 * @method CharacterRepository orderByCharacter($vector = OrderBy::ASC);
 * @method CharacterRepository groupByCharacter();
 * @method Character findOneByOrder($order);
 * @method ResultSetIterator findByOrder($order);
 * @method CharacterRepository filterByOrder($order, $cmp = Cmp::EQ);
 * @method CharacterRepository orderByOrder($vector = OrderBy::ASC);
 * @method CharacterRepository groupByOrder();
 * @method Character findOneByVersion($version);
 * @method ResultSetIterator findByVersion($version);
 * @method CharacterRepository filterByVersion($version, $cmp = Cmp::EQ);
 * @method CharacterRepository orderByVersion($vector = OrderBy::ASC);
 * @method CharacterRepository groupByVersion();
 * @method Character findOneByCreated($created);
 * @method ResultSetIterator findByCreated($created);
 * @method CharacterRepository filterByCreated($created, $cmp = Cmp::EQ);
 * @method CharacterRepository orderByCreated($vector = OrderBy::ASC);
 * @method CharacterRepository groupByCreated();
 * @method Character findOneByUpdated($updated);
 * @method ResultSetIterator findByUpdated($updated);
 * @method CharacterRepository filterByUpdated($updated, $cmp = Cmp::EQ);
 * @method CharacterRepository orderByUpdated($vector = OrderBy::ASC);
 * @method CharacterRepository groupByUpdated();
*/

class BaseCharacterRepository extends Repository
{
  
  /**
   * BaseCharacterRepository constructor.
   */
  public function __construct()
  {
    parent::__construct(Character::class);
  }

}