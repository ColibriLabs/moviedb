<?php

namespace ColibriLabs\Bin\Command;

use ColibriLabs\Lib\Util\Profiler;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class UpdateMovies
 * @package ColibriLabs\Bin\Command
 */
class UpdateMovies extends AbstractCommand
{
  
  /**
   * @inheritdoc
   */
  protected function configure()
  {
    parent::configure();
  
    $this
      ->setName('app:update-movies')
      ->setDescription('Import movies from IMDB dump files');
  }
  
  /**
   * @inheritdoc
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    Profiler::timerStart();
    
    $moviesFile = new \SplFileObject(__DIR__ . '/../../../data/movies.list');
    $countLines = (integer) exec(sprintf("wc -l '%s'", $moviesFile->getRealPath()));
  
    $progress = $this->getProgressBar($output, $countLines);
  
    $counter = 0;
    $stepSize = 2048;
    
    $bulkData = [];
    $affectedRows = 0;

    while (!$moviesFile->eof()) {
      
      $line = $moviesFile->fgets();
      
      if (preg_match('/^\"?([^\"]+)\"?\s+\((\d+)\)/iu', $line, $matches)) {
        list(, $title, $year) = $matches;

        $bulkData[] = [
          'title' => trim($title),
          'year' => (integer) $year,
        ];
  
        if ($counter % 2048 === 0) {
          $affectedRows += $this->insertBulkData($bulkData); $bulkData = [];
        }
      }
  
      if (0 === ++$counter || $counter % $stepSize === 0) {
        $progress->setMessage(sprintf('Line %d; Memory: %s', $counter, Profiler::memoryUsage()));
        $progress->advance($stepSize);
      }
    }
    
    if (count($bulkData) > 0) {
      $affectedRows += $this->insertBulkData($bulkData);
    }

    $progress->setMessage(sprintf("<info>Time: %s, Memory: %s, Rows: %d</info>",
      Profiler::timeSpend(), Profiler::memoryUsage(), $affectedRows));
    
    $progress->finish();
  }
  
  /**
   * @param array $bulkData
   * @return mixed
   */
  private function insertBulkData(array $bulkData)
  {
    $connection = $this->repository->getConnection();
  
    $connection->start();
    
    $persister = $this->repository->createInsertQuery()->ignore();
    $persister->setDataBatchBulk(...$bulkData);
  
    if (!$connection->execute($persister->toSQL())) {
      $connection->rollback();
    }
  
    $connection->commit();
    
    return $connection->affectedRows();
  }
  
}