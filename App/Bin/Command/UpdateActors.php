<?php

namespace ColibriLabs\Bin\Command;

use Colibri\Exception\BadCallMethodException;
use ColibriLabs\Database\Om\Actor;
use ColibriLabs\Database\Om\ActorRepository;
use ColibriLabs\Lib\Util\Profiler;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class UpdateActors
 * @package ColibriLabs\Bin\Command
 */
class UpdateActors extends AbstractCommand
{
  
  /**
   * @var string
   */
  private static $actorPattern = '/([a-z]+,\s+[a-z]+[a-z0-9\(\)\s]+?)\s+\"?([^"]+)\"?\s+\(([\d]+)\)[^[]+\[([^\]\[]+)\]/ui';
  
  /**
   * @var string
   */
  private static $listPattern = '/\s+\"?([^"]+)\"?\s+\(([\d]+)\)[^[]+\[([^\]\[]+)\]/ui';
  
  /**
   * @var Actor
   */
  private $currentActor;
  
  /**
   * @inheritdoc
   */
  protected function configure()
  {
    parent::configure();
    
    $this->setName('app:update-actors');
    $this->setDescription('Update Actors');
    
    Profiler::timerStart();
  }
  
  /**
   * @inheritdoc
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $fileObject = new \SplFileObject(__DIR__ . '/../../../data/actors.list');
    $countLines = (integer)exec(sprintf("wc -l '%s'", $fileObject->getRealPath()));
    
    $progress = $this->getProgressBar($output, $countLines);
    $counter = 0;
    $stepSize = 2048;
    
    $buffer = null;
    
    while (!$fileObject->eof()) {
      
      if (0 === ++$counter || $counter % $stepSize === 0) {
        $progress->setMessage(sprintf('Line (%d/%d); Memory: %s', $counter, $countLines - $counter, Profiler::memoryUsage()));
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
   * @throws BadCallMethodException
   */
  private function parseString($string, OutputInterface $output)
  {
    if ($string[0] === "\t" && preg_match(static::$listPattern, $string, $matches)) {
      $this->parseActorMovie($matches);
    } elseif (preg_match(static::$actorPattern, $string, $matches)) {
      $this->parseActor($matches);
    }
  }
  
  /**
   * @param array $matches
   */
  private function parseActor(array $matches)
  {
    list(, $actorName, $title, $year, $roleName) = $matches;
    list($surname, $forename) = explode(',', $actorName);
    $this->currentActor = $this->retrieveActor(trim($forename), trim($surname));
  }
  
  /**
   * @param array $matches
   * @throws BadCallMethodException
   */
  private function parseActorMovie(array $matches)
  {
    if (!$this->currentActor instanceof Actor) {
      throw new BadCallMethodException('Actor was not defined yet. Bad parsing process');
    }
    
    list(, $title, $year, $roleName) = $matches;
  }
  
  /**
   * @param $forename
   * @param $surname
   * @param string $sex
   * @return \Colibri\Core\Entity\EntityInterface|Actor
   * @throws \Colibri\Exception\NotSupportedException
   */
  private function retrieveActor($forename, $surname, $sex = Actor::ENUM_SEX_M)
  {
    $repository = new ActorRepository();
    
    $repository->filterByForename($forename);
    $repository->filterBySurname($surname);
    $repository->filterBySex($sex);
    
    if (!($actor = $repository->findOne(null)) instanceof Actor) {
      $actor = new Actor();
      
      $actor->setForename($forename);
      $actor->setSurname($surname);
      $actor->setSex($sex);
      
      $repository->persist($actor);
    }
    
    return $actor;
  }
  
}