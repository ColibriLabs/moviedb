<?php
/**
 * Generated By ColibriORM Generator
 * @author Ivan Gontarenko
*/

namespace ColibriLabs\Database\Om\Base;

use Colibri\Core\Repository;
use Colibri\Query\Statement\Comparison\Cmp;
use Colibri\Query\Statement\OrderBy;
use ColibriLabs\Database\Om\CrewRepository;
use ColibriLabs\Database\Om\Crew;
use Colibri\Core\ResultSet\ResultSetIterator;

/**
 * Magic methods for query-builder and access to the fields data
 *
 * @method Crew findOneById($id);
 * @method ResultSetIterator findById($id);
 * @method CrewRepository filterById($id, $cmp = Cmp::EQ);
 * @method CrewRepository orderById($vector = OrderBy::ASC);
 * @method CrewRepository groupById();
 * @method Crew findOneByProfileId($profile_id);
 * @method ResultSetIterator findByProfileId($profile_id);
 * @method CrewRepository filterByProfileId($profile_id, $cmp = Cmp::EQ);
 * @method CrewRepository orderByProfileId($vector = OrderBy::ASC);
 * @method CrewRepository groupByProfileId();
 * @method Crew findOneByMovieId($movie_id);
 * @method ResultSetIterator findByMovieId($movie_id);
 * @method CrewRepository filterByMovieId($movie_id, $cmp = Cmp::EQ);
 * @method CrewRepository orderByMovieId($vector = OrderBy::ASC);
 * @method CrewRepository groupByMovieId();
 * @method Crew findOneByDepartment($department);
 * @method ResultSetIterator findByDepartment($department);
 * @method CrewRepository filterByDepartment($department, $cmp = Cmp::EQ);
 * @method CrewRepository orderByDepartment($vector = OrderBy::ASC);
 * @method CrewRepository groupByDepartment();
 * @method Crew findOneByJob($job);
 * @method ResultSetIterator findByJob($job);
 * @method CrewRepository filterByJob($job, $cmp = Cmp::EQ);
 * @method CrewRepository orderByJob($vector = OrderBy::ASC);
 * @method CrewRepository groupByJob();
 * @method Crew findOneByVersion($version);
 * @method ResultSetIterator findByVersion($version);
 * @method CrewRepository filterByVersion($version, $cmp = Cmp::EQ);
 * @method CrewRepository orderByVersion($vector = OrderBy::ASC);
 * @method CrewRepository groupByVersion();
 * @method Crew findOneByCreated($created);
 * @method ResultSetIterator findByCreated($created);
 * @method CrewRepository filterByCreated($created, $cmp = Cmp::EQ);
 * @method CrewRepository orderByCreated($vector = OrderBy::ASC);
 * @method CrewRepository groupByCreated();
 * @method Crew findOneByUpdated($updated);
 * @method ResultSetIterator findByUpdated($updated);
 * @method CrewRepository filterByUpdated($updated, $cmp = Cmp::EQ);
 * @method CrewRepository orderByUpdated($vector = OrderBy::ASC);
 * @method CrewRepository groupByUpdated();
*/

class BaseCrewRepository extends Repository
{
  
  /**
   * BaseCrewRepository constructor.
   */
  public function __construct()
  {
    parent::__construct(Crew::class);
  }

}