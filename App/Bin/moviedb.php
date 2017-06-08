<?php

use ColibriLabs\Bin\UpdaterApplication;
use Symfony\Component\Console\Command\Command;

include_once __DIR__ . '/../../vendor/autoload.php';

$application = new UpdaterApplication('MovieDB CLI Application', 'v0.1');

$dir = __DIR__ . '/Command';

$iterator = new DirectoryIterator(sprintf('glob://%s/Command/*.php', __DIR__));
$namespace = '\\ColibriLabs\\Bin\\Command';

foreach ($iterator as $file) {
  
  $class = sprintf('%s\\%s', $namespace, $file->getBasename('.php'));
  $reflection = new ReflectionClass($class);
  
  if(false === $reflection->isAbstract() && $reflection->isSubclassOf(Command::class)) {
    /** @var Command $command */
    $command = $reflection->newInstance();
    $application->add($command);
  }
}

$application->run();

