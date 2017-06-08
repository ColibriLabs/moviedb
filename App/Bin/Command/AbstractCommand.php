<?php

namespace ColibriLabs\Bin\Command;

use ColibriLabs\Database\Om\MovieRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class AbstractCommand
 * @package ColibriLabs\Bin\Command
 */
abstract class AbstractCommand extends Command
{
  
  /**
   * @var MovieRepository
   */
  protected $repository;
  
  /**
   * @inheritdoc
   */
  protected function configure()
  {
    $this->repository = new MovieRepository();
  }
  
  /**
   * @param OutputInterface $output
   * @param $countLines
   * @return ProgressBar
   */
  protected function getProgressBar(OutputInterface $output, $countLines)
  {
    $progress = new ProgressBar($output, $countLines);
  
    $progress->setFormat("\n%message%\n\n<info>%bar%</info>\n\n");
    $progress->setBarWidth(80);
    $progress->setBarCharacter("▓");
    $progress->setProgressCharacter("▓");
    $progress->setEmptyBarCharacter("░");
    
    return $progress;
  }
  
}