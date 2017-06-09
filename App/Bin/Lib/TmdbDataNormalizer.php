<?php

namespace ColibriLabs\Bin\Lib;

/**
 * Class TmdbDataNormalizer
 * @package ColibriLabs\Bin\Lib
 */
class TmdbDataNormalizer
{
  
  /**
   * @param array $movieArray
   * @return array
   */
  public function normalizeMovie(array $movieArray)
  {
    $normalized = [];
    
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
    
    foreach ($keys as $key => $normalKey) {
      if (isset($movieArray[$key])) {
        $normalized[$normalKey] = $movieArray[$key];
      }
    }
    
    return $normalized;
  }
  
}