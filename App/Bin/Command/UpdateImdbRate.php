<?php

namespace ColibriLabs\Bin\Command;

use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Lib\Util\Profiler;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateImdbRate extends AbstractCommand
{
  
  /**
   * @var string
   */
  private static $movieTitlePattern = '/(?:[0-9\.]+)\s+([0-9]+)\s+([0-9\.]+)\s+\"?([^\"]+)\"?\s+\((\d+)\)/iu';
  
  /**
   * @inheritdoc
   */
  protected function configure()
  {
    parent::configure();
    
    $this
      ->setName('app:update-imdb')
      ->setDescription('Update IMDB rating');
    
    Profiler::timerStart();
  }
  
  /**
   * @inheritdoc
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $fileObject = new \SplFileObject(__DIR__ . '/../../../data/ratings.list');
    $countLines = (integer) exec(sprintf("wc -l '%s'", $fileObject->getRealPath()));
    
    $progress = $this->getProgressBar($output, $countLines);
    $counter = 0; $stepSize = 256;
    
    $buffer = null;
    
    while (!$fileObject->eof()) {
      
      if (0 === ++$counter || $counter % $stepSize === 0) {
        $progress->setMessage(sprintf('Line (%d/%d); Memory: %s; Time spend: %s',
          $counter, $countLines - $counter, Profiler::memoryUsage(), Profiler::timeSpendHumanize()));
        $progress->advance($stepSize);
      }
      
      $this->parseString($fileObject->fgets(), $output);
    }
    
    $progress->setMessage(sprintf("<info>Time: %s, Memory: %s, Time spend: %s</info>",
      Profiler::timeSpendHumanize(), Profiler::memoryUsage(), Profiler::timeSpendHumanize()));
    $progress->finish();
  }
  
  /**
   * @param $string
   * @param OutputInterface $output
   *
   */
  private function parseString($string, OutputInterface $output)
  {
    if (preg_match(static::$movieTitlePattern, $string, $matches)) {
      list(, $votes, $rate, $title, $year) = $matches;
      $movie = $this->repository->filterByYear($year)->filterByTitle(trim($title))->findOne(null);
      if ($movie instanceof Movie) {
        try {
          $movie->setImdbVotes($votes);
          $movie->setImdbRating($rate);
          $this->repository->persist($movie);
        } catch (\Throwable $exception) {
          $output->writeln(sprintf('%s [%s]', $exception->getMessage(), json_encode($movie->toArray()))); die;
        }
      }
    }
  }
  
}