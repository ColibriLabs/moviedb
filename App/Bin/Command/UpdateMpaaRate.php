<?php

namespace ColibriLabs\Bin\Command;

use Colibri\Exception\BadArgumentException;
use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Lib\Util\Profiler;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class UpdateMpaaRate
 * @package ColibriLabs\Bin\Command
 */
class UpdateMpaaRate extends AbstractCommand
{
  
  /**
   * @var string
   */
  private static $movieTitlePattern = '/MV:\"?([^\"]+)\"?\s+\((\d+)\)/iu';
  
  private static $movieMpaaPattern = '/RE:\s+Rated\s+([a-z0-9-]+)/iu';
  
  /**
   * @inheritdoc
   */
  protected function configure()
  {
    parent::configure();
    
    $this
      ->setName('app:update-mpaa')
      ->setDescription('Update MPAA rating for movies from IMDB dump files');
    
    Profiler::timerStart();
  }
  
  /**
   * @inheritdoc
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $fileObject = new \SplFileObject(__DIR__ . '/../../../data/mpaa-ratings-reasons.list');
    $countLines = (integer) exec(sprintf("wc -l '%s'", $fileObject->getRealPath()));
    $separator = '-------------------------------------------------------------------------------';
    
    $progress = $this->getProgressBar($output, $countLines);
    $counter = 0; $stepSize = 2048;
    
    $buffer = null;
    
    while (!$fileObject->eof()) {
      
      if (0 === ++$counter || $counter % $stepSize === 0) {
        $progress->setMessage(sprintf('Line %d; Memory: %s', $counter, Profiler::memoryUsage()));
        $progress->advance($stepSize);
      }
      
      if (trim($line = $fileObject->fgets()) === $separator) {
        $this->parseString($buffer, $output);
        $buffer = null; continue;
      }
      
      $buffer .= $line;
    }
    
    $progress->setMessage(sprintf("<info>Time: %s, Memory: %s</info>", Profiler::timeSpend(), Profiler::memoryUsage()));
    $progress->finish();
  }
  
  /**
   * @param $string
   * @param OutputInterface $output
   */
  private function parseString($string, OutputInterface $output)
  {
    if (preg_match(static::$movieTitlePattern, $string, $matches)) {
      list(, $title, $year) = $matches;
      $movie = $this->repository->filterByYear($year)->filterByTitle(trim($title))->findOne(null);
      if ($movie instanceof Movie && preg_match(static::$movieMpaaPattern, $string, $mpaaMatches)) {
        try {
          list(, $mpaaRate) = $mpaaMatches;
          $movie->setMpaaRating(trim($mpaaRate));
          $this->repository->persist($movie);
        } catch (BadArgumentException $exception) {
          $output->writeln(sprintf('%s [%s]', $exception->getMessage(), json_encode($movie->toArray())));
        } catch (\Throwable $exception) {
          $output->writeln(sprintf('%s [%s]', $exception->getMessage(), json_encode($movie->toArray())));
          die;
        }
      }
    }
  }
  
}