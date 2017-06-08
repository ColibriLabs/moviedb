<?php

namespace ColibriLabs\Bin\Command;

use ColibriLabs\Database\Om\Genre;
use ColibriLabs\Database\Om\GenreRepository;
use ColibriLabs\Database\Om\GenreXMovieRepository;
use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Lib\Util\Profiler;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class UpdateMovieGenre
 * @package ColibriLabs\Bin\Command
 */
class UpdateMovieGenre extends AbstractCommand
{
  
  /**
   * @var GenreRepository
   */
  protected $genreRepository;
  
  /**
   * @var GenreXMovieRepository
   */
  protected $relationRepository;
  
  /**
   * @var string
   */
  private static $movieTitlePattern = '/\"?([^\"]+)\"?\s+\((\d+)\).*?([a-z0-9-]+)$/iu';
  
  /**
   * @inheritdoc
   */
  protected function configure()
  {
    parent::configure();
    
    $this->genreRepository = new GenreRepository();
    $this->relationRepository = new GenreXMovieRepository();
    
    $this
      ->setName('app:update-genre')
      ->setDescription('Update Movie Genres');
    
    Profiler::timerStart();
  }
  
  /**
   * @inheritdoc
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $fileObject = new \SplFileObject(__DIR__ . '/../../../data/genres.list');
    $countLines = (integer) exec(sprintf("wc -l '%s'", $fileObject->getRealPath()));
    
    $progress = $this->getProgressBar($output, $countLines);
    $counter = 0; $stepSize = 2048;
  
    $bulkData = [];
    
    $fileObject->seek(1351680 - 100);
    $counter = 1351680 - 100;
    $progress->setProgress($counter);
    
    while (!$fileObject->eof()) {
      
      if (0 === ++$counter || $counter % $stepSize === 0) {
        $progress->setMessage(sprintf('Line %d; Memory: %s; Time spend: %s',
          $counter, Profiler::memoryUsage(), Profiler::timeSpendHumanize()));
        $progress->advance($stepSize);
      }
  
      if (preg_match(static::$movieTitlePattern, $fileObject->fgets(), $matches)) {
        list(, $title, $year, $genre) = $matches;
        if (($movie = $this->retrieveMovie($title, $year)) instanceof Movie) {
          $genre = $this->retrieveGenreModel($genre);
          $bulkData[] = [
            'movie_id' => $movie->getId(),
            'genre_id' => $genre->getId(),
          ];
        }
      }
      
      if (count($bulkData) > 16384) {
        $this->insertBulkData($bulkData); $bulkData = [];
      }
    }
  
    if (count($bulkData) > 0) {
      $this->insertBulkData($bulkData);
    }
    
    $progress->setMessage(sprintf("<info>Time: %s, Memory: %s</info>",
      Profiler::timeSpendHumanize(), Profiler::memoryUsage()));
    $progress->finish();
  }
  
  /**
   * @param $genre
   * @return Genre
   */
  private function retrieveGenreModel($genre)
  {
    $model = $this->genreRepository->findOneByTitle($genre);
    
    if (!($model instanceof Genre)) {
      $model = new Genre();
      $model->setTitle($genre);
      $model->setSoundex(soundex($genre));
      $this->genreRepository->persist($model);
    }
    
    return $model;
  }
  
  /**
   * @param $title
   * @param $year
   * @return Movie
   */
  private function retrieveMovie($title, $year)
  {
    $movie = $this->repository->filterByYear($year)->filterByTitle(trim($title))
      ->findOne(null);
  
    /** @var Movie $movie */
    return $movie;
  }
  
  /**
   * @param array $data
   * @return mixed
   */
  private function insertBulkData(array $data)
  {
    $connection = $this->relationRepository->getConnection();
    
    $connection->start();
    
    $persister = $this->relationRepository->createInsertQuery()->ignore();
    $persister->setDataBatchBulk(...$data);
    
    if (!$connection->execute($persister->toSQL())) {
      $connection->rollback();
    }
    
    $connection->commit();
    
    return $connection->affectedRows();
  }
  
}