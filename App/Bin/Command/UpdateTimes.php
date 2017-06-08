<?php

namespace ColibriLabs\Bin\Command;

use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Lib\Util\Profiler;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class UpdateTimes
 * @package ColibriLabs\Bin\Command
 */
class UpdateTimes extends AbstractCommand
{
  
  /**
   * @var string
   */
  private static $pattern = '/\"?([^\"]+)\"?\s+\((\d+)\)[^0-9]+([0-9]+)$/iu';
  /**
   * @inheritdoc
   */
  protected function configure()
  {
    parent::configure();
    
    $this
      ->setName('app:update-times')
      ->setDescription('Update Movies Times');
    
    Profiler::timerStart();
  }
  
  /**
   * @inheritdoc
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $fileObject = new \SplFileObject(__DIR__ . '/../../../data/running-times.list');
    $countLines = (integer) exec(sprintf("wc -l '%s'", $fileObject->getRealPath()));
    
    $progress = $this->getProgressBar($output, $countLines);
    $counter = 0; $stepSize = 2048;
    
    $buffer = null;
    
    while (!$fileObject->eof()) {
      
      if (0 === ++$counter || $counter % $stepSize === 0) {
        $progress->setMessage(sprintf('Line %d; Memory: %s', $counter, Profiler::memoryUsage()));
        $progress->advance($stepSize);
      }
      
      $this->parseString($fileObject->fgets(), $output);
    }
    
    $progress->setMessage(sprintf("<info>Time: %s, Memory: %s</info>", Profiler::timeSpend(), Profiler::memoryUsage()));
    $progress->finish();
  }
  
  /**
   * @param $string
   * @param OutputInterface $output
   *
   */
  private function parseString($string, OutputInterface $output)
  {
    if (preg_match(static::$pattern, $string, $matches)) {
      list(, $title, $year, $times) = $matches;
      $movie = $this->repository->filterByYear($year)->filterByTitle(trim($title))->findOne(null);
      if ($movie instanceof Movie) {
        try {
          $movie->setLength($times);
          $this->repository->persist($movie);
        } catch (\Throwable $exception) {
          $output->writeln(sprintf('%s [%s]', $exception->getMessage(), json_encode($movie->toArray()))); die;
        }
      }
    }
  }
  
}