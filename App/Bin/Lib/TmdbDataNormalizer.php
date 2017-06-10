<?php

namespace ColibriLabs\Bin\Lib;

use ColibriLabs\Database\Om\Profile;

/**
 * Class TmdbDataNormalizer
 * @package ColibriLabs\Bin\Lib
 */
class TmdbDataNormalizer
{
  
  /**
   * @param array $data
   * @return array
   */
  public function normalizeMovie(array $data)
  {
    $keys = [
      'id' => 'tmdb_id',
      'adult' => 'adult',
      'backdrop_path' => 'backdrop_path',
      'budget' => 'budget',
      'homepage' => 'homepage',
      'imdb_id' => 'imdb_id',
      'original_title' => 'original_title',
      'original_language' => 'iso_language',
      'title' => 'title',
      'overview' => 'overview',
      'release_date' => 'release_date',
      'revenue' => 'revenue',
      'runtime' => 'runtime',
      'tagline' => 'tagline',
      'vote_average' => 'tmdb_rating',
      'vote_count' => 'tmdb_votes',
    ];
    
    return $this->reformatKeys($keys, $data);
  }
  
  /**
   * @param array $data
   * @return array
   */
  public function normalizeCharacter(array $data)
  {
    $keys = [
      'id' => 'tmdb_id',
      'character' => 'character',
      'order' => 'order',
    ];
    
    return $this->reformatKeys($keys, $data);
  }

  /**
   * @param array $data
   * @return array
   */
  public function normalizeCrewPerson(array $data)
  {
    $keys = [
      'id' => 'tmdb_id',
      'department' => 'department',
      'job' => 'job',
      'order' => 'order',
    ];

    return $this->reformatKeys($keys, $data);
  }
  
  /**
   * @param array $data
   * @return array
   */
  public function normalizePicture(array $data)
  {
    $keys = [
      'file_path' => 'tmdb_file_path',
      'height' => 'height',
      'width' => 'width',
      'iso_639_1' => 'iso_639_1',
    ];
    
    return $this->reformatKeys($keys, $data);
  }
  
  /**
   * @param array $data
   * @return array
   */
  public function normalizeProfile(array $data)
  {
    /**
     * @param $gender
     * @return string
     */
    $detectSex = function ($gender) {
      return (integer) $gender === 1 ? Profile::ENUM_SEX_F : Profile::ENUM_SEX_M;
    };

    $keys = [
      'id' => 'tmdb_id',
      'imdb_id' => 'imdb_id',
      'name' => 'name',
      'adult' => 'adult',
      'biography' => 'biography',
      'birthday' => 'birthday',
      'deathday' => 'deathday',
      'sex' => $detectSex($data['gender']),
    ];
    
    return $this->reformatKeys($keys, $data);
  }
  
  /**
   * @param array $keys
   * @param array $data
   * @return array
   */
  private function reformatKeys(array $keys, array $data)
  {
    $collection = [];
    
    foreach ($keys as $keyA => $keyB) {
      if (array_key_exists($keyA, $data)) {
        $collection[$keyB] = $data[$keyA];
      }
    }
  
    return $collection;
  }
  
}