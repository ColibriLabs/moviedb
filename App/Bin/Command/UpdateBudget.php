<?php

namespace ColibriLabs\Bin\Command;

use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Lib\Util\Profiler;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class UpdateMovieBudget
 * @package ColibriLabs\Bin\Command
 */
class UpdateBudget extends AbstractCommand
{
  
  /**
   * @var string
   */
  private static $movieTitlePattern = '/MV:\"?([^\"]+)\"?\s+\((\d+)\)/iu';
  
  /**
   * @var string
   */
  private static $movieBudgetPattern = '/BT:\s+USD\s+([0-9,.]+)/iu';
  
  /**
   * @inheritdoc
   */
  protected function configure()
  {
    parent::configure();
    
    $this
      ->setName('app:update-budget')
      ->setDescription('Update budget for movies from IMDB dump files');
    
    Profiler::timerStart();
  }
  
  /**
   * @inheritdoc
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $budgetMoviesFile = new \SplFileObject(__DIR__ . '/../../../data/business.list');
    $countLines = (integer) exec(sprintf("wc -l '%s'", $budgetMoviesFile->getRealPath()));
    $separator = '-------------------------------------------------------------------------------';
  
    $progress = $this->getProgressBar($output, $countLines);
    $counter = 0; $stepSize = 2048;
  
    $buffer = null;
    
    while (!$budgetMoviesFile->eof()) {
  
      if (0 === ++$counter || $counter % $stepSize === 0) {
        $progress->setMessage(sprintf('Line %d; Memory: %s', $counter, Profiler::memoryUsage()));
        $progress->advance($stepSize);
      }
      
      if (trim($line = $budgetMoviesFile->fgets()) === $separator) {
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
      if ($movie instanceof Movie && preg_match(static::$movieBudgetPattern, $string, $budgetMatches)) {
        try {
          list(, $budget) = $budgetMatches;
          list($budget) = explode('.', $budget);
          $movie->setBudget(str_replace(',', null, $budget));
          $this->repository->persist($movie);
        } catch (\Throwable $exception) {
          $output->writeln(sprintf('%s [%s]', $exception->getMessage(), json_encode($movie->toArray()))); die;
        }
      }
    }
  }
  
}